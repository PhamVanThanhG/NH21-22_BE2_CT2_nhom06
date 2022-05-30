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
        $product = Product::orderBy('id', 'DESC')->get();
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

    function filter($priceToSet = '', $saleToSet = '')
    {
        $price = 0;
        $sale = "all";
        switch ($priceToSet) {
            case 'price1':
                $price = 1;
                break;
            case 'price2':
                $price = 2;
                break;
            case 'price3':
                $price = 3;
                break;
            case 'price4':
                $price = 4;
                break;
            case 'price0':
                $price = 0;
            default:
                # code...
                break;
        }
        switch ($saleToSet) {
            case 'sale':
                $sale = "sale";
                break;
            case 'notsale':
                $sale = "notsale";
                break;
            case 'all':
                $sale = "all";
                break;
            default:
                $sale = "all";
                break;
        }
        $product = null;
        switch ($price) {
            case 0:
                switch ($sale) {
                    case 'all':
                        $product = Product::all();
                        break;
                    case 'sale':
                        $product = Product::where('discount_id', '<>', 4)->get();
                        break;
                    case 'notsale':
                        $product = Product::where('discount_id', '=', 4)->get();
                        break;
                    default:
                        # code...
                        break;
                }
                break;
            case 1:
                switch ($sale) {
                    case 'all':
                        $product = Product::where('price', '<=', 100)->get();
                        break;
                    case 'sale':
                        $product = Product::where('discount_id', '<>', 4)->where('price', '<=', 100)->get();
                        break;
                    case 'notsale':
                        $product = Product::where('discount_id', '=', 4)->where('price', '<=', 100)->get();
                        break;
                    default:
                        # code...
                        break;
                }
                break;
            case 2:
                switch ($sale) {
                    case 'all':
                        $product = Product::where('price', '>', 100)->where('price', '<=', 500)->get();
                        break;
                    case 'sale':
                        $product = Product::where('discount_id', '<>', 4)->where('price', '>', 100)->where('price', '<=', 500)->get();
                        break;
                    case 'notsale':
                        $product = Product::where('discount_id', '=', 4)->where('price', '>', 100)->where('price', '<=', 500)->get();
                        break;
                    default:
                        # code...
                        break;
                }
                break;
            case 3:
                switch ($sale) {
                    case 'all':
                        $product = Product::where('price', '>', 500)->where('price', '<=', 1000)->get();
                        break;
                    case 'sale':
                        $product = Product::where('discount_id', '<>', 4)->where('price', '>', 500)->where('price', '<=', 1000)->get();
                        break;
                    case 'notsale':
                        $product = Product::where('discount_id', '=', 4)->where('price', '>', 500)->where('price', '<=', 1000)->get();
                        break;
                    default:
                        # code...
                        break;
                }
                break;
            case 4:
                $product = Product::where('price', '>', 1000)->get();
                switch ($sale) {
                    case 'all':
                        $product = Product::where('price', '>', 1000)->get();
                        break;
                    case 'sale':
                        $product = Product::where('discount_id', '<>', 4)->where('price', '>', 1000)->get();
                        break;
                    case 'notsale':
                        $product = Product::where('discount_id', '=', 4)->where('price', '>', 1000)->get();
                        break;
                    default:
                        # code...
                        break;
                }
                break;
            default:
                # code...
                break;
        }
        $product_type = Product_Type::all();
        $rating = Rating::all();
        $feature_product = Product::where('feature', '1')->inRandomOrder()->take(4)->get();
        $productRelated = Product::where('type_id', $product[0]['type_id'])->inRandomOrder()->take(4)->get();
        //return view("index", compact('product', 'product_type', 'rating', 'feature_product', 'productRelated', 'price', 'sale'));
        return view("index", ['product' => $product, 'product_type' => $product_type, 'rating' => $rating, 'feature_product' => $feature_product, 'productRelated' => $productRelated, 'price' => $price, 'sale' => $sale]);
    }

    function wishlist(){
        return view("wishlist");
    }
}
