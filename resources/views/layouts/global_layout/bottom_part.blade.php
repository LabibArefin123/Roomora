@if (auth()->check())
    {{-- Mobile Bottom Navigation --}}
    <nav class="stayflow-bottom-nav">
        <a href="{{ route('home') }}" class="stayflow-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">

            <span class="stayflow-nav-icon">
                <i class="fas fa-house"></i>
            </span>

            <span>Home</span>
        </a>


        <a href="{{ route('bookings.index') }}"
            class="stayflow-nav-item {{ request()->routeIs('bookings.*') ? 'active' : '' }}">

            <span class="stayflow-nav-icon">
                <i class="fas fa-calendar-days"></i>
            </span>

            <span>Bookings</span>
        </a>


        <a href="{{ route('rooms.index') }}"
            class="stayflow-nav-item {{ request()->routeIs('rooms.*') ? 'active' : '' }}">

            <span class="stayflow-nav-icon">
                <i class="fas fa-bed"></i>
            </span>

            <span>Rooms</span>
        </a>

        <a href="{{ route('profiles.index') }}"
            class="stayflow-nav-item {{ request()->routeIs('profiles.*') ? 'active' : '' }}">

            <span class="stayflow-nav-icon">
                <i class="fas fa-user"></i>
            </span>

            <span>Profile</span>
        </a>
    </nav>
@endif
