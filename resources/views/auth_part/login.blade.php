@extends('layouts.app')

@section('title', 'Sign In')

@section('content')

    <div class="roomora-login">


        <div class="roomora-login-visual">

            <div class="login-glow login-glow-one"></div>
            <div class="login-glow login-glow-two"></div>

            <div class="login-brand">
                <div class="login-brand-icon">
                    <i class="fas fa-hotel"></i>
                </div>

                <div>
                    <strong>Roomora</strong>
                    <span>Stay somewhere you'll love.</span>
                </div>
            </div>

            <div class="login-visual-content">

                <span class="login-kicker">
                    WELCOME BACK
                </span>

                <h1>
                    Your next
                    <span>beautiful stay</span>
                    starts here.
                </h1>

                <p>
                    Sign in to explore rooms, manage reservations,
                    and keep your stay organized from one simple place.
                </p>

                <div class="login-feature-list">

                    <div class="login-feature">
                        <div class="login-feature-icon">
                            <i class="fas fa-bed"></i>
                        </div>

                        <div>
                            <strong>Comfortable Rooms</strong>
                            <span>Find a room that feels like home.</span>
                        </div>
                    </div>

                    <div class="login-feature">
                        <div class="login-feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>

                        <div>
                            <strong>Easy Booking</strong>
                            <span>Plan your stay in just a few steps.</span>
                        </div>
                    </div>

                    <div class="login-feature">
                        <div class="login-feature-icon">
                            <i class="fas fa-shield-heart"></i>
                        </div>

                        <div>
                            <strong>Simple & Secure</strong>
                            <span>Your Roomora account stays protected.</span>
                        </div>
                    </div>

                </div>

            </div>

            <div class="login-visual-footer">
                <span>
                    <i class="fas fa-sparkles"></i>
                    Book smart. Stay comfortable.
                </span>

                <small>
                    © {{ now()->year }} Roomora
                </small>
            </div>

        </div>

        <div class="roomora-login-panel">

            <div class="login-mobile-brand">
                <div class="login-brand-icon">
                    <i class="fas fa-hotel"></i>
                </div>

                <div>
                    <strong>Roomora</strong>
                    <span>Book. Stay. Feel at home.</span>
                </div>
            </div>

            <div class="login-form-header">

                <span class="login-form-kicker">
                    ROOMORA ACCOUNT
                </span>

                <h2>Welcome back</h2>

                <p>
                    Sign in to continue your Roomora journey.
                </p>

            </div>

            @if (session('success'))
                <div class="login-alert login-alert-success">
                    <i class="fas fa-circle-check"></i>

                    <span>
                        {{ session('success') }}
                    </span>
                </div>
            @endif

            @if ($errors->any())
                <div class="login-alert login-alert-error">
                    <i class="fas fa-circle-exclamation"></i>

                    <span>
                        {{ $errors->first() }}
                    </span>
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST" class="roomora-login-form">

                @csrf

                <div class="login-field">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="login-input-wrap">
                        <i class="fas fa-envelope"></i>

                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            placeholder="you@example.com" autocomplete="email" autofocus>
                    </div>

                    @error('email')
                        <small class="login-field-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <div class="login-field">

                    <div class="login-label-row">
                        <label for="password">
                            Password
                        </label>

                        <span>
                            Keep your account secure
                        </span>
                    </div>

                    <div class="login-input-wrap">
                        <i class="fas fa-lock"></i>

                        <input type="password" name="password" id="password" placeholder="Enter your password"
                            autocomplete="current-password">

                        <button type="button" class="login-password-toggle" id="loginPasswordToggle"
                            aria-label="Show password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    @error('password')
                        <small class="login-field-error">
                            {{ $message }}
                        </small>
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

            <div class="login-divider">
                <span>ROOMORA</span>
            </div>

            <div class="login-bottom-message">

                <div class="login-bottom-icon">
                    <i class="fas fa-heart"></i>
                </div>

                <div>
                    <strong>Make every stay memorable.</strong>

                    <span>
                        Your comfortable stay is only a sign in away.
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
