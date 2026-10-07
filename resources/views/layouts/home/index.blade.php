@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="stayflow-home">

        <div class="home-topbar">
            <div>
                <span class="home-greeting">Welcome back 👋</span>
                <h1>StayFlow</h1>
                <p>Book smart. Stay comfortable.</p>
            </div>

            <a href="{{ route('bookings.create') }}" class="home-book-btn">
                <i class="fas fa-plus"></i>
            </a>
        </div>

        <div class="home-stats">
            <div class="home-stat-card">
                <div class="home-stat-icon">
                    <i class="fas fa-bed"></i>
                </div>
                <span>Available Rooms</span>
                <strong>{{ $availableRooms }}</strong>
            </div>

            <div class="home-stat-card">
                <div class="home-stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <span>Active Bookings</span>
                <strong>{{ $activeBookings }}</strong>
            </div>
        </div>

        <div class="home-section-header">
            <div>
                <span>StayFlow Collection</span>
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

    </div>
@endsection
