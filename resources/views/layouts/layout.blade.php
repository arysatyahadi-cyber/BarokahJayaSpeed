<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Barokah Jaya Speed')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 

  <!-- Google Font Montserrat -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

  <style>
    * {
        font-family: 'Montserrat', sans-serif !important;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #111;
        color: #fff;
        padding: 15px 40px;
        border-bottom: 1px solid #ff2a2a;
    }

    .navbar .logo {
        font-weight: 900;
        font-size: 1.5rem;
        color: #fff;
    }

    .navbar .logo span {
        color: #ff2a2a;
    }

    .navbar nav {
        display: flex;
        gap: 25px;
        align-items: center;
    }

    .navbar nav a {
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .navbar nav a:hover,
    .navbar nav a.active {
        color: #ff2a2a;
    }

    /* Tombol lokasi */
    .btn-location {
        background: #ff2a2a;
        color: #fff !important;
        padding: 8px 18px;
        border-radius: 20px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-location:hover {
        background: #cc1a1a;
        text-decoration: none;
    }

    .footer {
        text-align: center;
        padding: 20px;
        background: #111;
        color: #fff;
        border-top: 1px solid #ff2a2a;
    }
  </style>
</head>

<body>
  <header class="navbar">
    <div class="logo">BAROKAH <span>JAYA SPEED</span></div>
    <nav>
      <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
      <a href="{{ url('/sparepart') }}" class="{{ Request::is('sparepart') ? 'active' : '' }}">Sparepart</a>
      <a href="{{ url('/booking') }}" class="{{ Request::is('booking') ? 'active' : '' }}">Booking</a>
      <a href="{{ url('/history') }}" class="{{ Request::is('history') ? 'active' : '' }}">History</a>
      <a href="{{ url('/hitung-cc') }}" class="{{ Request::is('hitung-cc') ? 'active' : '' }}">Hitung CC</a>
      <a href="https://www.google.com/maps/place/Bratang+Gede+VI,+Ngagelrejo,+Kec.+Wonokromo,+Surabaya,+Jawa+Timur+60245/@-7.2993364,112.7489225,17z/data=!3m1!4b1!4m6!3m5!1s0x2dd7fbaf66bd6f2d:0x1b1965ae67580261!8m2!3d-7.2993417!4d112.7514974!16s%2Fg%2F11b6b9vhc4?entry=ttu&g_ep=EgoyMDI1MTEwOS4wIKXMDSoASAFQAw%3D%3D" 
         target="_blank" 
         class="btn-location">Lokasi</a>
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
