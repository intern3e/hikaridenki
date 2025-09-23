<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log; 
use App\Models\Hikaridenki;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

public function showproduct(Request $request, ?string $brand = null)
{
    $brandParam    = $brand ?? $request->query('brand');
    $brandParam    = is_string($brandParam)    ? trim($brandParam)    : null;

    $allBrands = Hikaridenki::query()
        ->select('brand')
        ->whereNotNull('brand')->where('brand','<>','')
        ->pluck('brand');

    $brandCounts = $allBrands->map(fn($b)=>trim($b))->filter()->countBy()->sortDesc();

    // Active states
    $activeBrand = $brandParam ?: '*';


    $activeBrandSlug = ($activeBrand === '*') ? '*' : Str::slug($activeBrand);

    $q = Hikaridenki::query()
        ->select(['iditem', 'model', 'name', 'price', 'discount', 'size',
        'lead_time', 'webpriceTHB', 'stock', 'lead_time_web',
        'brand', 'pic'])
        ->when($brandParam,    fn($q)=>$q->where('brand', $brandParam))
        ->orderByDesc('iditem');
    $items = $q->paginate(32)->withQueryString();


    return view('allproduct', [
        'name'             => $q,
        'items'            => $items,
        'brandCounts'      => $brandCounts,
        'activeBrand'      => $activeBrand,
        'activeBrandSlug'  => $activeBrandSlug,
        'activeSlug'       => $activeBrandSlug,
        'brandParam'       => $brandParam,
    ]);
 }
public function searchByName(Request $request)
{
    $q = trim($request->query('q', ''));
    if (mb_strlen($q) < 2) {
        return response()->json([]);
    }

    $tokens = preg_split('/\s+/u', $q, -1, PREG_SPLIT_NO_EMPTY);
    $t0 = microtime(true);
    try {
        DB::connection()->select('select 1');
    } catch (\Throwable $e) {
        Log::error('[SEARCHBAR] DB connect fail', ['error' => $e->getMessage()]);
        return response()
            ->json(['error' => 'DB connection failed', 'detail' => $e->getMessage()], 500)
            ->header('X-Search-DB', 'fail');
    }

    try {
        DB::enableQueryLog();

        // ✅ ค้นหาเฉพาะ name โดย OR ทุก token (ตามที่สั่ง)
        $rows = hikaridenki::query()
            ->select(['iditem','pic','model','name','webpriceTHB','stock','lead_time_web','brand'])
            ->where(function ($outer) use ($tokens) {
                foreach ($tokens as $t) {
                    $outer->orWhereRaw('LOWER(name) LIKE ?', ['%'.mb_strtolower($t, 'UTF-8').'%']);
                }
            })
            ->orderBy('name')
            ->limit(20)
            ->get();

        $elapsedMs = round((microtime(true) - $t0) * 1000, 1);
        $log = DB::getQueryLog();
        Log::info('[SEARCHBAR] ok', [
            'q'         => $q,
            'tokens'    => $tokens,
            'count'     => $rows->count(),
            'elapsedMs' => $elapsedMs,
            'sql'       => $log[0]['query']    ?? null,
            'bindings'  => $log[0]['bindings'] ?? null,
        ]);

        $payload = $rows->map(function ($r) {
            return [
                'iditem' => $r->iditem,
                'name'   => (string) ($r->name ?? ''),
                'model'  => (string) ($r->model ?? ''),
                'brand'  => (string) ($r->brand ?? ''),
                'pic'    => (string) ($r->pic ?? ''),
                'price'  => isset($r->webpriceTHB) ? (string) str_replace(',', '', $r->webpriceTHB) : null,
                'lead'   => (string) ($r->lead_time_web ?? ''),
                // 'url'    => route('product.detail', ['iditem' => $r->iditem]),
            ];
        });

        return response()
            ->json($payload)
            ->header('X-Search-DB', 'ok')
            ->header('X-Search-Count', $payload->count())
            ->header('X-Search-Time', $elapsedMs.'ms');

    } catch (\Throwable $e) {
        // ✅ ดักทุกกรณี query พัง แล้ว log + ส่งออก
        Log::error('[SEARCHBAR] query fail', [
            'q'      => $q,
            'error'  => $e->getMessage(),
            'trace'  => substr($e->getTraceAsString(), 0, 1500),
        ]);

        return response()
            ->json(['error' => 'Search failed', 'detail' => $e->getMessage()], 500)
            ->header('X-Search-DB', 'ok')
            ->header('X-Search-Error', '1');
    }
}

}
