 <div class="profile-image-modal" id="profileImageModal" aria-hidden="true">
     <div class="profile-image-modal-backdrop" data-close-image-modal></div>
     <div class="profile-image-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="profileImageModalTitle">
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
