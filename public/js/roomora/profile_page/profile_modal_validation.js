(function () {
    const app = window.ProfileModal;

    app.initValidation = function () {
        app.resetSelectedImage = function () {
            app.selectedFile = null;
            app.imageValid = false;
            app.input.value = "";

            if (app.selectedUrl) {
                URL.revokeObjectURL(app.selectedUrl);
                app.selectedUrl = null;
            }

            app.setValidation(
                "Select an image to validate its size and dimensions.",
                "",
            );
            app.setStatus("Current image", "");
        };

        app.validateFile = function (file) {
            if (!file) return;

            app.selectedFile = file;
            app.imageValid = false;

            const extension = (file.name.split(".").pop() || "").toLowerCase();
            const allowedExtensions = ["jpg", "jpeg", "png", "webp"];

            if (
                !app.ALLOWED_TYPES.includes(file.type) ||
                !allowedExtensions.includes(extension)
            ) {
                app.setValidation(
                    "Choose a JPG, JPEG, PNG or WEBP image.",
                    "is-invalid",
                );
                app.setStatus("Invalid format", "is-invalid");
                return;
            }

            if (file.size >= app.MAX_SIZE) {
                app.setValidation(
                    "Image must be smaller than 6 MB. Selected: " +
                        app.formatBytes(file.size) +
                        ".",
                    "is-invalid",
                );
                app.setStatus("File too large", "is-invalid");
                return;
            }

            if (file.size === 0) {
                app.setValidation("The selected file is empty.", "is-invalid");
                app.setStatus("Empty file", "is-invalid");
                return;
            }

            if (app.selectedUrl) URL.revokeObjectURL(app.selectedUrl);
            app.selectedUrl = URL.createObjectURL(file);

            app.setValidation("Checking image dimensions…", "is-loading");
            app.setStatus("Validating image", "");

            const image = new Image();

            image.onload = function () {
                const width = image.naturalWidth;
                const height = image.naturalHeight;

                const valid =
                    width >= app.MIN_DIMENSION &&
                    height >= app.MIN_DIMENSION &&
                    width <= app.MAX_DIMENSION &&
                    height <= app.MAX_DIMENSION;

                app.setImageDetails(file, width, height, valid);

                if (!valid) {
                    app.setValidation(
                        "Image dimensions must be between 200 × 200 and 4000 × 4000 pixels.",
                        "is-invalid",
                    );
                    app.setStatus("Invalid dimensions", "is-invalid");
                    return;
                }

                app.imageValid = true;

                const previewImage = app.getOrCreateImage(
                    app.preview,
                    "profileImagePreviewImg",
                    "Profile image preview",
                );

                previewImage.src = app.selectedUrl;
                previewImage.alt = file.name;

                const currentImage = app.getOrCreateImage(
                    app.currentPhoto,
                    "profileEditSelectedPhoto",
                    "Selected profile image",
                );

                currentImage.src = app.selectedUrl;
                currentImage.alt = file.name;

                app.showModalImage(app.selectedUrl);
                app.setValidation(
                    "Image validated: " + width + " × " + height + " px.",
                    "is-valid",
                );
                app.setStatus("Image validated", "is-valid");
            };

            image.onerror = function () {
                app.imageValid = false;
                app.setValidation(
                    "The selected file could not be read as an image.",
                    "is-invalid",
                );
                app.setStatus("Unreadable image", "is-invalid");
            };

            image.src = app.selectedUrl;
        };
    };
})();
