<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table='order_details';
    protected $fillable = [
        'order_id',
        'item_name',
        'quantity',
        'cut_type',
        'pack',
        'internal',
        'stamp',
        'ahead',
        'comment'
    ];
}

/*
$table->integer('order_id');
            $table->string('item_name');
            $table->integer('quantity');
            $table->integer('cut_type');
            $table->integer('pack');
            $table->string('internal');
            $table->string('stamp');
            $table->string('ahead');
            $table->string('comment');
*/
