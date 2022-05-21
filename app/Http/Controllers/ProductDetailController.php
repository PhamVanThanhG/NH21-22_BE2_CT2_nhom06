<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use App\Models\Users;
use App\Providers\ProductService;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function detail($id = '')
    {
        $product = Product::where('id', $id)->get();
        $rating = Rating::all();
        $users = Users::all();
        $ratingForProduct = Rating::where('product_id', $id)->get();
        $productRelated = Product::where('type_id', $product[0]['type_id'])->inRandomOrder()->take(4)->get();
        return view('detail', ['product' => $product[0], 'rating' => $rating, 'user' => $users, 'ratingForProduct' => $ratingForProduct, 'productRelated' => $productRelated]);
    }
}
