<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>
        @yield('title', 'Roomora') · Roomora
    </title>

    <meta name="theme-color" content="#0f172a">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    {{-- Bootstrap --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- App Shell Part --}}
    <link rel="stylesheet" href="{{ asset('css/roomora/app_part/app_variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/app_part/app_reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/app_part/app_wrapper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/app_part/app_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/app_part/app_brand.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/app_part/app_actions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/app_part/app_content.css') }}">

    {{-- Booking Part --}}
    <link rel="stylesheet" href="{{ asset('css/roomora/booking_part/index_page/booking_body.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/booking_part/index_page/booking_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/booking_part/index_page/booking_summary.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/booking_part/index_page/booking_card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/booking_part/index_page/booking_dates.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/booking_part/index_page/booking_status.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/booking_part/index_page/booking_empty.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/booking_part/index_page/booking_pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/booking_part/index_page/booking_footer_resp.css') }}">

    {{-- Profile Part --}}
    <link rel="stylesheet" href="{{ asset('css/roomora/profile_part/edit_page/profile_edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/profile_part/profile_body.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/profile_part/profile_intro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/profile_part/profile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/profile_part/profile_about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/profile_part/profile_footer.css') }}">

    <link rel="stylesheet" href="{{ asset('css/roomora/booking_form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/booking_show.css') }}">
    {{-- Navigation Part --}}
    <link rel="stylesheet" href="{{ asset('css/roomora/ui_dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/mobile_navigation.css') }}">

    {{-- Alert Part --}}
    <link rel="stylesheet" href="{{ asset('css/roomora/alert_part/alert_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/alert_part/alert_content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/alert_part/alert_actions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/alert_part/alert_status.css') }}">

    {{-- Home Part --}}
    <link rel="stylesheet" href="{{ asset('css/roomora/home_part/home_body.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/home_part/home_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/home_part/home_stats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/home_part/home_rooms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/home_part/home_status.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/home_part/home_bookings.css') }}">

    {{-- Room Part --}}
    <link rel="stylesheet" href="{{ asset('css/roomora/room_part/room_body.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/room_part/room_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/room_part/room_filter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/room_part/room_results.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/room_part/room_card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/room_part/room_content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roomora/room_part/room_footer.css') }}">
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
                        <strong>Roomora</strong>
                        <small>Book. Stay. Enjoy.</small>
                    </span>
                </a>
                <div class="stayflow-header-actions">
                    <button type="button" class="stayflow-icon-btn" aria-label="Notifications">
                        <i class="far fa-bell"></i>
                        <span class="notification-dot"></span>
                    </button>

                    <div class="stayflow-profile-dropdown" id="profileDropdown">
                        <button type="button" class="stayflow-avatar profile-dropdown-toggle"
                            id="profileDropdownToggle" aria-label="Open profile menu" aria-expanded="false"
                            aria-controls="profileDropdownMenu">
                            <i class="fas fa-user"></i>
                            <span class="profile-dropdown-indicator">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </button>

                        <div class="profile-dropdown-menu" id="profileDropdownMenu">
                            <div class="profile-dropdown-header">
                                <div class="profile-dropdown-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="profile-dropdown-user">
                                    <strong>{{ auth()->user()->name ?? 'Guest User' }}</strong>
                                    <span>{{ auth()->user()->email ?? 'Welcome to Roomora' }}</span>
                                </div>
                            </div>

                            <div class="profile-dropdown-divider"></div>

                            @if (auth()->check())
                                <a href="{{ route('profiles.edit', auth()->id()) }}" class="profile-dropdown-item">
                                    <span class="profile-dropdown-item-icon">
                                        <i class="fas fa-user-pen"></i>
                                    </span>

                                    <span class="profile-dropdown-item-content">
                                        <strong>Edit Profile</strong>
                                        <small>Manage your personal information</small>
                                    </span>

                                    <i class="fas fa-chevron-right profile-dropdown-arrow"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>



        {{-- Flash Messages --}}
        @if (session('success'))
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

        @if (session('error'))
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

            <a href="{{ route('profiles.index') }}"
                class="stayflow-nav-item {{ request()->routeIs('profiles.*') ? 'active' : '' }}">

                <span class="stayflow-nav-icon">
                    <i class="fas fa-user"></i>
                </span>

                <span>Profile</span>
            </a>

        </nav>

    </div>

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.stayflow-alert-close').forEach(function(button) {
                button.addEventListener('click', function() {
                    this.closest('.stayflow-alert')?.remove();
                });
            });
        });
    </script>
    <script src="{{ asset('js/roomora/ui_dropdown.js') }}" defer></script>
</body>

</html>
