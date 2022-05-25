<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Product_Type;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $product_type = Product_Type::all();
        return view('admin.product_type.index',compact('product_type'));
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
            $file->move('images/',$filename);
            $product_type ->image = $filename;
        }
        $product_type->type_name = $request->input('name');
        $product_type->save();
        return redirect('/producttype')->with('status',"Add Successfully!");
    }
    public function edit($id)
    {
        $product_type = Product_Type::find($id);
        return view('admin.product_type.edit',compact('product_type'));
    }
    public function update(Request $request,$id)
    {
        $product_type = Product_Type::find($id);
        if ($request->hasFile('image')){
            $path = 'images/'.$product_type->image;
            if (File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('images/',$filename);
            $product_type ->image = $filename;

        }
        $product_type->type_name = $request->input('name');
        $product_type->update();
        return redirect('/producttype')->with('status',"Update Successfully!");
    }
    public function delete($id)
    {
        $product_type = Product_Type::find($id);
        if ($product_type->image ) {
            $path = 'images/'.$product_type->image;
            if (File::exists($path)){
                File::delete($path);
            }
        }
        $product_type->delete();
        return redirect('/producttype')->with('status',"Delete Successfully!");
    }
}
