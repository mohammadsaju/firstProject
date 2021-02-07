<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('frontent.home');
    }
}
