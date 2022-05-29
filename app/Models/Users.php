<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';

    function rating(){
        return $this->hasMany(Rating::class, 'user_id', 'id');
    }
    function order(){
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
}
