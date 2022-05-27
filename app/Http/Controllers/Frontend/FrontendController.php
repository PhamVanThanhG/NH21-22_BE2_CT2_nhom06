<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $feature_product = Product::where('feature','1')->inRandomOrder()->take(10)->get();
        return view('frontend.index',compact('feature_product'));
    }
}
