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
        background-color: #45125dff;
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
        background-color: #b497bd;
    }

    h2 {
        font-weight: bold;
        color: #7a5c91;
        text-align: center;
        margin-bottom: 40px;
        transition: color 0.3s ease;
    }

    body.dark-mode h2 {
        color: #f3e8ff;
    }

    .table {
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(180, 151, 189, 0.15);
        transition: background-color 0.3s ease;
    }

    .table th {
        background-color: #b497bd;
        color: #ffffff;
        font-weight: 600;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .table td {
        vertical-align: middle;
        text-align: center;
        color: #4a3c4f;
        transition: color 0.3s ease;
    }

    body.dark-mode .table {
        background-color: #3f2b4f;
    }

    body.dark-mode .table th {
        background-color: #804c93ff;
        color: #f3e8ff;
    }

    body.dark-mode .table td {
        color: #38195aff;
    }

    .btn-sm {
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 500;
    }

    .btn-danger {
        background-color: #c08ca3;
        border: none;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #a06c85;
    }

    .alert-success {
        text-align: center;
        border-radius: 8px;
        font-size: 1rem;
        margin-bottom: 20px;
        background-color: #f3e8f5;
        color: #7a5c91;
        border: 1px solid #e0cce5;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    body.dark-mode .alert-success {
        background-color: #4b2c5e;
        color: #5b1e63ff;
        border-color: #6a4c93;
    }

    .text-muted {
        color: #a08ca8 !important;
    }

    body.dark-mode .text-muted {
        color: #d8b4dd !important;
    }
</style>

<!-- زر تبديل الوضع -->
<button id="toggleMode">تبديل الوضع</button>

<div class="container mt-5">
    <h2>إدارة الاقتراحات</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>المستخدم</th>
                <th>العنوان</th>
                <th>الرسالة</th>
                <th>التاريخ</th>
                <th>التحكم</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suggestions as $suggestion)
                <tr>
                    <td>{{ $suggestion->user->name }}</td>
                    <td>{{ $suggestion->title }}</td>
                    <td>{{ $suggestion->message }}</td>
                    <td>{{ $suggestion->created_at->format('Y-m-d') }}</td>
                    <td>
                        <form action="{{ route('admin.suggestions.destroy', $suggestion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-muted">لا توجد اقتراحات حالياً</td>
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