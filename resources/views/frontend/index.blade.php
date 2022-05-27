@extends('layouts.front')
@section('title')
    Mimics
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
                            <img src="{{ asset('images/'.$item->image) }}" alt="Product">
                            <div class="card-body">
                                <h5>{{$item->name}}</h5>
                                <span class="float-start bg-warning me-3">{{$item->price}} $</span>
                                @if ($item->discount->active != 0)
                                <span class="bg-primary float-end">Sale {{$item->discount->values*100}}%</span>
                                <span class="text-secondary"><s>{{$item->price*$item->discount->values}}$</s></span>
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