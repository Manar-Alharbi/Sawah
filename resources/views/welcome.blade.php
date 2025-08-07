<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>برنامج سواح</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body.light-mode {
            font-family: 'Cairo', Tahoma, sans-serif;
            line-height: 1.8;
            background-color: #fff;
            color: #333;
        }

        body.dark-mode {
            font-family: 'Cairo', Tahoma, sans-serif;
            line-height: 1.8;
            background-color: #f6ebffff;
            color: #191919;
        }

        header.light-mode {
            background: url('/storage/light-bg.jpg') center/cover no-repeat;
        }

        header.dark-mode {
            background: url('/storage/Dark-bg.jpg') center/cover no-repeat;
        }

        header {
            height: 75vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 20px;
        }

        header h1 {
            font-size: 3.0rem;
            font-weight: bold;
            color: #8970b7ff;
            background: rgba(255, 255, 255, 0.91);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .navbar-brand, .nav-link {
            font-weight: bold;
            font-size: 1.1rem;
        }

        section {
            padding: 80px 0;
        }

        section h2 {
            font-weight: bold;
            color: #6f42c1;
        }

        section p.lead {
            font-size: 1.2rem;
            color: #555;
        }

        .contact {
            background: #f3e8ff;
        }

        .contact p {
            margin-bottom: 10px;
        }

        .btn-light {
            background-color: #826badff;
            color: white;
            border: none;
        }

        .btn-light:hover {
            background-color: #5a379f;
        }

        .img-fluid {
            max-height: 250px;
            object-fit: cover;
        }

        footer {
            background: #5a379f;
            color: #f8fcfbff;
            padding: 20px 0;
            text-align: center;
            font-size: 0.95rem;
        }

        #toggleMode {
            position: absolute;
            top: 90px;
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
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">برنامج سواح</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#about">من نحن</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">تواصل معنا</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- زر تبديل الوضع -->
<button id="toggleMode">تبديل الوضع</button>

<header id="mainHeader" class="light-mode">
    <div>
        <h1>هلا والله! اكتشف جمال السعودية مع سواح</h1>
        <a href="{{ url('/home') }}" class="btn btn-light btn-lg mt-4">احجز رحلتك الآن</a>
    </div>
</header>

<section id="about" class="container text-center">
    <h2 class="mb-4">من نحن</h2>
    <p class="lead">
        نحن في برنامج سواح نأخذك في جولة ساحرة داخل المملكة لاكتشاف أجمل المعالم السياحية السعودية.
        <br><br>
        💫 المشروع من تنفيذ طالبات طموحات من جامعة القصيم، حبنا للسفر وجمال وطننا ألهمنا نشارككم أجمل الوجهات بطابع سعودي أصيل.
    </p>
    <div class="row mt-5">
        <div class="col-md-4"><img src="https://i.pinimg.com/1200x/71/74/cb/7174cb8ea3530bfd63bbdc0e37a4bf1a.jpg" class="img-fluid rounded" alt="ساعة مكة"></div>
        <div class="col-md-4"><img src="https://i.pinimg.com/736x/70/8b/ea/708bea015c0a1c45e65e412c2a731db8.jpg" class="img-fluid rounded" alt="العلا"></div>
        <div class="col-md-4"><img src="https://i.pinimg.com/1200x/0c/19/60/0c1960b3a6a24dd9036f47a8c8620a15.jpg" class="img-fluid rounded" alt="جبال السودة"></div>
    </div>
</section>

<section id="contact" class="contact text-center">
    <div class="container">
        <h2 class="mb-4">تواصل معنا</h2>
        <p class="lead">يمكنك التواصل معنا عبر البريد أو الهاتف لأي استفسارات.</p>
        <p><strong>البريد:</strong> support@sawah.com</p>
        <p><strong>الهاتف:</strong> 123456789</p>
    </div>
</section>

<footer>
    <p>جميع الحقوق محفوظة &copy; {{ date('Y') }} - برنامج سواح</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const body = document.body;
        const header = document.getElementById('mainHeader');
        const toggleBtn = document.getElementById('toggleMode');

        body.classList.add('light-mode');
        header.classList.add('light-mode');

        toggleBtn.addEventListener('click', function () {
            if (body.classList.contains('light-mode')) {
                body.classList.replace('light-mode', 'dark-mode');
                header.classList.replace('light-mode', 'dark-mode');
            } else {
                body.classList.replace('dark-mode', 'light-mode');
                header.classList.replace('dark-mode', 'light-mode');
            }
        });
    });
</script>



</body>
</html>