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
    $brandParam = $brand ?? $request->query('brand');
    $brandParam = is_string($brandParam) ? trim($brandParam) : null;

    $allBrands = Hikaridenki::query()
        ->select('brand')
        ->whereNotNull('brand')->where('brand','<>','')
        ->pluck('brand');

    $brandCounts = $allBrands->map(fn($b)=>trim($b))->filter()->countBy()->sortDesc();

    $activeBrand = $brandParam ?: '*';
    $activeBrandSlug = ($activeBrand === '*') ? '*' : Str::slug($activeBrand);


    $brandThumbs = [
        'MAKITA' => '',
    ];

    $q = Hikaridenki::query()
        ->select([
            'iditem','model','name','price','discount','size',
            'lead_time','webpriceTHB','stock','lead_time_web',
            'brand','pic'
        ])
        ->when($brandParam, fn($q)=>$q->where('brand', $brandParam))
        ->orderByDesc('iditem');

    // ใช้ through() ของ paginator สร้าง field ชั่วคราว pic_resolved
    $items = $q->paginate(32)->withQueryString()
        ->through(function ($it) use ($brandThumbs) {
            // ถ้ามี pic อยู่แล้ว ใช้อันนั้น
            if (!empty($it->pic)) {
                $it->pic_resolved = $it->pic;
                return $it;
            }

            // ไม่มี pic: ลองหาแทนด้วย brand
            $brandKey = strtoupper(trim((string)($it->brand ?? '')));
            $it->pic_resolved = $brandThumbs[$brandKey] ?? null; // ถ้าไม่มี mapping จะเป็น null ไว้ก่อน
            return $it;
        });

    return view('allproduct', [
        'name'            => $q,
        'items'           => $items,
        'brandCounts'     => $brandCounts,
        'activeBrand'     => $activeBrand,
        'activeBrandSlug' => $activeBrandSlug,
        'activeSlug'      => $activeBrandSlug,
        'brandParam'      => $brandParam,
    ]);
}

public function searchByName(Request $request)
{
    $q = trim($request->query('q', ''));
    if (mb_strlen($q) < 2) {
        return response()->json([]);
    }

    // เตรียม token (ตัดช่องว่างซ้ำ, lowercase)
    $tokens = preg_split('/\s+/u', $q, -1, PREG_SPLIT_NO_EMPTY);
    $tokens = array_values(array_filter(array_map(function($t){
        return mb_strtolower($t, 'UTF-8');
    }, $tokens)));

    $qNorm   = mb_strtolower(preg_replace('/\s+/u', ' ', $q), 'UTF-8');  // “fluke 1507” แบบ normalize
    $t0      = microtime(true);

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

        // ===== สร้างสูตรคะแนนความเกี่ยวข้อง =====
        // 1) exact match ทั้งสตริง
        // 2) prefix match ทั้งสตริง (ขึ้นต้นด้วยคำค้น)
        // 3) คำเต็มด้วย REGEXP (ขอบเขตคำ)
        // 4) คะแนนย่อยต่อ token: LIKE และ REGEXP ของคำเต็ม
        $scoreSql   = [];
        $scoreBind  = [];

        // exact ทั้งสตริง
        $scoreSql[] = "(CASE WHEN LOWER(name) = ? THEN 100 ELSE 0 END)";
        $scoreBind[] = $qNorm;

        // prefix ทั้งสตริง
        $scoreSql[] = "(CASE WHEN LOWER(name) LIKE ? THEN 60 ELSE 0 END)";
        $scoreBind[] = $qNorm.'%';

        // คำเต็มของทั้งสตริง (เผื่อกรณีชื่อสินค้าคำเดียว)
        $scoreSql[] = "(CASE WHEN LOWER(name) REGEXP ? THEN 50 ELSE 0 END)";
        // \b ใช้ผ่าน POSIX class ใน MySQL: [[:<:]] = เริ่มคำ, [[:>:]] = จบคำ
        $scoreBind[] = '[[:<:]]'.preg_quote($qNorm, '/').'[[:>:]]';

        // ต่อ token
        foreach ($tokens as $t) {
            // พบ token แบบ LIKE
            $scoreSql[] = "(CASE WHEN LOWER(name) LIKE ? THEN 12 ELSE 0 END)";
            $scoreBind[] = '%'.$t.'%';

            // พบ token แบบ "คำเต็ม" ด้วย REGEXP
            $scoreSql[] = "(CASE WHEN LOWER(name) REGEXP ? THEN 18 ELSE 0 END)";
            $scoreBind[] = '[[:<:]]'.preg_quote($t, '/').'[[:>:]]';
        }

        $scoreExpr = implode(' + ', $scoreSql).' AS score';

        // ===== เงื่อนไข: ต้องพบทุก token (AND) เพื่อกันผลลัพธ์ไม่เกี่ยว =====
        $rows = hikaridenki::query()
            ->select([
                'iditem','pic','model','name','webpriceTHB','stock','lead_time_web','brand',
            ])
            ->selectRaw($scoreExpr, $scoreBind)
            ->where(function ($must) use ($tokens) {
                foreach ($tokens as $t) {
                    // ต้องมีทุก token (AND)
                    $must->whereRaw('LOWER(name) LIKE ?', ['%'.$t.'%']);
                }
            })
            // จัดเรียงตามความเกี่ยวข้องมากสุด -> ชื่อสั้นกว่า -> ชื่อ
            ->orderByDesc('score')
            ->orderByRaw('CHAR_LENGTH(name) ASC')
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
            ];
        });

        return response()
            ->json($payload)
            ->header('X-Search-DB', 'ok')
            ->header('X-Search-Count', $payload->count())
            ->header('X-Search-Time', $elapsedMs.'ms');

    } catch (\Throwable $e) {
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
public function showProductDetail(string $iditem)
{
    $product = Hikaridenki::query()
        ->where('iditem', $iditem)
        ->select([
            'iditem','model','name','price','discount','size',
            'lead_time','webpriceTHB','stock','lead_time_web',
            'brand','pic',
        ])
        // ตัดช่องว่าง และทำ fallback: lead_time_web -> lead_time
        ->selectRaw("
            COALESCE(
                NULLIF(TRIM(lead_time_web), ''),
                NULLIF(TRIM(lead_time), '')
            ) as lead_time_view
        ")
        ->firstOrFail();

    return view('productdetail', compact('product')); // ไปหน้าเดียวเท่านั้น
}

}
