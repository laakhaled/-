@extends('master')

@section('title', 'Create Service Request')

@section('content')
    <div class="container">
        <h2 class="my-4">Service Requests</h2>
        
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createRequestModal">
            Create Service Request
        </button>

        <div class="modal fade" id="createRequestModal" tabindex="-1" aria-labelledby="createRequestModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createRequestModalLabel">Create a New Service Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="type" class="form-label">Request Type</label>
                                <select name="type" class="form-select">
                                    <option disabled selected>Select type of request</option>
                                    <option value="Electrecity">Electrecity</option>
                                    <option value="carpentry">carpentry</option>
                                    <option value="Plumbing">Plumbing</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Request Description</label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Post Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h3>Your Service Requests</h3>
            @foreach ($requests as $request)
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text">{{ $request->description }}</p>
                        @if ($request->image)
                        <a href="/requests/show/{{ $request->id }}">
                            <img src="{{ asset('uploads/images/' . $request->image) }}" alt="Request Image" class="img-fluid" width="100" height="100">
                        </a>
                        @endif

                        <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deleteRequestModal{{ $request->id }}">
                            Delete
                        </button>
                    </div>
                </div>

            
                <div class="modal fade" id="deleteRequestModal{{ $request->id }}" tabindex="-1" aria-labelledby="deleteRequestModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteRequestModalLabel">Are you sure to delete this post?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/requests/delete/{{ $request->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
