<?php
$tpl_text = '';
$googleoAuthURL = (new App\Controller\LoginController)->getOAuthUrl('nwgoogle', '2UWr)kNKxd&7jczeR6SA4=}hP');

$tpl_text = '<script src="https://accounts.google.com/gsi/client" async></script>';

$strFormUrl = preg_replace('/pid=[\d_]+/', '', $_SERVER['REQUEST_URI']);

if (em_get_var_value('pid') == 5) {
    $tpl_text.= '<p class="alert alert-warning">Um den Newsletterbereich nutzen zu k&ouml;nnen, m&uuml;ssen Sie angemeldet sein.</p>';
}

$tpl_text.= '



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

@media (min-width: 768px) {
   .md\:nw-rounded {
      border-radius: 0.25rem; 
    }
}
  
</style>

      <!-- <div class="visible-xs">
          <a href="/" class="nav-logo text-center visible-xs logo_myonline_mobile">
              <img src="/_em_daten/nw/assets/img/logo-ohne-wortmarke.png" alt="Neue Westfälische" height="60">
          </a>
      </div>-->

      <p class="alert alert-info nw-mx-4 md:nw-mx-0">
          &middot; F&uuml;r die Anmeldung m&uuml;ssen Cookies in Ihrem Browser aktiviert sein.<br />
          &middot; ePaper-Abonnenten und nw.de-Nutzer melden sich bitte mit ihren bestehenden Zugangsdaten an.
      </p>
<div class="nw-bg-slate-300 md:nw-rounded nw-px-4 nw-pb-6 nw-pt-8 md:nw-p-8 nw-mb-6 ">
<div class="nw-mx-auto" style="max-width: 472px;">
    <div class="nw-bg-white nw-p-4 nw-pt-6 nw-mb-4 nw-rounded">  
      <div class="nw-mb-4">
          <p class="nw-text-lg nw-font-bold"> Anmelden</p>
      </div>
      ' . (!empty($fill['error_message']) ? '<div class="nw-mb-4 nw-p-4 nw-rounded-m nw-shadow-md" style="background-color: #F2F5F9;">
                                          <div class="nw-flex nw-items-top nw-mb-3.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                              class="nw-w-6 nw-h-6 nw-mr-1 nw-text-red-0">
                                              <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                              </svg>
                                              <p class="nw-text-base nw-font-bold">Es ist einen Fehler aufgetreten</p>
                                            </div>
                                            <p class="nw-text-sm nw-font-medium nw-text-slate-300">' . $fill['error_message'] . '</p> 
                                      </div>' :
        (!empty($GLOBALS['em_my_login_error_text']) ?  '<p class="alert alert-danger">' . $GLOBALS['em_my_login_error_text'] . '</p>'
            : "")) . '
      <div>
          <form name="my_anmeldung" style="padding: 0 !important; border-style: none !important;   border-radius: 0 !important;  " id="my_anmeldung" class="testingForm" role="form" action="' . em_text_to_value(em_add_sid_to_query($strFormUrl)) . '" method="post" onsubmit="return em_myonline_check(this)">

            <input type="hidden" name="em_cnt" value="' . (!empty($GLOBALS['em_cnt']) ? em_text_to_value($GLOBALS['em_cnt']) : '') . '" />
            <input type="hidden" name="ref" value="' . em_text_to_value($fill['ref']) . '" />
            <div class="nw-mb-2">
                    <input required
                        class="nw-w-full nw-p-3
                        nw-mx-auto nw-inline-block
                        nw-border nw-rounded nw-text-base
                        nw-box-border nw-cursor-pointer"
                    maxlength="50" size="11"
                    type="text"
                    placeholder="E-Mail"
                    name="my_user"
                    value="" />
            </div>
            <div class="nw-mb-2">
                <div class="nw-relative">
                    <div class="nw-absolute nw-right-2 nw-cursor-pointer nw-z-999 nw-m-auto" style="top: 0.875rem;">
                        <div class="nw-relative">
                            <span id="eye-login-icon1" class="nw-mr-2"  onclick="passwordToggle(passwordFieldId3, eyeIconId3);">
                                <img id="eye-img" class="nw-w-6 nw-h-6 nw-overflow-clip-margin-content-box nw-overflow-clip" alt="svg-icon"
                                       src="https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye-slash.svg">
                            </span>
                        </div>
                    </div>
                    <input
                            class="nw-w-full nw-p-3 nw-mx-auto nw-inline-block nw-border nw-rounded nw-text-base nw-box-border nw-cursor-pointer"
                        maxlength="50" type="password" placeholder="'.(!empty($em_projekt[$em_client]['myonline_passwort']) ? $em_projekt[$em_client]['myonline_passwort'] : 'Passwort'). '"
                        size="11" id="my_pass" name="my_pass" value=""
                        />
                </div>
            </div>
            <p class="nw-text-right nw-text-xs nw-pb-3 nw-text-gray-600 nw-mx-auto">
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
               <button type="button" style="min-width: 216px !important;"
                    class="nw-mb-4 nw-btn-primary nw-flex nw-justify-center nw-bg-red-0 nw-mx-auto" id="submit-button"">Aufrufen
               </button>
            </div>
            <input type="submit" class="hidden" />
            <!--
            <a id="btn_google_login" class="nw-w-full sm:nw-min-w-32 sm:nw-max-w-fit  nw-mx-auto
