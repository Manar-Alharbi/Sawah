@extends('layouts.app')

@section('content')
<!-- خط Cairo -->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<style>
    body.light-mode {
        font-family: 'Cairo', sans-serif;
        background-color: #fdf6f9;
        color: #4a3c4f;
    }

    body.dark-mode {
        font-family: 'Cairo', sans-serif;
        background-color: #4f2b5fff;
        color: #e8dff2;
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
        background-color: #b497bd;
    }

    h2 {
        font-weight: bold;
        color: #7a5c91;
        text-align: center;
        margin-bottom: 40px;
    }

    body.dark-mode h2 {
        color: #e8dff2;
    }

    .table {
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(180, 151, 189, 0.15);
    }

    .table th {
        background-color: #bf94ccff;
        color: #ffffff;
        font-weight: 600;
        text-align: center;
    }

    .table td {
        vertical-align: middle;
        text-align: center;
        color: #4a3c4f;
    }

    body.dark-mode .table {
        background-color: #6c4c86ff;
    }

    body.dark-mode .table th {
        background-color: #6a4c93;
        color: #f3e8ff;
    }

    body.dark-mode .table td {
        color: #674c85ff;
    }

    .btn-sm {
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 500;
    }

    .btn-success {
        background-color: #a0c4b7;
        border: none;
        color: #fff;
    }

    .btn-success:hover {
        background-color: #8db3a7;
    }

    .btn-danger {
        background-color: #c08ca3;
        border: none;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #a06c85;
    }

    .btn-warning {
        background-color: #f3d6a2;
        border: none;
        color: #4a3c4f;
    }

    .btn-warning:hover {
        background-color: #eac58c;
    }

    .badge {
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 8px;
    }

    .bg-success {
        background-color: #a0c4b7 !important;
        color: #fff !important;
    }

    .bg-danger {
        background-color: #c08ca3 !important;
        color: #fff !important;
    }

    .bg-warning {
        background-color: #f3d6a2 !important;
        color: #4a3c4f !important;
    }

    .bg-secondary {
        background-color: #d3cce3 !important;
        color: #4a3c4f !important;
    }

    body.dark-mode .bg-success {
        background-color: #6a8f7a !important;
        color: #fff !important;
    }

    body.dark-mode .bg-danger {
        background-color: #a06c85 !important;
        color: #fff !important;
    }

    body.dark-mode .bg-warning {
        background-color: #cfae7d !important;
        color: #2e1f35 !important;
    }

    body.dark-mode .bg-secondary {
        background-color: #6a4c93 !important;
        color: #f3e8ff !important;
    }

    .alert-success {
        text-align: center;
        border-radius: 8px;
        font-size: 1rem;
        margin-bottom: 20px;
        background-color: #f3e8f5;
        color: #7a5c91;
        border: 1px solid #e0cce5;
    }

    body.dark-mode .alert-success {
        background-color: #4b2c5e;
        color: #d8b4dd;
        border-color: #6a4c93;
    }

    .text-muted {
        color: #a08ca8 !important;
    }

    body.dark-mode .text-muted {
        color: #855a8aff !important;
    }
</style>

<!-- زر تبديل الوضع -->
<button id="toggleMode">تبديل الوضع</button>

<div class="container mt-5">
    <h2>إدارة الحجوزات السياحية</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>المستخدم</th>
                <th>الرحلة</th>
                <th>الحالة</th>
                <th>تغيير الحالة</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $booking)
                <tr>
                    <td>{{ $booking->user->name ?? 'غير متاح' }}</td>
                    <td>{{ $booking->trip->title ?? 'غير متاح' }}</td>
                    <td>
                        @if($booking->status == 'accepted')
                            <span class="badge bg-success">مقبول</span>
                        @elseif($booking->status == 'rejected')
                            <span class="badge bg-danger">مرفوض</span>
                        @elseif($booking->status == 'pending')
                            <span class="badge bg-warning">بانتظار المراجعة</span>
                        @else
                            <span class="badge bg-secondary">{{ $booking->status }}</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.bookings.updateStatus', ['id'=>$booking->id,'status'=>'accepted']) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">قبول</button>
                        </form>

                        <form action="{{ route('admin.bookings.updateStatus', ['id'=>$booking->id,'status'=>'rejected']) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">رفض</button>
                        </form>

                        <form action="{{ route('admin.bookings.updateStatus', ['id'=>$booking->id,'status'=>'pending']) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">مراجعة</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-muted">لا توجد حجوزات حالياً</td>
                </tr>
            @endforelse
        </tbody>
    </table>
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