(function () {
    const app = window.ProfileModal;

    app.initHelpers = function () {
        app.formatBytes = function (bytes) {
            if (!Number.isFinite(bytes)) return "—";
            if (bytes < 1024) return bytes + " B";
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + " KB";
            return (bytes / (1024 * 1024)).toFixed(2) + " MB";
        };

        app.setValidation = function (message, type) {
            const box = app.validationBox;
            if (!box) return;

            box.classList.remove("is-valid", "is-invalid", "is-loading");
            if (type) box.classList.add(type);

            const icon = box.querySelector("i");
            const text = box.querySelector("span");

            if (icon) {
                icon.className =
                    type === "is-valid"
                        ? "fas fa-circle-check"
                        : type === "is-invalid"
                          ? "fas fa-circle-exclamation"
                          : type === "is-loading"
                            ? "fas fa-spinner fa-spin"
                            : "fas fa-circle-info";
            }

            if (text) text.textContent = message;
        };

        app.setStatus = function (message, type) {
            if (!app.statusLabel) return;

            app.statusLabel.textContent = message;
            app.statusLabel.classList.remove(
                "is-valid",
                "is-invalid",
                "is-uploading",
            );

            if (type) app.statusLabel.classList.add(type);
        };

        app.setModalDetails = function (details) {
            app.modalFileName.textContent = details.name || "—";
            app.modalFileSize.textContent = details.size || "—";
            app.modalDimensions.textContent = details.dimensions || "—";
            app.modalFormat.textContent = details.format || "—";
            app.modalValidation.textContent = details.validation || "—";

            app.modalValidation.classList.toggle(
                "is-valid",
                details.validation === "Valid image",
            );
            app.modalValidation.classList.toggle(
                "is-invalid",
                details.validation === "Invalid image",
            );
        };

        app.setProgress = function (percent) {
            const value = Math.max(0, Math.min(100, Math.round(percent)));
            const circumference = 2 * Math.PI * 43;

            app.progressCircle.style.strokeDasharray = circumference;
            app.progressCircle.style.strokeDashoffset =
                circumference - (value / 100) * circumference;

            app.progressText.textContent = value + "%";
        };

        app.getOrCreateImage = function (container, id, alt) {
            let img = document.getElementById(id);

            if (!img) {
                img = document.createElement("img");
                img.id = id;
                img.alt = alt || "Profile image";
                container.prepend(img);
            }

            img.hidden = false;
            return img;
        };
    };
})();
