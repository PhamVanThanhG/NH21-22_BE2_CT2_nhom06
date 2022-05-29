<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('admin.users.view',compact('user'));
    }
}
