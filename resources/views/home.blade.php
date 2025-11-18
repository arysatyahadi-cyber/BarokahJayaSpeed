@extends('layouts.layout')
@section('title', 'Home - Barokah Jaya Speed')

<!-- Ganti font ke Montserrat tanpa merusak tampilan -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
<style>
  html, body, * {
    font-family: 'Montserrat', sans-serif !important;
    letter-spacing: normal;
  }
</style>

@section('content')


@section('content')
<section class="hero-slider">
    <div class="slider-container">
        <div class="slide active" style="background-image: url('{{ asset('images/racing1.jpg') }}');"></div>
        <div class="slide" style="background-image: url('{{ asset('images/racing2.jpg') }}');"></div>
        <div class="slide" style="background-image: url('{{ asset('images/racing3.jpg') }}');"></div>
    </div>

    <div class="slider-dots">
        <span class="dot active" data-slide="0"></span>
        <span class="dot" data-slide="1"></span>
        <span class="dot" data-slide="2"></span>
    </div>

    <div class="hero-text">
        <h1>Barokah Jaya Speed</h1>
        <p>Bengkel Racing & Service Profesional — Cepat, Presisi, Berkelas!</p>
        <a href="{{ route('booking.index') }}" class="btn-book">Booking Sekarang</a>
    </div>
</section>

<style>
.hero-slider {
    position: relative;
    height: 80vh;
    overflow: hidden;
}

.slider-container {
    height: 100%;
    width: 100%;
    position: relative;
}

.slide {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.slide.active {
    opacity: 1;
}

.hero-text {
    position: absolute;
    bottom: 60px;
    width: 100%;
    text-align: center;
    color: #fff;
    text-shadow: 0 0 10px #000;
}

.hero-text h1 {
    font-size: 3.5rem;
    font-weight: 900;
    color: #ff2a2a;
}

.hero-text p {
    font-size: 2rem;
    font-weight: 600;
}

.btn-book {
    display: inline-block;
    background: #ff2a2a;
    color: #fff;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 600;
    margin-top: 15px;
    text-decoration: none;
    transition: 0.3s;
}

.btn-book:hover {
    background: #cc1a1a;
}

/* lingkaran navigasi slider */
.slider-dots {
    position: absolute;
    bottom: 20px;
    width: 100%;
    text-align: center;
}

.slider-dots .dot {
    display: inline-block;
    width: 12px;
    height: 12px;
    margin: 0 5px;
    background: #aaa;
    border-radius: 50%;
    cursor: pointer;
    transition: 0.3s;
}

.slider-dots .dot.active {
    background: #ff2a2a;
    box-shadow: 0 0 10px red;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let current = 0;
    let autoSlide;

    function showSlide(index) {
        slides.forEach((s, i) => {
            s.classList.toggle('active', i === index);
            dots[i].classList.toggle('active', i === index);
        });
        current = index;
    }

    function nextSlide() {
        current = (current + 1) % slides.length;
        showSlide(current);
    }

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            clearInterval(autoSlide);
            showSlide(i);
            autoSlide = setInterval(nextSlide, 5000); // reset timer auto slide
        });
    });

    showSlide(current); // tampilkan slide pertama
    autoSlide = setInterval(nextSlide, 5000); // auto ganti tiap 5 detik
});
</script>

<section class="history-preview">
  <h2 class="section-title">Riwayat Servis Terbaru</h2>
  <div class="history-card">
    <table>
      <thead>
        <tr>
          <th>Nama Pelanggan</th>
          <th>Motor</th>
          <th>No. Polisi</th>
          <th>Keluhan</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($bookings as $booking)
        <tr>
          <td>{{ $booking->customer_name }}</td>
          <td>{{ $booking->motor }}</td>
          <td>{{ $booking->nopol }}</td>
          <td>{{ $booking->notes }}</td>
          <td>
            <span class="status {{ strtolower(str_replace(' ', '-', $booking->status)) }}">
              {{ $booking->status }}
            </span>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" style="text-align:center;">Belum ada riwayat booking.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</section>
{{-- === BAGIAN DUNIA BALAP SLIDER === --}}
<section class="racing-news" id="racingNews">
  <div class="news-left">
    <img id="newsImage" src="{{ asset('images/dunia_balap.jpg') }}" alt="Dunia Balap">
  </div>
  <div class="news-right">
    <h2 id="newsTitle">Berita Dunia Balap</h2>
    <p id="newsText">
      Dunia balap semakin panas tahun ini! Banyak pembalap nasional dan internasional menunjukkan performa luar biasa.
      Barokah Jaya Speed hadir mendukung dunia balap dengan servis presisi dan sparepart premium yang siap meningkatkan performa motor kamu di lintasan!
    </p>
    <a href="#" class="btn-red" id="newsLink">Baca Selengkapnya</a>

    <div class="news-dots">
      <span class="dot active" data-slide="0"></span>
      <span class="dot" data-slide="1"></span>
      <span class="dot" data-slide="2"></span>
    </div>
  </div>
