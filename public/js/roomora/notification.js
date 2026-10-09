document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelectorAll(".stayflow-alert-close")
        .forEach(function (button) {
            button.addEventListener("click", function () {
                this.closest(".stayflow-alert")?.remove();
            });
        });
});
