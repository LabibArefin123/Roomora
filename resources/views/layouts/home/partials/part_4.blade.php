<div class="home-section-header recent-heading">
    <div>
        <span>Your activity</span>
        <h2>Recent Bookings</h2>
    </div>

    <a href="{{ route('bookings.index') }}">
        View all
        <i class="fas fa-arrow-right"></i>
    </a>
</div>

@if ($recentBookings->count())
    <div class="recent-booking-list">
        @foreach ($recentBookings as $booking)
            <a href="{{ route('bookings.show', $booking) }}" class="recent-booking-card">

                <div class="recent-booking-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>

                <div class="recent-booking-info">
                    <strong>
                        Room {{ $booking->room->room_number }}
                    </strong>

                    <span>
                        {{ $booking->customer->name }}
                    </span>

                    <small>
                        {{ $booking->check_in->format('d M Y') }}
                        -
                        {{ $booking->check_out->format('d M Y') }}
                    </small>
                </div>

                <div class="recent-booking-status">
                    <span class="booking-status {{ $booking->status }}">
                        {{ str_replace('_', ' ', ucfirst($booking->status)) }}
                    </span>

                    <i class="fas fa-chevron-right"></i>
                </div>
            </a>
        @endforeach
    </div>
@else
    <div class="home-empty-state compact">
        <div>
            <i class="fas fa-calendar-xmark"></i>
        </div>
        <h3>No bookings yet</h3>
        <p>Your recent bookings will appear here.</p>
        <a href="{{ route('bookings.create') }}">
            Make a Booking
        </a>
    </div>
@endif
