@extends('layouts.layout')

@section('content')
<style>
    body {
        background-color: #111;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    .cc-container {
        max-width: 600px;
        margin: 60px auto;
        padding: 30px;
        background: #1b1b1b;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 191, 255, 0.1);
    }

    h2 {
        text-align: center;
        color: #ff2a2a;
        font-weight: 700;
        margin-bottom: 25px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #ddd;
        font-weight: 600;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #444;
        border-radius: 8px;
        background: #222;
        color: #fff;
        font-size: 1rem;
    }

    input:focus {
        outline: none;
        border-color: #ff2a2a;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #ff2a2a;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        font-size: 1rem;
        transition: 0.2s;
    }

    button:hover {
        background: #ff2a2a;
    }

    .result {
        text-align: center;
        margin-top: 20px;
        font-size: 1.3rem;
        font-weight: 600;
        color: #00ff9d;
    }

    .unit-note {
        color: #888;
        font-size: 0.9rem;
        text-align: center;
    }
</style>

<div class="cc-container">
    <h2>Hitung Kapasitas Mesin (CC)</h2>

    <form id="ccForm">
        <div class="form-group">
            <label for="bore">Diameter Silinder (Bore) - mm</label>
            <input type="number" id="bore" placeholder="Contoh: 57" required>
        </div>

        <div class="form-group">
            <label for="stroke">Langkah Torak (Stroke) - mm</label>
            <input type="number" id="stroke" placeholder="Contoh: 48.8" required>
        </div>

        <div class="form-group">
            <label for="cylinder">Jumlah Silinder</label>
            <input type="number" id="cylinder" value="1" min="1" required>
        </div>

        <button type="submit">Hitung Sekarang</button>
    </form>

    <div class="result" id="result"></div>
    <p class="unit-note">*Rumus: (π/4) × Bore² × Stroke × Jumlah Silinder ÷ 1000</p>
</div>

<script>
    document.getElementById('ccForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const bore = parseFloat(document.getElementById('bore').value);
        const stroke = parseFloat(document.getElementById('stroke').value);
        const cylinder = parseInt(document.getElementById('cylinder').value);
        const cc = ((Math.PI / 4) * (bore ** 2) * stroke * cylinder) / 1000;

        document.getElementById('result').innerText =
            'Kapasitas Mesin: ' + cc.toFixed(2) + ' cc';
    });
</script>
@endsection
