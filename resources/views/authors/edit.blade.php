@extends('layouts.app')

@section('content')
<h1 class="mt-4">Edit Author Details</h1>

<form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
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
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $author->name }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $author->email }}" required>
    </div>

    <div class="mb-3">
        <label for="bio" class="form-label">Bio</label>
        <textarea name="bio" class="form-control" rows="3">{{ $author->bio }}</textarea>
    </div>

    <div class="mb-3">
        <label for="job_description" class="form-label">Job Description</label>
        <textarea name="job_description" class="form-control" rows="3">{{ $author->job_description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="profile_image" class="form-label">Profile Image</label>
        <input type="file" name="profile_image" class="form-control">
    </div>
        @if ($author->profile_image)
        <img src="{{ asset('storage/' . $author->profile_image) }}" style="max-width: 50px; max-height: 50px; object-fit: cover; margin-right: 10px;" alt="Profile Image">
        @endif
    

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection