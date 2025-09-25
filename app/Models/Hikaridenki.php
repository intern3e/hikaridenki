<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hikaridenki extends Model
{
    protected $table = 'hikaridenki';
    protected $primaryKey = 'iditem';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'iditem', 'model', 'name', 'price', 'discount', 'size',
        'lead_time', 'webpriceTHB', 'stock', 'lead_time_web',
        'brand', 'pic',
    ];

    /**
     * (ออปชัน) ให้ Route Model Binding ใช้คอลัมน์ iditem
     */
    public function getRouteKeyName()
    {
        return 'iditem';
    }

    /**
     * Accessor: เข้าถึงด้วย $model->webprice_thb_float
     * แปลง webpriceTHB (string) ให้เป็น float ปลอดภัยสำหรับ number_format()
     */
    public function getWebpriceThbFloatAttribute(): ?float
    {
        $raw = $this->webpriceTHB;
        if ($raw === null) {
            return null;
        }
        // ตัดอักขระที่ไม่ใช่ตัวเลข/จุด/ลบ (กันเคส "12,000 THB")
        $clean = preg_replace('/[^\d\.-]/', '', (string) $raw);
        if ($clean === '' || $clean === '-' || $clean === '.' || $clean === '-.') {
            return null;
        }
        return (float) $clean;
    }
}
