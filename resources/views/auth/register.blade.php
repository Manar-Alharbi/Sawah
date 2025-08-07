@extends('layouts.app')

@section('content')

<style>
    body.light-mode {
        background: url('/storage/light-bg.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    body.dark-mode {
        background: url('/storage/dark-bg.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    body.light-mode::before,
    body.dark-mode::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        animation: wave 6s ease-in-out infinite;
        z-index: -1;
    }

    @keyframes wave {
        0% { transform: translateY(0px); }
        50% { transform: translateY(15px); }
        100% { transform: translateY(0px); }
    }

    #toggleMode {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        border-radius: 20px;
        font-weight: bold;
        color: #6A4E77;
        border: 2px solid #8E6BAF;
        background-color: transparent;
        padding: 8px 16px;
        transition: all 0.3s ease;
    }

#toggleMode {
    position: absolute;
    top: 100px;
    right: 60px;
    border-radius: 20px;
    font-weight: bold;
    color: #fff;
    border: 2px solid #8E6BAF;
    background-color: #9458afff;
    padding: 8px 16px;
    transition: all 0.3s ease;
}

    .register-box {
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(160, 120, 180, 0.2);
        padding: 40px;
        margin-top: 60px;
        transition: all 0.3s ease-in-out;
    }

    .register-box:hover {
        box-shadow: 0 12px 25px rgba(160, 120, 180, 0.3);
    }

    .register-box h2 {
        font-weight: bold;
        color: #7A5CA0;
    }

    .form-label {
        font-weight: 600;
        color: #5A3E6B;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #D8C2E1;
        background-color: #F9F5FC;
        color: #4B3B4E;
    }

    .form-control::placeholder {
        color: #B89CCF;
    }

    .btn-primary {
        background-color: #8E6BAF;
        border: none;
        border-radius: 30px;
        font-weight: bold;
        padding: 10px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #A88BC9;
    }

    .alert-danger {
        border-radius: 8px;
        font-size: 0.95rem;
    }
</style>

<button id="toggleMode">تبديل الوضع</button>

<div class="container d-flex justify-content-center">
    <div class="register-box" style="max-width: 500px; width: 100%;">
        <h2 class="mb-4 text-center">تسجيل حساب جديد</h2>

        @if($errors->any())
            <div class="alert alert-danger text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">الاسم</label>
                <input type="text" class="form-control" name="name" placeholder="أدخل اسمك الكامل" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" name="email" placeholder="example@email.com" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">رقم الجوال</label>
                <input type="text" class="form-control" name="phone" placeholder="05xxxxxxxx" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" class="form-control" name="password" placeholder="********" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="********" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">تسجيل</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const body = document.body;
        const toggleBtn = document.getElementById('toggleMode');

        // الوضع الافتراضي
        body.classList.add('light-mode');

        toggleBtn.addEventListener('click', function () {
            if (body.classList.contains('light-mode')) {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
            } else {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
            }
        });
    });
</script>
@endsection