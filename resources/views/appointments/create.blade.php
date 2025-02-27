@extends('master')

@section('title', 'Schedule Appointment')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">📅 Schedule Appointment</h2>

    <div class="card shadow-lg mt-4">
        <div class="card-body">
            <p><strong>Service Provider:</strong> {{ $offer->Provider ? $offer->Provider->name : 'Unknown Provider' }}</p>
            <p><strong>Service:</strong> {{ $offer->message }}</p>
            <p><strong>Price:</strong> 💰 {{ $offer->price }}$</p>

            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                
                <div class="mb-3">
                    <label for="date" class="form-label">Choose Date:</label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="time" class="form-label">Choose Time:</label>
                    <input type="time" name="time" class="form-control" required>
                </div>
                <div>
                <label for="payment_method">Payment methods:</label>
                <select name="payment_method" required>
                    <option value="cash">Cash</option>
                    <option value="visa">Visa</option>
                </select>
            </div>
            
                <button type="submit" class="btn btn-primary">📅 Confirm Appointment</button>
            </form>
        </div>
    </div>
</div>
@endsection
