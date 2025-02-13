@extends('layouts.app')
@section('title', 'students List')
@section('content')
<h1 class="mt-4"> Add new Student</h1>
<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
    <input type="text" name="name" class="form-control" required>
</div>

    <div class="mb-3">
        <label for="email" class="form-label"> Email</label>
        <input type="text" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">phone</label>
        <input type="number" name="phone" class="form-control" step="0.01">
    </div>
   
    
    

    <button type="submit" class="btn btn-primary" style="position: absolute; bottom: 20px;  left: 50%; transform: translateX(-50%);">Add</button>
</form>
@endsection