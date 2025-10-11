<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hikaridenki extends Model
{
    protected $table = 'hikaridenki';
    protected $primaryKey = 'iditem';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'iditem', 'pic',
        'Model', 'num_model', 'name',
        'Price', 'discount', 'size',
        'Lead_time', 'webpriceTHB', 'stock', 'Lead_time_web',
        'brand',
    ];


    public function getRouteKeyName()
    {
        return 'iditem';
    }
    
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
