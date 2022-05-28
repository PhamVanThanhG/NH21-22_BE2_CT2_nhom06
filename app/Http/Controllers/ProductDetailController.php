<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Users;
use App\Providers\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductDetailController extends Controller
{
    public function detail($id = '')
    {
        $deliveredOrders = Order::where('user_id', Auth::user()->id)->where('state_id', 3)->get();
        $orderedProduct = OrderedProduct::all();
        $product = Product::where('id', $id)->get();
        $rating = Rating::all();
        $users = Users::all();
        $ratingForProduct = Rating::where('product_id', $id)->get();
        $productRelated = Product::where('type_id', $product[0]['type_id'])->inRandomOrder()->take(4)->get();
        return view('detail', ['product' => $product[0], 'rating' => $rating, 'user' => $users, 'ratingForProduct' => $ratingForProduct, 'productRelated' => $productRelated, 'deliveredOrders' => $deliveredOrders, 'orderedProduct' => $orderedProduct]);
    }
}
