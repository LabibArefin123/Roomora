<div class="home-section-header">
    <div>
        <span>Room Collection</span>
        <h2>Available Rooms</h2>
    </div>

    <a href="{{ route('rooms.index') }}">
        View all
        <i class="fas fa-arrow-right"></i>
    </a>
</div>

@if ($rooms->count())
    <div class="home-room-list">
        @foreach ($rooms as $room)
            <a href="{{ route('rooms.show', $room) }}" class="home-room-card">
                <div class="home-room-image">
                    <i class="fas fa-hotel"></i>
                </div>

                <div class="home-room-info">
                    <div class="home-room-title">
                        <h3>Room {{ $room->room_number }}</h3>
                        <span class="room-status available">
                            Available
                        </span>
                    </div>

                    <p>{{ $room->room_type }}</p>

                    <div class="home-room-meta">
                        <span>
                            <i class="fas fa-users"></i>
                            {{ $room->capacity }} Guests
                        </span>

                        <strong>
                            ৳{{ number_format($room->price_per_night, 2) }}
                            <small>/ night</small>
                        </strong>
                    </div>
                </div>

                <i class="fas fa-chevron-right home-room-arrow"></i>
            </a>
        @endforeach
    </div>
@else
    <div class="home-empty-state">
        <div>
            <i class="fas fa-bed"></i>
        </div>
        <h3>No rooms available</h3>
        <p>There are currently no rooms ready for booking.</p>
        <a href="{{ route('rooms.index') }}">
            Explore Rooms
        </a>
    </div>
@endif
