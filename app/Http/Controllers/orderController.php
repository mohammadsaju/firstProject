<?php

namespace App\Http\Controllers;

use App\cart;
use App\order;
use App\order_item;
use App\shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class orderController extends Controller
{
    public function storeOrder(Request $request){
        $request->validate([
            "shipping_first_name" => 'required',  
            "shipping_last_name" => 'required',
            "shipping_phone"      => 'required',
            "shipping_email"      => 'required',
            "address"             => 'required',
            "state"               => 'required',
            "post_code"           => 'required',
            "payment_type"        => 'required',
        ]);

        $order_id = order::insertGetId([
            
            'user_id'       => Auth::id(),
            'payment_type'  => $request->payment_type,
            'total'         => $request->total,
            'subtotal'      => $request->subtotal,
            'coupon_discount'=> $request->coupon_discount,
            'invoice_no'    =>  mt_rand(10000000,99999999),
            'created_at'    =>  Carbon::now(),

        ]);
          
        $carts = cart::where('user_ip',request()->ip())->latest()->get();
        foreach($carts as $cart){

            order_item::insert([
                'order_id'      => $order_id,
                'product_id'    =>  $cart->product_id,
                'product_qty'   =>  $cart->qty,
                'created_at'    => Carbon::now(),
            ]);
        }
       

        shipping::insert([
            'order_id'             =>  $order_id,
            'shipping_first_name'  =>  $request->shipping_first_name,
            'shipping_last_name'   =>  $request->shipping_last_name,
            'shipping_email'       =>  $request->shipping_email,
            'shipping_phone'       =>  $request->shipping_phone,
            'address'              =>  $request->address,
            'state'                =>  $request->state,
            'post_code'            =>  $request->post_code,
            'created_at'           => Carbon::now(),
        ]);

        if(Session::has('coupon')){
            session()->forget('coupon');
        }
        cart::where('user_ip',request()->ip())->delete();
        return redirect()->route('success')->with('success','your order has been done');
    }
 
    //==========order success=========//
    public function success(){
        return view('frontent_pages.order_success');
    }
}
