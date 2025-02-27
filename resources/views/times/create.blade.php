@extends('master')

@section('title', 'Create Time Slot')

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-5 py-3 border-bottom">
        <h1 class="display-6 fw-bold text-primary">Create Time Slot</h1>
        <button type="button" class="mb-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTimeSlotModal">
            <i class="fas fa-plus-circle me-2"></i> New Time Slot
        </button>
    </div>

    <!-- Create Time Slot Modal -->
    <div class="modal fade" id="createTimeSlotModal" tabindex="-1" aria-labelledby="createTimeSlotModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Create New Time Slot</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('times.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Time</label>
                            <input type="time" class="form-control" name="time" required>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-calendar-plus me-2"></i> Add Time Slot
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Time Slots List -->
    <div class="row mt-5">
        @foreach ($times as $time)
        <div class="col-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary">{{ $time->date }} - {{ $time->time }}</span>
                                <small class="text-muted">{{ $time->created_at->diffForHumans() }}</small>
                            </div>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTimeSlotModal{{ $time->id }}">
                                <i class="fas fa-trash me-1"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteTimeSlotModal{{ $time->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this time slot?</p>
                        <form action="/times/delete/{{ $time->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex gap-2 justify-content-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</div>
@endsection
