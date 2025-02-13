@extends('layouts.app')
@section('title', 'Books List')
@section('content')
<h1 class="mt-4"> Add new Book</h1>
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
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
        <label for="description" class="form-label"> description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">price</label>
        <input type="number" name="price" class="form-control" step="0.01">
    </div>

    <div class="mb-3">
        <label for="cover_image" class="form-label"> cover_image</label>
        <input type="file" name="cover_image" class="form-control">
    </div>
    <div>
    <label> Authors:</label>
       <select name="author_id" aria-placeholder="Authors">
          @foreach ($author as $author )
              <option value="{{$author->id}}">{{$author->name}}</option>
    
           @endforeach
        </select>
    </div>
    <div>
        <label> Students:</label>
           <select name="student_id" >
              @foreach ($student as $student )
                  <option value="{{$student->id}}">{{$student->name}}</option>
        
               @endforeach
            </select>
        </div>
    <button type="submit" class="btn btn-primary" style="position: absolute; bottom: 20px;  left: 50%; transform: translateX(-50%);">Add</button>
</form>
@endsection