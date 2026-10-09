<div class="profile-edit-card">
    <div class="profile-edit-section-title">
        <div class="profile-edit-section-icon blue">
            <i class="fas fa-user"></i>
        </div>
        <div>
            <span>PERSONAL INFORMATION</span>
            <h2>Your details</h2>
        </div>
    </div>

    <div class="profile-edit-field">
        <label for="name">Full Name </label>
        <div class="profile-edit-input-wrap">
            <i class="fas fa-user"></i>

            <input type="text" name="name" id="name" value="{{ old('name', $profile->name) }}"
                placeholder="Enter your full name" class="@error('name') is-invalid @enderror">
        </div>
        @error('name')
            <small class="profile-edit-error">{{ $message }}</small>
        @enderror
    </div>

    <div class="profile-edit-field">
        <label for="email"> Email Address </label>
        <div class="profile-edit-input-wrap">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" value="{{ old('email', $profile->email) }}"
                placeholder="Enter your email" class="@error('email') is-invalid @enderror">
        </div>

        @error('email')
            <small class="profile-edit-error">{{ $message }}</small>
        @enderror
    </div>


    <div class="profile-edit-field">
        <label for="phone">Phone Number </label>
        <div class="profile-edit-input-wrap">
            <i class="fas fa-phone"></i>

            <input type="text" name="phone" id="phone" value="{{ old('phone', $profile->phone) }}"
                placeholder="017XXXXXXXX" class="@error('phone') is-invalid @enderror">
        </div>

        @error('phone')
            <small class="profile-edit-error">{{ $message }}</small>
        @enderror
    </div>

    <div class="profile-edit-field">
        <label for="address">Address </label>
        <div class="profile-edit-input-wrap textarea">
            <i class="fas fa-location-dot"></i>

            <textarea name="address" id="address" rows="3" placeholder="Enter your address"
                class="@error('address') is-invalid @enderror">{{ old('address', $profile->address) }}</textarea>
        </div>
        @error('address')
            <small class="profile-edit-error">{{ $message }}</small>
        @enderror
    </div>
</div>
