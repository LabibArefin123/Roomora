<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;

class ProfileController extends Controller
{
    public function index()
    {
        $totalBookings = Booking::count();

        $activeBookings = Booking::whereIn('status', [
            'confirmed',
            'checked_in',
        ])->count();

        $completedBookings = Booking::where(
            'status',
            'checked_out'
        )->count();

        $cancelledBookings = Booking::where(
            'status',
            'cancelled'
        )->count();

        $availableRooms = Room::where(
            'status',
            'available'
        )->count();

        $customerCount = Customer::count();

        $totalSpent = Booking::whereIn('status', [
            'confirmed',
            'checked_in',
            'checked_out',
        ])->sum('total_amount');

        $recentBookings = Booking::with([
            'room',
            'customer',
        ])
            ->latest()
            ->take(5)
            ->get();

        $currentYear = now()->year;

        return view('layouts.profile.index', compact(
            'totalBookings',
            'activeBookings',
            'completedBookings',
            'cancelledBookings',
            'availableRooms',
            'customerCount',
            'totalSpent',
            'recentBookings',
            'currentYear'
        ));
    }

    public function edit()
    {
        return view('layouts.profile.edit');
    }

    public function update()
    {
        return back()->with(
            'success',
            'Profile information updated successfully.'
        );
    }
}
