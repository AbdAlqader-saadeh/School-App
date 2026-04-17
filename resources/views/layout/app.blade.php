<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/ju.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @if(Auth::check())
        @include('books.navbar')
    @endif

    <div class="container mt-5">
        @yield('content')
    </div>

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     const btn = document.getElementById('themeToggle');
        //     if (btn) {
        //         btn.onclick = function() {
        //             const html = document.documentElement;
        //             const current = html.getAttribute('data-bs-theme');
        //             const next = current === 'dark' ? 'light' : 'dark';
        //             html.setAttribute('data-bs-theme', next);
        //             localStorage.setItem('theme', next);
        //         };
        //     }
        //     // تطبيق الثيم المخزن
        //     const savedTheme = localStorage.getItem('theme');
        //     if (savedTheme) document.documentElement.setAttribute('data-bs-theme', savedTheme);
        // });
    </script>
</body>
</html>