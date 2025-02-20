<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{

  
   
        public function store(Request $request)
        {
            $request->validate([
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('requests', 'public');
            }
    
            ServiceRequest::create([
                'user_id' => 1, // ✅ تأكد أن `user_id` يتم تمريره
                'description' => $request->description,
                'image' => $imagePath,
                'status' => 'pending',
            ]);
    
            return redirect()->route('test.requests.index')->with('success', 'Request created successfully!');
        }
        public function index()
        {
            $requests = ServiceRequest::latest()->get(); // جلب جميع الطلبات الأحدث أولًا
            return view('test.requests.index', compact('requests'));
        }
        
    public function create()
{
    return view('test.requests.create'); // تأكد أن الملف موجود داخل views
}

    
}


