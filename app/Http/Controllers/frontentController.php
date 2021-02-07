<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontentController extends Controller
{
    public function index(){
        return view('frontent_pages.index');
    }

    public function shopPage(){
        return view('frontent_pages.shop');
    }
}
