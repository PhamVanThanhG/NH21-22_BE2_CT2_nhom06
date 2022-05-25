<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Product_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function index()
    {
        $product =Product::all();
        return view('admin.products.index',compact('product'));
    }
    public function add()
    {
        $product_type = Product_Type::all();
        $discount = Discount::all();
        return view('admin.products.add',compact('product_type','discount'));
    }
    public function insert(Request $request)
    {
        $product = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('images/',$filename);
            $product ->image = $filename;
        }
        $product->name = $request->input('name');
        $product->type_id = $request->input('type_id');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount_id = $request->input('discount_id');
        $product->feature = $request->input('feature') == true?'1':'0';
        $product->save();
        return redirect('products')->with('status','Add Product Successfully!');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $discount = Discount::all();
        return view('admin.products.edit',compact('product','discount'));
    }
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $path = 'images/'.$product->image;
            if (File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('images/',$filename);
            $product ->image = $filename;
        }
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount_id = $request->input('discount_id');
        $product->feature = $request->input('feature') == true?'1':'0';
        $product->update();
        return redirect('products')->with('status','Update Product Successfully!');

    }
    public function delete($id)
    {
        $product = Product::find($id);
        $path = 'images/'.$product->image;
            if (File::exists($path)){
                File::delete($path);
            }
            $product->delete();
            return redirect('products')->with('status','Delete Product Successfully!');
    }
}
