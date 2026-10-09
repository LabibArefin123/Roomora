@if (auth()->check())
    {{-- Top App Bar --}}
    <header class="stayflow-header">
        <div class="stayflow-header-inner">
            <a href="{{ route('home') }}" class="stayflow-brand">
                <span class="stayflow-brand-icon">
                    <img src="{{ asset('images/logo.png') }}" alt="Roomora Logo">
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
                    <button type="button" class="stayflow-avatar profile-dropdown-toggle" id="profileDropdownToggle"
                        aria-label="Open profile menu" aria-expanded="false" aria-controls="profileDropdownMenu">
                        @if (auth()->user()->profile_picture)
                            <img src="{{ asset(auth()->user()->profile_picture) }}" alt="{{ auth()->user()->name }}"
                                class="stayflow-avatar-image">
                        @else
                            <i class="fas fa-user" aria-hidden="true"></i>
                        @endif

                        <span class="profile-dropdown-indicator">
                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </span>
                    </button>

                    <div class="profile-dropdown-menu" id="profileDropdownMenu">
                        <div class="profile-dropdown-header">
                            <div class="profile-dropdown-avatar">
                                @if (auth()->user()->profile_picture)
                                    <img src="{{ asset(auth()->user()->profile_picture) }}"
                                        alt="{{ auth()->user()->name }}">
                                @else
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                @endif
                            </div>

                            <div class="profile-dropdown-user">
                                <strong>{{ auth()->user()->name }}</strong>
                                <span>{{ auth()->user()->email }}</span>
                            </div>
                        </div>

                        <div class="profile-dropdown-divider"></div>

                        <a href="{{ route('profiles.index') }}" class="profile-dropdown-item">
                            <span class="profile-dropdown-item-icon">
                                <i class="fas fa-user"></i>
                            </span>

                            <span class="profile-dropdown-item-content">
                                <strong>My Profile</strong>
                                <small>View your Roomora profile</small>
                            </span>

                            <i class="fas fa-chevron-right profile-dropdown-arrow"></i>
                        </a>

                        <a href="{{ route('profiles.edit', auth()->user()) }}" class="profile-dropdown-item">
                            <span class="profile-dropdown-item-icon">
                                <i class="fas fa-user-pen"></i>
                            </span>

                            <span class="profile-dropdown-item-content">
                                <strong>Edit Profile</strong>
                                <small>Manage your personal information</small>
                            </span>
                            <i class="fas fa-chevron-right profile-dropdown-arrow"></i>
                        </a>

                        <div class="profile-dropdown-divider"></div>

                        <form action="{{ route('logout') }}" method="POST" class="profile-logout-form">
                            @csrf
                            <button type="submit" class="profile-dropdown-item profile-logout-button">
                                <span class="profile-dropdown-item-icon">
                                    <i class="fas fa-arrow-right-from-bracket"></i>
                                </span>

                                <span class="profile-dropdown-item-content">
                                    <strong>Sign Out</strong>
                                    <small>Leave your Roomora account</small>
                                </span>

                                <i class="fas fa-chevron-right profile-dropdown-arrow"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endif
