@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Add Discount</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert_discount')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="">Discount: </label>
                    <input type="number" class="form-control" name ="discount">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
