@extends('layout.master')

@section('title', 'Create Service Request')

@section('content')
    <div class="container">
        <h2 class="my-4">Create a New Service Request</h2>
        <form action="{{ route('test.requests.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">Request Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
    </div>
@endsection
