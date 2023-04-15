function confirmDelete() {
    return confirm('Are you sure you want to delete this?');
}

function comparePasswords() {
    const pw1 = document.getElementById('password').value;
    const pw2 = document.getElementById('confirm').value;
    const pwMsg = document.getElementById('pwMsg');

    if (pw1 != pw2) {
        pwMsg.innerText = 'Passwords do not match';
        return false; // this prevents the form submission
    }
    else {
        pwMsg.innerText = '';
        return true;
    }
}

function showHide() {
  var passwordInput = document.getElementById("password");
  var imageElement = document.getElementById("imgShowHide");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    imageElement.src = "img/hide.png";
    imageElement.alt = "Hide";
  } else {
    passwordInput.type = "password";
    imageElement.src = "img/show.png";
    imageElement.alt = "Show";
  }
}