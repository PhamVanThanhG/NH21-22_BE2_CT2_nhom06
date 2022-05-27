<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'type_id',
        'description',
        'image',
        'price',
        'discount_id',
        'feature'
        
    ];
    public $timestamps = false;
    function product_type(){
        return $this->belongsTo(Product_Type::class, 'type_id');
    }
    function discount(){
        return $this->belongsTo(Discount::class, 'discount_id');
    }
    function cart(){
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
    function orderedProduct(){
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
}
