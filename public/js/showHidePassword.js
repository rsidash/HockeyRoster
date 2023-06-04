function showHidePassword() {
    let element = document.getElementById("password");
    let confirmedElement = document.getElementById("password_confirmation");
    let showHidePasswordIcon = document.getElementById("showHidePasswordIcon");
    let showHideConfirmedPasswordIcon = document.getElementById("showHideConfirmedPasswordIcon");

    if (element.type === "password") {
        element.type = "text";
        confirmedElement.type = "text";
        showHidePasswordIcon.className = "bi bi-eye-slash";
        showHideConfirmedPasswordIcon.className = "bi bi-eye-slash";
    } else {
        element.type = "password";
        confirmedElement.type = "password";
        showHidePasswordIcon.className = "bi bi-eye";
        showHideConfirmedPasswordIcon.className = "bi bi-eye";
    }
}
