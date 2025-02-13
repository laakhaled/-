@extends('layouts.app')
@section('title', 'Books List')
@section('content')
<div class="container">
    <h2>Edit Book</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Book Title</label>
            <input type="text" name="name" class="form-control" value="{{ $book->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $book->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="{{ $book->price }}" step="0.01">
        </div>

        <div class="form-group">
            <label for="cover_image">Book Cover Image (optional)</label>
            <input type="file" name="cover_image" class="form-control">
        </div>
        @if($book->cover_image)

            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="book cover" style="max-width: 50px; max-height: 50px; object-fit: cover; margin-right: 10px;">
        @endif    
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
