
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-5 text-center">الرحلات المتاحة</h1>

    <div class="row">
        @foreach($trips as $trip)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($trip->images->count())
                        <div id="carouselTrip{{ $trip->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($trip->images as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->image_url) }}" class="d-block w-100 rounded-top" style="height:200px;object-fit:cover;">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselTrip{{ $trip->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselTrip{{ $trip->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $trip->title }}</h5>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($trip->description, 100) }}</p>
                        <p><strong>📍 الموقع:</strong> {{ $trip->location }}</p>
                        <p><strong>💰 السعر:</strong> <span class="text-success">{{ $trip->price }} ريال</span></p>

                        @auth
                            <div class="d-flex justify-content-between mt-auto">
                                <a href="{{ route('trips.show', $trip->id) }}" class="btn btn-info">عرض التفاصيل</a>
                                <form action="{{ route('bookings.quick', $trip->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">احجز هذه الرحلة</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-secondary mt-auto text-center">
                                احجز الآن (سجل دخولك)
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection