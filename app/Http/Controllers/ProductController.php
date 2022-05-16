<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Type;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function goTo($page = "index"){
        $getproduct = Product::take(9)->get();
        $product = Product::all();
        $product_type = Product_Type::all();
        $rating = Rating::all();
        return view($page, ['product' =>$product,'getproduct'=>$getproduct, 'product_type' => $product_type, 'rating' => $rating]);
    }
}
