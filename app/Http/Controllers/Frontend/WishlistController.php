<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.wishlist',compact('wishlist'));
    }
    public function add(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if (Product::find($product_id)) {
                if (Wishlist::where('product_id',$product_id)->exists()) {
                    return response()->json(['status' => " Already Added To Wishlist!"]);
                }
                else
                {
                    $wish = new Wishlist();
                    $wish->product_id = $product_id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json(['status' => " Product Added To Wishlist!"]);
                }

            }
            else
            {
                return response()->json(['status' => " Product Does Not Exist!"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
    }
    public function delete(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('product_id',$prod_id)->where('user_id',Auth::id())->exists()) {
                $wish = Wishlist::where('product_id',$prod_id)->where('user_id',Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Item Deleted!"]);
            }
        }
        else{
            return response()->json(['status' => "Login to Continue!"]);
        }
    }
    public function wishlistcount()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count' => $wishlist]);
    }
}
