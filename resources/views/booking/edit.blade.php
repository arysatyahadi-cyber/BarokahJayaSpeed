@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #111;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    .edit-container {
        max-width: 600px;
        margin: 40px auto;
        background: #1b1b1b;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(255,255,255,0.05);
    }

    h2 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 20px;
        border-bottom: 2px solid #444;
        padding-bottom: 8px;
    }

    input, textarea, select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        background: #222;
        border: 1px solid #444;
        border-radius: 5px;
        color: #fff;
        font-size: 0.95rem;
    }

    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: #ff2a2a;
    }

    .btn-update {
        background-color: #ff2a2a;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-update:hover {
        background-color: #ff2a2a;
    }

    .btn-back {
        background-color: #444;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        margin-left: 10px;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-back:hover {
        background-color: #666;
    }
</style>

<div class="edit-container">
    <h2>Edit Data Booking</h2>

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="customer_name" value="{{ $booking->customer_name }}" placeholder="Nama Pelanggan" required>
        <input type="text" name="phone" value="{{ $booking->phone }}" placeholder="No. Telp Aktif" required>
        <input type="text" name="motor" value="{{ $booking->motor }}" placeholder="Nama Kendaraan" required>
        <input type="text" name="nopol" value="{{ $booking->nopol }}" placeholder="No. Polisi" required>
        <textarea name="notes" rows="3" placeholder="Keluhan...">{{ $booking->notes }}</textarea>

        <select name="status" required>
            <option value="Diterima" {{ $booking->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="Proses" {{ $booking->status == 'Proses' ? 'selected' : '' }}>Proses</option>
            <option value="Selesai" {{ $booking->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
        </select>

        <button type="submit" class="btn-update">Update Booking</button>
        <a href="{{ route('bookings.index') }}" class="btn-back">Kembali</a>
    </form>
</div>
@endsection
