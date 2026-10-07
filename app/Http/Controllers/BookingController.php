<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with([
            'room',
            'customer',
        ])
            ->latest()
            ->paginate(10);

        return view('layouts.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'available')
            ->orderBy('room_number')
            ->get();

        $customers = Customer::orderBy('name')->get();

        return view('layouts.bookings.create', compact(
            'rooms',
            'customers'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => [
                'required',
                'exists:customers,id',
            ],

            'room_id' => [
                'required',
                'exists:rooms,id',
            ],

            'check_in' => [
                'required',
                'date',
            ],

            'check_out' => [
                'required',
                'date',
                'after:check_in',
            ],

            'guests' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        $room = Room::findOrFail($validated['room_id']);

        if ($validated['guests'] > $room->capacity) {
            return back()
                ->withInput()
                ->withErrors([
                    'guests' => 'This room can accommodate a maximum of ' .
                        $room->capacity . ' guests.',
                ]);
        }

        $overlap = Booking::where('room_id', $room->id)
            ->whereIn('status', [
                'pending',
                'confirmed',
                'checked_in',
            ])
            ->where(function ($query) use ($validated) {
                $query->where(
                    'check_in',
                    '<',
                    $validated['check_out']
                )->where(
                    'check_out',
                    '>',
                    $validated['check_in']
                );
            })
            ->exists();

        if ($overlap) {
            return back()
                ->withInput()
                ->withErrors([
                    'room_id' => 'This room is already booked for the selected dates.',
                ]);
        }

        $checkIn = \Carbon\Carbon::parse(
            $validated['check_in']
        );

        $checkOut = \Carbon\Carbon::parse(
            $validated['check_out']
        );

        $nights = $checkIn->diffInDays($checkOut);

        $validated['total_amount'] =
            $nights * $room->price_per_night;

        $validated['status'] = 'pending';

        Booking::create($validated);

        return redirect()
            ->route('bookings.index')
            ->with(
                'success',
                'Your booking has been created successfully.'
            );
    }

    public function show(Booking $booking)
    {
        $booking->load([
            'room',
            'customer',
        ]);

        return view('layouts.bookings.show', compact('booking'));
    }

    public function updateStatus(
        Request $request,
        Booking $booking
    ) {
        $validated = $request->validate([
            'status' => [
                'required',
                'in:pending,confirmed,checked_in,checked_out,cancelled',
            ],
        ]);

        $booking->update([
            'status' => $validated['status'],
        ]);

        return back()->with(
            'success',
            'Booking status updated successfully.'
        );
    }
}
