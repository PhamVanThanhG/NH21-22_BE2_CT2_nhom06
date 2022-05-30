<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function add()
    {
        return view('admin.discount.index');
    }
    public function insert(Request $request)
    {
        $discount = new Discount();
        $value = $request->input('discount');
        $discount->values = $value/100;
        $discount->save();
        return redirect('dashboard')->with('status','Add Discount Successfully!');
    }
}
