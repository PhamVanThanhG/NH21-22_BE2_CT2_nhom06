<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItems;

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
        'user_id',
        'created_at',
        'updated_at',
        'fullname',
        'phonenumber',
        'address'
        // 'user_id',
        // 'fname',
        // 'lname',
        // 'email',
        // 'phone',
        // 'address',
        // 'total_price',
        // 'status',
        // 'tracking_no',
    ];
    function state(){
        return $this->belongsTo(State::class,'state_id');
    }
    public function order_product()
    {
        return $this->hasMany(OrderedProduct::class,'order_id','order_id');
    }


}
