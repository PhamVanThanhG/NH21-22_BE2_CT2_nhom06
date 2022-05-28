@extends('layouts.front')
@section('title')
Detail
@endsection
@section('content')
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card product-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="{{ asset('images/'.$product->image) }}" width="350" height="250" /> </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">

                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase .text-info brand">Category: {{$product->product_type->type_name}}</span>
                                <h5 class="text-uppercase">{{$product->name}}</h5>
                                <div class="price d-flex flex-row align-items-center">
                                    @if ($product->discount->active != 0)
                                    <span class="act-price me-3 bg-warning rounded">{{$product->price-$product->price*$product->discount->values}} $</span>
                                    <div class="ml-2 text-secondary"><s>{{$product->price}}$</s></div>

                                </div>
                                <span class="float-end bg-primary text-white">{{$product->discount->values*100}}% OFF</span>
                                @else
                                <div class="ml-2 bg-warning">{{$product->price}}$</div>
                                @endif
                            </div>
                            <h2>Description</h2>
                            <p class="about pt-2">{{$product->description}}</p>
                            <div class="col-md-3 ">
                                <input type="hidden" value="{{$product->id}}" class="prod-id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group d-flex text-center ">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity " value="1" class="form-control qty-input">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="cart mt-4 align-items-center ">
                                <button class="btn btn-danger text-uppercase addtocart-btn mr-2 px-4"><i class="fa-solid fa-cart-arrow-down"></i> Add to cart</button>
                                <button class="btn btn-success text-uppercase mr-2 px-4"><i class="fa-solid fa-heart"></i> Add to wishlist</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection


