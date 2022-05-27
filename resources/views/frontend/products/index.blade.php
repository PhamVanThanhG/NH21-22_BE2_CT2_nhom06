@extends('layouts.front')
@section('title')
    Products
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{$product_type->type_name}}</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($product as $item )
                <div class="item">
                    <div class="card">
                        <a href="{{url('category-view/'.$product_type->type_name.'/'.$item->id)}}">
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