</section>

<style>
.racing-news {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 60px 80px;
  gap: 50px;
  flex-wrap: wrap;
}

.news-left {
  flex: 1;
  display: flex;
  justify-content: center;
}

.news-left img {
  width: 100%;
  max-width: 650px;
  height: 400px;
  object-fit: cover;
  border-radius: 15px;
  box-shadow: 0 0 20px rgba(255, 0, 0, 0.3);
  transition: opacity 1s ease;
}

.news-right {
  flex: 1;
  color: #fff;
  position: relative;
  text-align: left;
}

.news-right h2 {
  color: #ff2a2a;
  font-size: 2rem;
  margin-bottom: 15px;
  text-shadow: 0 0 10px red;
}

.news-right p {
  color: #ccc;
  line-height: 1.6;
  font-size: 1.05rem;
  margin-bottom: 20px;
  transition: opacity 1s ease;
}

.news-dots {
  margin-top: 20px;
}

.news-dots .dot {
  display: inline-block;
  width: 12px;
  height: 12px;
  margin: 0 5px;
  background: #777;
  border-radius: 50%;
  cursor: pointer;
  transition: 0.3s;
}

.news-dots .dot.active {
  background: #ff2a2a;
  box-shadow: 0 0 10px red;
}

/* Responsif */
@media (max-width: 900px) {
  .racing-news {
    flex-direction: column;
    padding: 40px 20px;
    text-align: center;
  }
  .news-left img {
    width: 100%;
    max-width: 500px;
    height: auto;
  }
  .news-right {
    text-align: center;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const slides = [
    {
      img: "{{ asset('images/dunia_balap1.jpg') }}",
      title: " DRAG BIKE KEJURPROV BANTEN 2025 ROUND 2 SIAP PANASKAN KOTA SERANG, TOTAL HADIAH RATUSAN JUTA!",
      text: "18 Agustus 2025. Para pecinta balap motor tanah air kembali disuguhi tontonan bergengsi yang penuh adrenalin. Ajang Jawara Competition Drag Bike Kejurprov Banten 2025 Round 2 siap digelar pada 27–28 September 2025 mendatang di Sirkuit Non Permanen (NP) KP3B, Kota Serang, Banten.",
      link: "https://www.racingindonesia.com/jawara-competition-drag-bike-kejurprov-banten-2025-round-2-siap-panaskan-kota-serang-total-hadiah-ratusan-juta/"
    },
    {
      img: "{{ asset('images/dunia_balap2.jpg') }}",
      title: "Tekno Tuner vs Air Non",
      text: "NaikMotor – Balapan di trek lurus sepanjang 1000 meter dalam NGO Drag Race yang digelar  Minggu (25/12/2022) di area Sirkuit Chang Buriram Thailand disebut ajang bergengsi. Laga panas tersebut mempertemukan dua tim yakni dari Indonesia Tekno Tuner vs Air Non dari Thailand yang viral di media sosial karena ada kecurangan",
      link: "https://www.naikmotor.com/214083/duel-drag-tekno-tuner-vs-air-non-viral-di-media-sosial-karena-ada-kecurangan/"
    },
    {
      img: "{{ asset('images/dunia_balap3.jpg') }}",
      title: "Soal Kecurangan Drag di Thailand",
      text: "Adu balap di trek lurus akhir tahun yang diadakan di area Sirkuit Chang Buriram Thailand menjadi ajang duel tim Tekno Tuner HS Indonesia versus Air Non Thailand. Darius Sinathrya yang mengikuti perjalanan tim dari Indonesia tersebut memberikan komentar kerasnya soal kecurangan drag di Thailand itu",
      link: "https://www.naikmotor.com/214098/nyaris-ricuh-soal-kecurangan-drag-di-thailand-ini-kritik-darius-sinathrya/"
    }
  ];

  const img = document.getElementById('newsImage');
  const title = document.getElementById('newsTitle');
  const text = document.getElementById('newsText');
  const link = document.getElementById('newsLink');
  const dots = document.querySelectorAll('.news-dots .dot');
  let current = 0;
  let autoSlide;

  function showSlide(index) {
    img.style.opacity = 0;
    text.style.opacity = 0;

    setTimeout(() => {
      img.src = slides[index].img;
      title.textContent = slides[index].title;
      text.textContent = slides[index].text;
      link.href = slides[index].link;
      img.style.opacity = 1;
      text.style.opacity = 1;

      dots.forEach((d, i) => d.classList.toggle('active', i === index));
    }, 400);

    current = index;
  }

  function nextSlide() {
    current = (current + 1) % slides.length;
    showSlide(current);
  }

  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
      clearInterval(autoSlide);
      showSlide(i);
      autoSlide = setInterval(nextSlide, 6000);
    });
  });

  showSlide(current);
  autoSlide = setInterval(nextSlide, 6000);
});
</script>


<style>
/* === BERITA DUNIA BALAP === */
.racing-news {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 60px 80px;
  background: none;
  color: #fff;
}

.news-slider {
  position: relative;
  width: 100%;
  max-width: 1200px;
  overflow: hidden;
}

.news-slide {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 50px;
  flex-wrap: wrap;
  opacity: 0;
  transition: opacity 0.8s ease-in-out;
  position: absolute;
  top: 0; left: 0;
  width: 100%;
}

.news-slide.active {
  opacity: 1;
  position: relative;
}

.news-left img {
  width: 500px;
  height: 320px;
  object-fit: cover;
  border-radius: 10px;
  box-shadow: 0 0 25px rgba(255, 0, 0, 0.4);
}

.news-right {
  flex: 1;
  min-width: 300px;
}

.news-right h2 {
  color: #ff2a2a;
  font-size: 2rem;
  text-shadow: 0 0 10px red;
  margin-bottom: 10px;
}

.news-right p {
  color: #ccc;
  line-height: 1.6;
  margin-bottom: 20px;
}

.btn-red {
  background: #ff2a2a;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 25px;
  cursor: pointer;
  transition: 0.3s;
}
.btn-red:hover {
  background: #cc1a1a;
}

/* === DOT NAVIGASI === */
.news-dots {
  text-align: center;
  margin-top: 25px;
}
.news-dots .dot {
  display: inline-block;
  width: 12px;
  height: 12px;
  background: #777;
  border-radius: 50%;
  margin: 0 6px;
  cursor: pointer;
  transition: 0.3s;
}
.news-dots .dot.active {
  background: #ff2a2a;
  box-shadow: 0 0 10px red;
}

/* === FADE IN ANIMASI SAAT SCROLL === */
.fade-section {
  opacity: 0;
  transform: translateY(40px);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}
.fade-section.show {
  opacity: 1;
  transform: translateY(0);
}

@media (max-width: 900px) {
  .racing-news {
    padding: 40px 20px;
  }
  .news-left img {
    width: 100%;
    height: auto;
  }
  .news-right {
    text-align: center;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const slides = document.querySelectorAll('.news-slide');
  const dots = document.querySelectorAll('.news-dots .dot');
  let current = 0;
  let interval;

  function showSlide(index) {
    slides.forEach((s, i) => s.classList.toggle('active', i === index));
    dots.forEach((d, i) => d.classList.toggle('active', i === index));
    current = index;
  }

  function nextSlide() {
    current = (current + 1) % slides.length;
    showSlide(current);
  }

  // Klik dot
  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
      clearInterval(interval);
      showSlide(i);
      interval = setInterval(nextSlide, 6000);
    });
  });

  // Auto slide
  showSlide(current);
  interval = setInterval(nextSlide, 6000);

  // Fade saat scroll
  const fade = document.querySelector('.fade-section');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) e.target.classList.add('show');
    });
  }, { threshold: 0.2 });
  observer.observe(fade);
});
</script>


