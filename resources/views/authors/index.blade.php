@extends('layouts.app')

@section('content')
<h1 class="mt-4">Authors</h1>
<a href="{{ route('authors.create') }}" style="position: absolute; bottom: 50px;  left: 50%; transform: translateX(-50%);" class="btn btn-success mb-3">Add New Author</a>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Bio</th>
            <th>Job Description</th>
            <th>Profile Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($authors as $author)
        <tr>
            <td>{{ $author->name }}</td>
            <td>{{ $author->email }}</td>
            <td>{{ $author->bio }}</td>
            <td>{{ $author->job_description }}</td>
            <td>
                <img src="{{ asset('storage/' . $author->profile_image) }}" style="max-width: 50px; max-height: 50px; object-fit: cover; margin-right: 10px;" alt="Profile Image">
            </td>
            <td>
                <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection