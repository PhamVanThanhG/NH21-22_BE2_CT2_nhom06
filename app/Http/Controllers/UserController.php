<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Type;
use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;

class UserController extends Controller
{
    function index(){
        $data = Product::all();
        return view('index2',['data'=>$data]);
    }
    function goTo($page = "index"){
        $getproduct = Product::take(9)->get();
        $product = Product::all();
        $product_type = Product_Type::all();
        return view($page, ['product' =>$product,'getproduct'=>$getproduct, 'product_type' => $product_type]);
    }
    
}
