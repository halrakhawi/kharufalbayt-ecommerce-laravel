<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topcategories extends Model
{
    use HasFactory;
    protected $table='top_categories';
    protected $fillable = [
        'name',
        'status',
        'picture'
    ];


    public function products()
    {
        return $this->hasMany(Category::class,'type')->where('status',1);
    }

}
