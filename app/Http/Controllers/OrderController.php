<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function index()
    {
        $order = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $orderedProduct = OrderedProduct::all();
        return view("myorders", ['order' => $order, 'orderedProduct' => $orderedProduct]);
    }

    function cancel($order_id = '')
    {
        $theOrder = Order::where('order_id', $order_id)->get();
        if ($theOrder[0]->state_id == 1) {
            Order::where('order_id', $order_id)->where('state_id', 1)->update(['state_id' => 4]);
            return redirect()->back();
        } else {
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Cancel order</title>
            </head>

            <body style="text-align: center; margin-top: 10%;">
                <h1>
                    The order with id: <?php echo ($order_id) ?> is in "<?php echo $theOrder[0]->state->state_name ?>" state
                </h1>
                <p>Note: You only cancel the order with "To confirm" state!</p>
                <a href="/myorders">Back to my orders</a>
            </body>

            </html>

<?php
        }
    }

    function addreview(Request $request)
    {
        $comment = $request->input('comment');
        $rating_value = (int)$request->input('rating');
        $product_id = (int)$request->input('product_id');
        $reviewExits = Rating::where('user_id', Auth::user()->id)->where('product_id', $product_id)->get();
        var_dump($reviewExits);
        if (count($reviewExits) == 0) {
            //Add to order
            DB::table('rating')->insert([
                [
                    'product_id' => $product_id,
                    'user_id' => Auth::user()->id,
                    'rating_value' => $rating_value,
                    'comment' => $comment
                ]
            ]);
        }else{
            Rating::where('user_id', Auth::user())->where('product_id', $product_id)->update([
                'rating_value' => $rating_value,
                'comment' => $comment
            ]);
        }
        return redirect()->back();
    }
}
