<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Type extends Model
{
    use HasFactory;
    protected $table = 'product_type';
    public $timestamps = false;
    function product(){
        return $this->hasMany(Product::class, 'type_id', 'id');
    }
}
