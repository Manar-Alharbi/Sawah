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
        z-index: -1;
    }

    body.light-mode::before {
        background-color: rgba(255, 255, 255, 0.4);
    }

    body.dark-mode::before {
        background-color: rgba(0, 0, 0, 0.4);
    }

    .login-box {
        background-color: rgba(250, 245, 255, 0.95);
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(160, 120, 180, 0.2);
        padding: 40px;
        margin-top: 80px;
        transition: all 0.3s ease-in-out;
    }

    .login-box:hover {
        box-shadow: 0 12px 25px rgba(160, 120, 180, 0.3);
    }

    .login-box h3 {
        font-weight: bold;
        color: #6A4E77;
        font-size: 1.8rem;
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

    .login-footer {
        font-size: 0.95rem;
        color: #6A4E77;
    }

    .login-footer a {
        color: #8E6BAF;
        text-decoration: none;
        font-weight: bold;
    }

    .login-footer a:hover {
        text-decoration: underline;
        color: #A88BC9;
    }

    .alert-danger {
        border-radius: 10px;
        font-size: 0.95rem;
        background-color: #FBE9F5;
        color: #A94442;
        border: 1px solid #F5C6CB;
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
</style>

<div class="container d-flex flex-column align-items-center">
    <button id="toggleMode">تبديل الوضع</button>

    <div class="login-box" style="max-width: 400px; width: 100%;">
        <h3 class="mb-4 text-center">تسجيل الدخول</h3>

        @if($errors->any())
            <div class="alert alert-danger text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" placeholder="example@email.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" placeholder="********" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>

            <div class="mt-4 text-center login-footer">
                ليس لديك حساب؟ <a href="{{ route('register') }}">سجل الآن</a>
            </div>
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