(function () {
    const app = window.ProfileModal;

    app.initEvents = function () {
        app.input.addEventListener("change", function () {
            const file = app.input.files && app.input.files[0];

            if (!file) {
                app.resetSelectedImage();
                return;
            }

            app.validateFile(file);
        });

        if (app.previewButton) {
            app.previewButton.addEventListener("click", app.openModal);
        }

        if (app.infoButton) {
            app.infoButton.addEventListener("click", app.openModal);
        }

        app.modal
            .querySelectorAll("[data-close-image-modal]")
            .forEach(function (button) {
                button.addEventListener("click", app.closeModal);
            });

        document.addEventListener("keydown", function (event) {
            if (
                event.key === "Escape" &&
                app.modal.classList.contains("is-open")
            ) {
                app.closeModal();
            }
        });
    };
})();
