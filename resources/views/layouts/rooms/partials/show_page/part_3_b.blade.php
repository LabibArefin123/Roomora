<div class="room-show-section">
    <h3>
        <i class="fas fa-circle-info"></i>
        Room Information
    </h3>

    <div class="room-show-info-grid">
        <div class="room-show-info-item">
            <span>Room Number</span>
            <strong>{{ $room->room_number }}</strong>
        </div>

        <div class="room-show-info-item">
            <span>Room Type</span>
            <strong>{{ $room->room_type }}</strong>
        </div>

        <div class="room-show-info-item">
            <span>Floor</span>
            <strong>{{ $room->floor !== null ? $room->floor : 'Not specified' }}</strong>
        </div>

        <div class="room-show-info-item">
            <span>Guest Capacity</span>
            <strong>
                <i class="fas fa-users"></i>
                {{ $room->capacity }} {{ $room->capacity === 1 ? 'Guest' : 'Guests' }}
            </strong>
        </div>

        <div class="room-show-info-item">
            <span>Room Status</span>
            <strong>{{ ucfirst(str_replace('_', ' ', $room->status)) }}</strong>
        </div>

        <div class="room-show-info-item">
            <span>Nightly Rate</span>
            <strong>৳{{ number_format($room->price_per_night, 2) }}</strong>
        </div>
    </div>
</div>
