<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        return view('layouts.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('layouts.rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => ['required', 'string', 'max:20', 'unique:rooms,room_number'],
            'room_type' => ['required', 'string', 'max:100'],
            'floor' => ['nullable', 'integer', 'min:0'],
            'capacity' => ['required', 'integer', 'min:1'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'status' => ['required', Rule::in(['available', 'occupied', 'maintenance', 'inactive'])],
            'description' => ['nullable', 'string'],
        ]);

        Room::create($validated);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        return view('layouts.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'room_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('rooms', 'room_number')->ignore($room->id),
            ],
            'room_type' => ['required', 'string', 'max:100'],
            'floor' => ['nullable', 'integer', 'min:0'],
            'capacity' => ['required', 'integer', 'min:1'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'status' => ['required', Rule::in(['available', 'occupied', 'maintenance', 'inactive'])],
            'description' => ['nullable', 'string'],
        ]);

        $room->update($validated);

        return redirect()
            ->route('rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    public function show(Room $room)
    {
        $room->load([
            'bookings.customer',
        ]);

        return view('layouts.rooms.show', compact('room'));
    }
}
