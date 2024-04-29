<script>
  function em_myonline_check(form)
  {
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
    }
    return true;
  }
</script>