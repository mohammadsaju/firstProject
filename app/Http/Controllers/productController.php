<?php

namespace App\Http\Controllers;

use App\brand;
use App\category;
use App\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class productController extends Controller
{
    public function addProduct()
    {
        $categories = category::latest()->get();
        $brands     = brand::latest()->get();
        return view('admin.products.addProduct', compact('categories', 'brands'));
    }
    //================add product==============///
    public function storeProduct(Request $request)
    {
        $request->validate([
            "product_name"      => 'required',
            "product_code"      => 'required',
            "product_price"     => 'required',
            "product_quantity"  => 'required',
            "category_id"       => 'required',
            "brand_id"          => 'required',
            "short_describtion" => 'required',
            "long_describtion"  => 'required',
            'image_one'         => 'required | mimes: jpg,jpeg,png,gif',
            'image_two'         => 'required | mimes: jpg,jpeg,png,gif',
            'image_three'       => 'required | mimes: jpg,jpeg,png,gif',
        ]);

        $img_one = $request->file('image_one');
        $name_gen = hexdec(uniqid()) . '.' . $img_one->getClientOriginalExtension();
        Image::make($img_one)->resize(270, 250)->save('frontent/img/product/' . $name_gen);
        $image_url_one = 'frontent/img/product/' . $name_gen;

        $img_two = $request->file('image_two');
        $name_gen = hexdec(uniqid()) . '.' . $img_two->getClientOriginalExtension();
        Image::make($img_two)->resize(270, 250)->save('frontent/img/product/' . $name_gen);
        $image_url_two = 'frontent/img/product/' . $name_gen;

        $img_three = $request->file('image_three');
        $name_gen = hexdec(uniqid()) . '.' . $img_three->getClientOriginalExtension();
        Image::make($img_three)->resize(270, 250)->save('frontent/img/product/' . $name_gen);
        $image_url_three = 'frontent/img/product/' . $name_gen;


        product::insert([
            "product_name"      => $request->product_name,
            "product_code"      => $request->product_code,
            "product_slug"      => strtolower(str_replace('', '-', $request->product_name)),
            "product_price"     => $request->product_price,
            "product_quantity"  => $request->product_quantity,
            "category_id"       => $request->category_id,
            "brand_id"          => $request->brand_id,
            "short_describtion" => $request->short_describtion,
            "long_describtion"  => $request->long_describtion,
            "image_one"         => $image_url_one,
            "image_two"         => $image_url_two,
            "image_three"       => $image_url_three,
            "created_at"        => Carbon::now(),
        ]);
        return redirect()->route('manage.product')->with('success', 'product added');
    }
    //================manage product====================//
    public function manageProduct()
    {
        $products = product::latest()->get();
        return view('admin.products.manage', compact('products'));
    }

    public function editProduct($id)
    {
        $product    = product::find($id);
        $categories = category::latest()->get();
        $brands     = brand::latest()->get();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            "product_name"      => 'required',
            "product_code"      => 'required',
            "product_price"     => 'required',
            "product_quantity"  => 'required',
            "category_id"       => 'required',
            "brand_id"          => 'required',
            "short_describtion" => 'required',
            "long_describtion"  => 'required',
        ]);

        product::find($id)->update([
            "product_name"      => $request->product_name,
            "product_code"      => $request->product_code,
            "product_price"     => $request->product_price,
            "product_quantity"  => $request->product_quantity,
            "category_id"       => $request->category_id,
            "brand_id"          => $request->brand_id,
            "short_describtion" => $request->short_describtion,
            "long_describtion"  => $request->long_describtion,
        ]);
        return redirect()->route('manage.product')->with('success', 'product updated');
    }

     
    //============delete product============//
    public function deleteProduct($id)
    {
        $delete = product::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'product deleted');
    }

    //==============inactive product==================//

    public function inactiveProduct($id)
    {
        product::find($id)->update([
            'status' => 0,
        ]);
        return redirect()->back()->with('success', 'inactivated product');
    }
//==============active product=============//
    public function activeProduct($id)
    {
        product::find($id)->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('success', 'activated product');
    }
}
