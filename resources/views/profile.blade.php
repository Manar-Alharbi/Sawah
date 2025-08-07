@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">الملف الشخصي</h2>

    {{-- بيانات المستخدم --}}
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">بياناتي:</h5>
            <p><strong>الاسم:</strong> {{ Auth::user()->name }}</p>
            <p><strong>البريد:</strong> {{ Auth::user()->email }}</p>
            <p><strong>رقم الجوال:</strong> {{ Auth::user()->phone ?? 'غير متوفر' }}</p>
        </div>
    </div>

    <h5 class="mb-3">الحجوزات الخاصة بك:</h5>

    @if($bookings->isEmpty())
        <p class="text-center">لا يوجد حجوزات بعد.</p>
    @else
        <div class="row">
            @foreach($bookings as $booking)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $booking->trip->title }}</h5>
                            <p class="card-text"><strong>الحالة:</strong> {{ $booking->status }}</p>
                            <p class="card-text"><strong>تاريخ الحجز:</strong> {{ $booking->created_at->format('Y-m-d') }}</p>
                            <p class="card-text"><strong>الرسالة:</strong> {{ $booking->message }}</p>
                            <div class="mt-auto">
                                <button class="btn btn-outline-primary btn-sm w-100" disabled>
                                    رقم الحجز: {{ $booking->id }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection