@extends('layouts.layout')

@section('title', 'Sparepart | Barokah Jaya Speed')

@section('content')
<h2 class="section-title">Sparepart Premium</h2>

<div class="grid-container">
  <!-- Sparepart 1 -->
  <div class="spare-card">
    <img src="{{ asset('images/sparepart1.jpg') }}" alt="Noken BRT S2 AEROX">
    <h4>Noken BRT S2 AEROX</h4>
    <p>Rp 600.000</p>
    <button class="btn-red">Detail</button>
  </div>

  <!-- Sparepart 2 -->
  <div class="spare-card">
    <img src="{{ asset('images/sparepart2.jpg') }}" alt="Noken BRT T2 AEROX">
    <h4>Noken BRT T2 AEROX</h4>
    <p>Rp 750.000</p>
    <button class="btn-red">Detail</button>
  </div>

  <!-- Sparepart 3 -->
  <div class="spare-card">
    <img src="{{ asset('images/sparepart3.jpg') }}" alt="Noken BRT R2 AEROX">
    <h4>Noken BRT R2 AEROX</h4>
    <p>Rp 850.000</p>
    <button class="btn-red">Detail</button>
  </div>

  <!-- Sparepart 4 -->
  <div class="spare-card">
    <img src="{{ asset('images/sparepart4.jpg') }}" alt="Aki Motor Yuasa">
    <h4>Aki Motor Yuasa</h4>
    <p>Rp 600.000</p>
    <button class="btn-red">Detail</button>
  </div>

  <!-- Sparepart 5 -->
  <div class="spare-card">
    <img src="{{ asset('images/sparepart5.jpg') }}" alt="Knalpot Racing R9">
    <h4>Knalpot Racing R9</h4>
    <p>Rp 850.000</p>
    <button class="btn-red">Detail</button>
  </div>
</div>

<style>
.section-title {
  text-align: center;
  color: #ff2a2a;
  font-size: 2rem;
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
  border-radius: 25px;
  padding: 8px 18px;
  cursor: pointer;
  font-weight: 600;
  transition: 0.3s;
}

.btn-red:hover {
  background: #cc1a1a;
}
</style>
@endsection
