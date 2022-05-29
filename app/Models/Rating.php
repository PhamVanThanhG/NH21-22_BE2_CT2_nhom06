<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $fillable =[
        'user_id',
        'product_id',
        'star_rated',
    ];
    function user(){
        return $this->belongsTo(Users::class, 'user_id');
    }
}
