<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Servis - {{ $booking->customer_name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #000;
        }
        h1, h2, h3 {
            text-align: center;
            margin: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .info {
            margin-bottom: 30px;
        }
        .info table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        .info td {
            padding: 5px 0;
        }
        .barcode {
            text-align: right;
            margin-top: -20px;
        }
        .footer {
            position: fixed;
            bottom: 50px;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }
        .sign {
            text-align: right;
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bengkel Racing Motor</h1>
        <h3>Nota Servis</h3>
        <p>Jl. Mekanik No. 45 - Telp: 0812-3456-7890</p>
    </div>

    <div class="barcode">
        <img src="data:image/png;base64,{{ $barcode }}" width="200">
    </div>

    <div class="info">
        <table>
            <tr><td><strong>No. Nota</strong></td><td>: {{ $booking->id }}</td></tr>
            <tr><td><strong>Nama Pelanggan</strong></td><td>: {{ $booking->customer_name }}</td></tr>
            <tr><td><strong>No. Telp</strong></td><td>: {{ $booking->phone }}</td></tr>
            <tr><td><strong>Motor</strong></td><td>: {{ $booking->motor }}</td></tr>
            <tr><td><strong>No. Polisi</strong></td><td>: {{ $booking->nopol }}</td></tr>
            <tr><td><strong>Status</strong></td><td>: {{ $booking->status }}</td></tr>
            <tr><td><strong>Tanggal Servis</strong></td><td>: {{ $booking->created_at->format('d/m/Y H:i') }}</td></tr>
        </table>
    </div>

    <h3>Keluhan / Catatan:</h3>
    <p>{{ $booking->notes ?? '-' }}</p>

    <div class="sign">
        <p>_______________________</p>
        <p><strong>Teknisi</strong></p>
    </div>

    <div class="footer">
        <p>Terima kasih telah mempercayakan servis motor Anda kepada kami.</p>
        <p>Dicetak pada: {{ now()->format('d/m/Y H:i') }}</p>
    </div>
</body>
</html>
