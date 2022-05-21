<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Type;
use App\Models\Rating;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ProductController extends Controller
{
    function index()
    {
        $getproduct = Product::take(9)->get();
        $product = Product::all();
        $product_type = Product_Type::all();
        $rating = Rating::all();
        return view("index", ['product' => $product, 'getproduct' => $getproduct, 'product_type' => $product_type, 'rating' => $rating]);
    }
    function product()
    {
        $product = Product::all();
        $product_type = Product_Type::all();
        $rating = Rating::all();
        return view("product", ['product' => $product, 'product_type' => $product_type, 'rating' => $rating]);
    }
    function productByType(Request $request)
    {
        $typeid = (int)$request->input('typeid');
        $product = Product::all();
        $product_type = Product_Type::all();
        $rating = Rating::all();
        return view("productByType", ['product' => $product, 'product_type' => $product_type, 'rating' => $rating, 'typeid' => $typeid]);
    }
}
