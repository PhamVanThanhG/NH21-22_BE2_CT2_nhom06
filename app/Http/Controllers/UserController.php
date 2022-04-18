<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        $user = Product::all();
        return view('index2',['data'=>$user]);
    }
}