nw-flex nw-items-center nw-justify-center
nw-text-gray-600 nw-whitespace-nowrap nw-bg-white
nw-border nw-border-gray-600 nw-rounded-md nw-text-md nw-font-bold
nw-cursor-pointer nw-py-1.5 nw-px-4 hover:nw-bg-gray-0 focus:nw-bg-gray-100" href="'.$googleoAuthURL.'" role="button">
<span class="fa fa-google"></span>Mit Google einloggen</a>-->
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
     <div class="nw-bg-white nw-p-6 nw-rounded nw-mb-4">
          <div class="nw-pb-4">
            <p class="nw-text-center nw-text-lg nw-font-bold">
               Noch keinen Zugang?
            </p>
            <p class="nw-text-center nw-text-base
                      nw-font-medium nw-pb-3">
               Kostenfrei anmelden und Vorteile sichern
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
     <div class="nw-px-4 nw-py-6  nw-rounded nw-bg-white ">
          <p class="nw-font-bold nw-text-md nw-pb-6">Sie haben Fragen oder Anmerkungen?</p>
          <div class="nw-text-sm nw-flex nw-flex-col md:nw-flex-row nw-justify-between nw-gap-4">
              <div class="nw-font-medium nw-text-gray-600 ">
                  <p class="nw-text-gray-500 nw-uppercase nw-font-bold">KONTAKT</p>
                  <p>Tel.:  <a href="tel:(0521) 555 800" class="nw-cursor-pointer hover:nw-text-gray-500">(0521) 555 800</a>
                  </p>
                  <p>E-Mail: <a href="mailto:nwplus@nw.de" class="nw-cursor-pointer hover:nw-text-gray-500 nw-underline">nwplus@nw.de</a>
                  </p>
              </div>
              <div class="nw-font-medium">
        <p class="nw-text-gray-500 nw-uppercase nw-font-bold">SERVICEZEITEN</p>
        <p class="nw-font-medium nw-text-gray-600">Mo - Fr: 6 - 10 Uhr <br>
          Sa: 6 - 13 Uhr <br>
          an Feiertagen: 7 - 13 Uhr<br>
          (außer Weihnachten und Ostern)</p>
      </div>
          </div>
     </div>
    </div>
</div>

' . (!empty($fill['text']) ? '

    ' . em_text_to_html($fill['text']) . '

' : '') . '';