<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Barokah Jaya Speed')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <header class="navbar">
  <div class="logo">BAROKAH <span>JAYA SPEED</span></div>
  <nav>
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ url('/sparepart') }}">Sparepart</a>
    <a href="{{ url('/booking') }}">Booking</a>
    <a href="{{ url('/history') }}">History</a>
    <a href="{{ url('/hitung-cc') }}">Hitung CC</a>
  </nav>
</header>

  <main>
    @yield('content')
  </main>

  <footer class="footer">
    <p>© 2025 Barokah Jaya Speed — Racing with Elegance ⚡</p>
  </footer>
</body>
</html>
