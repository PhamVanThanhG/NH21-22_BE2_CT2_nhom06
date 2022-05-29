<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout',compact('cartitems'));
    }
    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');


        $total = 0;
        $price = 0;
        $cartitems = Cart::where('user_id', Auth::id())->get();

        foreach($cartitems as $item){

            if ($item->product->discount->active != 0) {
                $total += ($item->product->price-$item->product->price*$item->product->discount->values)* $item->quantity;
            } else {
                $total += $item->product->price * $item->quantity;
            }

        }
        $order->total_price = $total;
        $order->tracking_no = 'number'.rand(1111,9999);
        $order->save();
        foreach($cartitems as $item){

            if ($item->product->discount->active != 0) {
                $price= $item->product->price-$item->product->price*$item->product->discount->values;

            } else {
                $price = $item->product->price;

            }
            OrderItems::create(
                [
                    'order_id'=>$order->id,
                    'product_id'=>$item->product_id,
                    'quantity'=>$item->quantity,
                    'price'=>$price,


                ]
                );
        }

        if (Auth::user()->address == null) {
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->update();
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);
        return redirect('/')->with('status',"Order Successfully!");

    }
}
