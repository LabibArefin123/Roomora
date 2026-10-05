<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::query();

        if ($request->filled('type')) {
            $query->where('room_type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($query) use ($search) {
                $query->where('room_number', 'like', "%{$search}%")
                    ->orWhere('room_type', 'like', "%{$search}%");
            });
        }

        $rooms = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        $room->load([
            'bookings.customer',
        ]);

        return view('rooms.show', compact('room'));
    }
}
