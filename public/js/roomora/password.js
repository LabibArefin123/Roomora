document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("loginPasswordToggle");
    const password = document.getElementById("password");

    if (!toggle || !password) {
        return;
    }

    toggle.addEventListener("click", function () {
        const isPassword = password.type === "password";

        password.type = isPassword ? "text" : "password";

        toggle.innerHTML = isPassword
            ? '<i class="fas fa-eye-slash"></i>'
            : '<i class="fas fa-eye"></i>';

        toggle.setAttribute(
            "aria-label",
            isPassword ? "Hide password" : "Show password",
        );
    });
});
