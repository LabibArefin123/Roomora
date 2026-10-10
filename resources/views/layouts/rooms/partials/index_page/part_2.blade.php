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
