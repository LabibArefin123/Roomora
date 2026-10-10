<div class="booking-show-section">
    <div class="booking-show-section-title">
        <div class="booking-show-section-icon">
            <i class="fas fa-user"></i>
        </div>

        <div>
            <span>GUEST INFORMATION</span>
            <h2>Staying guest</h2>
        </div>
    </div>

    <div class="booking-show-info-card">
        <div class="booking-show-avatar"> {{ strtoupper(substr($booking->customer->name, 0, 1)) }} </div>
        <div>
            <strong>{{ $booking->customer->name }}</strong>
            <span>
                <i class="fas fa-phone"></i>
                {{ $booking->customer->phone }}
            </span>

            @if ($booking->customer->email)
                <span>
                    <i class="fas fa-envelope"></i>
                    {{ $booking->customer->email }}
                </span>
            @endif
        </div>
    </div>
</div>
