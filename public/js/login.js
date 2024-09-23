caps = document.getElementById("caps");

document.addEventListener("keyup", function (event) {
    if (event.getModifierState("CapsLock")) {
        caps.style.display = "block";
    } else {
        caps.style.display = "none";
    }
});

function togglePassword() {
    password = document.getElementById("password");
    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}
