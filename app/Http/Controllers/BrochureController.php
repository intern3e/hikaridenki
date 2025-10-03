<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; 

class BrochureController extends Controller
{
    public function index()
    {
        $categories = [
            'UPS เครื่องสำรองไฟ',
            'แบตเตอรี่',
            'ไฟฉุกเฉิน และ ป้ายหนีไฟ',
            'ระบบแจ้งเหตุเพลิงไหม้'
        ];

        $services = Service::whereIn('category', $categories)
            ->get()
            ->groupBy('category')          
            ->map(function($items) {
                return $items->groupBy('brand'); 
            });

        return view('Product', [
            'categories' => $categories,
            'services'   => $services,
        ]);
    }

}
