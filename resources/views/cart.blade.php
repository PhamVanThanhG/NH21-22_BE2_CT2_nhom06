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

        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #58257b;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .col-25 {
            float: left;
            width: 30%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 60%;
            margin-top: 6px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Bố cục linh hoạt: khi màn hình có chiều rộng dưới 600px thì hai cột chồng 
lên nhau thay vì nằm cạnh nhau */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 600px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Receiver's information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding-left: 50px; padding-right: 50px;">
                    <form method="post" action="{{ url('/checkout') }}">
                        @csrf
                        <div class="row">
                            <div class="col-25">
                                <label for="fullname">Fullname</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="fullname" name="fullname" placeholder="Receiver's fullname">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="phonenumber">Phone number</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="phonenumber" name="phonenumber" placeholder="Receiver's phone number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="subject">Address</label>
                            </div>
                            <div class="col-75">
                                <textarea id="address" name="address" placeholder="Receiver's address" style="height:120px"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Xác nhận">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <header id="site-header">
        <div class="container">
            <h1 style="text-align: center; font-weight: bold; text-transform: uppercase;">Shopping cart</h1>
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
                        <a href="{{ url('/minus/'.$productOnCart->product->id)}}" style="color: black;"><span class="qt-minus" id="minus{{ $productOnCart->product->id }}">-</span></a>
                        <span class="qt">{{ $productOnCart['quantity'] }}</span>
                        <a href="{{ url('/plus/'.$productOnCart->product->id)}}" style="color: black;"><span class="qt-plus" id="plus{{ $productOnCart->product->id }}">+</span></a>

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
                <h1 class="total" style="font-weight: bold;">Total: <span>{{ number_format($totalPrice + 5) }}</span>$</h1>
                <a class="btn" style="font-weight: bold;" data-toggle="modal" data-target="#exampleModal">Checkout</a>
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
        <?php
        for ($i = 0; $i < count($cart); $i++) {
            $productOnCart = $cart[$i];
        }
        ?>
        const btncheckout = document.getElementById('btncheckout');
        btncheckout.addEventListener('click', () => {
            <?php
            if (count($cart) == 0) {
            ?>
                swal("CHECKOUT", "You have no product on your cart to checkout!");
                event.preventDefault();
            <?php
            } else {
            ?>
                swal("CHECKOUT", "You placed order successfully!");
            <?php
            }
            ?>
        })
    </script>
</body>

</html>
@endsection