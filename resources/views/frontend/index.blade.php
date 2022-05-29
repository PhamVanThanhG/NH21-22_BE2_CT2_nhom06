@extends('layouts.front')
@section('title')
    Minics
@endsection
@section('content')
@include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($feature_product as $item )
                    <div class="item">
                        <div class="card">
                            <a href="{{url('category-view/'.$item->product_type->type_name.'/'.$item->id)}}">
                            <img src="{{ asset('images/'.$item->image) }}" alt="Product">
                            </a>
                            <div class="card-body">
                                <h5>{{$item->name}}</h5>
                                @if ($item->discount->active != 0)
                                <span class="bg-primary float-end text-white">Sale {{$item->discount->values*100}}%</span>
                                <span class=" bg-warning rounded">{{$item->price-$item->price*$item->discount->values}}$</span>
                                <span class="float-start text-secondary me-3"><s>{{$item->price}} $</s></span>
                                @else
                                <span class="float-start bg-warning me-3 rounded">{{$item->price}} $</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories of The Month</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($product_type as $item )
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="{{ asset('images/'.$item->image) }}" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">{{$item->type_name}}</h5>
                <p class="text-center"><a href="{{url('category-view/'.$item->id)}}" class="btn btn-success">Go Shop</a></p>
            </div>
            @endforeach
        </div>
    </section>
@include('layouts.inc.frontabout')
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
    </script>
@endsection

