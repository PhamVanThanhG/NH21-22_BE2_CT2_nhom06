@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4>Orders History
                        <a href="{{url('orders')}}"><button class="btn btn-warning float-right">New Orders</button></a>
                    </h4>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Order Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                            <tr>
                                <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                                <td>{{$item->tracking_no}}</td>
                                <td>{{$item->total_price}} $</td>
                                <td>{{$item->status == 0?'Confirmed':'Completed'}}</td>
                                <td>
                                    <a href="{{url('admin/view-order/'.$item->id)}}"><button class="btn btn-primary">View</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
