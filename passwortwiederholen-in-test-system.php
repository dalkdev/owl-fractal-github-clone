<?php
$tpl_text = '' . (!empty($fill['update_error']) ? '
<p class="alert alert-danger">' . nl2br($fill['update_error']) . '</p>
' : '') . '
<div class="nw-bg-slate-300 nw-p-4 md:nw-p-8 nw-mb-6">
    <div class="nw-bg-white nw-py-4 nw-px-4 md:nw-max-w-md nw-mx-auto nw-rounded">
        <div class="nw-mb-4">
            <p class="nw-text-left
                      nw-text-lg
                      nw-font-bold">
                Paswwort zurücksetzen
            </p>
        </div>
        <div>
          <form name="my_newpass" id="my_newpass" class="form-horizontal myonline-login-page-form " role="form" action="" method="post">
            <input name="code" value="' . $fill['code'] . '" type="hidden">
            <input name="pid" value="9_1" type="hidden">
        
             <div class="nw-mb-4">
                    <label class="nw-font-medium nw-text-xs nw-uppercase" for="my_pass" id="passwortLabel">
                        Passwort
                    </label>
                    <div class="nw-relative">
                        <div class="nw-absolute nw-right-2
                                    nw-top-3.5 nw-cursor-pointer
                                    nw-z-999 nw-m-auto" style="top: 0.875rem;"> 
                            <div class="nw-relative">
                                <span id="eye-icon1" class="nw-mr-2" onclick="passwordToggle(passwordFieldId, eyeIconId1);">
                                    <img id="eye-img1" class="nw-w-5 nw-h-5 nw-overflow-clip-margin-content-box nw-overflow-clip"
                                        src="https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye.svg">
                                </span>
                            </div>
                        </div>
                        <input class="nw-w-full nw-px-2 nw-py-3
                                      nw-mx-auto nw-inline-block
                                      nw-border nw-rounded
                                      nw-text-base nw-box-border
                                      nw-cursor-pointer"
                                maxlength="50"
                                type="password"
                                placeholder="Mindestlänge 6 Zeichen"
                                size="11"
                                name="my_pass"
                                id="my_pass" value=""/>
                    </div>
             </div>
             <div class="nw-mb-5">
                    <label class="nw-font-medium nw-text-xs nw-uppercase" for="my_pass2" id="passwortLabel">
                        Passwort wiederholen
                    </label>
                    <div class="nw-relative">
                        <div class="nw-absolute nw-right-2 nw-top-3.5 nw-cursor-pointer nw-z-999 nw-m-auto" style="top: 0.875rem;">
                            <div class="nw-relative">
                                <span id="eye-icon2"class="nw-mr-2" onclick="passwordToggle(passwordFieldId2, eyeIconId2);" >
                                    <img id="eye-img2" class="nw-w-5 nw-h-5 nw-overflow-clip-margin-content-box nw-overflow-clip"
                                         src="https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye.svg">
                                </span>
                            </div>
                        </div>
                        <input class="nw-w-full nw-px-2 nw-py-3
                                      nw-mx-auto nw-inline-block
                                      nw-border nw-rounded
                                      nw-text-base nw-box-border
                                      nw-cursor-pointer"
                                maxlength="50"
                                type="password"
                                placeholder=""
                                size="11"
                                name="my_pass2"
                                id="my_pass2" value=""/>
                    </div>
                </div>
             <div class="nw-flex nw-flex-col">
                    <button type="button"
                            class=" nw-mb-4 nw-text-center nw-w-full nw-whitespace-nowrap nw-text-white
                nw-bg-red-0 nw-rounded-md nw-text-base nw-font-bold
                nw-cursor-pointer nw-py-3 nw-px-6 hover:nw-bg-red-100 hover:nw-transition-all hover:nw-duration-300 focus:nw-bg-red-200 focus:nw-transition-all
                   disabled:nw-bg-gray-500 disabled:nw-cursor-not-allowed "
                            onclick="mydaten_check();">Absenden
                    </button>
                    <a href="https://www-test2.nw.de/profil?pid=1"
                        class="nw-text-center nw-w-full nw-text-gray-600 nw-whitespace-nowrap nw-bg-white
                nw-border nw-border-gray-600 nw-rounded-md nw-text-base nw-font-bold
              nw-cursor-pointer nw-py-3 nw-px-6 hover:nw-bg-gray-100 hover:nw-transition-all hover:nw-duration-300 focus:nw-bg-gray-200 focus:nw-transition-all
                  disabled:nw-bg-white disabled:nw-text-gray-200 disabled:nw-border-gray-200 disabled:nw-cursor-not-allowed">
                        zurück zur Anmeldung
                    </a>
                </div>
            <input type="submit" class="hidden" />
          </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
  var passwordFieldId = "my_pass"; // ID des Passwortfeldes
  var eyeIconId1 = "eye-img1";
  var passwordFieldId2 = "my_pass2"; // ID des Passwortfeldes
  var eyeIconId2 = "eye-img2";
  // Passwort eye-toggle ( Zweimal benutzen)
  function passwordToggle(passwordFieldId, eyeIconId) {
    var passwordField = document.getElementById(passwordFieldId);
    var eyeIcon = document.getElementById(eyeIconId);
    if (passwordField.type === "password") {
      passwordField.type = "text";
      eyeIcon.src = " https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye-slash.svg";
    } else {
      passwordField.type = "password";
      eyeIcon.src =  "https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye.svg";
    }
  }
    function mydaten_check()
    {
       var eyeIcon = $("#eye-img1");
    $("#my_pass").attr("type", "password");
    eyeIcon.attr("src", "https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye.svg");
      var eyeIcon2 = $("#eye-img2");
    $("#my_pass2").attr("type", "password");
    eyeIcon2.attr("src", "https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye.svg");
    
        var objForm = jQuery("#my_newpass");
        var objNewPass = jQuery("#my_pass");
        var objNewPass2 = jQuery("#my_pass2");

        if(objNewPass.val() == "") {
            alert("Bitte tragen Sie Ihr gewünschtes Passwort ein!");
            objNewPass.focus();
            return false;
        }

        if(objNewPass2.val() == "") {
            alert("Bitte tragen Sie Ihr gewünschtes Passwort in Wiederholfeld ein!");
            objForm.find("#my_pass2").focus();
            return false;
        }

        if (objNewPass.val() != objNewPass2.val()) {
            alert("Die eingegebenen Passwörter stimmen nicht überein!");
            objNewPass.focus();
            return false;
        }

        var bolPassError = false,
        strPassword = objNewPass.val();

        jQuery.ajax({
            url: "/_em_cms/globals/ajax_password.php",
            dataType: "jsonp",
            async: false,
            crossDomain: true,
            data: {"strPassCheck":strPassword},
            success: function(objRequest) {
                if (!objRequest.success) {
                    alert(objRequest.notice);
                    objNewPass.focus();
                } else {
                    objForm.submit();
                }
            }
        });
        return false;
    }
</script>';