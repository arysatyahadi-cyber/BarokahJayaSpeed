@extends('layouts.layout')

@section('content')
<style>
    body {
        background-color: #111;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    .booking-container {
        max-width: 1100px;
        margin: 40px auto;
        padding: 20px;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        border-bottom: 2px solid #444;
        padding-bottom: 5px;
    }

    .form-section {
        display: flex;
        justify-content: space-between;
        gap: 30px;
        margin-bottom: 30px;
    }

    .form-box {
        background: #1b1b1b;
        padding: 20px;
        border-radius: 10px;
        flex: 1;
        box-shadow: 0 0 10px rgba(255,255,255,0.05);
    }

    .form-box h3 {
        font-size: 1.1rem;
        margin-bottom: 15px;
        color: #f1f1f1;
        border-bottom: 1px solid #333;
        padding-bottom: 5px;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        background: #222;
        border: 1px solid #444;
        border-radius: 5px;
        color: #fff;
        font-size: 0.95rem;
    }

    input:focus, textarea:focus {
        outline: none;
        border-color: #ff2a2a;
    }

    .btn-save {
        background-color: #ff2a2a;
        color: #fff;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-save:hover {
        background-color: #ff0000;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: #1a1a1a;
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 10px;
        text-align: left;
    }

    th {
        background: #222;
        color: #ff2a2a;
        font-weight: 600;
    }

    tr:nth-child(even) {
        background: #181818;
    }

    .action-btn {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
        text-decoration: none;
    }

    .btn-edit {
        background-color: #ff2a2a;
        color: #fff;
    }

    .btn-edit:hover {
        background-color: #ff0000;
    }

    .btn-delete {
        background-color: #ef4444;
        color: #fff;
    }

    .btn-delete:hover {
        background-color: #dc2626;
    }

    .btn-nota {
        background-color: #00bfff;
        color: #fff;
    }

    .btn-nota:hover {
        background-color: #0095cc;
    }
</style>

<div class="booking-container">

    <h2 class="section-title">Form Booking</h2>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="form-section">
            <div class="form-box">
                <h3>Data Pelanggan</h3>
                <input type="text" name="customer_name" placeholder="Nama Pelanggan" required>
                <input type="text" name="phone" placeholder="No. Telp Aktif" required>
            </div>

            <div class="form-box">
                <h3>Data Kendaraan</h3>
                <input type="text" name="motor" placeholder="Nama Kendaraan" required>
                <input type="text" name="nopol" placeholder="No. Polisi" required>
                <textarea name="notes" rows="3" placeholder="Keluhan..."></textarea>
            </div>
        </div>

        <button type="submit" class="btn-save">Simpan Booking</button>
    </form>

    <h2 class="section-title" style="margin-top: 40px;">Daftar Booking</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kendaraan</th>
                <th>Nopol</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $index => $booking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $booking->customer_name }}</td>
                <td>{{ $booking->motor }}</td>
                <td>{{ $booking->nopol }}</td>
                <td>{{ $booking->status }}</td>
                <td>
                    <a href="{{ route('bookings.edit', $booking->id) }}" class="action-btn btn-edit">Edit</a>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="action-btn btn-delete" type="submit">Delete</button>
                    </form>
                    <a href="{{ route('nota.cetak', $booking->id) }}" class="action-btn btn-nota">Cetak Nota</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center; color:#999;">Belum ada data booking</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
