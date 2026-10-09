@if (auth()->check())
    <header class="stayflow-header">
        <div class="stayflow-header-inner">

            {{-- Roomora Brand --}}
            <a href="{{ route('home') }}" class="stayflow-brand">
                <span class="stayflow-brand-icon">
                    <img src="{{ asset('images/logo.png') }}" alt="Roomora Logo">
                </span>

                <span class="stayflow-brand-text">
                    <strong>Roomora</strong>
                    <small>Book. Stay. Enjoy.</small>
                </span>
            </a>

            <div class="stayflow-header-actions">

                {{-- Notification Dropdown --}}
                <div class="stayflow-notification-dropdown" id="stayflowNotificationDropdown">
                    <button type="button" class="stayflow-icon-btn stayflow-notification-toggle"
                        id="stayflowNotificationToggle" aria-label="Notifications" aria-expanded="false"
                        aria-controls="stayflowNotificationMenu">
                        <i class="far fa-bell" aria-hidden="true"></i>

                        @if (($headerActivities ?? collect())->isNotEmpty())
                            <span class="notification-dot" aria-hidden="true"></span>
                        @endif
                    </button>

                    <div class="stayflow-notification-menu" id="stayflowNotificationMenu" aria-hidden="true">
                        <div class="stayflow-notification-header">
                            <div>
                                <span class="stayflow-notification-eyebrow">
                                    ACCOUNT ACTIVITY
                                </span>

                                <h3>Notifications</h3>
                                <p>Recent login and logout events</p>
                            </div>

                            <span class="stayflow-notification-count">
                                {{ ($headerActivities ?? collect())->count() }}
                            </span>
                        </div>

                        <div class="stayflow-notification-list">
                            @forelse (($headerActivities ?? collect()) as $activity)
                                @php
                                    $isLogin = $activity->description === 'User logged in';
                                    $activityUser = $activity->causer;
                                    $activityName = $activityUser?->name ?? 'Unknown user';
                                    $activityIp = data_get($activity->properties, 'ip_address');
                                @endphp

                                <div class="stayflow-notification-item">
                                    <div class="stayflow-notification-icon {{ $isLogin ? 'is-login' : 'is-logout' }}">
                                        <i class="fas {{ $isLogin ? 'fa-sign-in-alt' : 'fa-sign-out-alt' }}"
                                            aria-hidden="true"></i>
                                    </div>

                                    <div class="stayflow-notification-content">
                                        <div class="stayflow-notification-title-row">
                                            <strong>{{ $activityName }}</strong>

                                            <span
                                                class="stayflow-notification-status {{ $isLogin ? 'is-login' : 'is-logout' }}">
                                                {{ $isLogin ? 'Login' : 'Logout' }}
                                            </span>
                                        </div>

                                        <p>
                                            {{ $isLogin ? 'Signed in to the system' : 'Signed out of the system' }}
                                        </p>

                                        @if ($activityIp)
                                            <span class="stayflow-notification-ip">
                                                <i class="fas fa-network-wired" aria-hidden="true"></i>
                                                {{ $activityIp }}
                                            </span>
                                        @endif

                                        <time datetime="{{ $activity->created_at?->toIso8601String() }}">
                                            {{ $activity->created_at?->diffForHumans() }}
                                        </time>
                                    </div>
                                </div>
                            @empty
                                <div class="stayflow-notification-empty">
                                    <span>
                                        <i class="far fa-bell-slash" aria-hidden="true"></i>
                                    </span>

                                    <strong>No activity yet</strong>
                                    <p>Login and logout events will appear here.</p>
                                </div>
                            @endforelse
                        </div>

                        <div class="stayflow-notification-footer">
                            <i class="fas fa-shield-alt" aria-hidden="true"></i>
                            <span>Account activity is recorded for security.</span>
                        </div>
                    </div>
                </div>

                {{-- Profile Dropdown --}}
                <div class="stayflow-profile-dropdown" id="profileDropdown">

                    {{-- Profile Toggle --}}
                    <button type="button" class="stayflow-avatar profile-dropdown-toggle" id="profileDropdownToggle"
                        aria-label="Open profile menu" aria-expanded="false" aria-controls="profileDropdownMenu">
                        @if (auth()->user()->profile_picture)
                            <img src="{{ asset(auth()->user()->profile_picture) }}" alt="{{ auth()->user()->name }}"
                                class="stayflow-avatar-image profile-picture">
                        @else
                            <span class="profile-avatar-fallback">
                                <i class="fas fa-user" aria-hidden="true"></i>
                            </span>
                        @endif

                        <span class="profile-dropdown-indicator" aria-hidden="true">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </button>

                    {{-- Profile Menu --}}
                    <div class="profile-dropdown-menu" id="profileDropdownMenu" aria-hidden="true">
                        <div class="profile-dropdown-header">
                            <div class="profile-dropdown-avatar">
                                @if (auth()->user()->profile_picture)
                                    <img src="{{ asset(auth()->user()->profile_picture) }}"
                                        alt="{{ auth()->user()->name }}" class="profile-picture">
                                @else
                                    <span class="profile-avatar-fallback">
                                        <i class="fas fa-user" aria-hidden="true"></i>
                                    </span>
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
                                <i class="fas fa-user-pen" aria-hidden="true"></i>
                            </span>

                            <span class="profile-dropdown-item-content">
                                <strong>Edit Profile</strong>
                                <small>Manage your personal information</small>
                            </span>

                            <i class="fas fa-chevron-right profile-dropdown-arrow" aria-hidden="true"></i>
                        </a>

                        <div class="profile-dropdown-divider"></div>

                        <form action="{{ route('logout') }}" method="POST" class="profile-logout-form">
                            @csrf

                            <button type="submit" class="profile-dropdown-item profile-logout-button">
                                <span class="profile-dropdown-item-icon">
                                    <i class="fas fa-arrow-right-from-bracket" aria-hidden="true"></i>
                                </span>

                                <span class="profile-dropdown-item-content">
                                    <strong>Sign Out</strong>
                                    <small>Leave your Roomora account</small>
                                </span>

                                <i class="fas fa-chevron-right profile-dropdown-arrow" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>
@endif
