@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Edit Product</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update_products/'.$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <label for="">Name: </label>
                    <input type="text" class="form-control" value="{{$product->name}}" name ="name">
                </div>
                <div class="col-6">
                    <label for="">Type: </label>
                    <select class="form-select" name="type_id">
                        <option value="">{{$product->product_type->type_name}}</option>
                      </select>
                </div>
                <div class="col-6">
                    <label for="">Description: </label>
                    <input type="text"  class="form-control" value="{{$product->description}}" name ="description">
                </div>
                <div class="col-6">
                    <label for="">Image: </label>
                    @if ($product->image)
                    <img class="type-image" src="{{asset('images/'.$product->image)}}" alt="">
                @endif
                    <input type="file" class="form-control" name ="image">
                </div>
                <div class="col-6">
                    <label for="">Price: </label>
                    <input type="number" class="form-control" value="{{$product->price}}" name ="price">
                </div>
                <div class="col-12">
                    <label for="">Discount: </label>
                    <select class="form-select"  name="discount_id">
                        <option value="{{$product->discount->id}}">{{$product->discount->values*100}}%</option>
                        @foreach ($discount as $item )
                        @if ($item->id != $product->discount->id)
                            <option value="{{$item->id}}">{{$item->values*100}}%</option>
                        @endif

                       @endforeach
                      </select>
                </div>
                <div class="col-2">
                    <label for="">Feature: </label>
                    <input type="checkbox" {{$product->feature =='1' ? 'checked' : ''}} class="form-control" name ="feature">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
