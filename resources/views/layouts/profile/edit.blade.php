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

        <div class="profile-image-modal" id="profileImageModal" aria-hidden="true">
            <div class="profile-image-modal-backdrop" data-close-image-modal></div>
            <div class="profile-image-modal-dialog" role="dialog" aria-modal="true"
                aria-labelledby="profileImageModalTitle">
                <div class="profile-image-modal-header">
                    <div>
                        <span>PROFILE PHOTOGRAPH</span>
                        <h2 id="profileImageModalTitle">Image Preview</h2>
                    </div>
                    <button type="button" class="profile-image-modal-close" data-close-image-modal
                        aria-label="Close image preview">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="profile-image-modal-body">
                    <div class="profile-image-modal-visual" id="profileImageModalVisual">
                        <img src="{{ $profile->profile_picture ? asset($profile->profile_picture) : '' }}"
                            alt="{{ $profile->name }}" id="profileImageModalImg"
                            @if (!$profile->profile_picture) hidden @endif>
                        <div class="profile-image-modal-empty" id="profileImageModalEmpty"
                            @if ($profile->profile_picture) hidden @endif>
                            <i class="fas fa-user"></i>
                            <span>No image selected</span>
                        </div>
                    </div>
                    <div class="profile-image-modal-details">
                        <div><span>File name</span><strong id="profileModalFileName">Current profile image</strong></div>
                        <div><span>File size</span><strong id="profileModalFileSize">—</strong></div>
                        <div><span>Dimensions</span><strong id="profileModalDimensions">—</strong></div>
                        <div><span>Format</span><strong id="profileModalFormat">—</strong></div>
                        <div class="profile-image-modal-validation-row"><span>Validation</span><strong
                                id="profileModalValidation">Current image</strong></div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data"
            class="profile-edit-form profile-edit-form-with-modal">
            @csrf
            @method('PUT')
            <div class="profile-edit-card">
                <div class="profile-edit-photo-layout">
                    <div class="profile-edit-photo-upload">
                        <div class="profile-edit-photo-section">
                            <div class="profile-edit-photo" id="profileEditCurrentPhoto">
                                @if ($profile->profile_picture)
                                    <img src="{{ asset($profile->profile_picture) }}" alt="{{ $profile->name }}">
                                @else
                                    <i class="fas fa-user"></i>
                                @endif
                            </div>
                            <div class="profile-edit-photo-info">
                                <strong>Profile Photograph</strong>
                                <span>JPG, PNG or WEBP · Maximum 5 MB</span>
                                <label for="profilePhotoInput" class="profile-photo-btn">
                                    <i class="fas fa-camera"></i>
                                    Change Photo
                                </label>
                                <input type="file" name="profile_picture" id="profilePhotoInput"
                                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" hidden>
                            </div>
                        </div>

                        <div class="profile-image-validation" id="profileImageValidation" role="status" aria-live="polite">
                            <i class="fas fa-circle-info"></i>
                            <span>Select an image to validate its size and dimensions.</span>
                        </div>

                        @error('profile_picture')
                            <small class="profile-edit-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <aside class="profile-edit-image-preview-card">
                        <div class="profile-edit-image-preview-heading">
                            <div>
                                <span>LIVE PREVIEW</span>
                                <h3>Profile Image</h3>
                            </div>
                            <button type="button" class="profile-image-info-btn" id="profileImageInfoBtn"
                                aria-label="View image information" title="Image information">
                                <i class="fas fa-circle-info"></i>
                            </button>
                        </div>

                        <button type="button" class="profile-edit-image-preview-trigger" id="profileImagePreviewBtn"
                            aria-label="View profile image in full size">
                            <div class="profile-edit-image-preview" id="profileImagePreview">
                                @if ($profile->profile_picture)
                                    <img src="{{ asset($profile->profile_picture) }}" alt="{{ $profile->name }}"
                                        id="profileImagePreviewImg">
                                @else
                                    <div class="profile-image-placeholder" id="profileImagePlaceholder">
                                        <i class="fas fa-user"></i>
                                        <span>No profile image</span>
                                    </div>
                                @endif

                                <div class="profile-image-progress" id="profileImageProgress" hidden>
                                    <svg viewBox="0 0 100 100" aria-hidden="true">
                                        <circle class="profile-image-progress-track" cx="50" cy="50" r="43">
                                        </circle>
                                        <circle class="profile-image-progress-value" id="profileImageProgressCircle"
                                            cx="50" cy="50" r="43"></circle>
                                    </svg>
                                    <span id="profileImageProgressText">0%</span>
                                </div>

                                <span class="profile-image-preview-overlay">
                                    <i class="fas fa-expand-alt"></i>
                                    View image
                                </span>
                            </div>
                        </button>

                        <div class="profile-image-preview-meta">
                            <span id="profileImageStatus" class="profile-image-status">Current image</span>
                            <span id="profileImageDimensions">Dimensions unavailable</span>
                        </div>
                    </aside>
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

                            <input type="text" name="name" id="name"
                                value="{{ old('name', $profile->name) }}" placeholder="Enter your full name"
                                class="@error('name') is-invalid @enderror">
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

                            <input type="email" name="email" id="email"
                                value="{{ old('email', $profile->email) }}" placeholder="Enter your email"
                                class="@error('email') is-invalid @enderror">
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

                            <input type="text" name="phone" id="phone"
                                value="{{ old('phone', $profile->phone) }}" placeholder="017XXXXXXXX"
                                class="@error('phone') is-invalid @enderror">
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
                                class="@error('address') is-invalid @enderror">{{ old('address', $profile->address) }}</textarea>
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
