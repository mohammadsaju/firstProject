<?php

namespace App\Http\Controllers;

use App\coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class couponController extends Controller
{
    public function index(){
        $coupons = coupon::latest()->get();
        return view('admin.coupons.index',compact('coupons'));
    }

    public function storeCoupon(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'discount' => 'required',
        ]);
        coupon::insert([
            'coupon_name' => $request->coupon_name,
            'discount' => $request->discount,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success','coupon added successfully');
    }

    public function editCoupon($id){
        $coupons = coupon::find($id);
        return view('admin.coupons.edit',compact('coupons'));
    }

    public function updateCoupon(Request $request,$id){
        $request->validate([
            'coupon_name' => 'required',
            'discount'    => 'required',
        ]);
        coupon::find($id)->update([
            'coupon_name'  => $request->coupon_name,
            'discount'     => $request->discount,
            'update_at'    => Carbon::now(),
        ]);
        return redirect()->route('coupon')->with('success','coupon updated');
    }

    public function deleteCoupon($id){
        $delete = coupon::find($id);
        $delete->delete();
        return redirect()->back()->with('success','coupon deleted');
    }

    public function inactiveCoupon($id){
        coupon::find($id)->update([
            'status' => 0,
        ]);
        return redirect()->back()->with('success','inactivated coupon');
    }
    public function activeCoupon($id){
        coupon::find($id)->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('success','coupon is activated');
    }

}