<?php

namespace App\Http\Controllers;

use App\cart;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function addCart(Request $request,$id){

        $check = cart::where('product_id',$id)->where('user_ip',$request->ip())->first();

        if($check){
            cart::where('product_id',$id)->where('user_ip',$request->ip())->increment('qty');
            return redirect()->back()->with('success','cart added successfully');
        }else{
            cart::insert([
                'product_id'   => $id,
                'qty'          => 1,
                'product_price'=> $request->product_price,
                'user_ip'      => $request->ip(),
            ]);
            return redirect()->back()->with('success','cart added successfully');
        }
    }

    public function cartPage(){
        $carts = cart::all()->where('user_ip',request()->ip());
        $subtotal = cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->product_price * $t->qty;
        });
        return view('frontent_pages.cart',compact('carts','subtotal'));
    }

    public function deleteCart($id){
        $delete = cart::find($id);
        $delete->delete();
        return redirect()->back()->with('success','cart deleted');
    }

    public function updateQuantity(Request $request,$id){
        cart::where('id',$id)->where('user_ip',request()->ip())->update([
            'qty'  => $request->qty,
        ]);
        return redirect()->back()->with('success','quantity updated');
    }
}
