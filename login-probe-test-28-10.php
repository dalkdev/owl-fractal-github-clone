<?php
$tpl_text = '';

$strFormUrl = preg_replace('/pid=[\d_]+/', '', $_SERVER['REQUEST_URI']);

if (em_get_var_value('pid') == 5) {
    $tpl_text.= '<p class="alert alert-warning">Um den Newsletterbereich nutzen zu k&ouml;nnen, m&uuml;ssen Sie angemeldet sein.</p>';
}

$tpl_text.= '
' . (!empty($fill['error_message']) ? '<p class="alert alert-danger">' . $fill['error_message'] . '</p>' :
        (!empty($GLOBALS['em_my_login_error_text']) ?  '<p class="alert alert-danger">' . $GLOBALS['em_my_login_error_text'] . '</p>'
            : "")) . '


<!-- 
Wartungsmeldung ausgeblendet
<div>
<p class="em_text"><strong>Hinweis: </strong><br>Aufgrund von Wartungsarbeiten kann es am Mittwoch, den 22.08.2018, in der Zeit von 23 Uhr bis 23:30 Uhr zu kurzen Unterbrechungen beim Login auf nw.de kommen. Wir bitten um Ihr Verständnis.</p><br><br>
</div>
Wartungsmeldung ENDE 
-->

<style>
.page-header,
.navbar.mainnav .nav-left,
.navbar.mainnav .nav-right,
.notification-counter-container,
.navbar-fixed-logo,
.nav-fixed .hamburger-container,
.breadcrumb,
.bouncer-social-links > *,
.sep-text.single.centered {
    visibility: hidden !important;
}


#header-logo img {
    visibility: visible;
}

.bouncer-social-links {
    border-top: none;
}
@media (max-width: 767px) {
    #my_daten .text-right {
        text-align: left !important;
    }
    .bouncer-social-links {
        height: 0;
    }
}
@media (min-width: 1025px) {
    h4,
    .container.site-source-script > p:not(.form-header),
    .container.site-source-script > b {
        margin: 0 33.33333%;
    }

    .container.site-source-script > b {
        display: inline-block;
    }
}
@media (min-width: 768px) and (max-width: 1024px) {
    h4,
    .container.site-source-script > p:not(.form-header),
    .container.site-source-script > b {
        margin: 0 16.66666%;
    }

    .container.site-source-script > b {
        display: inline-block;
    }
}
@media (min-width: 768px) {
    .myonline-form .form-control-container {
        padding-left: 0;
    }
}

.logo_myonline_mobile {
    margin-top: -50px;
    margin-bottom: 50px;
}

</style>

      <div class="visible-xs">
          <a href="/" class="nav-logo text-center visible-xs logo_myonline_mobile">
              <img src="/_em_daten/nw/assets/img/logo-ohne-wortmarke.png" alt="Neue Westfälische" height="60">
          </a>
      </div>

      <p class="alert alert-info">
          &middot; F&uuml;r die Anmeldung m&uuml;ssen Cookies in Ihrem Browser aktiviert sein.<br />
          &middot; ePaper-Abonnenten und nw.de-Nutzer melden sich bitte mit ihren bestehenden Zugangsdaten an.
      </p>
<div class="nw-bg-slate-300 nw-p-4 md:nw-p-8 nw-mb-6 ">
    <div class="nw-bg-white nw-py-4 nw-px-4 nw-mb-4 md:nw-max-w-md nw-mx-auto nw-rounded">  
      <div class="nw-mb-4">
          <p class="nw-text-lg nw-font-bold"> Anmelden</p>
      </div>
      <div>
          <form name="my_anmeldung" style="padding: 0 !important; border-style: none !important;   border-radius: 0 !important;  " id="my_anmeldung" class="" role="form" action="' . em_text_to_value(em_add_sid_to_query($strFormUrl)) . '" method="post" onsubmit="return em_myonline_check(this)">

            <input type="hidden" name="em_cnt" value="' . (!empty($GLOBALS['em_cnt']) ? em_text_to_value($GLOBALS['em_cnt']) : '') . '" />
            <input type="hidden" name="ref" value="' . em_text_to_value($fill['ref']) . '" />
            <div class="nw-mb-2">
                    <input required
                        class="nw-w-full nw-px-2 nw-py-3
                        nw-mx-auto nw-inline-block
                        nw-border nw-rounded nw-text-base
                        nw-box-border nw-cursor-pointer"
                    maxlength="50" size="11"
                    type="text"
                    placeholder="E-Mail"
                    name="my_user"
                    value="" />
            </div>
            <div class="nw-mb-3">
                <div class="nw-relative">
                    <div class="nw-absolute nw-right-2 nw-cursor-pointer nw-z-999 nw-m-auto" style="top: 0.875rem;">
                        <div class="nw-relative">
                            <span id="eye-login-icon1" class="nw-mr-2"  onclick="passwordToggle(passwordFieldId3, eyeIconId3);">
                                <img id="eye-img" class="nw-w-5 nw-h-5 nw-overflow-clip-margin-content-box nw-overflow-clip" alt="svg-icon"
                                       src="https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye-slash.svg">
                            </span>
                        </div>
                    </div>
                    <input
                            class="nw-w-full nw-px-2 nw-py-3 nw-mx-auto nw-inline-block nw-border nw-rounded nw-text-base nw-box-border nw-cursor-pointer"
                        maxlength="50" type="password" placeholder="'.(!empty($em_projekt[$em_client]['myonline_passwort']) ? $em_projekt[$em_client]['myonline_passwort'] : 'Passwort'). '"
                        size="11" id="my_pass" name="my_pass" value=""
                        />
                </div>
            </div>
            <p class="nw-text-right nw-text-xs nw-pb-1 nw-text-gray-600 nw-mx-auto">
                <a href="/profil/?pid=7" target="_blank"> Passwort vergessen? </a>
            </p>';
