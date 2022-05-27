<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(){
        $order = Order::all();
        //dd($order[0]->state->state_name);
        return view("myorders");
    }
}
