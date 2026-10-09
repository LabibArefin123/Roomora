(function () {
    const app = window.ProfileModal;

    app.initUpload = function () {
        if (!app.form) return;

        app.form.addEventListener("submit", function (event) {
            if (!app.selectedFile) return;

            if (!app.imageValid) {
                event.preventDefault();
                app.setValidation(
                    "Select a valid image and wait for validation to finish.",
                    "is-invalid",
                );
                app.input.focus();
                return;
            }

            event.preventDefault();

            const button =
                event.submitter || app.form.querySelector('[type="submit"]');

            if (button && button.disabled) return;

            if (button) {
                app.originalSubmitText = button.innerHTML;
                button.disabled = true;
            }

            app.progressBox.hidden = false;
            app.setProgress(0);
            app.setStatus("Uploading image", "is-uploading");
            app.setValidation("Uploading your profile image…", "is-loading");

            const xhr = new XMLHttpRequest();
            xhr.open("POST", app.form.action, true);
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.setRequestHeader("Accept", "application/json");

            xhr.upload.addEventListener("progress", function (event) {
                if (event.lengthComputable) {
                    app.setProgress((event.loaded / event.total) * 100);
                }
            });

            xhr.addEventListener("load", function () {
                let response = {};

                try {
                    response = JSON.parse(xhr.responseText);
                } catch (error) {}

                if (
                    xhr.status >= 200 &&
                    xhr.status < 300 &&
                    response.redirect
                ) {
                    app.setProgress(100);
                    app.setValidation(
                        response.message || "Profile updated successfully.",
                        "is-valid",
                    );
                    app.setStatus("Upload complete", "is-valid");
                    window.location.assign(response.redirect);
                    return;
                }

                app.progressBox.hidden = true;

                const errors = response.errors || {};
                const photoError = errors.profile_photo
                    ? errors.profile_photo[0]
                    : null;

                const message =
                    photoError ||
                    response.message ||
                    (xhr.status === 413
                        ? "The server rejected the image because it is too large."
                        : xhr.status === 422
                          ? "Check the submitted form fields and try again."
                          : "Upload failed (HTTP " + xhr.status + ").");

                app.setValidation(message, "is-invalid");
                app.setStatus("Upload failed", "is-invalid");

                if (button) {
                    button.disabled = false;
                    button.innerHTML = app.originalSubmitText;
                }
            });

            xhr.addEventListener("error", function () {
                app.progressBox.hidden = true;
                app.setValidation(
                    "Network error. Please try again.",
                    "is-invalid",
                );
                app.setStatus("Upload interrupted", "is-invalid");

                if (button) {
                    button.disabled = false;
                    button.innerHTML = app.originalSubmitText;
                }
            });

            xhr.addEventListener("abort", function () {
                app.progressBox.hidden = true;
                app.setValidation("Upload cancelled.", "is-invalid");
                app.setStatus("Upload cancelled", "is-invalid");

                if (button) {
                    button.disabled = false;
                    button.innerHTML = app.originalSubmitText;
                }
            });

            xhr.send(new FormData(app.form));
        });
    };
})();
