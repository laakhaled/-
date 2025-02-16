<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
   
    public function register()
    {
        return view('auths.register'); 
    }


    public function handelregister(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|email',
            'password' => 'required|min:6',
            'phone' => 'required|string',
            'role' => 'required|in:admin,client,technician',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('users_images', 'public');
        } else {
            $data['image'] = null; 
        }

      
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'role' => $data['role'],
            'image' => $data['image'],
        ]);

     
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful, welcome ' . $user->name);
    }


    public function login()
    {
        return view('auths.login'); 
    }

   
    public function handellogin(Request $request)
    {
   
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email', 
            'password' => 'required|min:6',
        ]);

    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            
            return redirect()->route('home')->with('success', 'Welcome back, ' . Auth::user()->name);
        }

   
        return back()->withErrors(['email' => 'Please check your email or password']);
    }

   
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auths.login')->with('success', 'Logout successful');
    }
}
