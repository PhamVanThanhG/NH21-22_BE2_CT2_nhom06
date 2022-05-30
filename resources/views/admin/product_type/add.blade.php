@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Add Product Type</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert_product_type')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="">Type Name: </label>
                    <input type="text" class="form-control" name ="name" required>
                </div>
                <div class="col-12">
                    <label for="">Image: </label>
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
