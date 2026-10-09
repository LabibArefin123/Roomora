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
        $profile = auth()->user();

        return view('layouts.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = auth()->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($profile->id),
            ],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:1000'],
            'profile_picture' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:6143',
            ],
        ]);

        if ($request->hasFile('profile_picture')) {
            $photo = $request->file('profile_picture');

            if (!$photo->isValid()) {
                $message = 'The image upload failed. Please select the image again.';

                if ($request->expectsJson()) {
                    return response()->json(['message' => $message], 422);
                }

                return back()->withErrors([
                    'profile_picture' => $message,
                ])->withInput();
            }

            $uploadPath = public_path('uploads/profile');

            if (!is_dir($uploadPath) && !mkdir($uploadPath, 0755, true) && !is_dir($uploadPath)) {
                $message = 'The profile image folder could not be created. Check folder permissions.';

                if ($request->expectsJson()) {
                    return response()->json(['message' => $message], 500);
                }

                return back()->withErrors([
                    'profile_picture' => $message,
                ])->withInput();
            }

            $extension = strtolower($photo->extension());
            $photoName = 'profile_' . $profile->id . '_' . uniqid() . '.' . $extension;

            try {
                $photo->move($uploadPath, $photoName);
            } catch (\Throwable $exception) {
                report($exception);

                $message = 'The image could not be saved. Check write permissions for public/uploads/profile.';

                if ($request->expectsJson()) {
                    return response()->json(['message' => $message], 500);
                }

                return back()->withErrors([
                    'profile_picture' => $message,
                ])->withInput();
            }

            $validated['profile_picture'] = 'uploads/profile/' . $photoName;
        }

        $profile->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Your profile has been updated successfully.',
                'redirect' => route('profiles.index'),
            ]);
        }

        return redirect()
            ->route('profiles.index')
            ->with('success', 'Your profile has been updated successfully.');
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
