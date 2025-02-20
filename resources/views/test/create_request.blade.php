@extends('layout.master')

@section('content')
<div class="container mt-5">
    <h2>Create a New Request</h2>
    <form action="{{ route('test.requests.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Request</button>
    </form>
</div>
@endsection
