@extends('layouts.app')

@section('content')
<!-- خط Cairo -->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<style>
    body.light-mode {
        background: url('/storage/light-bg.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Cairo', sans-serif;
        position: relative;
        z-index: 0;
    }

    body.dark-mode {
        background: url('/storage/dark-bg.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Cairo', sans-serif;
        position: relative;
        z-index: 0;
    }


    #toggleMode {
        position: absolute;
        top: 100px;
        right: 60px;
        z-index: 100;
        border-radius: 20px;
        font-weight: bold;
        color: #fff;
        border: 2px solid #8E6BAF;
        background-color: #9458af;
        padding: 8px 16px;
        transition: all 0.3s ease;
    }

    #toggleMode:hover {
        background-color: #A88BC9;
        color: white;
    }

    .overlay {
        background-color: rgba(250, 234, 254, 0.94);
        border-radius: 20px;
        padding: 50px 35px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
        margin-top: 60px;
        margin-bottom: 60px;
        border: 2px dashed #b497d6;
    }

    h2.title {
        display: block;
        margin: 40px auto 20px auto;
        width: fit-content;
        font-weight: 700;
        color: #461b95ff;
        font-size: 2.4rem;
        text-shadow: 1px 1px 2px rgba(255,255,255,0.6);
        border-bottom: 3px double #b497d6;
        padding-bottom: 10px;
    }

    .card {
        border: none;
        border-radius: 16px;
        transition: transform 0.3s ease;
        background-color: #fff;
        box-shadow: 0 6px 20px rgba(106, 76, 147, 0.1);
        border-top: 4px solid #b497d6;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(106, 76, 147, 0.15);
    }

    .card-title {
        font-weight: 700;
        color: #6a4c93;
    }

    .card-text {
        font-size: 0.95rem;
        color: #4b4b4b;
    }

    .btn-info {
        background-color: #b497d6;
        border: none;
        color: #fff;
    }

    .btn-success {
        background-color: #6a4c93;
        border: none;
        color: #fff;
    }

    .btn-sm {
        padding: 8px 16px;
        font-size: 0.85rem;
        border-radius: 8px;
    }

    .trip-icon {
        font-size: 1.2rem;
        margin-right: 6px;
        color: #6a4c93;
    }

    .alert-info {
        background-color: #f3e8ff;
        color: #6a4c93;
        border: none;
        font-weight: bold;
        border-radius: 12px;
        padding: 20px;
    }

    
</style>

<!-- زر تبديل الوضع -->
<button id="toggleMode">تبديل الوضع</button>

<div class="container">
    <h2 class="title">الرحلات المتاحة</h2>

    <div class="overlay">
        @if($trips->count() > 0)
            <div class="row">
                @foreach ($trips as $trip)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            @if($trip->image)
                                <img src="{{ asset('storage/' . $trip->image) }}"
                                     class="card-img-top rounded-top"
                                     style="height: 220px; object-fit: cover;">
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $trip->title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($trip->description, 100) }}</p>
                                <p class="card-text"><span class="trip-icon">📍</span><strong>الموقع:</strong> {{ $trip->location }}</p>
                                <p class="card-text"><span class="trip-icon">💰</span><strong>السعر:</strong> <span class="text-success">{{ number_format($trip->price, 2) }} ريال</span></p>

                                <div class="d-flex justify-content-between mt-auto">
                                    <a href="{{ route('trips.show', $trip->id) }}" class="btn btn-info btn-sm">
                                        اكتشف الرحلة 
                                    </a>

                                    @auth
                                        <form action="{{ route('bookings.quick', $trip->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                احجز الآن 🧳
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-success btn-sm">
                                            سجل دخولك للحجز 
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">🚫 لا توجد رحلات حالياً، استعد لمغامرتك القادمة قريباً!</div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const body = document.body;
        const toggleBtn = document.getElementById('toggleMode');

        body.classList.add('light-mode');

        toggleBtn.addEventListener('click', function () {
            if (body.classList.contains('light-mode')) {
                body.classList.replace('light-mode', 'dark-mode');
            } else {
                body.classList.replace('dark-mode', 'light-mode');
            }
        });
    });
</script>
@endsection