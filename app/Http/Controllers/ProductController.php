<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_Type;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Integer;


class ProductController extends Controller
{

    function index()
    {

        $product = Product::all();
        $product_type = Product_Type::all();
        $rating = Rating::all();
        $feature_product = Product::where('feature', '1')->inRandomOrder()->take(4)->get();
        $productRelated = Product::where('type_id', $product[0]['type_id'])->inRandomOrder()->take(4)->get();
        return view("index", compact('product', 'product_type', 'rating', 'feature_product', 'productRelated'));
    }
    function product()
    {
        $product = Product::all();
        $product_type = Product_Type::all();
        $rating = Rating::all();
        return view("product", ['product' => $product, 'product_type' => $product_type, 'rating' => $rating]);
    }

    function testimonial()
    {
        return view("testimonial");
    }

    function about()
    {
        return view("about");
    }
    function productByType(Request $request)
    {
        $typeid = (int)$request->input('typeid');
        $product = Product::all();
        $product_type = Product_Type::all();
        $rating = Rating::all();
        return view("productByType", ['product' => $product, 'product_type' => $product_type, 'rating' => $rating, 'typeid' => $typeid]);
    }

    function cart()
    {
        $cartTo = Session::get('cart');
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return view("cart", ['cart' => $cart, 'cartTo' => $cartTo]);
    }

    function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $product = Product::where('description', 'LIKE', '%' . $keyword . '%')->get();
        $rating = Rating::all();
        return view("searchresult", ['product' => $product, 'rating' => $rating, 'keyword' => $keyword]);
    }
}
