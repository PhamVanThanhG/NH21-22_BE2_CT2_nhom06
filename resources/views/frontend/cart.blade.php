@extends('layouts.front')
@section('title')
    Cart
@endsection
@section('content')

    <div class="container py-5">
        <div class="card">
            @if ($cartitems->count()>0)
            <div class="card-header bg-primary text-light">
                <h4>Cart<a href="{{url('/')}}"><button class="btn btn-warning float-end">Back</button></a></h4>
            </div>
            <div class="card-body">
                @php
                    $total =0;
                @endphp
                @foreach ($cartitems as $item )


                <div class="row align-items-center mt-3 product-data">
                    <div class="col-md-3">
                        <img class="img-fluid" id="cart-img" src="{{ asset('images/'.$item->product->image) }}" width="75"  alt="Image">
                    </div>
                    <div class="col-md-2">
                        <h6>{{$item->product->name}}</h6>
                    </div>
                    <div class="col-md-2">
                        @if ($item->product->discount->active != 0)
                        <h6>{{$item->product->price-$item->product->price*$item->product->discount->values}} $</h6>
                        @else
                        <h6>{{$item->product->price}} $</h6>
                        @endif

                    </div>
                    <div class="col-md-3 ">
                        <input type="hidden"  class="prod-id" value="{{$item->product_id}}">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group d-flex text-center ">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <input type="text" name="quantity " value="{{$item->quantity}}" class="form-control qty-input">
                            <button class="input-group-text changeQuantity increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2 text-center pt-3 px-5 ">
                        <button class=" btn btn-outline-danger rounded delete-cart-item">Delete</button>
                    </div>
                </div>
                @php
               if ($item->product->discount->active != 0) {
                $total += ($item->product->price-$item->product->price*$item->product->discount->values)* $item->quantity;
               }
               else {
                $total += $item->product->price * $item->quantity;
               }

                @endphp
                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Price: {{$total}} $
                <a href="{{url('checkout')}}"><button class="btn btn-outline-success float-end">Checkout!</button></a>
                </h6>
            </div>
            @else
            <div class="card-body">
                <h2>Your Cart Is Empty!</h2>
                <a href="/"><button class="btn btn-outline-primary float-end">Continue Shopping</button></a>
            </div>
            @endif
        </div>
    </div>

@endsection
