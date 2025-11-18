<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NotaController;

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman statis
Route::view('/sparepart', 'sparepart');
Route::view('/hitung-cc', 'hitung-cc');

// CRUD Booking (pakai resource)
Route::resource('bookings', BookingController::class);

// ✅ Route tambahan untuk tombol "Booking Sekarang"
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

// History Booking
Route::get('/history', [BookingController::class, 'history'])->name('bookings.history');

// Update Status Booking
Route::put('/bookings/{id}/update-status', [BookingController::class, 'updateStatus'])
    ->name('bookings.updateStatus');

// Cetak Nota Booking
Route::get('/bookings/{id}/print-nota', [BookingController::class, 'printNota'])
    ->name('bookings.printNota');

// Cetak Nota (PDF)
Route::get('/nota/{id}', [NotaController::class, 'cetakNota'])->name('nota.cetak');
