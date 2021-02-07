<?php

namespace App\Http\Controllers;

use App\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class categoryController extends Controller
{
    public function category(){
        $categories = category::latest()->get();
        return view('admin.category.category',compact('categories'));
    }

    public function storeCategory(Request $request){
        $request->validate([
            'category_name' => 'required'
        ]);
        category::insert([
            'category_name' => $request->category_name,
        ]);
        return redirect()->back()->with('success','category added successfully');
    }

    public function editCategory($id){
        $categories = category::find($id);
        return view('admin.category.editCategory',compact('categories'));
    }

    public function updateCategory(Request $request,$id){
        $request->validate([
            'category_name'  => 'required'
        ]);
        category::find($id)->update([
            'category_name' => $request->category_name,
            'created_at'    => Carbon::now(),
        ]);
        return redirect()->route('categories')->with('success','category updated');
    }

   public function deleteCategory($id){
       $delete = category::find($id);
       $delete->delete();
       return redirect()->back()->with('success', 'category deleted successfully');
   }

   public function inactiveCategory($id){
       category::find($id)->update([
           'status' => 0,
       ]);
       return redirect()->back()->with('success', 'inactivated category');
   }

   public function activeCategory($id){
       category::find($id)->update([
           'status' => 1,
       ]);
       return redirect()->back()->with('success', 'activated category');
   }
}
