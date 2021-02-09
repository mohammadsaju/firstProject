<?php

namespace App\Http\Controllers;

use App\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    public function index(){
        $carts = cart::latest()->get();
        $subtotal = cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->product_price * $t->qty;
        });
        if(Auth::check()){
            return view('frontent_pages.checkout',compact('carts','subtotal'));
        }else{
            return redirect()->route('login')->with('loginError','at first login your accout');
        }
        
    }
}