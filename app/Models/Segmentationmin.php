<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segmentationmin extends Model
{
    use HasFactory;
    protected $table='segmentation_min';
    protected $fillable = [
        'name',
        'picture',
        'status'
    ];
}
