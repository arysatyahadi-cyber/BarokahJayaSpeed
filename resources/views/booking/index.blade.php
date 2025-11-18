@extends('layouts.app')

@section('title', 'Booking')

@section('content')
<style>
    body {
        background-color: #0d0d0d;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 60px auto;
    }

    .card-box {
        background: #111;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(255, 0, 0, 0.1);
        flex: 1;
        transition: all 0.3s;
    }

    .card-box:hover {
        box-shadow: 0 0 30px rgba(255, 0, 0, 0.2);
    }

    .form-control {
        background: #1a1a1a;
        color: #fff;
        border: 1px solid #333;
        border-radius: 10px;
        padding: 10px;
        width: 100%;
        margin-bottom: 15px;
    }

    .form-control:focus {
        outline: none;
        border-color: #ff0000;
        box-shadow: 0 0 5px #ff0000;
    }

    .btn-main {
        background: linear-gradient(90deg, #ff0000, #ff4d00);
        border: none;
        color: white;
        padding: 10px 25px;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-main:hover {
        transform: scale(1.05);
        background: linear-gradient(90deg, #ff4d00, #ff0000);
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.4);
    }

    .btn-action {
        border: none;
        border-radius: 10px;
        padding: 8px 16px;
        color: white;
        cursor: pointer;
        font-weight: 600;
        letter-spacing: 0.3px;
        transition: all 0.3s ease;
        display: inline-block;
        margin: 3px;
    }

    .btn-edit {
        background: linear-gradient(45deg, #ff6a00, #ff0000);
        box-shadow: 0 0 10px rgba(255, 77, 0, 0.3);
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 0 20px rgba(255, 77, 0, 0.6);
    }

    .btn-delete {
        background: transparent;
        border: 2px solid #ff0000;
        color: #ff4d4d;
        box-shadow: 0 0 5px rgba(255, 0, 0, 0.3);
    }

    .btn-delete:hover {
        background: #ff0000;
        color: #fff;
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(255, 0, 0, 0.6);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #111;
        border-radius: 12px;
        overflow: hidden;
    }

    thead {
        background: linear-gradient(90deg, #ff0000, #660000);
        color: #fff;
    }

    th, td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #222;
    }

    tr:hover {
        background: #1a1a1a;
    }

    .booking-form {
        display: flex;
        gap: 40px;
        margin-bottom: 40px;
    }

    /* Modal */
    #editModal {
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0,0,0,0.7);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: #111;
        padding: 25px;
        border-radius: 12px;
        width: 400px;
        box-shadow: 0 0 15px rgba(255,0,0,0.2);
        text-align: center;
    }

    .modal-content h4 {
        margin-bottom: 15px;
        color: #ff4d4d;
    }
</style>

<div class="container">
    <h2 style="text-align:center; margin-bottom:30px;">Form Booking</h2>

    {{-- FORM TAMBAH BOOKING --}}
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <div class="booking-form">
            <div class="card-box">
                <h4>Pelanggan</h4>
                <input type="text" name="customer_name" class="form-control" placeholder="Nama Pelanggan" required>
                <input type="text" name="phone" class="form-control" placeholder="No. Telp Aktif" required>
            </div>

            <div class="card-box">
                <h4>Kendaraan</h4>
                <input type="text" name="motor" class="form-control" placeholder="Nama Kendaraan" required>
                <input type="text" name="nopol" class="form-control" placeholder="No. Polisi" required>
                <textarea name="notes" class="form-control" rows="3" placeholder="Keluhan..."></textarea>
            </div>
        </div>

        <div style="text-align:center;">
            <button type="submit" class="btn-main">🚗 Simpan Booking</button>
        </div>
    </form>

    <hr style="margin:50px 0; border-color:#333;">

    {{-- DAFTAR BOOKING --}}
    <h2 style="text-align:center; margin-bottom:20px;">Daftar Booking</h2>
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kendaraan</th>
                    <th>Nopol</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->motor }}</td>
                    <td>{{ $booking->nopol }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>
                        <button type="button" class="btn-action btn-edit" onclick="openEditModal({{ $booking->id }}, '{{ $booking->status }}')">⚙ Edit</button>
                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Yakin hapus booking ini?')">🗑 Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="color:#999;">Belum ada data booking</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- MODAL EDIT STATUS --}}
<div id="editModal">
    <div class="modal-content">
        <h4>Edit Status Booking</h4>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <select name="status" id="statusSelect" class="form-control">
                <option value="DI Terima">DI Terima</option>
                <option value="On Proses">On Proses</option>
                <option value="Finish">Finish</option>
            </select>
            <div style="margin-top:20px;">
                <button type="button" class="btn-action btn-delete" onclick="closeEditModal()">Batal</button>
                <button type="submit" class="btn-main">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, status) {
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('statusSelect').value = status;
        document.getElementById('editForm').action = '/booking/' + id;
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }
</script>
@endsection
@foreach ($bookings as $b)
<tr>
  <td>{{ $b->nama }}</td>
  <td>{{ $b->motor }}</td>
  <td>{{ ucfirst($b->status) }}</td>
  <td>
    @if ($b->status == 'selesai')
      <a href="{{ route('booking.printNota', $b->id) }}" class="btn btn-danger btn-sm" target="_blank">
        🧾 Cetak Nota
      </a>
    @else
      <span class="text-muted">Belum Selesai</span>
    @endif
  </td>
</tr>
@endforeach

