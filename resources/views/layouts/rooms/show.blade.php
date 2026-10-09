@extends('layouts.app')

@section('title', 'Room Details')

@section('content')
    <div class="stayflow-room-show">
        <div class="room-show-header">
            <div>
                <span>STAYFLOW COLLECTION</span>
                <h1>Room Details</h1>
                <p>View room information and manage your accommodation.</p>
            </div>

            <a href="{{ route('rooms.index') }}" class="room-show-back">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Rooms</span>
            </a>
        </div>

        <div class="room-show-card">
            <div class="room-show-banner">
                <div class="room-show-banner-icon">
                    <i class="fas fa-bed"></i>
                </div>

                <span class="room-show-status {{ $room->status }}">
                    {{ ucfirst(str_replace('_', ' ', $room->status)) }}
                </span>

                <div class="room-show-banner-text">
                    <span>ROOM {{ $room->room_number }}</span>
                    <h2>{{ $room->room_type }}</h2>
                    <p>
                        <i class="fas fa-building"></i>
                        {{ $room->floor !== null ? 'Floor ' . $room->floor : 'Floor not specified' }}
                    </p>
                </div>
            </div>

            <div class="room-show-content">
                <div class="room-show-price">
                    <div>
                        <span>PRICE PER NIGHT</span>
                        <h3>৳{{ number_format($room->price_per_night, 2) }}</h3>
                    </div>
                    <div class="room-show-price-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                </div>

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

                <div class="room-show-section room-show-description">
                    <h3>
                        <i class="fas fa-align-left"></i>
                        Description
                    </h3>

                    @if ($room->description)
                        <p>{{ $room->description }}</p>
                    @else
                        <p class="room-show-no-description">No description has been added for this room.</p>
                    @endif
                </div>

                <div class="room-show-actions">
                    <a href="{{ route('rooms.edit', $room) }}" class="room-show-edit-btn">
                        <i class="fas fa-pen-to-square"></i>
                        Edit Room
                    </a>

                    @if ($room->status === 'available')
                        <a href="{{ route('bookings.create', ['room_id' => $room->id]) }}" class="room-show-book-btn">
                            <i class="fas fa-calendar-plus"></i>
                            Create Booking
                        </a>
                    @endif

                    <a href="{{ route('rooms.index') }}" class="room-show-cancel-btn">
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
