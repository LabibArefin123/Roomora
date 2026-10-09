document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById("profileDropdown");
    const toggle = document.getElementById("profileDropdownToggle");
    const menu = document.getElementById("profileDropdownMenu");

    if (!dropdown || !toggle || !menu) return;

    function setOpen(open) {
        dropdown.classList.toggle("is-open", open);
        toggle.setAttribute("aria-expanded", String(open));
        menu.setAttribute("aria-hidden", String(!open));
    }

    function openProfile() {
        // Close notifications before opening the profile menu.
        document.dispatchEvent(
            new CustomEvent("roomora:close-notification-dropdown")
        );

        setOpen(true);
    }

    toggle.addEventListener("click", function (event) {
        event.stopPropagation();

        if (dropdown.classList.contains("is-open")) {
            setOpen(false);
        } else {
            openProfile();
        }
    });

    menu.addEventListener("click", function (event) {
        event.stopPropagation();
    });

    document.addEventListener("click", function (event) {
        if (!dropdown.contains(event.target)) {
            setOpen(false);
        }
    });

    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape" && dropdown.classList.contains("is-open")) {
            setOpen(false);
            toggle.focus();
        }
    });

    // Allow the notification dropdown to close the profile menu.
    document.addEventListener("roomora:close-profile-dropdown", function () {
        setOpen(false);
    });
});

