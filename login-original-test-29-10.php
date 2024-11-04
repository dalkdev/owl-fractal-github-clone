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

@media (min-width: 1025px) {
.myonline-box {
    margin-top: -100px;
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

<div class="myonline-login-page-form-container col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-6">
    <form name="my_anmeldung" id="my_anmeldung" class="nw-p-6 nw-border nw-rounded-lg form-horizontal myonline-login-page-form " role="form" action="' . em_text_to_value(em_add_sid_to_query($strFormUrl)) . '" method="post" onsubmit="return em_myonline_check(this)">

        <input type="hidden" name="em_cnt" value="' . (!empty($GLOBALS['em_cnt']) ? em_text_to_value($GLOBALS['em_cnt']) : '') . '" />
        <input type="hidden" name="ref" value="' . em_text_to_value($fill['ref']) . '" />

        <div class="form-group">
            <div class="col-sm-12 form-control-container">
                <div class="row">
                    <div class="col-xs-6">
                        <p class="nw-text-lg nw-underline">Anmelden</p>
                    </div>
                    <div class="col-xs-6">
                        ' . (!empty($fill['url_register']) ? '<a href="' . $fill['url_register'] . '" class="nw-text-md nw-text-gray-300">oder Registrieren</a>' : '') . '
                    </div>
                </div>
            </div>
        </div>
        <div class="nw-mb-4">
            <input name="my_user" value="" type="text" maxlength="50" size="11" class="nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-text-tiny nw-inline-block nw-border nw-rounded nw-box-border nw-cursor-pointer" placeholder="Benutzername o. E-Mail">
        </div>
        <div>
            <input type="password" class="nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-text-tiny nw-inline-block nw-border nw-rounded nw-box-border nw-cursor-pointer" maxlength="50" size="11" name="my_pass" value="" placeholder="'.(!empty($em_projekt[$em_client]['myonline_passwort']) ? $em_projekt[$em_client]['myonline_passwort'] : 'Passwort'). '">
            <a href="/profil/?pid=7" class="nw-text-gray-300 nw-text-xs pull-right">Passwort vergessen?</a>
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
       <div class="nw-mb-8">
<div class="checkbox">
<label for="my_auto_login_inline">
<input id="my_auto_login_inline" name="my_auto_login" value="1" type="checkbox" class="nw-w-3 nw-h-3 nw-cursor-pointer">
angemeldet bleiben
</label>
</div>
</div>
        <div class="form-group">
            <button type="button" class="nw-flex nw-justify-center nw-items-center nw-rounded-lg nw-border nw-text-white nw-bg-red-0 nw-border-red-0 nw-mx-auto nw-w-3/4 hover:nw-bg-white hover:nw-text-red-0 center-block" onclick="jQuery(\'#my_anmeldung\').submit();">Jetzt anmelden</button>
        </div>
        <input type="submit" class="hidden" />
    </form>

    <script type="text/javascript">
        jQuery(document).ready(function(){
            if (userLoyaltyClass) {
                jQuery("#my_user_loyalty_class").val(userLoyaltyClass);
            }
        });
    </script>
</div>

' . (!empty($fill['text']) ? '

    ' . em_text_to_html($fill['text']) . '

' : '') . '';