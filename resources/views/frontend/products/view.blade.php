@extends('layouts.front')
@section('title')
    Detail
@endsection
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{ $product->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if ($user_rating)
                                    @for ($i = 1; $i <= $user_rating->star_rated; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" checked
                                            id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for ($j = $user_rating->star_rated + 1; $j <= 5; $j++)
                                        <input type="radio" value="{{ $j }}" name="product_rating"
                                            id="rating{{ $j }}">
                                        <label for="rating{{ $j }}" class="fa fa-star"></label>
                                    @endfor
                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card product-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img id="main-image"
                                        src="{{ asset('images/' . $product->image) }}" width="350" height="250" /> </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">

                                </div>
                                <div class="mt-4 mb-3"> <span class="text-uppercase .text-info brand">Category:
                                        {{ $product->product_type->type_name }}</span>
                                    <h5 class="text-uppercase">{{ $product->name }}</h5>
                                    <div class="price d-flex flex-row align-items-center">
                                        @if ($product->discount->active != 0)
                                            <span
                                                class="act-price me-3 bg-warning rounded">{{ $product->price - $product->price * $product->discount->values }}
                                                $</span>
                                            <div class="ml-2 text-secondary"><s>{{ $product->price }}$</s></div>

                                    </div>
                                    <span class="float-end bg-primary text-white">{{ $product->discount->values * 100 }}%
                                        OFF</span>
                                @else
                                    <div class="ml-2 bg-warning">{{ $product->price }}$</div>
                                    @endif
                                </div>
                                @php
                                    $ratenum = number_format($rating_value);
                                @endphp
                                <div class="rating">

                                    @for ($i = 1; $i <= $ratenum; $i++)
                                        <i class="fa fa-star checked"></i>
                                    @endfor
                                    @for ($j = $ratenum + 1; $j <= 5; $j++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @if ($rating->count() > 0)
                                        <span>({{ $rating->count() }})</span>
                                    @else
                                        No Ratings
                                    @endif

                                </div>

                                <h4>Description</h4>
                                <p class="about pt-2">{{ $product->description }}</p>
                                <div class="col-md-3 ">
                                    <input type="hidden" value="{{ $product->id }}" class="prod-id">
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group d-flex text-center ">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="quantity " value="1" class="form-control qty-input">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                                <div class="cart mt-4 align-items-center ">
                                    <button class="btn btn-danger text-uppercase addtocart-btn mr-2 px-4"><i
                                            class="fa-solid fa-cart-arrow-down"></i> Add to cart</button>
                                    <button class="btn btn-success text-uppercase addtowishlist-btn mr-2 px-4"><i
                                            class="fa-solid fa-heart"></i> Add to wishlist</button>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-5 align-items-center">
            <div class="col-md-4">
                <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Rate this product!
                </button>
                <a href="{{ url('add-review/' . $product->name . '/userreview') }}"><button type="button"
                        class="btn btn-outline-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Write a review!
                    </button></a>
            </div>
            <div class="col-md-8 border mb-2 ">
                @foreach ($review as $item)


                    <label for="">{{$item->user->name.' '.$item->user->lname}}</label>
                    @if ($item->user->id== Auth::id())
                    <a href="{{url('edit-review/'.$product->name.'/userreview')}}"><button class="btn btn-outline-warning">Edit</button></a>
                    @endif
                    <br>
                    @if ($item->rating)
                    @php $user_rated = $item->rating->star_rated @endphp
                     @for ($i = 1; $i <= $user_rated; $i++)
                     <i class="fa fa-star checked"></i>
                     @endfor
                     @for ($j = $user_rated + 1; $j <= 5; $j++)
                         <i class="fa fa-star"></i>
                     @endfor
                    @endif

                    <small>Review on {{$item->created_at->format('d M Y')}}</small>
                    <p>{{$item->user_review}}</p>
                @endforeach
            </div>
        </div>

    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h2>Related Products</h2>
                </div>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($product_type->product as $item)
                        <div class="item">
                            <div class="card">
                                <a href="{{ url('category-view/' . $product_type->type_name . '/' . $item->id) }}">
                                    <img src="{{ asset('images/' . $item->image) }}" alt="Product">
                                </a>
                                <div class="card-body">
                                    <h5>{{ $item->name }}</h5>
                                    @if ($item->discount->active != 0)
                                        <span class="bg-primary float-end text-white">Sale
                                            {{ $item->discount->values * 100 }}%</span>
                                        <span
                                            class=" bg-warning rounded">{{ $item->price - $item->price * $item->discount->values }}$</span>
                                        <span class="float-start text-secondary me-3"><s>{{ $item->price }} $</s></span>
                                    @else
                                        <span class="float-start bg-warning me-3 rounded">{{ $item->price }} $</span>
                                    @endif

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
@endsection
