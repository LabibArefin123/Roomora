document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById("stayflowNotificationDropdown");
    const toggle = document.getElementById("stayflowNotificationToggle");
    const menu = document.getElementById("stayflowNotificationMenu");

    if (!dropdown || !toggle || !menu) return;

    function closeNotification() {
        dropdown.classList.remove("is-open");
        toggle.setAttribute("aria-expanded", "false");
        menu.setAttribute("aria-hidden", "true");
    }

    function openNotification() {
        // Close the profile dropdown before opening notifications.
        document.dispatchEvent(
            new CustomEvent("roomora:close-profile-dropdown")
        );

        dropdown.classList.add("is-open");
        toggle.setAttribute("aria-expanded", "true");
        menu.setAttribute("aria-hidden", "false");
    }

    toggle.addEventListener("click", function (event) {
        event.stopPropagation();

        if (dropdown.classList.contains("is-open")) {
            closeNotification();
        } else {
            openNotification();
        }
    });

    menu.addEventListener("click", function (event) {
        event.stopPropagation();
    });

    document.addEventListener("click", function (event) {
        if (!dropdown.contains(event.target)) {
            closeNotification();
        }
    });

    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape" && dropdown.classList.contains("is-open")) {
            closeNotification();
            toggle.focus();
        }
    });

    // Allow the profile dropdown to close notifications.
    document.addEventListener("roomora:close-notification-dropdown", closeNotification);
});

