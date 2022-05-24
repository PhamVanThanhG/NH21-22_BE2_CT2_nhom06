<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'discount';
    protected $fillable=[
        'active',
        'values',
    ];
    function product(){
        return $this->hasMany(Product::class, 'discount_id', 'id');
    }
}
