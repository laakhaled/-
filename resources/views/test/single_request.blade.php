<div class="card mb-3 request-card">
    <div class="card-body">
        <h5 class="card-title">{{ $request->description }}</h5>
        <img src="{{ asset('storage/' . $request->image) }}" class="img-fluid" alt="Request Image">
        <hr>
        <h6>Offers:</h6>
        @foreach($request->offers as $offer)
            <p>{{ $offer->provider->name }}: ${{ $offer->price }} 
                <a href="{{ route('test.appointments.create', $offer->id) }}" class="btn btn-sm btn-success">Accept</a>
            </p>
        @endforeach
        <form action="{{ route('test.offers.store', $request->id) }}" method="POST">
            @csrf
            <input type="number" name="price" class="form-control mb-2" placeholder="Enter your offer price" required>
            <button type="submit" class="btn btn-primary">Submit Offer</button>
        </form>
    </div>
</div>
