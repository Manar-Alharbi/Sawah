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

    .suggestion-box {
        background-color: rgba(250, 234, 254, 0.94);
        padding: 40px 30px;
        border-radius: 20px;
        backdrop-filter: blur(10px);
        box-shadow: 0 0 30px rgba(106, 76, 147, 0.1);
        max-width: 700px;
        margin: auto;
        border: 2px dashed #b497d6;
        transition: background-color 0.5s ease, border 0.5s ease;
    }

    .dark-overlay {
        background-color: rgba(255, 255, 255, 0.95) !important;
        border: 2px dashed #e1cce9 !important;
        box-shadow: 0 0 30px rgba(123, 63, 140, 0.2) !important;
    }

    h2 {
        font-weight: bold;
        color: #6a4c93;
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.2rem;
        text-shadow: 1px 1px 2px rgba(255,255,255,0.6);
        border-bottom: 3px double #b497d6;
        padding-bottom: 10px;
        display: inline-block;
        margin: 0 auto 30px auto;
    }

    label.form-label {
        font-weight: bold;
        color: #6a4c93;
        font-size: 1.05rem;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #d3c1e5;
        padding: 12px;
        font-size: 1rem;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(106, 76, 147, 0.05);
    }

    .btn-primary {
        background-color: #b497d6;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: bold;
        font-size: 1rem;
        transition: background-color 0.3s ease;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #6a4c93;
    }

    .alert-success {
        background-color: #f3e8ff;
        color: #6a4c93;
        border-radius: 10px;
        text-align: center;
        font-weight: 500;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #b497d6;
    }
</style>

<!-- زر تبديل الوضع -->
<button id="toggleMode">تبديل الوضع</button>

<div class="container mt-5">
    <div class="suggestion-box">
        <h2>إرسال اقتراح سياحي</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('suggestions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">📌 العنوان</label>
                <input type="text" name="title" class="form-control" placeholder="اقتراحك بعنوان..." required>
            </div>
            <div class="mb-3">
                <label class="form-label">📝 الرسالة</label>
                <textarea name="message" class="form-control" rows="4" placeholder="اكتب اقتراحك بالتفصيل..." required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">🚀 إرسال الاقتراح</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const body = document.body;
        const toggleBtn = document.getElementById('toggleMode');
        const box = document.querySelector('.suggestion-box');

        body.classList.add('light-mode');

        toggleBtn.addEventListener('click', function () {
            if (body.classList.contains('light-mode')) {
                body.classList.replace('light-mode', 'dark-mode');
                box.classList.add('dark-overlay');
            } else {
                body.classList.replace('dark-mode', 'light-mode');
                box.classList.remove('dark-overlay');
            }
        });
    });
</script>
@endsection