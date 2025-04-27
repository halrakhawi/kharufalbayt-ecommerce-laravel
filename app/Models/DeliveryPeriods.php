<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPeriods extends Model
{
    use HasFactory;
    protected $table='deliveryperiods';
    protected $fillable = [
        'name',
        'status'
    ];
}
