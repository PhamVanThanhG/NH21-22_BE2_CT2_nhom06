<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_Type;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $product_type = Product_Type::all();
        $feature_product = Product::where('feature','1')->inRandomOrder()->take(10)->get();
        return view('frontend.index',compact('feature_product','product_type'));
    }
    public function product()
    {
        $product = Product::all();
        return view('frontend.product',compact('product'));
    }
    public function categoryview($id)
    {
        if (Product_Type::where('id',$id)->exists()) {
            $product_type = Product_Type::where('id',$id)->first();
            $product = Product::where('type_id',$id)->get();
            return view('frontend.products.index',compact('product_type','product'));
        }
        else{
            return redirect('/') ->with('status',"ID not found");
        }

    }
    public function productview($type_name,$id)
    {
        if (Product_Type::where('type_name',$type_name)->exists()) {
            if (Product::where('id',$id)->exists()) {
                $product = Product::where('id',$id)->first();
                $product_type = Product_Type::where('type_name',$type_name)->first();
                $rating = Rating::where('product_id',$product->id)->get();
                $rating_sum = Rating::where('product_id',$product->id)->sum('star_rated');
                $user_rating = Rating::where('product_id',$product->id)->where('user_id',Auth::id())->first();
                if ($rating->count()>0) {

                    $rating_value = $rating_sum/$rating->count();
                }
                else
                {
                    $rating_value=0;
                }

                return view('frontend.products.view',compact('product','product_type','rating','rating_value','user_rating'));
            }
            else
            {
                return redirect('/') ->with('status',"ID not found");
            }
        }
        else
            {
                return redirect('/') ->with('status',"No type is found");
            }

    }
}
