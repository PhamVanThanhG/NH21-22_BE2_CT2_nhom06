<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function users()
    {
        $user = User::where('role_as','0')->get();
        return view('admin.users.index',compact('user'));
    }
    public function viewusers($id)
    {
        $user = User::find($id);
        $order = Order::where('user_id',$id)->first();
        return view('admin.users.view',compact('user','order'));
    }
}
