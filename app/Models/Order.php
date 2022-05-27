<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable=[
        'id',
        'order_id',
        'state_id',
        'temporary_price',
        'total_price',
        'created_at',
        'updated_at'
    ];
}
