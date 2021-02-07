<?php

namespace App\Http\Controllers;

use App\brand;
use Carbon\Carbon;
use Illuminate\Http\Request;

class brandController extends Controller
{
    public function homeBrand(){
        $brands = brand::latest()->get();
        return view('admin.brands.index',compact('brands'));
    }

    public function storeBrand(Request $request){
        $request->validate([
            'brand_name' => 'required',
        ]);
        brand::insert([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success','brand added successfully');
    }

    public function editBrand($id){
        $brands = brand::find($id);
        return view('admin.brands.edit',compact('brands'));
    }

    public function updateBrand(Request $request,$id){
        $request->validate([
            'brand_name' => 'required',
        ]);
        brand::find($id)->update([
            'brand_name'  => $request->brand_name,
            'update_at'   => Carbon::now(),
        ]);
        return redirect()->route('brands')->with('success','brand updated');
    }

    public function deleteBrand($id){
        $delete = brand::find($id);
        $delete->delete();
        return redirect()->back()->with('success','brand deleted');
    }

    public function inactiveBrand($id){
        brand::find($id)->update([
            'status' => 0,
        ]);
        return redirect()->back()->with('success','inactivated brand');
    }
    public function activeBrand($id){
        brand::find($id)->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('success','brand is activated');
    }
}
