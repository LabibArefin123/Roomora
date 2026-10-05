<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>
        @yield('title', 'StayFlow') · StayFlow
    </title>

    <meta name="theme-color" content="#0f172a">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')
</head>

<body>

<div class="stayflow-app">

    {{-- Top App Bar --}}
    <header class="stayflow-header">

        <div class="stayflow-header-inner">

            <a href="{{ route('home') }}" class="stayflow-brand">
                <span class="stayflow-brand-icon">
                    <i class="fas fa-hotel"></i>
                </span>

                <span>
                    <strong>StayFlow</strong>
                    <small>Book. Stay. Enjoy.</small>
                </span>
            </a>

            <div class="stayflow-header-actions">

                <button type="button"
                        class="stayflow-icon-btn"
                        aria-label="Notifications">
                    <i class="far fa-bell"></i>
                    <span class="notification-dot"></span>
                </button>

                <a href="#"
                   class="stayflow-avatar"
                   aria-label="Profile">
                    <i class="fas fa-user"></i>
                </a>

            </div>

        </div>

    </header>


    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="stayflow-alert success">
            <div class="stayflow-alert-icon">
                <i class="fas fa-check"></i>
            </div>

            <div>
                <strong>Success</strong>
                <span>{{ session('success') }}</span>
            </div>

            <button type="button" class="stayflow-alert-close">
                <i class="fas fa-xmark"></i>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="stayflow-alert error">
            <div class="stayflow-alert-icon">
                <i class="fas fa-exclamation"></i>
            </div>

            <div>
                <strong>Something went wrong</strong>
                <span>{{ session('error') }}</span>
            </div>

            <button type="button" class="stayflow-alert-close">
                <i class="fas fa-xmark"></i>
            </button>
        </div>
    @endif


    {{-- Main Application Content --}}
    <main class="stayflow-content">
        @yield('content')
    </main>


    {{-- Mobile Bottom Navigation --}}
    <nav class="stayflow-bottom-nav">

        <a href="{{ route('home') }}"
           class="stayflow-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">

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


        <a href="#"
           class="stayflow-nav-item">

            <span class="stayflow-nav-icon">
                <i class="fas fa-user"></i>
            </span>

            <span>Profile</span>
        </a>

    </nav>

</div>

@stack('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.stayflow-alert-close').forEach(function (button) {
        button.addEventListener('click', function () {
            this.closest('.stayflow-alert')?.remove();
        });
    });
});
</script>

</body>
</html>