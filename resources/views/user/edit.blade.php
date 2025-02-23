@extends('master')

@section('title', 'Edit Profile')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Edit Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-lg p-4">
        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 text-center">
                <img src="{{ asset('uploads/images/' . auth()->user()->image) }}" class="rounded-circle" width="100" alt="User Avatar">
            </div>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Profile Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Save Changes</button>
        </form>
    </div>
</div>
@endsection
