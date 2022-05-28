@extends('master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        body {
            background-color: #eeeeee;
            font-family: 'Open Sans', serif
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #FF5722
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #ee5435;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }
    </style>
</head>

<body>
    <div class="container">
        <article class="card" style="background-color: red;">
            <header class="card-header"> My Orders</header>
            <?php
            for ($i = 0; $i < count($order); $i++) {
                $getOrder = $order[$i];
                $products = array();
                for ($j = 0; $j < count($orderedProduct); $j++) {
                    if ($orderedProduct[$j]->order_id == $getOrder->order_id) {
                        array_push($products, $orderedProduct[$j]);
                    }
                }
            ?>
                <div class="card-body" style="background-color: white;margin-bottom: 20px;">
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-10">
                            <h5 style="font-weight: bold;">Order ID: {{ $getOrder->order_id }}</h5>
                        </div>
                        <div class="col"> <?php
                                            if ($getOrder->state_id == 1) {
                                            ?>
                                <a href="{{ url('/cancelorder/'.$getOrder->order_id)}}"><button class="btn btn-warning" style="align-content: center;">Cancel</button></a>
                            <?php
                                            }
                            ?>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-8">Receiver's name: {{ $getOrder->fullname }} <br>Receiver's address: {{ $getOrder->address }}</div>
                        <div class="col">Receiver's phone number: {{ $getOrder->phonenumber }}</div>
                    </div>
                    <article class="card">
                        <div class="card-body row">
                            <div class="col"> <strong>Created at:</strong> <br> {{ $getOrder->created_at }} </div>
                            <div class="col"> <strong>State:</strong> <br> {{ $getOrder->state->state_name }} </div>
                            <div class="col"> <strong>Last state change at :</strong> <br> {{ $getOrder->updated_at }} </div>
                        </div>
                    </article>
                    <?php
                    if ($getOrder->state_id != 4) {
                    ?>
                        <div class="track">
                            <div class="step <?php if ($getOrder->state_id != 1) {
                                                    echo ("active");
                                                } ?>
                                                "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                            <div class="step <?php if ($getOrder->state_id != 1) {
                                                    echo ("active");
                                                } ?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                            <div class="step <?php if ($getOrder->state_id == 3) {
                                                    echo ("active");
                                                } ?>"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span> </div>
                        </div>
                    <?php
                    }
                    ?>
                    <hr>
                    <ul class="row">
                        <?php
                        for ($j = 0; $j < count($products); $j++) {
                        ?>
                            <li class="col-md-4">
                                <figure class="itemside mb-3">
                                    <div class="aside"><img src="{{ asset('images/'.$products[$j]->product->image) }}" class="img-sm border"></div>
                                    <figcaption class="info align-self-center">
                                        <p class="title"><span style="font-weight: bold;">{{ $products[$j]->product->name }}</span> <br> <span style="text-decoration: line-through;">${{ number_format($products[$j]->pricewithoutdiscount) }}</span></p> <span style="font-weight: bold;">${{ number_format($products[$j]->pricewithdiscount) }}</span>
                                    </figcaption>
                                </figure>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <div class="row">
                        <div class="col-8">
                            <h5>Total price without discount: ${{ number_format($getOrder->temporary_price) }}</h5>
                            <h5>Transfer fee: $5</h5>
                        </div>
                        <div class="col">
                            <h5 style="font-weight: bold;">Total price: ${{ number_format($getOrder->total_price) }}</h5>
                        </div>
                    </div>
                    <hr>
                </div>
            <?php
            }
            ?>
        </article>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
@endsection