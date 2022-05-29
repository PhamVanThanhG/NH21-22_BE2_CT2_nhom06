@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Products</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Feature</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $product as $item )
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->product_type->type_name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                       <img class="type-image" src="{{asset('images/'.$item->image)}}" alt="">
                    </td>
                    <td>{{$item->price}}$</td>
                    <td>{{$item->discount->values*100}}%</td>
                    <td>{{$item->feature}}</td>
                    <td>
                        <a href="{{url('edit_products/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('delete_products/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
