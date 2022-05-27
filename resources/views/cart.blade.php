@extends('master')
@section('content')
<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

function getWordByAmountWord($str, $amount)
{
    $dem = 0;
    $result = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == ' ') {
            $dem++;
            if ($dem == ($amount - 1)) {
                $result = $i;
                break;
            }
        }
        if ($i == (strlen($str) - 1)) {
            $result = $i;
        }
    }
    return substr($str, 0, $result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800">
    <link rel="stylesheet" href="{{ asset('css/cartstyle.css') }}">
    <style>
        .priceNotDiscount {
            background: #fcfcfc;
            color: #000;
            float: right;
            font-size: 15px;
            font-weight: 300;
            line-height: 49px;
            margin: 0;
            padding: 0 30px;
            text-decoration: line-through;
        }
    </style>
</head>

<body>
    <header id="site-header">
        <div class="container">
            <h1>Shopping cart</h1>
        </div>
    </header>

    <div class="container">

        <section id="cart">
            <?php
            $totalPrice = 0;
            for ($i = 0; $i < count($cart); $i++) {
                $productOnCart = $cart[$i];
                $totalPrice += ($productOnCart->product->price * (1 - $productOnCart->product->discount->values)) * $productOnCart['quantity'];
            ?>
                <article class="product">
                    <header>
                        <a class="remove<?php echo ($productOnCart->product->id) ?>" class="remove<?php echo ($productOnCart->product->id) ?>">
                            <img src="{{ asset('images/'.$productOnCart->product->image) }}" alt="">

                            <h3>Remove product</h3>
                        </a>
                    </header>

                    <div class="content">
                        <h1 style="font-weight: bold">{{ $productOnCart->product->name }}</h1>
                        {{ getWordByAmountWord($productOnCart->product->description, 40).'...' }}
                    </div>

                    <footer class="content">
                        <span class="qt-minus">-</span>
                        <span class="qt">{{ $productOnCart['quantity'] }}</span>
                        <span class="qt-plus">+</span>

                        <h2 class="full-price" style="font-weight: bold">
                            {{ number_format(($productOnCart->product->price * (1 - $productOnCart->product->discount->values)) * $productOnCart['quantity']) }}$
                        </h2>
                        <h2 class="price" style="font-weight: bold">
                            {{ number_format(($productOnCart->product->price * (1 - $productOnCart->product->discount->values)), 0, '', '') }}$
                        </h2>
                        <?php
                        if ($productOnCart->product->discount->values != 0) {
                        ?>
                            <h2 class="priceNotDiscount">
                                {{ number_format($productOnCart->product->price).'$' }}
                            </h2>
                        <?php
                        }
                        ?>
                    </footer>
                </article>
            <?php
            }
            ?>
        </section>

    </div>

    <footer id="site-footer">
        <div class="container clearfix">

            <div class="left">
                <h2 class="subtotal">Subtotal: <span>{{ number_format($totalPrice) }}</span>$</h2>
                <h3 class="shipping">Shipping: <span>5.00</span>$</h3>
            </div>

            <div class="right">
                <h1 class="total">Total: <span>177.16</span>$</h1>
                <a class="btn">Checkout</a>
            </div>

        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        var check = false;

        function changeVal(el) {
            var qt = parseFloat(el.parent().children(".qt").html());
            var price = parseFloat(el.parent().children(".price").html());
            var eq = price * qt;

            el.parent().children(".full-price").html(eq.toLocaleString('en-US') + "$");

            changeTotal();
        }

        function changeTotal() {

            var price = 0;

            $(".full-price").each(function(index) {
                // price += parseFloat($(".full-price").eq(index).html());
                var string = $(".full-price").eq(index).html().replace(/,/g, '');
                price += parseFloat(string);
            });

            price = price;
            var tax = 0;
            var shipping = parseFloat($(".shipping span").html());
            var fullPrice = Math.round((price + tax + shipping) * 100) / 100;

            if (price == 0) {
                fullPrice = 0;
            }

            $(".subtotal span").html(price.toLocaleString('en-US'));
            $(".tax span").html(tax);
            $(".total span").html(fullPrice.toLocaleString('en-US'));
        }

        $(document).ready(function() {

            $(".remove").click(function() {
                var el = $(this);
                el.parent().parent().addClass("removed");
                window.setTimeout(
                    function() {
                        el.parent().parent().slideUp('fast', function() {
                            el.parent().parent().remove();
                            if ($(".product").length == 0) {
                                if (check) {
                                    $("#cart").html("<h1>The shop does not function, yet!</h1><p>If you liked my shopping cart, please take a second and heart this Pen on <a href='https://codepen.io/ziga-miklic/pen/xhpob'>CodePen</a>. Thank you!</p>");
                                } else {
                                    $("#cart").html("<h1>No products!</h1>");
                                }
                            }
                            changeTotal();
                        });
                    }, 200);
            });

            $(".qt-plus").click(function() {
                $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);

                $(this).parent().children(".full-price").addClass("added");

                var el = $(this);
                window.setTimeout(function() {
                    el.parent().children(".full-price").removeClass("added");
                    changeVal(el);
                }, 150);
            });

            $(".qt-minus").click(function() {

                child = $(this).parent().children(".qt");

                if (parseInt(child.html()) > 1) {
                    child.html(parseInt(child.html()) - 1);
                }

                $(this).parent().children(".full-price").addClass("minused");

                var el = $(this);
                window.setTimeout(function() {
                    el.parent().children(".full-price").removeClass("minused");
                    changeVal(el);
                }, 150);
            });

            window.setTimeout(function() {
                $(".is-open").removeClass("is-open")
            }, 1200);

            $(".btn").click(function() {
                check = true;
                $(".remove").click();
            });
        });
        <?php
        for ($i = 0; $i < count($cart); $i++) {
            $productOnCart = $cart[$i];
        ?>
            $(".remove<?php echo ($productOnCart->product->id) ?>").click(function() {
                //Delete on UI
                var el = $(this);
                el.parent().parent().addClass("removed");
                window.setTimeout(
                    function() {
                        el.parent().parent().slideUp('fast', function() {
                            el.parent().parent().remove();
                            if ($(".product").length == 0) {
                                if (check) {
                                    $("#cart").html("<h1>The shop does not function, yet!</h1><p>If you liked my shopping cart, please take a second and heart this Pen on <a href='https://codepen.io/ziga-miklic/pen/xhpob'>CodePen</a>. Thank you!</p>");
                                } else {
                                    $("#cart").html("<h1>No products!</h1>");
                                }
                            }
                            changeTotal();
                        });
                    }, 200);
                window.location = "{{ url('/deletecart/'.$productOnCart->product->id)}}";
            });
        <?php
        }
        ?>
    </script>
</body>

</html>
@endsection