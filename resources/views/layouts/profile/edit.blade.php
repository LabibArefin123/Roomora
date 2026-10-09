@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="roomora-profile-edit">

        <div class="profile-edit-header">

            <a href="{{ route('profiles.index') }}" class="profile-edit-back">
                <i class="fas fa-arrow-left"></i>
            </a>

            <div>
                <span>ROOMORA ACCOUNT</span>
                <h1>Edit Profile</h1>
                <p>Keep your personal information up to date.</p>
            </div>

        </div>


        <form action="{{ route('profiles.update') }}" method="POST" enctype="multipart/form-data" class="profile-edit-form">

            @csrf
            @method('PUT')


            <div class="profile-edit-card">

                <div class="profile-edit-photo-section">

                    <div class="profile-edit-photo">

                        @if ($user->profile_photo)
                            <img src="{{ asset($user->profile_photo) }}" alt="{{ $user->name }}">
                        @else
                            <i class="fas fa-user"></i>
                        @endif

                    </div>

                    <div>
                        <strong>Profile Photo</strong>

                        <span>
                            JPG, PNG or WEBP · Max 2MB
                        </span>

                        <label for="profile_photo" class="profile-photo-btn">
                            <i class="fas fa-camera"></i>
                            Change Photo
                        </label>

                        <input type="file" name="profile_photo" id="profile_photo" accept=".jpg,.jpeg,.png,.webp" hidden>

                        @error('profile_photo')
                            <small class="profile-edit-error">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                </div>

            </div>


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

                    <label for="name">
                        Full Name
                    </label>

                    <div class="profile-edit-input-wrap">
                        <i class="fas fa-user"></i>

                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            placeholder="Enter your full name" class="@error('name') is-invalid @enderror">
                    </div>

                    @error('name')
                        <small class="profile-edit-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="profile-edit-field">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="profile-edit-input-wrap">
                        <i class="fas fa-envelope"></i>

                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            placeholder="Enter your email" class="@error('email') is-invalid @enderror">
                    </div>

                    @error('email')
                        <small class="profile-edit-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="profile-edit-field">

                    <label for="phone">
                        Phone Number
                    </label>

                    <div class="profile-edit-input-wrap">
                        <i class="fas fa-phone"></i>

                        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                            placeholder="017XXXXXXXX" class="@error('phone') is-invalid @enderror">
                    </div>

                    @error('phone')
                        <small class="profile-edit-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="profile-edit-field">

                    <label for="address">
                        Address
                    </label>

                    <div class="profile-edit-input-wrap textarea">
                        <i class="fas fa-location-dot"></i>

                        <textarea name="address" id="address" rows="3" placeholder="Enter your address"
                            class="@error('address') is-invalid @enderror">{{ old('address', $user->address) }}</textarea>
                    </div>

                    @error('address')
                        <small class="profile-edit-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

            </div>


            <div class="profile-edit-actions">

                <a href="{{ route('profiles.index') }}" class="profile-edit-cancel">
                    Cancel
                </a>

                <button type="submit" class="profile-edit-save">
                    <i class="fas fa-check"></i>
                    Save Profile
                </button>

            </div>

        </form>


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

                    <label for="current_password">
                        Current Password
                    </label>

                    <div class="profile-edit-input-wrap">
                        <i class="fas fa-lock"></i>

                        <input type="password" name="current_password" id="current_password"
                            placeholder="Enter current password">
                    </div>

                    @error('current_password')
                        <small class="profile-edit-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="profile-edit-field">

                    <label for="password">
                        New Password
                    </label>

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

                    <label for="password_confirmation">
                        Confirm New Password
                    </label>

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

    </div>
@endsection
