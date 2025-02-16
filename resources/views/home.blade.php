@extends('layouts.app')

@section('title', 'Enjdny Dashboard') 
@section('page-title', 'Enjdny Dashboard Overview')

@section('content')
<div class="welcome-container">

    @auth
        <h3>مرحبًا بك، {{ Auth::user()->name }}! 🎉</h3>
        
        @if(Auth::user()->image)
        <img src="{{ Storage::url(Auth::user()->image) }}" alt="User Image">
        @endif

        <p>Login successful</p>
    @endauth

    <p>Welcome to Enjdny for multiple home services</p>

</div>

<style>
    .welcome-container {
        background-color: #3777bb; 
        color: black; 
        padding: 50px 20px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); 
        position: absolute;
        bottom: 50%; 
        transform: translateY(50%); 
        width: 80%; 
        max-width: 600px; 
        animation: slideUp 1s ease-out; 
        left: 50%;
        transform: translate(-50%, 50%);
    }

    img {
        max-width: 150px;
        border-radius: 50%;
        margin-top: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    @keyframes slideUp {
        0% {
            transform: translate(-50%, 100%); 
            opacity: 0;
        }
        100% {
            transform: translate(-50%, 50%); 
            opacity: 1;
        }
    }
</style>
@endsection
