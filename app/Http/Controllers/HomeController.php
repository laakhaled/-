<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{ 
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('auths.register')->with('error', 'يرجى التسجيل أولاً قبل الدخول إلى الصفحة الرئيسية.');
        }

        return view('home');
    }
}
 