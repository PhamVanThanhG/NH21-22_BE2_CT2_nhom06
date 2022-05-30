@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Review</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Rating Number</th>
                    <th>Comment</th>
                    <th>Product</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $rating as $item )
                <tr>
                    <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->rating_value}}</td>
                    <td>{{$item->comment}}</td>
                    <td>{{$item->product->name}}
                        <img class="type-image" src="{{asset('images/'.$item->product->image)}}" alt="">
                    </td>
                    <td>
                        <a href="{{url('delete_rating/'.$item->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                    </td>
                    
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
