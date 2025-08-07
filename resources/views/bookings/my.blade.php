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
        background: url('https://i.pinimg.com/736x/f2/90/0d/f2900d4cf6672716a05bac4085924bd6.jpg') no-repeat center center fixed;
        background: url('/storage/dark-bg.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Cairo', sans-serif;
        position: relative;
        z-index: 0;
    }

    #toggleMode {
        position: fixed;
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
        background-color: rgba(255, 245, 250, 0.85);
        padding: 40px 20px;
        border-radius: 20px;
        backdrop-filter: blur(10px);
        box-shadow: 0 0 30px rgba(180, 130, 200, 0.2);
        border: 2px dashed #d8b4dd;
        transition: background-color 0.5s ease, border 0.5s ease;
    }

    .dark-overlay {
        background-color: rgba(255, 255, 255, 0.95) !important;
        border: 2px dashed #e1cce9 !important;
        box-shadow: 0 0 30px rgba(123, 63, 140, 0.2) !important;
    }

    h2 {
        font-weight: bold;
        color: #7b3f8c;
        text-align: center;
        margin-bottom: 40px;
        font-size: 2rem;
        position: relative;
    }

    h2::after {
        content: '❀';
        position: absolute;
        right: -30px;
        top: -10px;
        font-size: 1.5rem;
        color: #d8b4dd;
    }

    .card {
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid #f3e5f5;
        border-radius: 16px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(123, 63, 140, 0.2);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #eee;
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: bold;
        color: #7b3f8c;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 0.95rem;
        color: #5a3e5c;
        margin-bottom: 8px;
    }

    .badge {
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 8px;
    }

    .alert-info {
        background-color: rgba(255, 255, 255, 0.95);
        color: #7b3f8c;
        border-radius: 10px;
        text-align: center;
        font-weight: 500;
        padding: 20px;
        backdrop-filter: blur(6px);
        box-shadow: 0 0 15px rgba(123, 63, 140, 0.1);
    }
</style>

<!-- زر تبديل الوضع -->
<button id="toggleMode">تبديل الوضع</button>

<div class="container mt-5 overlay">
    <h2>حجوزاتي</h2>

    @if($bookings->count() > 0)
        <div class="row">
            @foreach($bookings as $booking)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm">
                        @if($booking->trip->image)
                            <img src="{{ asset('storage/' . $booking->trip->image) }}"
                                 class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $booking->trip->title }}</h5>
                            <p class="card-text"><strong>📍 الموقع:</strong> {{ $booking->trip->location }}</p>
                            <p class="card-text"><strong>💰 السعر:</strong> {{ number_format($booking->trip->price, 2) }} ريال</p>
                            <p class="card-text"><strong>📅 تاريخ الحجز:</strong> {{ $booking->created_at->format('Y-m-d') }}</p>
                            <p class="card-text"><strong>📌 الحالة:</strong>
                                @if($booking->status == 'بانتظار المراجعة')
                                    <span class="badge bg-warning text-dark">{{ $booking->status }}</span>
                                @elseif($booking->status == 'مقبول')
                                    <span class="badge bg-success">{{ $booking->status }}</span>
                                @elseif($booking->status == 'مرفوض')
                                    <span class="badge bg-danger">{{ $booking->status }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $booking->status }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">لا توجد حجوزات حتى الآن.</div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const body = document.body;
        const toggleBtn = document.getElementById('toggleMode');
        const overlay = document.querySelector('.overlay');

        body.classList.add('light-mode');

        toggleBtn.addEventListener('click', function () {
            if (body.classList.contains('light-mode')) {
                body.classList.replace('light-mode', 'dark-mode');
                overlay.classList.add('dark-overlay');
            } else {
                body.classList.replace('dark-mode', 'light-mode');
                overlay.classList.remove('dark-overlay');
            }
        });
    });
</script>
@endsection