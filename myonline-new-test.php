<script>
  function em_myonline_check(form) {
    var passwordField = document.getElementById("loginPassword");
    var eyeIcon = document.getElementById("eye-login-img");
    if (passwordField.type === "text") {
      passwordField.type = "password";
      eyeIcon.src = "https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye-slash.svg";
    }
    if (form.my_user) {
      if (!form.my_user.value) {
        alert("Geben Sie bitte Ihren Benutzernamen ein!");
        form.my_user.focus();
        return false;
      }
      if (!form.my_pass.value) {
        alert("Geben Sie bitte Ihr Passwort ein!");
        form.my_pass.focus();
        return false;
      }
      if (form.my_pass.value.length < 3) {
        alert("Geben Sie bitte mindestens 6 Zeichen ein!");
        form.my_pass.focus();
        return false;
      }

      // Hier fügst du den Code für das Passwort-Toggling hinzu

    }
    return true;
  }
  function passwordToggleInLoginbox() {
    var passwordField = document.getElementById("loginPassword");
    var eyeIcon = document.getElementById("eye-login-img");
    if (passwordField.type === "password") {
      passwordField.type = "text";
      eyeIcon.src = "https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye.svg";
    } else {
      passwordField.type = "password";
      eyeIcon.src = " https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye-slash.svg";
    }
  }
</script>