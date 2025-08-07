@extends('layouts.app')

@section('content')
<!-- خط Cairo -->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<style>
    body.light-mode {
        background-color: #fdf6f9;
        font-family: 'Cairo', sans-serif;
        color: #5a4b5e;
    }

    body.dark-mode {
        background-color: #593d69ff;
        font-family: 'Cairo', sans-serif;
        color: #e8dff1;
    }

    .mode-toggle {
        display: block;
        right: 60px;
        padding: 8px 20px;
        background-color: #9458af;
        color: #fff;
        border: 2px solid #8E6BAF;
        border-radius: 20px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .mode-toggle:hover {
        background-color: #A88BC9;
        color: white;
    }

    h2 {
        font-weight: bold;
        color: #7a5c91;
        text-align: center;
        margin-bottom: 30px;
        position: relative;
        transition: color 0.3s ease;
    }

    body.dark-mode h2 {
        color: #f9f6fcff;
    }

    h2::after {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 100%;
        font-size: 1.5rem;
        color: #b497bd;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(180, 151, 189, 0.15);
        border: 1px solid #e0cce5;
        transition: background-color 0.3s ease, border 0.3s ease;
    }

    .card-header {
        background-color: #b497bd;
        color: #ffffff;
        font-weight: 600;
        padding: 16px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        transition: background-color 0.3s ease;
    }

    .card-body {
        background-color: #ffffff;
        padding: 20px;
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
        transition: background-color 0.3s ease;
    }

    body.dark-mode .card {
        border: 1px solid #a88bc9;
    }

    body.dark-mode .card-header {
        background-color: #6a4c93;
    }

    body.dark-mode .card-body {
        background-color: #694d80ff;
    }

    .table {
        margin-bottom: 0;
        transition: background-color 0.3s ease;
    }

    .table th {
        background-color: #b497bd;
        color: #ffffff;
        font-weight: 600;
        text-align: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .table td {
        vertical-align: middle;
        text-align: center;
        color: #5a4b5e;
        transition: color 0.3s ease;
    }

    body.dark-mode .table th {
        background-color: #6a4c93;
        color: #faf6fdff;
    }

    body.dark-mode .table td {
        color: #5a357fff;
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

    .text-muted {
        color: #a08ca8 !important;
    }

    body.dark-mode .text-muted {
        color: #cbb8d1 !important;
    }
</style>

<div class="container mt-5">
    <button id="toggleMode" class="mode-toggle">تبديل الوضع</button>

    <h2>لوحة التحكم</h2>

    <!-- جدول الحجوزات -->
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">الحجوزات</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>اسم المستخدم</th>
                        <th>الرحلة</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->user ? $booking->user->name : '---' }}</td>
                            <td>{{ $booking->trip ? $booking->trip->title : '---' }}</td>
                            <td>{{ $booking->status }}</td>
                            <td>
                                <form action="{{ route('admin.bookings.updateStatus', ['id'=>$booking->id,'status'=>'مقبول']) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">قبول</button>
                                </form>

                                <form action="{{ route('admin.bookings.updateStatus', ['id'=>$booking->id,'status'=>'مرفوض']) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">رفض</button>
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