if (!empty($GLOBALS['em_my_login_error_reset_sso_sessions'])) {
    $tpl_text.= '
            <div class="input-group myonline-login-page-form-reset-session">
                <div class="checkbox">
                    <label for="my_reset_login_session_inline">
                       <input id="my_reset_login_session_inline" name="my_reset_login_session" value="1" type="checkbox">
                         Bestehende Login-Sitzungen beenden
                    </label>
                </div>
            </div>';
}
$tpl_text.= '
            <!--       
            <div class="nw-mb-8">
                <div class="checkbox">
                  <label for="my_auto_login_inline">
                    <input id="my_auto_login_inline" name="my_auto_login" value="1" type="checkbox" class="nw-w-3 nw-h-3 nw-cursor-pointer">
                      angemeldet bleiben
                  </label>
                </div>
            </div>-->

            <div>
               <button type="button" 
                    class="nw-mb-4 nw-btn-primary nw-bg-red-0 nw-mx-auto" id="submit-button"">Aufrufen
               </button>
            </div>
            <input type="submit" class="hidden" />
          </form>

          <script type="text/javascript">

jQuery(document).ready(function() {
    if (userLoyaltyClass) {
        jQuery("#my_user_loyalty_class").val(userLoyaltyClass);
    }

    // Formular absenden
    jQuery("#submit-button").click(function() {
        // Formular absenden
        jQuery("#my_anmeldung").submit();
         var eyeIcon = $("#eye-img");
    $("#my_pass").attr("type", "password");
    eyeIcon.attr("src", "https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye-slash.svg");
    });
});

  var passwordFieldId3 = "my_pass"; 
  var eyeIconId3 = "eye-img";
  function passwordToggle(passwordFieldId, eyeIconId) {
    var passwordField = document.getElementById(passwordFieldId);
    var eyeIcon = document.getElementById(eyeIconId);
    if (passwordField.type === "password") {
      passwordField.type = "text";
      eyeIcon.src = " https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye.svg";
    } else {
      passwordField.type = "password";
      eyeIcon.src =  "https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye-slash.svg";
    }
  }
          </script>
      </div>
    </div>
     <div class="nw-bg-white nw-px-4 nw-py-6 md:nw-max-w-md nw-mx-auto md:nw-shadow-md nw-rounded nw-mb-4">
          <div class="nw-pb-4">
            <p class="nw-text-center nw-text-md nw-font-bold">
                Sie haben noch keine Zugang?
            </p>
            <p class="nw-text-center nw-text-base
                      nw-font-medium nw-pb-3">
                Jetzt kostenfrei registrieren
            </p>
            <div class="nw-text-center">
                 ' . (!empty($fill['url_register']) ? '<a href="' . $fill['url_register'] . '" class="nw-w-full sm:nw-min-w-32 sm:nw-max-w-fit  nw-mx-auto
                          nw-flex nw-items-center nw-justify-center
                          nw-text-gray-600 nw-whitespace-nowrap nw-bg-white
                          nw-border nw-border-gray-600 nw-rounded-md nw-text-md nw-font-bold
                          nw-cursor-pointer nw-py-1.5 nw-px-4 hover:nw-bg-gray-0 focus:nw-bg-gray-100">oder Registrieren</a>' : '') . '
            </div>
          </div>
     </div>
     <div class="nw-p-6 nw-rounded nw-bg-white md:nw-max-w-md nw-mx-auto">
          <p class="nw-font-bold nw-text-md nw-pb-6">Sie haben Fragen zu Ihrer Anmeldung oder Registrierung?</p>
          <div class="nw-text-sm nw-flex nw-flex-col md:nw-flex-row nw-justify-between nw-gap-4">
              <div class="nw-font-medium">
                  <p class="nw-text-gray-500 nw-uppercase nw-font-bold">KONTAKT</p>
                  <p>Tel.:  <a href="tel:(0521) 555 800" class="nw-cursor-pointer hover:nw-text-gray-500">(0521) 555 800</a>
                  </p>
                  <p>E-Mail: <a href="mailto:nwplus@nw.de" class="nw-cursor-pointer hover:nw-text-gray-500 nw-underline">nwplus@nw.de</a>
                  </p>
              </div>
              <div class="nw-font-medium">
                <p class="nw-text-gray-500 nw-uppercase nw-font-bold">SERVICEZEITEN</p>
                <p>Mo - Fr: 6 - 10 Uhr <br>
                  Sa: 6 - 13 Uhr <br>
                  an Feiertagen: 7 - 13 Uhr<br>
                  (außer Weihnachten und Ostern)</p>
              </div>
          </div>
     </div>
</div>

' . (!empty($fill['text']) ? '

    ' . em_text_to_html($fill['text']) . '

' : '') . '';