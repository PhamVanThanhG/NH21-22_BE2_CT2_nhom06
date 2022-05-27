<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    use HasFactory;
    protected $table = 'ordered_product';
    public $timestamps = false;
    protected $fillable=[
        'id',
        'order_id',
        'product_id',
        'pricewithoutdiscount',
        'pricewithdiscount',
        'quantity'
    ];
    function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
