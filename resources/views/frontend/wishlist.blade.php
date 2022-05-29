@extends('layouts.front')
@section('title')
    Wishlist
@endsection
@section('content')

    <div class="container py-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Wishlist</h4>
            </div>
            <div class="card-body">
                @if ($wishlist->count() > 0)
                    @foreach ($wishlist as $item)
                        <div class="row align-items-center mt-3 product-data">
                            <div class="col-md-2">
                                <img class="img-fluid" id="cart-img"
                                    src="{{ asset('images/' . $item->product->image) }}" width="75" alt="Image">
                            </div>
                            <div class="col-md-2">
                                <h6>{{ $item->product->name }}</h6>
                            </div>
                            <div class="col-md-2">
                                @if ($item->product->discount->active != 0)
                                    <h6>{{ $item->product->price - $item->product->price * $item->product->discount->values }}
                                        $
                                    </h6>
                                @else
                                    <h6>{{ $item->product->price }} $</h6>
                                @endif

                            </div>
                            <div class="col-md-2 ">
                                <input type="hidden" class="prod-id" value="{{ $item->product_id }}">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group d-flex text-center ">
                                <button class="input-group-text  decrement-btn">-</button>
                                <input type="text" name="quantity " value="1"
                                class="form-control qty-input">
                                <button class="input-group-text  increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-2 text-center pt-3  ">
                                <button class=" btn btn-outline-success addtocart-btn rounded ">Add To Cart</button>
                            </div>
                            <div class="col-md-2 text-center pt-3  ">
                                <button class="btn btn-outline-danger rounded delete-wishlist-item">Delete</button>
                            </div>
                        </div>
                    @endforeach
            </div>
        @else
            <h4>There are no Product in your Wishlist!</h4>
            @endif
        </div>
    </div>
    </div>

@endsection
