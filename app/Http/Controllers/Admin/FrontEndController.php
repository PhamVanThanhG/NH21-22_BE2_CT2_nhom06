<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Product_Type;
use App\Models\User;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $product=Product::all();
        $product_type=Product_Type::all();
        $user = User::where('role_as','0')->get();
        $admin = User::where('role_as','1')->get();
        $order=Order::all();
        return view('admin.index',compact('product','product_type','user','order','admin'));
    }
}
