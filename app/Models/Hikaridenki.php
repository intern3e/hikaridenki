<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hikaridenki extends Model
{
    protected $table = 'hikaridenki';   
    protected $primaryKey = 'iditem';  
    public $incrementing = false;       
    protected $keyType = 'string';

    protected $fillable = [
        'iditem', 'model', 'name', 'price', 'discount', 'size',
        'lead_time', 'webpriceTHB', 'stock', 'lead_time_web',
        'brand', 'pic'
    ];
}

