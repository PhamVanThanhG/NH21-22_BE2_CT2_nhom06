<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($name)
    {
        $product = Product::where('name',$name)->first();
        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if ($review) {
                return view('frontend.reviews.edit',compact('review'));
            }
            else{
                $verified_purchase = Order::where('order.user_id',Auth::id())
                ->join('order_items','order.id','order_items.order_id')
                ->where('order_items.product_id',$product_id)->get();
                return view('frontend.reviews.index',compact('product','verified_purchase'));
            }

        }
        else
        {
            return redirect()->back()->with('status',"Link is broken!");
        }

    }
    public function create(Request $request)
        {
            $product_id = $request->input('product_id');
            $product = Product::where('id',$product_id)->first();
            if ($product) {
                $user_review = $request->input('user-review');
                $new_review = Review::create([
                    'user_id' =>Auth::id(),
                    'product_id' =>$product_id,
                    'user_review' =>$user_review,
                ]);
                $type_name = $product->product_type->type_name;
                if ($new_review) {
                    return redirect('category-view/'.$type_name.'/'.$product->id)->with('status','Thank you for review!');
                }
            }
            else
            {
                return redirect()->back()->with('status',"Link is broken!");
            }
        }
        public function edit($name)
        {
            $product = Product::where('name',$name)->first();
            if ($product) {
                $product_id = $product->id;
                $review = Review::where('user_id',Auth::id())->where('product_id',$product_id)->first();
                if ($review) {
                    return view('frontend.reviews.edit',compact('review'));
                }
                else
                {
                    return redirect()->back()->with('status',"Link is broken!");
                }
            }
            else
                {
                    return redirect()->back()->with('status',"Link is broken!");
                }
        }
        public function update(Request $request)
        {
            $user_review = $request->input('user-review');
            if ($user_review != "") {
                $review_id = $request->input('review_id');
                $review = Review::where('id',$review_id)->where('user_id',Auth::id())->first();
                if ($review) {
                    $review->user_review = $user_review;
                    $review->update();
                    return redirect('category-view/'.$review->product->product_type->type_name.'/'.$review->product->id)->with('status','Update review successfully!');
                }
                else
                {
                    return redirect()->back()->with('status',"Link is broken!");
                }
            }
            else
            {
                return redirect()->back()->with('status',"Empty review!");
            }
        }
}
