@extends('layouts.front')
@section('title')
    Cart
@endsection
@section('content')

    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                @php
                    $total =0;
                @endphp
                @foreach ($cartitems as $item )


                <div class="row align-items-center mt-3 product-data">
                    <div class="col-md-3">
                        <img class="img-fluid"  src="{{ asset('images/'.$item->product->image) }}" width="150"  alt="Image">
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
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity " value="{{$item->quantity}}" class="form-control qty-input">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2 text-center pt-3 px-5 ">
                        <button class="bg-danger text-white rounded delete-cart-item">Delete</button>
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
                <h6>Total Price: {{$total}} $</h6>
            </div>
        </div>
    </div>

@endsection
