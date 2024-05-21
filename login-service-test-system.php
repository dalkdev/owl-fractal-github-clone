<?php
$tpl_text = '';

$strFormUrl = preg_replace('/pid=[\d_]+/', '', $_SERVER['REQUEST_URI']);

$tpl_text.= '
' . (!empty($fill['error_message']) ? '<p class="alert alert-danger">' . $fill['error_message'] . '</p>' :
        (!empty($GLOBALS['em_my_login_error_text']) ?  '<p class="alert alert-danger">' . $GLOBALS['em_my_login_error_text'] . '</p>'
            : "")) . '


<!-- Wartungsmeldung ausgeblendet
<div>
<p class="em_text"><strong>Hinweis: </strong><br>Aufgrund von Wartungsarbeiten kann es am Mittwoch, den 22.08.2018, in der Zeit von 23 Uhr bis 23:30 Uhr zu kurzen Unterbrechungen beim Login auf nw.de kommen. Wir bitten um Ihr Verständnis.</p><br><br>
</div>
Wartungsmeldung ENDE -->

<style>
.page-header,
.navbar.mainnav .nav-left,
.navbar.mainnav .nav-right,
.notification-counter-container,
.navbar-fixed-logo,
.nav-fixed .hamburger-container,
.bouncer-social-links > *,
.sep-text.single.centered {
    visibility: hidden !important;
}

#breadcrumb-wrapper {
    overflow: inherit;
    z-index: 1;
}
@media (max-width: 767px) {
     #breadcrumb-wrapper {
         top: 20px;
     }
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

@media (min-width: 1025px) {
    .myonline-box {
        margin-top: -100px;
    }
}

.logo_myonline_mobile {
    margin-top: -50px;
    margin-bottom: 50px;
}

.service-login-box {
    border: none !important;
    box-shadow: 0 0 8px rgba(0,0,0,.1);
    padding: 25px;
    border-radius: 4px !important;
    background: white;
    margin-right: 0 !important;
    margin-left: 0 !important;
}

.service-login-box .btn {
    max-width: 220px;
    margin-right: 0 !important;
    margin-left: 0 !important;
}

.service-login-box .btn.btn-secondary {
    border: 1px solid #ccc;
}

.service-login-box .myonline-login-page-form-forgot {
    margin-top: 3px;
}

@media (min-width: 768px) {
    [data-site-id="23849"] .row.margin-top-30.src-script {
         margin-top: -30px !important;
    }
}

</style>

<div class="hidden">
    <a href="/" class="nav-logo text-center visible-xs logo_myonline_mobile">
        <img src="/_em_daten/nw/assets/img/nw-wortmarke-logo.svg" alt="Neue Westfälische" height="60" style="display:inline-block;">
    </a>
</div>

<div class="myonline-login-page-form-container col-xs-12 col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-4 nw-mb-6">
    <form name="my_anmeldung" id="my_anmeldung" class="service-login-box form-horizontal myonline-login-page-form " role="form" action="' . em_text_to_value(em_add_sid_to_query($strFormUrl)) . '" method="post" onsubmit="return em_myonline_check(this)">

        <input type="hidden" name="em_cnt" value="' . (!empty($GLOBALS['em_cnt']) ? em_text_to_value($GLOBALS['em_cnt']) : '') . '" />
        <input type="hidden" name="ref" value="' . (!empty($fill['ref']) ? em_text_to_value($fill['ref']) : '') . '" />

        <div class="form-group">
            <div class="form-control-container">
                <div class="nw-mb-2 nw-font-bold nw-text-xl">Sie möchten eine Anzeige aufgeben?</div>
                <div class="nw-text-tiny nw-font-semibold">Bitte melden Sie sich an</div>
            </div>
        </div>
        <div class="myonline-login-page-form-user input-group">
            <input name="my_user" type="text" maxlength="50" size="11" class="nw-rounded-md nw-appearance-none nw-min-w-0 nw-w-full nw-bg-white nw-border nw-nw-border-transparent nw-nw-rounded-md nw-py-1 nw-px-2 nw-text-tiny nw-text-gray-900 nw-placeholder-gray-300" placeholder="Benutzername o. E-Mail">
        </div>
        <div class="myonline-login-page-form-password input-group">
            <input type="password" class="nw-rounded-md nw-appearance-none nw-min-w-0 nw-w-full nw-bg-white nw-border nw-nw-border-transparent nw-nw-rounded-md nw-py-1 nw-px-2 nw-text-tiny nw-text-gray-900 nw-placeholder-gray-300" maxlength="50" size="11" name="my_pass" value="" placeholder="'.(!empty($em_projekt[$em_client]['myonline_passwort']) ? $em_projekt[$em_client]['myonline_passwort'] : 'Passwort'). '">
            <a href="/profil/?pid=7" class="myonline-login-page-form-forgot pull-right">Passwort vergessen?</a>
        </div>';
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
        <div class="input-group myonline-login-page-form-autologin">
            <div class="checkbox">
                <label for="my_auto_login_inline">
                    <input id="my_auto_login_inline" name="my_auto_login" value="1" type="checkbox">
                    Angemeldet bleiben
                </label>
            </div>
        </div>
        <div class="nw-mb-0 form-group myonline-login-page-form-login">
            <button type="button" class="btn btn-primary nw-font-medium nw-text-tiny btn-ad-service nw-mb-0 nw-rounded-md" onclick="jQuery(\'#my_anmeldung\').submit();">Anmelden</button>
        </div>
        <input type="submit" class="hidden" />
    </form>
    <div class="service-login-box nw-mt-4">
        <div class="nw-text-center">
            <div class="nw-font-bold nw-text-lg">Sie haben noch kein Zugang?</div>
            <div class="nw-text-tiny nw-font-semibold">Jetzt kostenfrei registrieren</div>
            <a type="button" class="nw-mt-2 btn btn-secondary nw-border nw-rounded-md nw-py-1 nw-px-4 nw-text-tiny nw-font-semibold hover:nw-bg-red-400 focus:nw-outline-none focus:nw-ring-2 focus:nw-ring-offset-2 focus:nw-ring-offset-gray-800 focus:nw-ring-indigo-500" href="/anzeigen/service/register">Zur Registrierung</a>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function(){
            if (userLoyaltyClass) {
                jQuery("#my_user_loyalty_class").val(userLoyaltyClass);
            }
        });
    </script>
</div>
<style>
@media (min-width: 1025px) {
    [data-site-id="23849"] .col-xs-12.col-md-12 {
        width: 66.66666667%;
    }
    [data-site-id="23849"] .col-xs-12.col-md-12 > .alert.alert-info {
        margin-left: 25%;
        margin-right: -25%;
    }
}
    
[data-site-id="23849"].container.site-source-script {
    background: #e8e8e8;
}
</style>


' . (!empty($fill['text']) ? '

    ' . em_text_to_html($fill['text']) . '

' : '') . '';