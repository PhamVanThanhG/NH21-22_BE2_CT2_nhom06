<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_Type;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $product_type = Product_Type::all();
        $feature_product = Product::where('feature','1')->inRandomOrder()->take(10)->get();
        return view('frontend.index',compact('feature_product','product_type'));
    }
    public function category()
    {
        $product_type = Product_Type::all();
        return view('frontend.category',compact('product_type'));
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
                return view('frontend.products.view',compact('product'));
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
