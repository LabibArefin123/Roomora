<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


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
        $user = auth()->user();

        return view('layouts.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'address' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        if ($request->hasFile('profile_photo')) {
            $photo = $request->file('profile_photo');

            $photoName = time() . '_' . $user->id . '.' .
                $photo->getClientOriginalExtension();

            $photo->move(
                public_path('uploads/profile'),
                $photoName
            );

            $validated['profile_photo'] =
                'uploads/profile/' . $photoName;
        }

        $user->update($validated);

        return redirect()
            ->route('profile')
            ->with(
                'success',
                'Your profile has been updated successfully.'
            );
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        auth()->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with(
            'success',
            'Your password has been updated successfully.'
        );
    }
}
