<div class="rooms-result-header">
    <div>
        <span>ROOMS</span>
        <h2>{{ $rooms->total() }} Available Options</h2>
    </div>

    @if (request()->hasAny(['search', 'type', 'status']))
        <a href="{{ route('rooms.index') }}" class="rooms-reset-btn">
            <i class="fas fa-rotate-left"></i>
            Reset
        </a>
    @endif
</div>

@if ($rooms->count())
    <div class="rooms-grid">
        @foreach ($rooms as $room)
            <article class="room-card">
                <a href="{{ route('rooms.show', $room) }}" class="room-card-image">
                    <div class="room-image-icon"><i class="fas fa-bed"></i> </div>
                    <span class="room-card-status {{ $room->status }}">
                        {{ ucfirst($room->status) }}
                    </span>
                </a>

                <div class="room-card-body">
                    <div class="room-card-heading">
                        <div>
                            <span class="room-number"> ROOM {{ $room->room_number }} </span>

                            <h3>{{ $room->room_type }}</h3>
                        </div>

                        <div class="room-price">
                            <strong>
                                ৳{{ number_format($room->price_per_night, 2) }}
                            </strong>
                            <small>/ night</small>
                        </div>
                    </div>

                    <div class="room-details">

                        <span>
                            <i class="fas fa-users"></i>
                            {{ $room->capacity }} Guests
                        </span>

                        @if ($room->floor)
                            <span>
                                <i class="fas fa-building"></i>
                                Floor {{ $room->floor }}
                            </span>
                        @endif

                    </div>

                    @if ($room->description)
                        <p class="room-description">
                            {{ Str::limit($room->description, 100) }}
                        </p>
                    @endif

                    <div class="room-card-actions">
                        <a href="{{ route('rooms.show', $room) }}" class="room-view-btn">
                            View Room
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        @if ($room->status === 'available')
                            <a href="{{ route('bookings.create', ['room_id' => $room->id]) }}" class="room-book-btn">
                                <i class="fas fa-calendar-plus"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    @if ($rooms->hasPages())
        <div class="rooms-pagination">
            {{ $rooms->links() }}
        </div>
    @endif
@else
    <div class="rooms-empty">
        <div class="rooms-empty-icon"> <i class="fas fa-bed"></i> </div>
        <h2>No rooms found</h2>

        <p>We couldn't find any rooms matching your search. Try changing your filters. </p>

        <a href="{{ route('rooms.index') }}">
            <i class="fas fa-rotate-left"></i>
            Clear Filters
        </a>
    </div>
@endif
