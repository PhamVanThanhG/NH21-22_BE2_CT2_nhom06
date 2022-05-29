@extends('layouts.front')
@section('title')
    Checkout
@endsection
@section('content')
<div class="container py-5">
    <form action="{{ url('place-order') }}" method="POST">
        {{ csrf_field() }}
    <div class="row">

        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Detail</h6>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="fname" value="{{Auth::user()->name}}" placeholder="Enter First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="{{Auth::user()->lname}}"  placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" placeholder="Enter Phone Number">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}" placeholder="Enter Address">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order Detail</h6>
                    <hr>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            @php
                            $total =0;
                            @endphp
                            @foreach ($cartitems as $item )
                            <tr>
                                <td>{{$item->product->name}}</td>
                                <td>x{{$item->quantity}}</td>
                                @if ($item->product->discount->active != 0)
                                <td>{{$item->product->price-$item->product->price*$item->product->discount->values}}$</td>
                                @else
                                <td>{{$item->product->price}}$</td>
                                @endif

                            </tr>
                            @php
                                if ($item->product->discount->active != 0) {
                                    $total += ($item->product->price-$item->product->price*$item->product->discount->values)* $item->quantity;
                                }
                                else {
                                    $total += $item->product->price * $item->quantity;
                                }

                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <h6>Total Price: {{$total}} $</h6>
                    <button type="submit" class="btn btn-primary float-end">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
