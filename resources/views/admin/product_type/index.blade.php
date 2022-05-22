@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Product Type</h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $product_type as $item )
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->type_name}}</td>
                    <td>
                       <img class="type-image" src="{{asset('images/'.$item->image)}}" alt=""> 
                    </td>
                    <td>
                        <a href="{{url('edit_product_type/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('delete_product_type/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>
    
@endsection