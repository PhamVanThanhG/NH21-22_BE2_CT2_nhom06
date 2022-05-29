<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function orders()
    {
        $order = Order::where('status','0')->get();
        return view('admin.orders.index',compact('order'));
    }
    public function view($id)
    {
        $order = Order::where('id',$id)->first();
        return view('admin.orders.view',compact('order'));
    }
    public function update(Request $request,$id)
    {
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->save();
        return redirect('orders')->with('status','Order Update Successfully!');
    }
    public function orderhistory()
    {
        $order = Order::where('status','1')->get();
        return view('admin.orders.history',compact('order'));
    }
}
