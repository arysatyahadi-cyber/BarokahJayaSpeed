<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use PDF;

class NotaController extends Controller
{
    public function cetakNota($id)
    {
        $booking = Booking::findOrFail($id);

        // Buat barcode sederhana berbentuk QR (tanpa ekstensi tambahan)
        $barcodeData = 'BOOKING-' . $booking->id . '-' . strtoupper(substr($booking->customer_name, 0, 5));
        $barcode = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($barcodeData);

        // Buat PDF (A4 full)
        $pdf = PDF::loadView('booking.nota', compact('booking', 'barcode'))
            ->setPaper('A4', 'portrait');

        $filename = 'Nota_Servis_' . preg_replace('/\s+/', '_', $booking->customer_name) . '_' . $booking->id . '.pdf';
        return $pdf->download($filename);
    }
}
