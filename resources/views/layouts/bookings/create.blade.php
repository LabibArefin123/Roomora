@extends('layouts.app')

@section('title', 'New Booking')

@section('content')
    <div class="roomora-booking-form">

        <div class="booking-form-header">
            <a href="{{ route('bookings.index') }}" class="booking-form-back">
                <i class="fas fa-arrow-left"></i>
            </a>

            <div>
                <span>ROOMORA STAYS</span>
                <h1>New Booking</h1>
                <p>Reserve a comfortable room for your next stay.</p>
            </div>
        </div>

        <form action="{{ route('bookings.store') }}" method="POST" class="booking-form">
            @csrf

            <div class="booking-form-section">
                <div class="booking-form-section-title">
                    <div class="booking-form-section-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div>
                        <span>GUEST DETAILS</span>
                        <h2>Who is staying?</h2>
                    </div>
                </div>

                <div class="booking-field">
                    <label for="customer_id">Guest</label>

                    <select name="customer_id" id="customer_id"
                        class="booking-input @error('customer_id') is-invalid @enderror" required>

                        <option value="">Select guest</option>

                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }} · {{ $customer->phone }}
                            </option>
                        @endforeach
                    </select>

                    @error('customer_id')
                        <small class="booking-field-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="booking-field">
                    <label for="guests">Number of Guests</label>

                    <div class="booking-input-wrap">
                        <i class="fas fa-users"></i>

                        <input type="number" name="guests" id="guests"
                            class="booking-input has-icon @error('guests') is-invalid @enderror"
                            value="{{ old('guests', 1) }}" min="1" required>
                    </div>

                    @error('guests')
                        <small class="booking-field-error">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="booking-form-section">
                <div class="booking-form-section-title">
                    <div class="booking-form-section-icon">
                        <i class="fas fa-bed"></i>
                    </div>

                    <div>
                        <span>ROOM SELECTION</span>
                        <h2>Choose your room</h2>
                    </div>
                </div>

                <div class="booking-field">
                    <label for="room_id">Room</label>

                    <select name="room_id" id="room_id" class="booking-input @error('room_id') is-invalid @enderror"
                        required>

                        <option value="">Select available room</option>

                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                Room {{ $room->room_number }} ·
                                {{ $room->room_type }} ·
                                ৳{{ number_format($room->price_per_night, 0) }}/night
                            </option>
                        @endforeach
                    </select>

                    @error('room_id')
                        <small class="booking-field-error">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="booking-form-section">
                <div class="booking-form-section-title">
                    <div class="booking-form-section-icon">
                        <i class="fas fa-calendar-days"></i>
                    </div>

                    <div>
                        <span>STAY DATES</span>
                        <h2>When are you staying?</h2>
                    </div>
                </div>

                <div class="booking-date-fields">

                    <div class="booking-field">
                        <label for="check_in">Check-in</label>

                        <input type="date" name="check_in" id="check_in"
                            class="booking-input @error('check_in') is-invalid @enderror" value="{{ old('check_in') }}"
                            required>

                        @error('check_in')
                            <small class="booking-field-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="booking-field">
                        <label for="check_out">Check-out</label>

                        <input type="date" name="check_out" id="check_out"
                            class="booking-input @error('check_out') is-invalid @enderror" value="{{ old('check_out') }}"
                            required>

                        @error('check_out')
                            <small class="booking-field-error">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>

            @if ($errors->any())
                <div class="booking-form-error">
                    <div class="booking-form-error-icon">
                        <i class="fas fa-circle-exclamation"></i>
                    </div>

                    <div>
                        <strong>Please check your booking</strong>

                        <span>
                            Some information needs your attention before continuing.
                        </span>
                    </div>
                </div>
            @endif

            <div class="booking-form-actions">
                <a href="{{ route('bookings.index') }}" class="booking-cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="booking-submit-btn">
                    <i class="fas fa-calendar-check"></i>
                    Create Booking
                </button>
            </div>

        </form>

    </div>
@endsection
