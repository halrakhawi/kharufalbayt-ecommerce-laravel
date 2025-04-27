<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadOption extends Model
{
    use HasFactory;
    protected $table='head_options';
    protected $primaryKey = 'id';
    protected $fillable = [
        'options',
        'status'
    ];
}
