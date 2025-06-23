function togglePassword(fieldId, icon) {
    let passwordField = document.getElementById(fieldId);
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
function redirectToDashboard() {
    window.location.href = "/dashboard"; // Sesuai dengan route Laravel
}

