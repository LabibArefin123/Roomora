@extends('layouts.app')

@section('title', 'Rooms')

@section('content')
    <div class="stayflow-rooms">

        <div class="rooms-topbar">
            <div>
                <span>StayFlow Collection</span>
                <h1>Find Your Room</h1>
                <p>Choose a comfortable place for your stay.</p>
            </div>

            <a href="{{ route('rooms.create') }}" class="rooms-add-btn">
                <i class="fas fa-plus"></i>
            </a>
        </div>

        <form action="{{ route('rooms.index') }}" method="GET" class="rooms-filter">

            <div class="rooms-search">
                <i class="fas fa-search"></i>

                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search room or type...">

                @if (request('search'))
                    <a href="{{ route('rooms.index') }}" class="rooms-search-clear">
                        <i class="fas fa-xmark"></i>
                    </a>
                @endif
            </div>

            <div class="rooms-filter-row">

                <div class="rooms-filter-field">
                    <i class="fas fa-layer-group"></i>

                    <select name="type" onchange="this.form.submit()">
                        <option value="">All Types</option>
                        <option value="Single" @selected(request('type') === 'Single')>
                            Single
                        </option>
                        <option value="Double" @selected(request('type') === 'Double')>
                            Double
                        </option>
                        <option value="Deluxe" @selected(request('type') === 'Deluxe')>
                            Deluxe
                        </option>
                        <option value="Suite" @selected(request('type') === 'Suite')>
                            Suite
                        </option>
                    </select>
                </div>

                <div class="rooms-filter-field">
                    <i class="fas fa-circle-half-stroke"></i>

                    <select name="status" onchange="this.form.submit()">
                        <option value="">All Status</option>
                        <option value="available" @selected(request('status') === 'available')>
                            Available
                        </option>
                        <option value="occupied" @selected(request('status') === 'occupied')>
                            Occupied
                        </option>
                        <option value="maintenance" @selected(request('status') === 'maintenance')>
                            Maintenance
                        </option>
                        <option value="inactive" @selected(request('status') === 'inactive')>
                            Inactive
                        </option>
                    </select>
                </div>

            </div>
        </form>

        <div class="rooms-result-header">
            <div>
                <span>ROOMS</span>
                <h2>{{ $rooms->total() }} Available Options</h2>
            </div>

            @if (request()->hasAny(['search', 'type', 'status']))
                <a href="{{ route('rooms.index') }}" class="rooms-reset-btn">
                    <i class="fas fa-rotate-left"></i>
                    Reset
                </a>
            @endif
        </div>

        @if ($rooms->count())

            <div class="rooms-grid">

                @foreach ($rooms as $room)
                    <article class="room-card">

                        <a href="{{ route('rooms.show', $room) }}" class="room-card-image">

                            <div class="room-image-icon">
                                <i class="fas fa-bed"></i>
                            </div>

                            <span class="room-card-status {{ $room->status }}">
                                {{ ucfirst($room->status) }}
                            </span>

                        </a>

                        <div class="room-card-body">

                            <div class="room-card-heading">
                                <div>
                                    <span class="room-number">
                                        ROOM {{ $room->room_number }}
                                    </span>

                                    <h3>{{ $room->room_type }}</h3>
                                </div>

                                <div class="room-price">
                                    <strong>
                                        ৳{{ number_format($room->price_per_night, 2) }}
                                    </strong>
                                    <small>/ night</small>
                                </div>
                            </div>

                            <div class="room-details">

                                <span>
                                    <i class="fas fa-users"></i>
                                    {{ $room->capacity }} Guests
                                </span>

                                @if ($room->floor)
                                    <span>
                                        <i class="fas fa-building"></i>
                                        Floor {{ $room->floor }}
                                    </span>
                                @endif

                            </div>

                            @if ($room->description)
                                <p class="room-description">
                                    {{ Str::limit($room->description, 100) }}
                                </p>
                            @endif

                            <div class="room-card-actions">

                                <a href="{{ route('rooms.show', $room) }}" class="room-view-btn">
                                    View Room
                                    <i class="fas fa-arrow-right"></i>
                                </a>

                                @if ($room->status === 'available')
                                    <a href="{{ route('bookings.create', ['room_id' => $room->id]) }}"
                                        class="room-book-btn">
                                        <i class="fas fa-calendar-plus"></i>
                                    </a>
                                @endif

                            </div>

                        </div>

                    </article>
                @endforeach

            </div>

            @if ($rooms->hasPages())
                <div class="rooms-pagination">
                    {{ $rooms->links() }}
                </div>
            @endif
        @else
            <div class="rooms-empty">

                <div class="rooms-empty-icon">
                    <i class="fas fa-bed"></i>
                </div>

                <h2>No rooms found</h2>

                <p>
                    We couldn't find any rooms matching your search.
                    Try changing your filters.
                </p>

                <a href="{{ route('rooms.index') }}">
                    <i class="fas fa-rotate-left"></i>
                    Clear Filters
                </a>

            </div>

        @endif

    </div>
@endsection
    