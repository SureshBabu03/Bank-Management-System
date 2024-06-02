const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirmpassword");
const submitBtn = document.getElementById("submitBtn");

function validatePassword() {
  if (password.value !== confirmPassword.value) {
    confirmPassword.setCustomValidity("Passwords don't match");
    submitBtn.setAttribute("disabled", true);
  } else {
    confirmPassword.setCustomValidity("");
    submitBtn.removeAttribute("disabled");
  }
}

password.addEventListener("change", validatePassword);
confirmPassword.addEventListener("change", validatePassword);

// Hash the password before sending it to the server
function hashPassword(password) {
  const sha256 = new Hashes.SHA256();
  return sha256.hex(password);
}

// Add SSL/TLS encryption to the request
function submitForm() {
  const hashedPassword = hashPassword(password.value);
  const encryptedRequest = encryptRequest({password: hashedPassword});
  // send encryptedRequest to the server using SSL/TLS
}

submitBtn.addEventListener("click", submitForm);
