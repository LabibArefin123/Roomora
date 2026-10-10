<div class="booking-show-section">
    <div class="booking-show-section-title">
        <div class="booking-show-section-icon">
            <i class="fas fa-receipt"></i>
        </div>

        <div>
            <span>BOOKING SUMMARY</span>
            <h2>Reservation details</h2>
        </div>
    </div>

    <div class="booking-show-summary">

        <div>
            <span>Booking ID</span>
            <strong>#{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</strong>
        </div>

        <div>
            <span>Guests</span>
            <strong>{{ $booking->guests }} {{ $booking->guests == 1 ? 'Guest' : 'Guests' }}</strong>
        </div>

        <div>
            <span>Room Price</span>
            <strong>৳{{ number_format($booking->room->price_per_night, 2) }}</strong>
        </div>

        <div>
            <span>Duration</span>
            <strong>
                {{ $booking->check_in->diffInDays($booking->check_out) }}
                Nights
            </strong>
        </div>

    </div>

</div>
