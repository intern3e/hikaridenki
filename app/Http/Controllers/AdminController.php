<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hikaridenki;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;
class AdminController extends Controller
{
public function admin(Request $request)
    {
        if ($request->session()->get('user') === 'admin' && 
            $request->session()->get('password') === 'admin') {
            $tab = $request->get('tab', 'dashboard');
            $products = null;
            $brochure = null;
            $search = $request->get('search', '');
            $searchbrochure = $request->get('searchbrochure', '');
            if ($tab === 'edit-product') {
            $products = Hikaridenki::when($search, function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })->paginate(30);
        }
            if ($tab === 'brochure') {
               $brochure = Service::when($searchbrochure, function($query, $searchbrochure) {
                $query->where('brand', 'like', "%{$searchbrochure}%");
            })->paginate(30);
        }
            return view('AdminDashboard', compact('products', 'brochure', 'tab','search','searchbrochure'));
        }

        return redirect('/admin/login');
    }

    public function showLogin()
    {
        return view("AdminLogin");
    }

    public function doLogin(Request $request)
    {
        // ตรวจสอบค่าที่ส่งมาจากฟอร์ม login
        $user = $request->input('user');
        $password = $request->input('password');

        if ($user === 'admin' && $password === 'admin') {
            // เก็บค่า session
            $request->session()->put('user', $user);
            $request->session()->put('password', $password);

            return redirect('/admin');
        }

        return back()->with('error', 'รหัสผิดพลาดโปรดลองอีกครั่ง');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
    public function updateProduct(Request $request, $iditem)
    {
        $product = Hikaridenki::findOrFail($iditem);

        $product->update($request->only([
            'model', 'name', 'webpriceTHB', 'discount',
            'size', 'lead_time', 'stock', 'brand'
        ]));

        return response()->json(['success' => true]);
    }
    public function deleteProduct($iditem)
    {
        $product = Hikaridenki::findOrFail($iditem);
        $product->delete();

        return response()->json(['success' => true]);
    }
    public function deletebrochure($id_service)
    {
        $item = Service::findOrFail($id_service);
        if ($item->pdf && Storage::disk('public')->exists($item->pdf)) {
            Storage::disk('public')->delete($item->pdf);
        }

        // ลบ record ใน database
        $item->delete();

        return response()->json(['success' => true]);
    }


public function uploadCsv(Request $request)
{
    $request->validate([
        'csv_file' => 'required|file|mimes:csv,txt',
    ]);

    @ini_set('max_execution_time', '0');
    @ini_set('memory_limit', '1024M');
    DB::connection()->disableQueryLog();

    // ทำให้ path ใช้ได้เสมอ
    $file = $request->file('csv_file');
    $tmp  = $file->getRealPath();
    if (!$tmp || !file_exists($tmp)) {
        Storage::disk('local')->makeDirectory('tmp');
        $stored = $file->storeAs('tmp', 'upload_'.Str::uuid().'.csv', 'local');
        $tmp    = Storage::disk('local')->path($stored);
    }

    $fh = fopen($tmp, 'r');
    if ($fh === false) return back()->with('error', 'เปิดไฟล์ไม่สำเร็จ');

    // เดาตัวคั่น , หรือ ;
    $probe = fread($fh, 2048) ?: '';
    rewind($fh);
    $delimiter = (substr_count($probe, ';') > substr_count($probe, ',')) ? ';' : ',';

    // ===== Header =====
    $header = fgetcsv($fh, 0, $delimiter);
    if (!$header) { fclose($fh); return back()->with('error', 'อ่านหัวตารางไม่ได้'); }

    // ล้าง BOM/trim
    $header = array_map(function($h){
        if ($h === null) return null;
        $h = is_string($h) ? preg_replace('/^\xEF\xBB\xBF/', '', $h) : $h;
        return is_string($h) ? trim($h) : $h;
    }, $header);

    // map หัวคอลัมน์จาก CSV → ชื่อคอลัมน์ใน DB (คงเคสให้ตรง DB)
    $mapHeader = function($h) {
        $k = strtolower(preg_replace('/[\s_]+/u', '', (string)$h));
        return match ($k) {
            'iditem'        => 'iditem',
            'pic'           => 'pic',
            'model'         => 'Model',
            'nummodel'      => 'num_model',
            'name'          => 'name',
            'price'         => 'Price',
            'discount'      => 'discount',
            'size'          => 'size',
            'leadtime'      => 'Lead_time',      
            'webpricethb'   => 'webpriceTHB',
            'stock'         => 'stock',
            'leadtimeweb'   => 'Lead_time_web', 
            'brand'         => 'brand',
            default         => $h,               
        };
    };
    $header = array_map($mapHeader, $header);

    if (!in_array('iditem', $header, true)) {
        fclose($fh);
        return back()->with('error', 'ไม่พบคอลัมน์ iditem');
    }

    // คอลัมน์ที่อนุญาตให้เขียน (ตรง DB)
    $allowed = [
        'iditem','pic',
        'Model','num_model','name',
        'Price','discount','size',
        'Lead_time','webpriceTHB','stock','Lead_time_web',
        'brand',
    ];

    // helper: ค่าว่าง → null
    $enull = function($v) {
        if ($v === null) return null;
        if (is_string($v)) {
            $s = trim($v);
            if ($s === '' || strtolower($s) === 'null') return null;
            return $s;
        }
        return $v;
    };

    // helper: แปลงตัวเลข ("1,234.00" → 1234) ค่าว่าง → null
    $num = function($v) use ($enull) {
        $v = $enull($v);
        if ($v === null) return null;
        $s = str_replace([',',' '], '', (string)$v);
        return is_numeric($s) ? 0 + $s : null;
    };

    $buffer    = [];
    $chunkSize = 4000; // 2k–10k ตามสเปก
    $total     = 0;

    DB::beginTransaction();
    try {
        while (($row = fgetcsv($fh, 0, $delimiter)) !== false) {
            if ($row === null || $row === [null] || $row === ['']) continue;

            // ให้จำนวนคอลัมน์เท่ากับ header
            if (count($row) < count($header)) $row = array_pad($row, count($header), null);
            if (count($row) > count($header)) $row = array_slice($row, 0, count($header));

            $assoc = @array_combine($header, $row);
            if ($assoc === false) continue;

            // สร้าง payload ตาม allowed + แปลงค่าว่างเป็น null
            $payload = [];
            foreach ($allowed as $col) {
                if (!array_key_exists($col, $assoc)) { $payload[$col] = null; continue; }

                $val = $assoc[$col];

                if (in_array($col, ['Price','webpriceTHB','discount','stock'], true)) {
                    $payload[$col] = $num($val);
                } else {
                    $payload[$col] = $enull($val);
                }
            }

            // ต้องมี iditem
            if (empty($payload['iditem'])) continue;

            $buffer[] = $payload;

            if (count($buffer) >= $chunkSize) {
                DB::table('hikaridenki')->upsert(
                    $buffer,
                    ['iditem'], // unique key
                    // อัปเดตคอลัมน์เหล่านี้เมื่อเจอซ้ำ (ค่าว่างได้เป็น null)
                    ['pic','Model','num_model','name','Price','discount','size',
                     'Lead_time','webpriceTHB','stock','Lead_time_web','brand']
                );
                $total += count($buffer);
                $buffer = [];
            }
        }

        if (!empty($buffer)) {
            DB::table('hikaridenki')->upsert(
                $buffer,
                ['iditem'],
                ['pic','Model','num_model','name','Price','discount','size',
                 'Lead_time','webpriceTHB','stock','Lead_time_web','brand']
            );
            $total += count($buffer);
        }

        DB::commit();
        fclose($fh);
    } catch (\Throwable $e) {
        DB::rollBack();
        if (is_resource($fh)) fclose($fh);
        report($e);
        return back()->with('error', 'อัปโหลดล้มเหลว: '.$e->getMessage());
    }

    return back()->with('success', "อัปโหลดสำเร็จ: ประมวลผล {$total} แถว (ค่าว่าง → null)");
}
public function addbrochures(Request $request)
{
    // Validate input
    $request->validate([
        'brand'    => 'required|string|max:255',
        'name_brochure' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'pdf'      => 'required|file|mimes:pdf|max:100240', 
    ]);

    $brand = $request->brand;
    $name_brochure = $request->name_brochure;

    // หา service ของ brand นี้ล่าสุด เพื่อกำหนดเลขต่อท้าย
    $lastService = Service::where('brand', $brand)
        ->orderBy('id_service', 'desc')
        ->first();

    if ($lastService) {
        // ดึงเลขท้าย id_service และ +1
        $lastNumber = (int)substr($lastService->id_service, strlen($brand) + 1);
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $newNumber = '001';
    }

    $id_service = $brand . '-' . $newNumber;

    // อัปโหลดไฟล์ PDF
    $pdfPath = $request->file('pdf')->store('brochures', 'public');

    // สร้าง service ใหม่
    $service = Service::create([
        'id_service' => $id_service,
        'name_brochure' => $name_brochure,
        'brand'      => $brand,
        'category'   => $request->category,
        'pdf'  => $pdfPath,
    ]);

    return redirect()->back()->with('success', 'เพิ่มข้อมูล brochure เรียบร้อยแล้ว');
}


}
