(function () {
    const profileModal = {
        MAX_SIZE: 6 * 1024 * 1024,
        MIN_DIMENSION: 200,
        MAX_DIMENSION: 4000,
        ALLOWED_TYPES: ["image/jpeg", "image/png", "image/webp"],
        selectedFile: null,
        selectedUrl: null,
        imageValid: false,
        originalSubmitText: "",
        imageDetails: {
            name: "Current profile image",
            size: "—",
            dimensions: "—",
            format: "—",
            validation: "Current image",
        },
    };

    document.addEventListener("DOMContentLoaded", function () {
        const app = profileModal;

        app.form = document.querySelector(".profile-edit-form");
        app.input = document.getElementById("profilePhotoInput");
        app.validationBox = document.getElementById("profileImageValidation");
        app.preview = document.getElementById("profileImagePreview");
        app.currentPhoto = document.getElementById("profileEditCurrentPhoto");
        app.previewButton = document.getElementById("profileImagePreviewBtn");
        app.infoButton = document.getElementById("profileImageInfoBtn");
        app.modal = document.getElementById("profileImageModal");
        app.modalImage = document.getElementById("profileImageModalImg");
        app.modalEmpty = document.getElementById("profileImageModalEmpty");
        app.progressBox = document.getElementById("profileImageProgress");
        app.progressCircle = document.getElementById(
            "profileImageProgressCircle",
        );
        app.progressText = document.getElementById("profileImageProgressText");
        app.statusLabel = document.getElementById("profileImageStatus");
        app.dimensionsLabel = document.getElementById("profileImageDimensions");
        app.modalFileName = document.getElementById("profileModalFileName");
        app.modalFileSize = document.getElementById("profileModalFileSize");
        app.modalDimensions = document.getElementById("profileModalDimensions");
        app.modalFormat = document.getElementById("profileModalFormat");
        app.modalValidation = document.getElementById("profileModalValidation");

        if (!app.input || !app.preview || !app.modal) return;

        if (typeof app.initHelpers === "function") app.initHelpers();
        if (typeof app.initPreview === "function") app.initPreview();
        if (typeof app.initValidation === "function") app.initValidation();
        if (typeof app.initEvents === "function") app.initEvents();
        if (typeof app.initUpload === "function") app.initUpload();
    });

    window.ProfileModal = profileModal;
})();
