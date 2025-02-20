<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{

// public function store(Request $request, $serviceRequestId)
// {
//     $request->validate([
//         'price' => 'required|numeric|min:1',
//     ]);

//     Offer::create([
//         'service_request_id' => $serviceRequestId,
//         'provider_id' => Auth::id(),
//         'price' => $request->price,
//     ]);

//     return redirect()->back()->with('success', 'Offer submitted successfully!');
// }
public function store(Request $request, $serviceRequestId)
{
    Offer::create([
        'service_request_id' => $serviceRequestId,
        'provider_id' => 1, // افتراضياً اجعله 1 إذا لم يكن هناك تسجيل دخول
        'message' => $request->input('message'),
        'price' =>  0, // تعيين قيمة افتراضية إذا لم يتم إرسال `price`
    ]);


    return redirect()->back()->with('success', 'Offer added successfully!');
}

}
