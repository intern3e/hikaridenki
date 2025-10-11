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


public function uploadCsv(\Illuminate\Http\Request $request)
{
    // ====== Runtime context & logger ======
    $reqId  = (string) \Illuminate\Support\Str::uuid();
    $start  = microtime(true);
    $pid    = function_exists('getmypid') ? getmypid() : null;

    // ไฟล์ log แยกของงานนี้ (เพิ่มเติมจาก Laravel log ปกติ)
    $logDir  = 'logs';
    $logFile = $logDir.'/csv_upload_'.date('Ymd').'.log';
    \Illuminate\Support\Facades\Storage::disk('local')->makeDirectory($logDir);

    $log = function(string $level, string $msg, array $ctx = []) use ($reqId, $logFile) {
        $payload = array_merge(['req' => $reqId], $ctx);
        \Illuminate\Support\Facades\Log::{$level}('[CSV] '.$msg, $payload);
        try {
            \Illuminate\Support\Facades\Storage::disk('local')->append(
                $logFile,
                date('c').' ['.strtoupper($level).'] '.$msg.' '.json_encode($payload, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)
            );
        } catch (\Throwable $e) {
            // ถ้าเขียนไฟล์ไม่ได้ก็ปล่อยไป ใช้ Laravel log แทน
        }
    };

    $log('info', 'START uploadCsv', [
        'php'     => PHP_VERSION,
        'pid'     => $pid,
        'ip'      => request()->ip(),
        'agent'   => (string) request()->userAgent(),
        'content' => $request->headers->get('content-type'),
        'len'     => (string) $request->headers->get('content-length'),
    ]);

    // ====== Validate ======
    $request->validate([
        'csv_file' => 'required|file|mimes:csv,txt',
    ]);

    // ====== Env hardening ======
    @ini_set('max_execution_time', '0');
    @ini_set('memory_limit', '1024M');
    \DB::connection()->disableQueryLog();

    // ====== Resolve DB/table (ให้รันได้ทั้ง local/prod) ======
    $table = 'hikaridenki';
    if (class_exists(\App\Models\Hikaridenki::class)) {
        $table = (new \App\Models\Hikaridenki)->getTable(); // กันเคสชื่อตารางต่างกัน
    }
    $currentDb = optional(\DB::selectOne('SELECT DATABASE() AS db'))->db;
    $log('info', 'DB resolved', ['database' => $currentDb, 'table' => $table]);

    // เช็คว่าตารางมีจริง
    try {
        $exists = \Illuminate\Support\Facades\Schema::hasTable($table);
        if (!$exists) {
            $log('error', 'Base table not found', ['table' => $table]);
            return back()->with('error', "ไม่พบตาราง {$table} ในฐานข้อมูล {$currentDb}");
        }
    } catch (\Throwable $e) {
        $log('warning', 'Schema check failed', ['error' => $e->getMessage()]);
    }

    // ====== รับไฟล์ + ทำให้ path ใช้ได้เสมอ ======
    $file = $request->file('csv_file');
    if (!$file) {
        $log('error', 'No file received by PHP (csv_file missing)');
        return back()->with('error', 'ไม่ได้รับไฟล์ csv_file — โปรดตรวจแบบฟอร์ม enctype และขนาดไฟล์');
    }

    $tmp = $file->getRealPath();
    if (!$tmp || !file_exists($tmp)) {
        \Illuminate\Support\Facades\Storage::disk('local')->makeDirectory('tmp');
        $stored = $file->storeAs('tmp', 'upload_'.\Illuminate\Support\Str::uuid().'.csv', 'local');
        $tmp    = \Illuminate\Support\Facades\Storage::disk('local')->path($stored);
        $log('info', 'Stored fallback copy', ['stored' => $stored, 'tmp' => $tmp]);
    }

    // ====== เปิดไฟล์ ======
    $fh = @fopen($tmp, 'r');
    if ($fh === false) {
        $log('error', 'fopen failed', ['tmp' => $tmp]);
        return back()->with('error', 'เปิดไฟล์ไม่สำเร็จ');
    }

    // ====== เดาตัวคั่น (รองรับ ; , tab) ======
    $probe = fread($fh, 4096) ?: '';
    rewind($fh);
    $counts = [
        ';'  => substr_count($probe, ';'),
        ','  => substr_count($probe, ','),
        "\t" => substr_count($probe, "\t"),
    ];
    arsort($counts);
    $delimiter = array_key_first($counts) ?? ',';
    $log('info', 'Delimiter guessed', ['delimiter' => $delimiter, 'counts' => $counts]);

    // ====== Header ======
    $header = fgetcsv($fh, 0, $delimiter);
    if (!$header) {
        fclose($fh);
        $log('error', 'Cannot read header row');
        return back()->with('error', 'อ่านหัวตารางไม่ได้');
    }
    // ล้าง BOM/trim
    $header = array_map(function($h){
        if ($h === null) return null;
        $h = is_string($h) ? preg_replace('/^\xEF\xBB\xBF/', '', $h) : $h;
        return is_string($h) ? trim($h) : $h;
    }, $header);

    // map CSV header -> DB columns
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
            default         => $h, // ไม่รู้จักก็ปล่อยชื่อเดิม
        };
    };
    $header = array_map($mapHeader, $header);

    if (!in_array('iditem', $header, true)) {
        fclose($fh);
        $log('error', 'iditem column missing in header', ['header' => $header]);
        return back()->with('error', 'ไม่พบคอลัมน์ iditem');
    }

    // คอลัมน์ที่อนุญาตให้เขียน
    $allowed = [
        'iditem','pic',
        'Model','num_model','name',
        'Price','discount','size',
        'Lead_time','webpriceTHB','stock','Lead_time_web',
        'brand',
    ];

    // Helpers
    $enull = function($v) {
        if ($v === null) return null;
        if (is_string($v)) {
            $s = trim($v);
            if ($s === '' || strtolower($s) === 'null') return null;
            return $s;
        }
        return $v;
    };
    $num = function($v) use ($enull) {
        $v = $enull($v);
        if ($v === null) return null;
        $s = str_replace([',',' '], '', (string)$v);
        return is_numeric($s) ? 0 + $s : null;
    };

    $buffer        = [];
    $chunkSize     = 4000; // ปรับได้ 2000–10000 ตามสเปกเซิร์ฟเวอร์
    $total         = 0;
    $rowsRead      = 0;
    $skippedNoId   = 0;
    $headerCount   = count($header);

    // พยายามเช็ค unique key (log เพื่อ debug ต่างสภาพแวดล้อม)
    try {
        $row = \DB::selectOne("
            SELECT COUNT(1) AS c
            FROM INFORMATION_SCHEMA.STATISTICS
            WHERE TABLE_SCHEMA = DATABASE()
              AND TABLE_NAME = ?
              AND COLUMN_NAME = 'iditem'
              AND NON_UNIQUE = 0
            LIMIT 1
        ", [$table]);
        $hasUniqueId = $row && intval($row->c) > 0;
        $log('info', 'Unique index on iditem', ['hasUnique' => $hasUniqueId]);
    } catch (\Throwable $e) {
        $log('warning', 'Unique index check failed', ['error' => $e->getMessage()]);
    }

    \DB::beginTransaction();
    try {
        while (($row = fgetcsv($fh, 0, $delimiter)) !== false) {
            $rowsRead++;

            if ($row === null || $row === [null] || $row === ['']) {
                continue;
            }

            // align จำนวนคอลัมน์ให้เท่ากัน
            if (count($row) < $headerCount) $row = array_pad($row, $headerCount, null);
            if (count($row) > $headerCount) $row = array_slice($row, 0, $headerCount);

            $assoc = @array_combine($header, $row);
            if ($assoc === false) {
                $log('warning', 'array_combine failed', ['rowNo' => $rowsRead + 1]);
                continue;
            }

            // payload
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

            if (empty($payload['iditem'])) {
                $skippedNoId++;
                continue;
            }

            $buffer[] = $payload;

            if (count($buffer) >= $chunkSize) {
                $t0 = microtime(true);
                \DB::table($table)->upsert(
                    $buffer,
                    ['iditem'],
                    array_values(array_diff($allowed, ['iditem']))
                );
                $dt = microtime(true) - $t0;

                $total += count($buffer);
                $log('info', 'UPSERT chunk done', ['chunk' => count($buffer), 'elapsed_s' => round($dt, 3)]);
                $buffer = [];
            }
        }

        if (!empty($buffer)) {
            $t0 = microtime(true);
            \DB::table($table)->upsert(
                $buffer,
                ['iditem'],
                array_values(array_diff($allowed, ['iditem']))
            );
            $dt = microtime(true) - $t0;

            $total += count($buffer);
            $log('info', 'UPSERT last chunk done', ['chunk' => count($buffer), 'elapsed_s' => round($dt, 3)]);
        }

        \DB::commit();
        fclose($fh);
    } catch (\Throwable $e) {
        \DB::rollBack();
        if (is_resource($fh)) fclose($fh);

        $msg = $e->getMessage();
        $hint = null;

        if (str_contains($msg, 'Base table or view not found') || str_contains($msg, '42S02')) {
            $hint = "ไม่พบตาราง {$table} (ตรวจชื่อ/ตัวพิมพ์ และการเชื่อมต่อ DB: {$currentDb})";
        } elseif (str_contains($msg, 'cannot be null') || str_contains($msg, "doesn't have a default value") || str_contains($msg, '1364')) {
            $hint = "สคีมาบังคับ NOT NULL แต่ CSV เว้นว่าง → ปรับคอลัมน์ให้รับ NULL หรือใส่ DEFAULT";
        } elseif (str_contains($msg, 'Duplicate entry')) {
            $hint = "พบ Duplicate key; ตรวจ UNIQUE/PRIMARY KEY ของ iditem และข้อมูลซ้ำใน CSV";
        }

        $log('error', 'UPLOAD FAILED', ['error' => $msg, 'hint' => $hint]);
        return back()->with('error', 'อัปโหลดล้มเหลว: '.$msg.($hint ? " | {$hint}" : ''));
    }

    $elapsed = microtime(true) - $start;
    $memPeak = function_exists('memory_get_peak_usage') ? round(memory_get_peak_usage(true) / (1024*1024), 1) : null;

    $log('info', 'DONE uploadCsv', [
        'rows_read'   => $rowsRead,
        'total_upsert'=> $total,
        'skipped_no_iditem' => $skippedNoId,
        'elapsed_s'   => round($elapsed, 3),
        'mem_peak_mb' => $memPeak,
    ]);

    return back()->with('success',
        "อัปโหลดสำเร็จ: อ่าน {$rowsRead} แถว, upsert {$total} แถว, ข้าม (ไม่มี iditem) {$skippedNoId}, ใช้เวลา ".round($elapsed,2)."s (req={$reqId})"
    );
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
