<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    function index(Request $request)
    {
        $qty = (int)$request->input('num_product');
        $productID = (int)$request->input('product_id');

        $cart = Cart::where('user_id', Auth::user()->id)->get();

        //Check whether that cart have product id
        $isExist = false;
        $cartID = 0;
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]->product_id == $productID) {
                $isExist = true;
                $cartID = $cart[$i]->id;
                break;
            }
        }
        if ($isExist) {
            //Update quantity
            //Cart::where('product_id', $productID)->where('user_id', Auth::user()->id)->update(array('quantity' => $qty));
            // $cartUpdate = Cart::where('user_id', Auth::user()->id);
            // $cartToUpdate = $cartUpdate->where('product_id', $productID);
            // $cartToUpdate->quantity = $qty;
            // $cartToUpdate->save();

            Cart::find($cartID)->update(['quantity' => $qty]);
            echo ("Exist");
        } else {
            //Insert new cart with the product_id
            DB::table('cart')->insert([
                [
                    'product_id' => $productID,
                    'user_id' => Auth::user()->id,
                    'total_price' => 0,
                    'quantity' => $qty,
                ]
            ]);
        }

        return redirect()->back();
    }

    function delete($product_id = '')
    {
        Cart::where('product_id', (int)$product_id)->where('user_id', Auth::user()->id)->delete();
        return redirect()->back();
    }

    function minus($product_id = '')
    {
        $cart = Cart::where('product_id', (int)$product_id)->where('user_id', Auth::user()->id)->get();
        $quantity = $cart[0]->quantity - 1;
        Cart::where('product_id', (int)$product_id)->where('user_id', Auth::user()->id)->update(['quantity' => $quantity]);
        return redirect()->back();
    }

    function plus($product_id = '')
    {
        $cart = Cart::where('product_id', (int)$product_id)->where('user_id', Auth::user()->id)->get();
        $quantity = $cart[0]->quantity + 1;
        Cart::where('product_id', (int)$product_id)->where('user_id', Auth::user()->id)->update(['quantity' => $quantity]);
        return redirect()->back();
    }

    function checkout()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $date = "OD" . date("mdYHi");
        //Calculator temporary price, total price
        $temporyprice = 0;
        $totalprice = 0;
        for ($i = 0; $i < count($cart); $i++) {
            $productOnCart = $cart[$i];
            $temporyprice += ($productOnCart->product->price * $productOnCart['quantity']);
            $totalprice += ($productOnCart->product->price * (1 - $productOnCart->product->discount->values)) * $productOnCart['quantity'];
        }
        //Add to order
        DB::table('order')->insert([
            [
                'order_id' => $date,
                'state_id' => 1,
                'temporary_price' => $temporyprice,
                'total_price' => $totalprice + 5,
            ]
        ]);
        //Add to orderedProduct
        for ($i=0; $i < count($cart); $i++) {
            $productOnCart = $cart[$i];
            DB::table('ordered_product')->insert([
                [
                    'order_id' => $date,
                    'product_id' => $productOnCart->product->id,
                    'pricewithoutdiscount' => $productOnCart->product->price,
                    'pricewithdiscount' => ($productOnCart->product->price * (1 - $productOnCart->product->discount->values)),
                    'quantity' => $productOnCart['quantity'],
                ]
            ]);
        }
        //Delete cart
        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect()->back();
    }
}
