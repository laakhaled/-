@extends('layout.master')

@section('content')
<div class="container mt-5">
    <h2>Schedule an Appointment</h2>
    <form action="{{ route('test.appointments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="offer_id" value="{{ $offer->id }}">
        <div class="mb-3">
            <label for="date" class="form-label">Choose Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Choose Time</label>
            <input type="time" name="time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Confirm Appointment</button>
    </form>
</div>
@endsection
