<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use Illuminate\Http\Request;

class frontentController extends Controller
{
    public function index(){
        $products = product::where('status',1)->latest()->get();
        $productss = product::where('status',1)->latest()->limit(3)->get();
        $category = category::where('status',1)->latest()->get();
        return view('frontent_pages.index',compact('products','category'));
    }

    public function shopPage(){
        return view('frontent_pages.shop');
    }
}
