@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Users Detail
                        <a href="{{url('users')}}"><button class="btn btn-warning float-right"><i class="fa-solid fa-backward"></i> Back</button></a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Full Name</label>
                            <div class="p-2 border">
                                {{$user->name}}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">
                                {{$user->email}}
                            </div>
                        </div>
                        @if ($order)
                        <div class="col-md-4 mt-3">
                            <label for="">Phone Number</label>
                            <div class="p-2 border">
                                {{$order->phonenumber}}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Address</label>
                            <div class="p-2 border">
                                {{$order->address}}
                            </div>
                        </div>
                        @endif
                        <div class="col-md-4 mt-3">
                            <label for="">Role</label>
                            <div class="p-2 border">
                                {{$user->role_as=='0'?'User':'Admin'}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
