@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Edit Product Type</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update_product_type/'.$product_type->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <label for="">Type Name: </label>
                    <input type="text" value="{{$product_type->type_name}}" class="form-control" name ="name" required>
                </div>

                <div class="col-12">
                    <label for="">Image: </label>
                    @if ($product_type->image)
                    <img class="type-image" src="{{asset('images/'.$product_type->image)}}" alt="">
                @endif
                    <input type="file" class="form-control" name ="image" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
