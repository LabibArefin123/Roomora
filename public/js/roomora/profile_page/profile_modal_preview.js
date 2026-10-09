(function () {
    const app = window.ProfileModal;

    app.initPreview = function () {
        app.openModal = function () {
            app.modal.classList.add("is-open");
            app.modal.setAttribute("aria-hidden", "false");
            document.body.classList.add("profile-image-modal-open");
            app.setModalDetails(app.imageDetails);
        };

        app.closeModal = function () {
            app.modal.classList.remove("is-open");
            app.modal.setAttribute("aria-hidden", "true");
            document.body.classList.remove("profile-image-modal-open");
        };

        app.showModalImage = function (src) {
            if (src) {
                app.modalImage.src = src;
                app.modalImage.hidden = false;
                app.modalEmpty.hidden = true;
            } else {
                app.modalImage.removeAttribute("src");
                app.modalImage.hidden = true;
                app.modalEmpty.hidden = false;
            }
        };

        app.setImageDetails = function (file, width, height, valid) {
            app.imageDetails = {
                name: file.name,
                size: app.formatBytes(file.size),
                dimensions: width + " × " + height + " px",
                format: (file.type.split("/")[1] || "unknown").toUpperCase(),
                validation: valid ? "Valid image" : "Invalid image",
            };

            app.dimensionsLabel.textContent = app.imageDetails.dimensions;
            app.setModalDetails(app.imageDetails);
        };

        const existingImage = document.getElementById("profileImagePreviewImg");

        if (existingImage && existingImage.getAttribute("src")) {
            app.showModalImage(existingImage.src);

            const updateDimensions = function () {
                if (!existingImage.naturalWidth) return;

                app.dimensionsLabel.textContent =
                    existingImage.naturalWidth +
                    " × " +
                    existingImage.naturalHeight +
                    " px";

                app.imageDetails.dimensions = app.dimensionsLabel.textContent;
                app.setModalDetails(app.imageDetails);
            };

            existingImage.addEventListener("load", updateDimensions);

            if (existingImage.complete) updateDimensions();
        }
    };
})();
