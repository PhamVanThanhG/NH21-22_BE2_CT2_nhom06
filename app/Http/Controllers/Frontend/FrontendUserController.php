<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendUserController extends Controller
{
    public function index()
    {
        $order = Order::where('user_id',Auth::id())->get();

        return view('frontend.orders.index',compact('order'));
    }
    public function view($id)
    {
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.orders.view',compact('order'));
    }
}
