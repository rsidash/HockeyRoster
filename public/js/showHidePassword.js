function showHidePassword() {
    let element = document.getElementById("password");
    let confirmedElement = document.getElementById("password_confirmation");
    let showHidePasswordIcon = document.getElementById("showHidePassword");
    let showHideConfirmedPasswordIcon = document.getElementById("showHideConfirmedPassword");

    if (element.type === "password") {
        element.type = "text";
        confirmedElement.type = "text";
        showHidePasswordIcon.className = "link-underline link-underline-opacity-0 input-group-text bi bi-eye-slash";
        showHideConfirmedPasswordIcon.className = "link-underline link-underline-opacity-0 input-group-text bi bi-eye-slash";
    } else {
        element.type = "password";
        confirmedElement.type = "password";
        showHidePasswordIcon.className = "link-underline link-underline-opacity-0 input-group-text bi bi-eye";
        showHideConfirmedPasswordIcon.className = "link-underline link-underline-opacity-0 input-group-text bi bi-eye";
    }
}
