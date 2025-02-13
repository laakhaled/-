@extends('layouts.app')
@section('title', 'students List')

@section('content')
<h1 class="mt-4">students List</h1>
<a href="{{ route('students.create') }}" class="btn btn-success mb-3" style="position: absolute; bottom: 50px;  left: 50%; transform: translateX(-50%);">Add book</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>phone</th>
            <th>Action</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone}}</td>
           
            <td>
                <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{route('students.destroy', $student->id)}}" method="POST" style="display:inline;">
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
