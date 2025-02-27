<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use App\Models\ServiceRequest;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest; 

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $offers=Offer::all();
        return View('offers.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

      
       $request->validate([
            'message'=>'required|string',
            'price'=>'numeric|required'
        ]);
            offer::create([
                'message'=>$request['message'],
                'price'=>$request['price'],
                'service_request_id'=>$request['requestID'],
                'provider_id'=>Auth::user()->id,
                'payment_method' => $request->payment_method

            ]);

           
            return redirect()->route('requests.index')->with('success', 'تم تقديم العرض بنجاح.');
        }

    /**
     * Display the specified resource.
     */
    public function showOffers()
{

}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        $offer->update(['status' => $request->status]);

        if ($request->status === 'accepted') {
            return redirect()->route('appointments.create', $offer->id);
        }
    
        return redirect()->back()->with('success', 'Offer ' . ucfirst($request->status) . ' successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
