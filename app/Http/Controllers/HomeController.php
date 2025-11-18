<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class HomeController extends Controller
{
    public function index()
{
    $bookings = \App\Models\Booking::orderBy('id', 'desc')->take(5)->get();
    return view('home', compact('bookings'));
}
}
