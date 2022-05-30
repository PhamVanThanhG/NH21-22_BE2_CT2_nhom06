@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert_products')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="">Name: </label>
                    <input type="text" class="form-control" name ="name" required>
                </div>
                <div class="col-6">
                    <label for="">Type: </label>
                    <select class="form-select" name="type_id">
                        <option value="">Select Product Type</option>
                       @foreach ($product_type as $item )
                       <option value="{{$item->id}}">{{$item->type_name}}</option>
                       @endforeach

                      </select>
                </div>
                <div class="col-6">
                    <label for="">Description: </label>
                    <input type="text" class="form-control" name ="description" required>
                </div>
                <div class="col-6">
                    <label for="">Image: </label>
                    <input type="file" class="form-control" name ="image" required>
                </div>
                <div class="col-6">
                    <label for="">Price: </label>
                    <input type="number" class="form-control" name ="price" required>
                </div>
                <div class="col-12">
                    <label for="">Discount: </label>
                    <select class="form-select" name="discount_id">
                        <option value="">Select Discount</option>
                       @foreach ($discount as $item )
                       <option value="{{$item->id}}">{{$item->values*100}}%</option>
                       @endforeach

                      </select>
                </div>
                <div class="col-2">
                    <label for="">Feature: </label>
                    <input type="checkbox" class="form-control" name ="feature">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
