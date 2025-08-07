@extends('layouts.app')

@section('content')

@php
    $backgroundImage = $trip->background_image 
        ? asset('storage/' . $trip->background_image) 
        : asset('images/backgrounds/default.jpg');
@endphp

<!-- زر تبديل الوضع -->
<button id="toggleMode">🌙 الوضع الليلي</button>

<style>
    body.light-mode {
        background-color: #fdf6f9;
        color: #4B3B4E;
    }

    body.dark-mode {
        background-color: #2e1f35;
        color: #f3e8ff;
    }

    
    #toggleMode {
        position: absolute;
        top: 90px;
        right: 40px;
        z-index: 100;
        border-radius: 20px;
        font-weight: bold;
        color: #fff;
        border: 2px solid #b497d6;
        background-color: #9458af;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }
    
    #toggleMode:hover {
        background-color: #6A4E77;
    }

    .container-box {
        background-color: rgba(245, 240, 250, 0.95);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 0 15px rgba(160, 120, 180, 0.2);
        transition: background-color 0.3s ease;
    }

    body.dark-mode .container-box {
        background-color: rgba(60, 40, 80, 0.9);
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
    }

    h2, h4 {
        color: #6A4E77;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    body.dark-mode h2,
    body.dark-mode h4 {
        color: #f3e8ff;
    }

    .trip-details p {
        font-size: 18px;
        color: #4B3B4E;
        transition: color 0.3s ease;
    }

    body.dark-mode .trip-details p {
        color: #f3e8ff;
    }

    .trip-details strong {
        color: #8E6BAF;
    }

    body.dark-mode .trip-details strong {
        color: #D8C2E1;
    }

    .btn {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    body.dark-mode .btn {
        background-color: #6A4E77 !important;
        color: #f3e8ff !important;
    }
</style>

<div style="background-image: url('{{ $backgroundImage }}'); background-size: cover; background-position: center; padding: 200px;">
    <div class="container container-box">

        <h2 class="mb-4 text-center">{{ $trip->title }}</h2>

        @if($trip->image)
            <img src="{{ asset('storage/' . $trip->image) }}" alt="صورة الرحلة" class="img-fluid rounded mb-4 d-block mx-auto" style="max-height: 600px; object-fit: cover; border: 4px solid #D8C2E1;">
        @endif

        @if($trip->images->count())
            <h4 class="text-center mt-5">صور إضافية للرحلة</h4>
            <div class="row justify-content-center mt-3">
                @foreach($trip->images as $image)
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="صورة إضافية" class="img-fluid rounded shadow" style="height: 250px; object-fit: cover;">
                    </div>
                @endforeach
            </div>
        @endif

        <div class="trip-details mb-4">
            <p><strong>الوصف:</strong> {{ $trip->description }}</p>
            <p><strong>الموقع:</strong> {{ $trip->location }}</p>
            <p><strong>السعر:</strong> {{ number_format($trip->price, 2) }} ريال</p>
        </div>

        <div class="action-buttons text-center">
            @auth
                <form action="{{ route('bookings.quick', $trip->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn" style="background-color: #8E6BAF; color: white; padding: 10px 30px; border-radius: 30px; font-weight: bold; margin: 10px;">
                        احجز الآن
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn" style="background-color: #8E6BAF; color: white; padding: 10px 30px; border-radius: 30px; font-weight: bold; margin: 10px;">
                    سجل دخولك للحجز
                </a>
            @endauth

            <a href="{{ route('home') }}" class="btn" style="background-color: #D8C2E1; color: #4B3B4E; padding: 10px 30px; border-radius: 30px; font-weight: bold; margin: 10px;">
                رجوع
            </a>
        </div>

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
                toggleBtn.textContent = 'تبديل الوضع';
            } else {
                body.classList.replace('dark-mode', 'light-mode');
                toggleBtn.textContent = 'تبديل الوضع';
            }
        });
    });
</script>

@endsection