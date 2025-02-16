@extends('layouts.app')
@section('content')

    <style>
       
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .registration-form {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .registration-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .registration-form .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .registration-form .btn {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            font-size: 16px;
        }
        .registration-form .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .registration-form .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

<h1 class="mt-4"> welcome to Register</h1>

<form action="{{ route('auths.register') }}" method="POST" enctype="multipart/form-data">
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

            <input type="text" name="name" placeholder="Full Name" required class="form-control mb-2">

            <input type="email" name="email" placeholder="Email Address" required class="form-control mb-2">

            <input type="password" name="password" placeholder="Password" required class="form-control mb-2">

            <input type="text" name="phone" placeholder="Phone Number" class="form-control mb-2">

            
            <select name="role" class="form-control mb-2">
                <option value="client">Client</option>
                <option value="technician">Technician</option>
                <option value="admin">Admin</option>
            </select>

            <input type="file" name="image" class="form-control mb-2">
           
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

    <div class="mt-4 text-center">
        <p>If you already have an account <a href="{{ route('auths.login') }}"> login</a>.</p>
    </div>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
 @endsection