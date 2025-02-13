@extends('layouts.app')

@section('content')
<h1 class="mt-4">Add New Author</h1>

<form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="bio" class="form-label">Bio</label>
        <textarea name="bio" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="job_description" class="form-label">Job Description</label>
        <textarea name="job_description" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="profile_image" class="form-label">Profile Image</label>
        <input type="file" name="profile_image" class="form-control">
    </div>
   <div>
    <label> Books:</label>
       <select name="book_id" >
          @foreach ($books as $book )
              <option value="{{$book->id}}">{{$book->name}}</option>
    
           @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection