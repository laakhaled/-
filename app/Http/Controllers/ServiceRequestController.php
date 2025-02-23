<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $requests = ServiceRequest::latest()->get(); 
         return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $requests = Auth::user()->ServiceRequests()->latest()->get();       
        return view('requests.create',compact('requests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'description' => 'required|string'
        ]);

        
        if ($request->hasFile('image')){
            $image=$request->file('image');
            $extension=$image->extension();
            $filename="post".time().'.'.$extension;
            $image->move(public_path('uploads/images'),$filename);

        }
        else
        {
            $filename='service.jpg';
        }

        $image=$filename;

        ServiceRequest::create([
            'user_id' => Auth::user()->id,
            'description' => $request->description,
            'image' => $image,
            'status' => 'pending',
            'type'=>$request->type
        ]);

        return redirect()->route('requests.create')->with('success', 'Request created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(ServiceRequest $serviceRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceRequest $serviceRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $request = ServiceRequest::find($id);
        $request->delete();
        return redirect()->route('requests.create')->with('success', 'Request deleted successfully!');
    }
}
