<div class="profile-password-card">
    <div class="profile-edit-section-title">
        <div class="profile-edit-section-icon red">
            <i class="fas fa-lock"></i>
        </div>

        <div>
            <span>SECURITY</span>
            <h2>Change Password</h2>
        </div>
    </div>

    <form action="{{ route('profiles.password') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="profile-edit-field">
            <label for="current_password"> Current Password </label>
            <div class="profile-edit-input-wrap">
                <i class="fas fa-lock"></i>
                <input type="password" name="current_password" id="current_password"
                    placeholder="Enter current password">
            </div>

            @error('current_password')
                <small class="profile-edit-error"> {{ $message }}</small>
            @enderror
        </div>

        <div class="profile-edit-field">
            <label for="password">New Password </label>
            <div class="profile-edit-input-wrap">
                <i class="fas fa-key"></i>

                <input type="password" name="password" id="password" placeholder="Minimum 8 characters">
            </div>

            @error('password')
                <small class="profile-edit-error">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="profile-edit-field">
            <label for="password_confirmation">Confirm New Password</label>
            <div class="profile-edit-input-wrap">
                <i class="fas fa-shield-check"></i>

                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Repeat new password">
            </div>
        </div>

        <button type="submit" class="profile-password-btn">
            <i class="fas fa-key"></i>
            Update Password
        </button>
    </form>
</div>
