@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
    <div class="roomora-bookings">

        <div class="booking-page-header">
            <div>
                <span class="booking-kicker">ROOMORA STAYS</span>
                <h1>My Bookings</h1>
                <p>Keep track of your stays and reservations.</p>
            </div>

            <a href="{{ route('bookings.create') }}" class="booking-add-btn">
                <i class="fas fa-plus"></i>
            </a>
        </div>


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


        <div class="booking-section-heading">
            <div>
                <span>YOUR JOURNEY</span>
                <h2>Recent Bookings</h2>
            </div>

            <i class="fas fa-calendar-days"></i>
        </div>


        @if ($bookings->count())

            <div class="booking-list">

                @foreach ($bookings as $booking)
                    <a href="{{ route('bookings.show', $booking) }}" class="booking-card">

                        <div class="booking-card-top">

                            <div class="booking-room-icon">
                                <i class="fas fa-bed"></i>
                            </div>

                            <div class="booking-room-info">
                                <span>
                                    ROOM {{ $booking->room->room_number }}
                                </span>

                                <h3>
                                    {{ $booking->room->room_type }}
                                </h3>

                                <p>
                                    {{ $booking->customer->name }}
                                </p>
                            </div>

                            <span class="booking-status {{ $booking->status }}">
                                {{ str_replace('_', ' ', $booking->status) }}
                            </span>

                        </div>


                        <div class="booking-dates">

                            <div class="booking-date">
                                <span>CHECK-IN</span>

                                <strong>
                                    {{ $booking->check_in->format('d M') }}
                                </strong>

                                <small>
                                    {{ $booking->check_in->format('Y') }}
                                </small>
                            </div>

                            <div class="booking-date-line">
                                <span>
                                    {{ $booking->check_in->diffInDays($booking->check_out) }}
                                    nights
                                </span>

                                <i class="fas fa-arrow-right"></i>
                            </div>

                            <div class="booking-date checkout">
                                <span>CHECK-OUT</span>

                                <strong>
                                    {{ $booking->check_out->format('d M') }}
                                </strong>

                                <small>
                                    {{ $booking->check_out->format('Y') }}
                                </small>
                            </div>

                        </div>


                        <div class="booking-card-footer">

                            <div>
                                <span>Total Amount</span>

                                <strong>
                                    ৳{{ number_format($booking->total_amount, 2) }}
                                </strong>
                            </div>

                            <span class="booking-view">
                                View
                                <i class="fas fa-chevron-right"></i>
                            </span>

                        </div>

                    </a>
                @endforeach

            </div>
            @if ($bookings->hasPages())
                <div class="booking-pagination">
                    <div class="booking-pagination-info"> <span>Page</span> <span
                            class="current-page">{{ $bookings->currentPage() }}</span> <span class="page-divider">of</span>
                        <span class="total-pages">{{ $bookings->lastPage() }}</span> </div>
                    <nav aria-label="Booking pagination">
                        <ul class="pagination">
                            <li class="page-item {{ $bookings->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $bookings->previousPageUrl() ?? '#' }}" aria-label="Previous"
                                    @if ($bookings->onFirstPage()) aria-disabled="true" tabindex="-1" @endif> <i
                                        class="bi bi-chevron-left"></i> </a>
                            </li>
                            <li class="page-item {{ $bookings->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $bookings->nextPageUrl() ?? '#' }}" aria-label="Next"
                                    @unless ($bookings->hasMorePages()) aria-disabled="true" tabindex="-1" @endunless> <i
                                        class="bi bi-chevron-right"></i> </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif
        @else
            <div class="booking-empty">

                <div class="booking-empty-icon">
                    <i class="fas fa-calendar-xmark"></i>
                </div>

                <h2>No bookings yet</h2>

                <p>
                    Your reservations will appear here once you
                    make your first booking.
                </p>

                <a href="{{ route('bookings.create') }}">
                    <i class="fas fa-calendar-plus"></i>
                    Create Booking
                </a>

            </div>

        @endif

    </div>
@endsection
