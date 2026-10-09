<div class="booking-summary">
    <div class="booking-summary-card">
        <div class="booking-summary-icon">
            <i class="fas fa-calendar-check"></i>
        </div>

        <div>
            <span>All Bookings</span>
            <strong>{{ $bookings->total() }}</strong>
        </div>
    </div>

    <div class="booking-summary-card">
        <div class="booking-summary-icon confirmed">
            <i class="fas fa-check"></i>
        </div>

        <div>
            <span>Active Stays</span>
            <strong>
                {{ $bookings->whereIn('status', ['confirmed', 'checked_in'])->count() }}
            </strong>
        </div>
    </div>
</div>
