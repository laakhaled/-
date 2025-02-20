@extends('layout.master')

@section('title', 'Requests')

@section('content')
    <div class="container">
        <h2 class="my-4">Service Requests</h2>
        @foreach($requests as $request)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $request->description }}</h5>
                    @if($request->image)
                        <img src="{{ asset('storage/' . $request->image) }}" class="img-fluid" alt="Request Image">
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
