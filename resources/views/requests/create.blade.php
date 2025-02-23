@extends('master')

@section('title', 'Create Service Request')

@section('content')
    <div class="container py-5">
        <h2 class="my-4 text-center text-primary">Service Requests</h2>
        
        <button type="button" class="btn btn-success mb-4 d-block mx-auto" data-bs-toggle="modal" data-bs-target="#createRequestModal">
            + Create Service Request
        </button>

        <div class="modal fade" id="createRequestModal" tabindex="-1" aria-labelledby="createRequestModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="createRequestModalLabel">Create a New Service Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="description" class="form-label">Request Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Post Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h3 class="text-center text-secondary">Your Service Requests</h3>
            <div class="row">
                @foreach ($requests as $request)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <p class="card-text">{{ $request->description }}</p>
                                @if ($request->image)
                                    <img src="{{ asset('uploads/images/' . $request->image) }}" alt="Request Image" class="img-fluid rounded">
                                @endif

                                <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deleteRequestModal{{ $request->id }}">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteRequestModal{{ $request->id }}" tabindex="-1" aria-labelledby="deleteRequestModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="deleteRequestModalLabel">Are you sure to delete this post?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/requests/delete/{{ $request->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100">Yes, Delete</button>
                                        <button type="button" class="btn btn-secondary w-100 mt-2" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
