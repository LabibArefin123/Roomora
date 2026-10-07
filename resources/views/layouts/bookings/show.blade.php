@extends('layouts.app')

@section('title', 'Booking Details')

@section('content')
    <div class="roomora-booking-show">

        <div class="booking-show-header">

            <a href="{{ route('bookings.index') }}" class="booking-show-back">
                <i class="fas fa-arrow-left"></i>
            </a>

            <div>
                <span>ROOMORA STAYS</span>
                <h1>Booking Details</h1>
                <p>Everything you need to know about this reservation.</p>
            </div>

        </div>

        <div class="booking-show-hero">

            <div class="booking-show-hero-icon">
                <i class="fas fa-bed"></i>
            </div>

            <div class="booking-show-hero-info">
                <span>ROOM {{ $booking->room->room_number }}</span>

                <h2>{{ $booking->room->room_type }}</h2>

                <p>
                    <i class="fas fa-location-dot"></i>
                    Floor {{ $booking->room->floor ?? 'N/A' }}
                </p>
            </div>

            <span class="booking-show-status {{ $booking->status }}">
                {{ str_replace('_', ' ', $booking->status) }}
            </span>

        </div>

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

                <strong>
                    {{ $booking->check_out->format('d M') }}
                </strong>

                <small>
                    {{ $booking->check_out->format('Y') }}
                </small>
            </div>

        </div>

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

                <div class="booking-show-avatar">
                    {{ strtoupper(substr($booking->customer->name, 0, 1)) }}
                </div>

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

        <div class="booking-show-total">

            <div>
                <span>TOTAL STAY AMOUNT</span>
                <small>
                    {{ $booking->check_in->diffInDays($booking->check_out) }}
                    nights · Room {{ $booking->room->room_number }}
                </small>
            </div>

            <strong>
                ৳{{ number_format($booking->total_amount, 2) }}
            </strong>

        </div>

        <div class="booking-show-actions">

            <a href="{{ route('bookings.edit', $booking) }}" class="booking-show-edit">
                <i class="fas fa-pen-to-square"></i>
                Edit Booking
            </a>

            <form action="{{ route('bookings.destroy', $booking) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this booking?');">

                @csrf
                @method('DELETE')

                <button type="submit" class="booking-show-delete">
                    <i class="fas fa-trash"></i>
                </button>

            </form>

        </div>

    </div>
@endsection
