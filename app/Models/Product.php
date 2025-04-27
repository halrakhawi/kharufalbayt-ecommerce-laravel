<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = [
        'name',
        'price',
        'cat_id',
        'description',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }
}