{{-- === BAGIAN SPAREPART === --}}
<section class="spare-section">
  <h3 class="section-title">Sparepart</h3>
  <div class="grid-container">
    <div class="spare-card">
      <img src="{{ asset('images/sparepart1.jpg') }}" alt="Kampas Rem Racing">
      <h4>Kampas Rem Racing</h4>
      <p>Rp 150.000</p>
      <button class="btn-red">Detail</button>
    </div>
    <div class="spare-card">
      <img src="{{ asset('images/sparepart2.jpg') }}" alt="Oli Racing Motul">
      <h4>Oli Racing Motul</h4>
      <p>Rp 300.000</p>
      <button class="btn-red">Detail</button>
    </div>
    <div class="spare-card">
      <img src="{{ asset('images/sparepart3.jpg') }}" alt="Knalpot R9 Titanium">
      <h4>Knalpot R9 Titanium</h4>
      <p>Rp 750.000</p>
      <button class="btn-red">Detail</button>
    </div>
    <div class="spare-card">
      <img src="{{ asset('images/sparepart4.jpg') }}" alt="Busi Iridium NGK">
      <h4>Busi Iridium NGK</h4>
      <p>Rp 180.000</p>
      <button class="btn-red">Detail</button>
    </div>
    <div class="spare-card">
      <img src="{{ asset('images/sparepart5.jpg') }}" alt="Gear Set SSS">
      <h4>Gear Set SSS</h4>
      <p>Rp 400.000</p>
      <button class="btn-red">Detail</button>
    </div>
  </div>
</section>

{{-- === BAGIAN INFORMASI BENGKEL === --}}
<footer class="footer-info">
  <h3>Barokah Jaya Speed</h3>
  <p>Jl. Raya Sirkuit No. 88, Jakarta Selatan</p>
  <p>Telp: 0812-3456-7890</p>
</footer>

<style>
/* ===== DUNIA BALAP ===== */
.racing-news {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  padding: 40px 60px;
  gap: 30px;
}
.news-left img {
  width: 480px;
  height: 300px;
  object-fit: cover;
  border-radius: 15px;
  box-shadow: 0 0 20px rgba(255, 0, 0, 0.3);
}
.news-right {
  flex: 1;
  min-width: 300px;
  color: #fff;
}
.news-right h2 {
  color: #ff2a2a;
  font-size: 1.8rem;
  margin-bottom: 15px;
  text-shadow: 0 0 10px red;
}
.news-right p {
  color: #ccc;
  line-height: 1.6;
  margin-bottom: 20px;
}

/* ===== SPAREPART ===== */
.section-title {
  text-align: left;
  margin-left: 100px;
  color: #ff2a2a;
  font-size: 3rem;
  font-weight: bold;
  text-shadow: 0 0 15px red;
  margin-bottom: 30px;
}
.grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 25px;
  padding: 20px 40px;
}
.spare-card {
  background: #111;
  border: 1px solid #ff2a2a;
  border-radius: 15px;
  box-shadow: 0 0 20px rgba(255, 0, 0, 0.2);
  text-align: center;
  padding: 20px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.spare-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 0 25px rgba(255, 0, 0, 0.4);
}
.spare-card img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 10px;
  margin-bottom: 15px;
}
.spare-card h4 {
  color: #fff;
  margin-bottom: 8px;
  font-weight: 600;
}
.spare-card p {
  color: #ccc;
  margin-bottom: 15px;
}
.btn-red {
  background: #ff2a2a;
  color: #fff;
  border: none;
  padding: 8px 18px;
  border-radius: 20px;
  cursor: pointer;
  transition: 0.3s;
}
.btn-red:hover {
  background: #cc1a1a;
}

/* ===== INFO BENGKEL ===== */
.footer-info {
  text-align: left;
  
  background: #111;
  color: #fff;
  padding: 25px 10px;
  margin-top: 40px;
  border-top: 1px solid #ff2a2a;
}
.footer-info h3 {
  color: #ff2a2a;
  text-shadow: 0 0 10px red;
}
</style>

@endsection
