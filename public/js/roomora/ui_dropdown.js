document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById("profileDropdown");
    const toggle = document.getElementById("profileDropdownToggle");
    const menu = document.getElementById("profileDropdownMenu");

    if (!dropdown || !toggle || !menu) return;

    function setOpen(open) {
        dropdown.classList.toggle("is-open", open);
        toggle.setAttribute("aria-expanded", String(open));
    }

    toggle.addEventListener("click", function (event) {
        event.stopPropagation();
        setOpen(!dropdown.classList.contains("is-open"));
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
        if (event.key === "Escape") {
            setOpen(false);
            toggle.focus();
        }
    });
});
