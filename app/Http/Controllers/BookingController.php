<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use PDF;
use Milon\Barcode\DNS1D;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('booking.booking', compact('bookings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'motor' => 'required|string|max:255',
            'nopol' => 'required|string|max:20',
            'notes' => 'nullable|string',
        ]);

        Booking::create([
            ...$validated,
            'status' => 'Diterima',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil disimpan!');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'motor' => 'required|string|max:255',
            'nopol' => 'required|string|max:20',
            'notes' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($validated);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus!');
    }

    public function history()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return view('booking.history', compact('bookings'));
    }

    public function updateStatus($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Selesai';
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Status diperbarui!');
    }

    public function printNota($id)
    {
        $booking = Booking::findOrFail($id);

        // Buat barcode berdasarkan ID Booking
        $barcode = (new DNS1D)->getBarcodePNG($booking->id, 'C128');

        // Buat PDF A4 full halaman
        $pdf = PDF::loadView('booking.nota', compact('booking', 'barcode'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('Nota_Servis_' . $booking->customer_name . '.pdf');
    }
}
