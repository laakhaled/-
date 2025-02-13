@extends('layouts.app')

@section('content')
<h1 class="mt-4">Edit Students Details</h1>

<form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
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
        <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">phone</label>
        <input type="phone" name="phone" class="form-control" value="{{ $student->phone}}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection