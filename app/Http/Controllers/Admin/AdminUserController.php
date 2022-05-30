<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rating;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function users()
    {
        $user = User::where('role_as', '0')->get();
        return view('admin.users.index', compact('user'));
    }
    public function viewusers($id)
    {
        $user = User::find($id);
        $order = Order::where('user_id', $id)->first();
        return view('admin.users.view', compact('user', 'order'));
    }
    public function rating()
    {
        $rating = Rating::all();
        return view('admin.users.rating', compact('rating'));
    }
    public function delete($id)
    {
        $rating = Rating::find($id);
        $rating->delete();
        return redirect('rating')->with('status', 'Delete Review Successfully!');
    }
}