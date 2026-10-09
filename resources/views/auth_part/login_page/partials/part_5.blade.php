<form action="{{ route('login.store') }}" method="POST" class="roomora-login-form">
    @csrf
    <div class="login-field">
        <label for="email">Email Address</label>
        <div class="login-input-wrap">
            <i class="fas fa-envelope"></i>

            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="you@example.com"
                autocomplete="email" autofocus>
        </div>

        @error('email')
            <small class="login-field-error"> {{ $message }}</small>
        @enderror
    </div>

    <div class="login-field">

        <div class="login-label-row">
            <label for="password">Password </label>
            <span> Keep your account secure </span>
        </div>

        <div class="login-input-wrap">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Enter your password"
                autocomplete="current-password">

            <button type="button" class="login-password-toggle" id="loginPasswordToggle" aria-label="Show password">
                <i class="fas fa-eye"></i>
            </button>
        </div>

        @error('password')
            <small class="login-field-error"> {{ $message }}</small>
        @enderror
    </div>

    <div class="login-options">
        <label class="login-remember">
            <input type="checkbox" name="remember" value="1">

            <span class="login-checkmark"></span>

            <span>Remember me</span>
        </label>
    </div>

    <button type="submit" class="login-submit-btn">
        <span>
            <i class="fas fa-arrow-right-to-bracket"></i>
            Sign In
        </span>
        <i class="fas fa-arrow-right login-submit-arrow"></i>
    </button>
</form>
