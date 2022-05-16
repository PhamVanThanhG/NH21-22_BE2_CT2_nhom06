<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_Type;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        return view('admin.product_type.index');
    }
    public function add()
    {
        return view('admin.product_type.add');
    }
    public function insert(Request $request)
    {
        $product_type = new Product_Type();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category'.$filename);
            $product_type ->image = $filename;
        }
        $product_type->type_name = $request->input('name');
        $product_type->save();
        return redirect('/dashboard');
    }
}
