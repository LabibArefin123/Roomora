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
                        <circle class="profile-image-progress-value" id="profileImageProgressCircle" cx="50"
                            cy="50" r="43"></circle>
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
