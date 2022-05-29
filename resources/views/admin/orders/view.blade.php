@extends('layouts.admin')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-light ">
                    <h4>Order View
                    <a href="{{url('orders')}}"><button class="btn btn-warning float-right"><i class="fa-solid fa-backward"></i> Back</button></a>
                </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-detail">
                            <h4>Shipping Details</h4>
                            <label for="">Full Name</label>
                            <div class="border pt-2">{{$order->fullname}}</div>
                            <label for="">Phone Number</label>
                            <div class="border pt-2">{{$order->phonenumber}}</div>
                            <label for="">Address</label>
                            <div class="border pt-2">{{$order->address}}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Discounted Price</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->order_product as $item)
                                    <tr>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->pricewithoutdiscount}}</td>
                                        <td>{{$item->pricewithdiscount}}</td>
                                        <td><img id="cart-img" src="{{ asset('images/'.$item->product->image) }}" width="75" alt=""></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4>Total Price: {{$order->total_price}} $</h4>
                            <label for="">Order Status</label>
                            <div class="mt-2 px-2">
                                <form action="{{url('update-order/'.$order->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <select class="form-select p-1" name="order_status">
                                    <option {{$order->state_id== '1'?'selected':''}} value="1">To Confirm</option>
                                    <option {{$order->state_id== '2'?'selected':''}} value="2">To Deliver </option>
                                    <option {{$order->state_id== '3'?'selected':''}} value="3">Delivered</option>
                                    <option {{$order->state_id== '4'?'selected':''}} value="4">Canceled</option>
                                  </select>
                                  <button type="submit" class="btn btn-primary float-end">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
