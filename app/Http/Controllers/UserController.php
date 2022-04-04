<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function navigation($page="index"){
        return view($page);
    }
}
