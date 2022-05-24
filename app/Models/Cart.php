<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'cart';
    function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
