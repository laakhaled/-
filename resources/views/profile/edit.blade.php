@extends('master')

@section('title', 'Profile')

@section('content')
<div class="container">
    <h2>My Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3>Upload Portfolio Image</h3>
    <form action="{{ route('profile.upload.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" name="image" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Image</button>
    </form>

    <h3>My Portfolio Images</h3>
    <div class="portfolio-images" style="display: flex; flex-wrap: wrap;">
        @foreach ($user->portfolioImages as $image)
            <div class="image-container" style="margin: 10px; text-align: center;">
                <img src="{{ asset('upload/images/' . $image->image) }}" 
                     alt="Portfolio Image" 
                     width="150" 
                     height="150" 
                     style="border-radius: 10px; object-fit: cover;">
                <form action="{{ route('profile.delete.image', $image->id) }}" method="POST" style="margin-top: 5px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection