<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل دخول المدير</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            top: 30px;
            right: 30px;
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

        .login-box {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(180, 151, 189, 0.2);
            max-width: 450px;
            margin: 80px auto;
            border: 2px solid #b497bd;
            transition: background-color 0.5s ease, border 0.5s ease;
        }

        .dark-overlay {
            background-color: rgba(255, 255, 255, 0.97) !important;
            border: 2px solid #d1c4e9 !important;
            box-shadow: 0 10px 30px rgba(123, 63, 140, 0.2) !important;
        }

        h2 {
            text-align: center;
            font-weight: bold;
            color: #7a5c91;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
            color: #6a4c7a;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #d8bfd8;
        }

        .btn-primary {
            background-color: #b497bd;
            border: none;
            font-weight: bold;
            border-radius: 8px;
            padding: 10px;
        }

        .btn-primary:hover {
            background-color: #a07aa8;
        }

        .alert-danger {
            border-radius: 8px;
            font-size: 0.95rem;
            text-align: center;
            background-color: #f8d7da;
            color: #842029;
        }
    </style>
</head>
<body>
    <!-- زر تبديل الوضع -->
    <button id="toggleMode">تبديل الوضع</button>

    <div class="login-box">
        <h2>تسجيل دخول المدير</h2>
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary w-100">دخول</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const body = document.body;
            const toggleBtn = document.getElementById('toggleMode');
            const box = document.querySelector('.login-box');

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
</body>
</html>