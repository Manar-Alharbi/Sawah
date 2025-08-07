@extends('layouts.app')

@section('content')
<!-- خط Cairo -->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

<style>
    body.light-mode {
        background-color: #fcf7fd;
        font-family: 'Cairo', sans-serif;
        color: #5a4b5e;
    }

    body.dark-mode {
        background-color: #543663ff;
        font-family: 'Cairo', sans-serif;
        color: #b89fd3ff;
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
        background-color: #b497d6;
        color: white;
    }

    h1 {
        color: #9271acff;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
        transition: color 0.3s ease;
    }

    body.dark-mode h1 {
        color: #d8c5ebff;
    }

    .btn-primary {
        background-color: #b497d6;
        border: none;
        font-weight: bold;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #6a4c93;
    }

    .table {
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(106, 76, 147, 0.1);
        transition: background-color 0.3s ease;
    }

    .table th {
        background-color: #b497d6;
        color: #fff;
        font-weight: bold;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .table td {
        vertical-align: middle;
        text-align: center;
        color: #5a4b5e;
        transition: color 0.3s ease;
    }

    body.dark-mode .table {
        background-color: #3f2b4f;
    }

    body.dark-mode .table th {
        background-color: #6a4c93;
        color: #f3e8ff;
    }

    body.dark-mode .table td {
        color: #754aa3ff;
    }

    img {
        border-radius: 8px;
        object-fit: cover;
    }

    .btn-warning {
        background-color: #e6b8f2;
        border: none;
        font-weight: bold;
        color: #4b2c5e;
    }

    .btn-warning:hover {
        background-color: #d89ee8;
    }

    .btn-danger {
        background-color: #c08ca3;
        border: none;
        font-weight: bold;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #a06c85;
    }

    .alert-success {
        text-align: center;
        border-radius: 8px;
        font-size: 1rem;
        background-color: #f3e8ff;
        color: #6a4c93;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    body.dark-mode .alert-success {
        background-color: #4b2c5e;
        color: #d8b4dd;
    }

    .text-muted {
        color: #a08ca8 !important;
    }

    body.dark-mode .text-muted {
        color: #b387b8ff !important;
    }
</style>

<!-- زر تبديل الوضع -->
<button id="toggleMode">تبديل الوضع</button>

<div class="container">
    <h1>إدارة الرحلات</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-3">
        <a href="{{ route('admin.trips.create') }}" class="btn btn-primary">
            + إضافة رحلة جديدة
        </a>
    </div>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>📷 الصورة</th>
                <th>📌 العنوان</th>
                <th>🗺️ الموقع</th>
                <th>💰 السعر</th>
                <th>⚙️ الخيارات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($trips as $trip)
                <tr>
                    <td>{{ $trip->id }}</td>
                    <td>
                        @if($trip->image)
                            <img src="{{ asset('storage/'.$trip->image) }}" width="80" height="60">
                        @else
                            <span class="text-muted">لا يوجد</span>
                        @endif
                    </td>
                    <td>{{ $trip->title }}</td>
                    <td>{{ $trip->location }}</td>
                    <td>{{ $trip->price }} ريال</td>
                    <td>
                        <a href="{{ route('admin.trips.edit', $trip->id) }}" class="btn btn-warning btn-sm">✏️ تعديل</a>
                        <form action="{{ route('admin.trips.destroy', $trip->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                🗑️ حذف
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-muted">🚫 لا توجد رحلات</td>
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