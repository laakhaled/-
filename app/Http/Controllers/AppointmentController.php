<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Appointment;
use App\Models\Offer;
class AppointmentController extends Controller
{

public function create($offerId)
{
    $offer = Offer::findOrFail($offerId);
    return view('test.schedule', compact('offer'));
}

public function store(Request $request)
{
    $request->validate([
        'offer_id' => 'required|exists:offers,id',
        'date' => 'required|date',
        'time' => 'required',
    ]);

    Appointment::create([
        'offer_id' => $request->offer_id,
        'date' => $request->date,
        'time' => $request->time,
    ]);

    return redirect()->route('test.requests.index')->with('success', 'Appointment scheduled successfully!');
}

}
