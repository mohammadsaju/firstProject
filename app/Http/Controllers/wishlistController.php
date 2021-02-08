<?php

namespace App\Http\Controllers;

use App\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishlistController extends Controller
{
    public function addWishlist($id){
        if(Auth::check()){
            wishlist::insert([
                'user_id'   => Auth::id(),
                'product_id'=> $id,
            ]);
            return redirect()->back()->with('success','product added on wishlist');
        }else{
            return redirect()->route('login')->with('loginError','at first login your account');
        }
        
    }

    public function wishlistPage(){
        $wishlists = wishlist::where('user_id',Auth::id())->latest()->get();
        return view('frontent_pages.wishlistPage',compact('wishlists'));
    }
    
    public function deleteWishlist($id){
        $delete = wishlist::find($id);
        $delete->delete();
        return redirect()->back()->with('success','removed from wishlist');
    }
}
