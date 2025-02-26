@extends('master')

@section('title', 'Service Request Details')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">🛠️ Service Request Details</h2>

    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    @if($request->image)
                        <img src="{{ asset('uploads/images/' . $request->image) }}" class="rounded img-thumbnail" width="100" height="50" alt="Request Image">
                    @else
                        <img src="https://via.placeholder.com/100" class="rounded img-thumbnail" alt="No Image">
                    @endif
                </div>
                <div>
                    <p class="fw-bold text-primary">{{ $request->description }}</p>
                    <p><strong>Category:</strong> {{ $request->type }}</p>
                </div>
            </div>

            <div class="mt-3">
                <strong>Offers:</strong>
                <ul class="list-group offers-list-{{ $request->id }}">
                    @foreach($request->offers as $offer)
                        <li class="list-group-item">
                            @if($offer->users)
                                <strong>Provider:</strong> {{ $offer->users->name }}
                            @else
                                <strong>Provider:</strong> N/A
                            @endif
                        </li>
                        <li class="list-group-item">{{ $offer->message }}</li>
                        <li class="list-group-item"><strong>Price:</strong> {{ $offer->price }} L.E</li>

                        <form action="" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept Offer</button>
                        </form>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.offer-btn').forEach(button => {
            button.addEventListener('click', function () {
                let id = this.getAttribute('data-id');
                document.getElementById('offer-form-' + id).style.display = 'block';
            });
        });
    });
</script>

<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        border-radius: 10px;
        border: none;
        transition: transform 0.3s;
    }
    .card:hover {
        transform: scale(1.02);
    }
    .btn-success {
        font-size: 14px;
    }
    .list-group-item {
        font-size: 14px;
        background: #f1f1f1;
        border: none;
    }
</style>

@endsection
