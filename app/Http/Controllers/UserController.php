<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        $user = User::all();
        return view('index2',['data'=>$user]);
    }
}
