<div class="booking-show-dates">
    <div class="booking-show-date">
        <span>CHECK-IN</span>

        <strong>
            {{ $booking->check_in->format('d M') }}
        </strong>

        <small>
            {{ $booking->check_in->format('Y') }}
        </small>
    </div>

    <div class="booking-show-date-middle">
        <span>
            {{ $booking->check_in->diffInDays($booking->check_out) }}
            nights
        </span>

        <div>
            <i class="fas fa-circle"></i>
            <span></span>
            <i class="fas fa-location-dot"></i>
        </div>
    </div>

    <div class="booking-show-date checkout">
        <span>CHECK-OUT</span>
        <strong> {{ $booking->check_out->format('d M') }} </strong>
        <small> {{ $booking->check_out->format('Y') }} </small>
    </div>
</div>
