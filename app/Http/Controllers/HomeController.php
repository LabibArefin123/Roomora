<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
        $availableRooms = Room::where('status', 'available')->count();

        $activeBookings = Booking::whereIn('status', [
            'confirmed',
            'checked_in',
        ])->count();

        $rooms = Room::where('status', 'available')
            ->latest()
            ->take(6)
            ->get();

        $recentBookings = Booking::with([
            'room',
            'customer',
        ])
            ->latest()
            ->take(5)
            ->get();

        return view('layouts.home.index', compact(
            'availableRooms',
            'activeBookings',
            'rooms',
            'recentBookings'
        ));
    }
}
