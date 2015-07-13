/* password and confirm_password validation */

var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");

function validatePassword() {
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords do not match");
  }
  else {
    confirm_password.setCustomValidity("");
  }
}

document.getElementById('submit_button').onclick = validatePassword;
