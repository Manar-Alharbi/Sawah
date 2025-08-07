<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>برنامج سواح</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">برنامج سواح</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                {{-- لو المستخدم أدمن --}}
                @auth('admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.trips.index') }}">الرحلات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.bookings') }}">الحجوزات</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.suggestions') }}">
                          <i class="bi bi-lightbulb"></i> الاقتراحات
                      </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">تسجيل خروج</button>
                        </form>
                    </li>

                {{-- لو المستخدم مسجل دخول عادي --}}
                @elseif(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">الرحلات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bookings.my') }}">ملفي</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('suggestions.create') }}">
                          <i class="bi bi-lightbulb"></i> الاقتراحات
                      </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">تسجيل خروج</button>
                        </form>
                    </li>

                {{-- لو زائر غير مسجل --}}
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">تسجيل دخول</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>