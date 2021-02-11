<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use Illuminate\Http\Request;

class frontentController extends Controller
{
    public function index(){
        $products = product::where('status',1)->latest()->get();
        $productss = product::where('status',1)->latest()->get();
        $category = category::where('status',1)->latest()->get();
        return view('frontent_pages.index',compact('products','category'));
    }

    public function shopPage(){
        return view('frontent_pages.shop');
    }

    public function productDetails($id){
        $product = product::find($id);
        $category_id = $product->category_id;
        $related_p   = product::where('category_id',$category_id)->where('id','!=',$id)->latest()->get();
        return view('frontent_pages.product_details',compact('product','related_p'));
    }

    public function shopGrid(){
        $categories = category::where('status',1)->latest()->get();
        $products   = product::latest()->paginate(3);
       
        return view('frontent_pages.shopPage',compact('categories','products'));
    }

    public function catProduct($id){
        $products = product::where('category_id',$id)->latest()->paginate(3);
        $categories = category::where('status',1)->latest()->get();
        return view('frontent_pages.category_product',compact('products','categories'));
    }
}
