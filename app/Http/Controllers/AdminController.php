<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hikaridenki;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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

        return back()->with('error', 'รหัสผิดไอ้โง่จะแฮคกูหรอ');
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

    $file = $request->file('csv_file');
    $path = $file->getRealPath();

    $rows = array_map('str_getcsv', file($path));
    $header = array_map('trim', array_shift($rows)); 

    foreach ($rows as $row) {
        $data = array_combine($header, $row);

        if (!isset($data['iditem'])) continue; 

        $product = Hikaridenki::find($data['iditem']);

        if ($product) {
            $product->update([
                'Model' => $data['Model'] ?? $product->Model,
                'name' => $data['name'] ?? $product->name,
                'webpriceTHB' => $data['webpriceTHB'] ?? $product->webpriceTHB,
                'discount' => $data['discount'] ?? $product->discount,
                'size' => $data['size'] ?? $product->size,
                'lead_time' => $data['lead_time'] ?? $product->lead_time,
                'stock' => $data['stock'] ?? $product->stock,
                'brand' => $data['brand'] ?? $product->brand,
            ]);
        } else {
            Hikaridenki::create([
                'iditem' => $data['iditem'],
                'Model' => $data['Model'] ?? null,
                'name' => $data['name'] ?? null,
                'webpriceTHB' => $data['webpriceTHB'] ?? null,
                'discount' => $data['discount'] ?? null,
                'size' => $data['size'] ?? null,
                'lead_time' => $data['lead_time'] ?? null,
                'stock' => $data['stock'] ?? null,
                'brand' => $data['brand'] ?? null,
            ]);
        }
    }

    return redirect()->back()->with('success', 'CSV อัปโหลดและอัปเดตเรียบร้อยแล้ว');
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
