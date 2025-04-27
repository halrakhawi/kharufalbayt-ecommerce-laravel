<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table='subCategory';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'cat_id',
        'name',
        'picture',
        'flag',
        'options',
        'price'
    ];

   
}
