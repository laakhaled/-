@extends('layouts.app')
@section('title', 'Books List')

@section('content')
<h1 class="mt-4">Books List</h1>
<a href="{{ route('books.create') }}" class="btn btn-success mb-3" style="position: absolute; bottom: 50px;  left: 50%; transform: translateX(-50%);">Add book</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Cover Image</th>
            <th>Action</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->price }}</td>
           

            <td>
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Book Image" style="max-width: 50px; border-radius: 5px;">
            </td>
            <td>
                <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
