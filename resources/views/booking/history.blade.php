@extends('layouts.layout')

@section('content')
<style>
    body {
        background-color: #0c0c0c;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    .history-container {
        max-width: 1000px;
        margin: 50px auto;
        background: #111;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.2);
        padding: 30px;
    }

    h2 {
        text-align: center;
        font-weight: 700;
        color: #ff2a2a;
        text-shadow: 0 0 10px red;
        margin-bottom: 25px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        color: #fff;
    }

    th, td {
        padding: 12px 10px;
        border-bottom: 1px solid #2a2a2a;
        text-align: left;
    }

    th {
        background-color: #141414;
        color: #ff3b3b;
        font-weight: 600;
        text-shadow: 0 0 8px rgba(255, 0, 0, 0.3);
    }

    tr:nth-child(even) {
        background-color: #161616;
    }

    tr:hover {
        background-color: #1f1f1f;
        transition: 0.3s;
    }

    td {
        font-size: 0.95rem;
    }

    .empty {
        text-align: center;
        color: #777;
        padding: 20px;
    }
</style>

<div class="history-container">
    <h2>History Booking Terbaru</h2>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>No. Telp</th>
                <th>Motor</th>
                <th>No. Polisi</th>
                <th>Keluhan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->phone ?? '-' }}</td>
                    <td>{{ $booking->motor }}</td>
                    <td>{{ $booking->nopol }}</td>
                    <td>{{ $booking->notes ?? '-' }}</td>
                    <td>{{ $booking->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="empty">Belum ada data booking.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
