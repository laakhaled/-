<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Offer;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $appointments=Appointment::all();
        return View('appointments.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $offer=Offer::find($id);
        return View("appointments.create",compact("offer"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datetime = $request->appointment;
        Appointment::create([
            'offer_id'=>$request->offer_id,
            'datetime'=>$datetime
        ]);
        return View('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
        $appointment=Appointment::find($id);
        $appointment->delete();
        return redirect()->back();
    }
}
