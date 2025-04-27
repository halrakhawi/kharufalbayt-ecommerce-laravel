<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable = [
        'user_id',
        'total_price',
        'net_price',
        'tax',
        'discount',
        'package_cost',
        'coupon',
        'latitude',
        'longitude',
        'status',
        'payment_method',
        'ddate',
        'dtime'
    ];
}
/*
status
0 قيد الانتظار
1 مؤكدة
2 مكتملة
3 مرفوضة
*/
