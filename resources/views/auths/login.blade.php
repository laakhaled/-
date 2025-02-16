@extends('layouts.app')
@section('content')
<div class="registration-form">
    <h2 class="text-center mb-4">Welcome to Login</h2>

    <form action="{{ route('auths.login') }}" method="POST">
        @csrf

       
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

     
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

       
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

       
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

  
    <div class="mt-4 text-center">
        <p>Don't have an account? <a href="{{ route('auths.register') }}">Register here</a>.</p>
    </div>
</div>
@endsection