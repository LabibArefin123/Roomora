<div class="room-show-actions">
    <a href="{{ route('rooms.edit', $room) }}" class="room-show-edit-btn">
        <i class="fas fa-pen-to-square"></i>
        Edit Room
    </a>

    @if ($room->status === 'available')
        <a href="{{ route('bookings.create', ['room_id' => $room->id]) }}" class="room-show-book-btn">
            <i class="fas fa-calendar-plus"></i>
            Create Booking
        </a>
    @endif

    <a href="{{ route('rooms.index') }}" class="room-show-cancel-btn">
        Back to List
    </a>
</div>
