<div class="profile-section profile-info-section">
    <div class="profile-section-heading profile-info-heading">
        <div>
            <span>YOUR ACCOUNT</span>
            <h2>Profile Information</h2>
        </div>

        <span class="profile-info-badge">
            <i class="fas fa-shield-alt" aria-hidden="true"></i>
            Personal
        </span>
    </div>

    <div class="profile-info-card">
        {{-- User Identity --}}
        <div class="profile-info-identity">
            <div class="profile-info-avatar">
                @if (auth()->user()->profile_picture)
                    <img
                        src="{{ asset(auth()->user()->profile_picture) }}"
                        alt="{{ auth()->user()->name }}"
                        class="profile-info-picture"
                    >
                @else
                    <i class="fas fa-user" aria-hidden="true"></i>
                @endif
            </div>

            <div class="profile-info-user">
                <strong>{{ auth()->user()->name }}</strong>
                <span>Roomora Member</span>
            </div>

            <div class="profile-info-status">
                <i class="fas fa-check-circle" aria-hidden="true"></i>
                <span>Account</span>
            </div>
        </div>

        <div class="profile-info-divider"></div>

        {{-- Email --}}
        <div class="profile-info-row">
            <div class="profile-info-icon email">
                <i class="fas fa-envelope" aria-hidden="true"></i>
            </div>

            <div class="profile-info-detail">
                <span>Email Address</span>
                <strong>{{ auth()->user()->email ?: 'Not provided yet' }}</strong>
            </div>
        </div>

        {{-- Phone --}}
        <div class="profile-info-row">
            <div class="profile-info-icon phone">
                <i class="fas fa-phone" aria-hidden="true"></i>
            </div>

            <div class="profile-info-detail">
                <span>Phone Number</span>
                <strong>{{ auth()->user()->phone ?: 'Not added yet' }}</strong>
            </div>
        </div>

        {{-- Address --}}
        <div class="profile-info-row profile-info-address">
            <div class="profile-info-icon address">
                <i class="fas fa-location-dot" aria-hidden="true"></i>
            </div>

            <div class="profile-info-detail">
                <span>Home Address</span>
                <strong>{{ auth()->user()->address ?: 'Address not added yet' }}</strong>
            </div>
        </div>

        <a href="{{ route('profiles.edit', auth()->user()) }}" class="profile-info-edit">
            <i class="fas fa-user-pen" aria-hidden="true"></i>
            <span>Update Profile</span>
            <i class="fas fa-arrow-right profile-info-edit-arrow" aria-hidden="true"></i>
        </a>
    </div>
</div>

