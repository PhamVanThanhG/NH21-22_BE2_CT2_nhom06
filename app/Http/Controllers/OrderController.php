<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function index(){
        $order = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $orderedProduct = OrderedProduct::all();
        return view("myorders", ['order' => $order, 'orderedProduct' => $orderedProduct]);
    }

    function cancel($order_id = ''){
        Order::where('order_id', $order_id)->where('state_id', 1)->update(['state_id' => 4]);
        return redirect()->back();
    }
}
