<?php
$tpl_text = '';

$shortRegister = em_get_var_sended('complete') ? 0 : 1;

$tpl_text .= '<div id="registration-wrapper" class="nw-rounded-md nw-pb-6 nw-p-4 md:nw-p-8"><p
    class="alert alert-danger nw-max-w-md nw-mx-auto' . (empty($fill['update_error']) ? ' hidden' : '') . '">' .
    nl2br($fill['update_error']) . '</p>';

$tpl_text .= em_load_template("drittanbieter_upscore", $fill);
$optin_text = "Ich erhalte durch die Registrierung die oben beschriebenen Vorteile. Im Gegenzug stelle ich dem Zeitungsverlag Neue Westfälische GmbH & Co. KG meine E-Mail-Adresse zum Versand redaktioneller Newsletter und zur Information über ihre interessanten NW-Verlagsprodukte und -angebote (Zeitungen, Zeitschriften, Abo, Leserreisen, Leservorteile, NW-Karte, Gewinnspiele) auch durch ihre Dienstleister zur Verfügung. Dies wird ausdrücklich als vertragliche Gegenleistung für das zur Verfügung gestellte Angebot vereinbart. Eine Weitergabe Ihrer personenbezogenen Daten an Dritte findet nicht statt. Rechtsgrundlage für die Datenverarbeitung ist Art. 6 Abs. 1 lit. b DSGVO. Ich habe jederzeit ohne Angabe von Gründen per E-Mail an datenschutz@nw.de oder in Textform an Zeitungsverlag Neue Westfälische GmbH & Co. KG, Abteilung Datenschutz, Niedernstraße 21-27, 33602 Bielefeld die Möglichkeit, diesen Vertrag zu beenden, sodass damit die oben beschriebene Leistung, als auch die Gegenleistung (werbliche Ansprache per E-Mail) entfällt.";


$tpl_text .= '

<style>
    .page-header,
    .navbar.mainnav .nav-left,
    .navbar.mainnav .nav-right,
    .notification-counter-container,
    .navbar-fixed-logo,
    .nav-fixed .hamburger-container,
    .breadcrumb,
    .bouncer-social-links > * {
        visibility: hidden !important;
    }

    .sep-text.single.centered,
    #breadcrumb-wrapper {
        display: none;
    }

    #header-logo img {
        visibility: visible;
    }

    .bouncer-social-links {
        border-top: none;
    }

    .svg-green {
        color: #3A9472;
    }

    @media (max-width: 767px) {
        #my_daten .text-right {

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

    #registration-wrapper {
        background-color: #4A5568;
    }

    ::-ms-reveal {
        display: none;
    }

    .nw-py-14px {
        padding-top: 0.875rem;
        padding-bottom: 0.875rem;
    }

    .checkbox input[type="checkbox"] {
        margin-right: 7px;
    }
    
    .checkbox label {
        font-size: 12px;
        font-weight: 500;
    }
     
      select {
        padding-right: 30px;
        font-size: 14px;
        position: relative;
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;
        background: url("data:image/svg+xml;utf8,<svg width=\'20\' height=\'20\' xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 20 20\' fill=\'%234A5568\' ><path fill-rule=\'evenodd\' d=\'M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z\' clip-rule=\'evenodd\' /></svg>") no-repeat;
        background-position: right 5px top 50%;
    }
   
</style>
<script src="https://js.hcaptcha.com/1/api.js?hl=de" async defer></script>
<div class="form-wrapper nw-p-4 nw-rounded-md nw-bg-white nw-max-w-md nw-mx-auto ">
    <form name="my_daten" id="my_daten" action="' . $fill['form_action'] . '" class="myonline-form form-horizontal"
          method="post"
    ' . ($fill['js_proof'] ? 'onsubmit="return mydaten_check(this)"' : '') . ' role="form" >
   
    <input type="hidden" name="optin" value="1"> 
    <input type="hidden" name="source" value="nl-register-regwall">
    <input type="hidden" name="optin_text" value="' . htmlspecialchars($optin_text) . '">
    <input type="hidden" name="my_is_optin" value="1">
    <input type="hidden" name="reg-wall" value="' . ( ($_POST['reg-wall']) ? 1 : 0 ) . '">
    <input type="hidden" name="pid" value="2_1"/>
    <input type="hidden" name="em_cnt" value="' . (!empty($GLOBALS['em_cnt']) ? $GLOBALS['em_cnt'] : '') . '"/>
    <input type="hidden" name="ref" value="' . (!empty($fill['ref']) ? em_text_to_value($fill['ref']) : '') . '"/>
    <input type="hidden" name="paywall_type"
           value="' . (!empty($fill['paywall_type']) ? $fill['paywall_type'] : '') . '"/>
    <input type="hidden" name="my_user_loyalty_class" id="my_user_loyalty_class" value=""/>

    <!--  <div class="form-group">

      </div>-->
    <div class="nw-mb-1">
        <p
            class="
        nw-text-left
        nw-text-lg
        nw-leading-5
        nw-font-bold
        nw-pb-1
      "
        >
            Registrierung
        </p>
        <p
            class="
        nw-text-left
        nw-text-tiny
        nw-leading-8
        nw-font-medium
        nw-py-1
      "
        >
            Ihre Vorteile
        </p>
    </div>
    <ul role="list" class="nw-mb-4 nw-text-left nw-font-medium nw-text-tiny">
        <li class="nw-flex nw-items-center nw-space-x-1">
            <svg class="nw-flex-shrink-0 nw-w-5 nw-h-5 nw-text-green-500 svg-green" fill="currentColor"
                 viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"></path>
            </svg>
            <span>Artikel freischalten (außer NW+)</span>
        </li>
        <li class="nw-flex nw-items-center nw-space-x-1">
            <svg class="nw-w-5 h-5 nw-text-green-500 svg-green" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"></path>
            </svg>
            <span>redaktioneller Newsletter</span>
        </li>
        <li class="nw-flex nw-items-center nw-space-x-1 ">
            <svg class="nw-w-5 nw-h-5 nw-text-green-500 svg-green" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"></path>
            </svg>
            <span>Kommentarfunktion</span>
        </li>
    </ul>
    ';

if (!$shortRegister) {
    $tpl_text .= '
    <div class="form-group">
        <div class="col-sm-12 form-control-container">
            <select name="my_gender" class="form-control" id="my_gender">
                <option value=""
                ' . (!empty($fill['sele_empty']) ? $fill['sele_empty'] : '') . '>Bitte wählen</option>
                <option value="Frau"
                ' . $fill['sele_frau'] . '>Frau</option>
                <option value="Herr"
                ' . $fill['sele_herr'] . '>Herr</option>
                ' . (!empty($em_projekt[$em_client]['myonline_firma']) ? '
                <option value="Firma"
                ' . $fill['sele_firma'] . '>Firma</option>
                ' : '') . '
            </select>
        </div>
    </div>
    ';
}

if (!$shortRegister
    && !empty($em_projekt[$em_client]['myonline_firma'])
) {
    $tpl_text .= '
    <div class="form-group">
        <div class="col-sm-12 form-control-container">
            <input type="text" class="form-control" id="my_company" name="my_company" placeholder="Firma"
                   value="' . (!empty($fill['company']) ? $fill['company'] : '') . '">
        </div>
    </div>
    ';
}
/*
$tpl_text .= '
<div
    class="form-group' . ((!empty($fill['error']['my_firstname']) || !empty($fill['error']['my_name'])) ? ' has-error' : '') . '">
    <div class="col-sm-12 form-control-container">
        <div class="row">
            <div class="col-xs-6">
                <label class="nw-uppercase" for="my_firstname">Vorname</label>
                <input type="text" class="form-control" id="my_firstname" name="my_firstname"
                       value="' . (!empty($fill['firstname']) ? $fill['firstname'] : '') . '"/>
            </div>
            <div class="col-xs-6">
                <label class="nw-uppercase" for="my_name">Nachname</label>
                <input type="text" class="form-control" id="my_name" name="my_name"
                       value="' . (!empty($fill['name']) ? $fill['name'] : '') . '"/>
            </div>
        </div>
    </div>
</div>
';*/

// Mailadresse aus POST oder aus evolver-Skript vorhanden?
$mailaddress = '';
if (!empty($fill['email'])) {
    $mailaddress = $fill['email'];
} elseif (!empty($_POST['email-address'])) {
    $mailaddress = $_POST['email-address'];
}

$tpl_text .= '
    <div class="nw-mb-3' . (!empty($fill['error']['my_email']) ? ' has-error' : '') . '">
            <label class="input-label email-label nw-font-medium nw-text-xs nw-uppercase"
                   for="my_email">E-Mail*</label>
            <!-- <input
                 class="nw-formfield nw-w-full nw-px-2 nw-py-1.5 nw-mx-auto nw-inline-block nw-border-2 nw-border-solid nw-rounded nw-text-base nw-box-border nw-cursor-pointer"
                 type="email" placeholder="" name="my_email" id="my_email"
                 value="' . (!empty($fill['email']) ? $fill['email'] : '') . '"> -->

            <input
                class="nw-formfield nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-inline-block nw-border nw-rounded nw-text-tiny nw-box-border nw-cursor-pointer"
                type="email" placeholder="" name="my_email" id="my_email"
                value="' . $mailaddress . '">
    </div>
    ';

if (empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['bolUseDOI'])) {
    $tpl_text .= '
    <div class="nw-mb-3' . (!empty($fill['error']['my_new_pass']) ? ' has-error' : '') . '">
            <label class="input-label password-label nw-font-medium nw-text-xs nw-uppercase"
                   for="my_new_pass">Passwort*</label>
            <div class="nw-relative">
                <div class="nw-absolute nw-right-2 nw-cursor-pointer nw-z-999 nw-m-auto">
                    <div class="nw-relative">
                                <span id="eye-icon" class="nw-mr-1 nw-mt-2 nw-flex nw-justify-center" onclick="passwordToggle();">
                                    <img id="eye-img"
                                         class="nw-w-6 nw-h-6 nw-overflow-clip-margin-content-box nw-overflow-clip"
                                         alt=""
                                         src="https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye.svg">
                                </span>
                    </div>
                </div>
                <input
                    class="nw-formfield nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-inline-block nw-border nw-rounded nw-text-tiny nw-box-border nw-cursor-pointer"
                    type="password" placeholder="Mindestlänge 6 Zeichen" name="my_new_pass"
                    id="my_new_pass">
            </div>
    </div><!--

<div class="form-group">
    <div>
        <label class="input-label password-confirm-label nw-font-medium nw-text-xs nw-uppercase nw-text-black nw-tracking-normal" for="my_new_pass_confirm">Passwort bestätigen*</label>
            <input
                class="nw-formfield nw-w-full nw-px-2 nw-py-1.5 nw-mx-auto nw-inline-block nw-border-2 nw-border-solid nw-rounded nw-text-base nw-box-border nw-cursor-pointer"
                type="password"  name="my_new_pass_confirm"
                id="my_new_pass_confirm">
    </div>
</div>-->';
}

/*$tpl_text .= '
<div class="form-group">
    <div class="col-sm-12 form-control-container">
        <select name="my_gender" class="form-control" id="my_gender">
            <option value=""
            ' . (!empty($fill['sele_empty']) ? $fill['sele_empty'] : '') . '>Bitte wählen</option>
            <option value="Frau"
            ' . $fill['sele_frau'] . '>Frau</option>
            <option value="Herr"
            ' . $fill['sele_herr'] . '>Herr</option>
            ' . (!empty($em_projekt[$em_client]['myonline_firma']) ? '
            <option value="Firma"
            ' . $fill['sele_firma'] . '>Firma</option>
            ' : '') . '
        </select>
    </div>
</div>
';*/
$tpl_text .= '
    <div class="nw-mb-3">
        <label class="input-label region-label nw-font-medium nw-text-xs nw-uppercase" for="my_region">MEINE REGION*</label>
            <select class="nw-formfield nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-text-tiny nw-inline-block nw-border
                nw-rounded nw-box-border nw-cursor-pointer" id="my_region" name="nl_id">
                        <option value="" disabled selected hidden>Bitte wählen</option>
                        <option value="14">Bielefeld</option>
                        <option value="15">Kreis Gütersloh</option>
                        <option value="16">Kreis Herford</option>
                        <option value="17">Kreis Höxter</option>
                        <option value="18">Kreis Minden-Lübbecke</option>
                        <option value="19">Kreis Paderborn</option>

            </select>
        </div>
        ';

$tpl_text .= '
    <div class="nw-mb-3">
        <label class="input-label anrede-label nw-font-medium nw-text-xs nw-uppercase" for="my_gender">Anrede*</label>
        <select class="nw-formfield nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-text-tiny nw-inline-block nw-border
            nw-rounded nw-box-border nw-cursor-pointer" id="my_gender" name="my_gender">
            <option value="" disabled selected hidden>Bitte wählen</option>
            <option value="Herr"
            ' . (!empty($fill['sele_herr']) ? ' selected' : '') . '>Herr</option>
            <option value="Frau"
            ' . (!empty($fill['sele_frau']) ? ' selected' : '') . '>Frau</option>
             <option value="Divers"
            ' . (!empty($fill['sele_divers']) ? ' selected' : '') . '>Divers</option>
             <option value="Firma"
            ' . (!empty($fill['sele_firma']) ? ' selected' : '') . '>Firma</option>
            
        </select>
    </div>
    ';

$tpl_text .= '
    <div
        class="nw-mb-3' . ((!empty($fill['error']['my_firstname']) || !empty($fill['error']['my_name'])) ? ' has-error' : '') . '">
        <div class="nw-mb-3">
            <label class="input-label vorname-label nw-font-medium nw-text-xs nw-uppercase"
                   for="my_firstname">Vorname*</label>
            <input
                class="nw-formfield nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-text-tiny nw-inline-block nw-border nw-rounded nw-box-border nw-cursor-pointer"
                type="text" id="my_firstname" name="my_firstname"
                value="' . (!empty($fill['firstname']) ? $fill['firstname'] : '') . '"/>
        </div>

        <div>
            <label class="input-label nachname-label nw-font-medium nw-text-xs nw-uppercase"
                   for="my_name">Nachname*</label>
            <input
                class=" nw-formfield nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-text-tiny nw-inline-block nw-border nw-rounded nw-box-border nw-cursor-pointer"
                type="text" id="my_name" name="my_name" value="' . (!empty($fill['name']) ? $fill['name'] : '') . '"/>
        </div>
    </div>
    ';
/*$tpl_text .= '
<div
    class="form-group' . (!empty($fill['error']['my_strasse']) || !empty($fill['error']['my_hausnr']) ? ' has-error' : '') . '">
    <div class="col-sm-12 form-control-container">
        <div class="row">
            <div class="col-xs-8">
                <input type="text" class="form-control" id="my_strasse" name="my_strasse" placeholder="Straße"
                       value="' . (!empty($fill['street']) ? $fill['street'] : '') . '">
            </div>
            <div class="col-xs-4">
                <input type="text" class="form-control" id="my_hausnr" name="my_hausnr" placeholder="Nr."
                       value="' . (!empty($fill['number']) ? $fill['number'] : '') . '">
            </div>
        </div>
    </div>
</div>
<div
    class="form-group' . (!empty($fill['error']['my_zip']) || !empty($fill['error']['my_ort']) ? ' has-error' : '') . '">
    <div class="col-sm-12 form-control-container">
        <div class="row">
            <div class="col-xs-4">
                <input type="text" class="form-control" id="my_zip" name="my_zip" placeholder="PLZ"
                       value="' . (!empty($fill['zip']) ? $fill['zip'] : '') . '">
            </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="my_ort" name="my_ort" placeholder="Ort"
                       value="' . (!empty($fill['city']) ? $fill['city'] : '') . '">
            </div>
        </div>
    </div>
</div>
';*/
$tpl_text .= '
    <div class="nw-grid nw-grid-cols-1 md:nw-grid-cols-3 md:nw-gap-2">
        <div class="nw-col-span-2 nw-mb-3">
                <label class="nw-font-medium nw-text-xs nw-uppercase" for="my_strasse">Straße</label>
                <input type="text" class="nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-inline-block nw-border
                    nw-rounded nw-text-tiny nw-box-border nw-cursor-pointer" id="my_strasse" name="my_strasse" placeholder=""
                       value="' . (!empty($fill['street']) ? $fill['street'] : '') . '">
        </div>
        <div class="nw-mb-3">
                <label class="nw-font-medium nw-text-xs nw-uppercase" for="my_hausn">Hausnummer</label>
                <input type="text" class="nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-inline-block nw-border
                    nw-rounded nw-text-tiny nw-box-border nw-cursor-pointer" id="my_hausnr" name="my_hausnr" placeholder=""
                       value="' . (!empty($fill['number']) ? $fill['number'] : '') . '">
        </div>
    </div>
    ';

$tpl_text .= '
    <div class="nw-grid nw-grid-cols-1 md:nw-grid-cols-3 md:nw-gap-2">
            <div class="nw-mb-3">
                <label class="input-label plz-label nw-font-medium nw-text-xs nw-uppercase" for="my_zip">PLZ</label>
                <input type="text" class="nw-formfield nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-inline-block nw-border
                    nw-rounded nw-text-tiny nw-box-border nw-cursor-pointer" id="my_zip" name="my_zip" placeholder=""
                       value="' . (!empty($fill['zip']) ? $fill['zip'] : '') . '">
            </div>
        <div class="nw-col-span-2 nw-mb-4">
                <label class="nw-font-medium nw-text-xs nw-uppercase" for="my_ort">Ort</label>
                <input type="text" class="nw-w-full nw-px-1 nw-py-2 nw-mx-auto nw-inline-block nw-border
                nw-rounded nw-text-tiny nw-box-border nw-cursor-pointer" id="my_ort" name="my_ort" placeholder=""
                       value="' . (!empty($fill['city']) ? $fill['city'] : '') . '">
        </div>
    </div>
    ';

/*$tpl_text .= '
<div class="nw-mb-6">
    <label class="nw-font-medium nw-text-xs nw-uppercase" for="my_country">Land</label>
    <select class="nw-formfield nw-w-full nw-px-2 nw-py-1 nw-mx-auto nw-text-base nw-inline-block nw-border-2 nw-border-solid
nw-rounded nw-text-base nw-box-border nw-cursor-pointer" type="text" placeholder="" name="my_country"
            id="my_country">
        <option value="Deutschland">Deutschland</option>
        <option value="herr">Herr</option>
        <option value="frau">Frau</option>
    </select>
</div>
';*/


if (!$shortRegister) {
    $tpl_text .= '
    <div
        class="form-group' . (!empty($fill['error']['my_strasse']) || !empty($fill['error']['my_hausnr']) ? ' has-error' : '') . '">
        <div class="col-sm-12 form-control-container">
            <div class="row">
                <div class="col-xs-8">
                    <input type="text" class="form-control" id="my_strasse" name="my_strasse" placeholder="Straße"
                           value="' . (!empty($fill['street']) ? $fill['street'] : '') . '">
                </div>
                <div class="col-xs-4">
                    <input type="text" class="form-control" id="my_hausnr" name="my_hausnr" placeholder="Nr."
                           value="' . (!empty($fill['number']) ? $fill['number'] : '') . '">
                </div>
            </div>
        </div>
    </div>
    <div
        class="form-group' . (!empty($fill['error']['my_zip']) || !empty($fill['error']['my_ort']) ? ' has-error' : '') . '">
        <div class="col-sm-12 form-control-container">
            <div class="row">
                <div class="col-xs-4">
                    <input type="text" class="form-control" id="my_zip" name="my_zip" placeholder="PLZ"
                           value="' . (!empty($fill['zip']) ? $fill['zip'] : '') . '">
                </div>
                <div class="col-xs-8">
                    <input type="text" class="form-control" id="my_ort" name="my_ort" placeholder="Ort"
                           value="' . (!empty($fill['city']) ? $fill['city'] : '') . '">
                </div>
            </div>
        </div>
    </div>
    <div class="form-group' . (!empty($fill['error']['my_user']) ? ' has-error' : '') . '">
        <div class="col-sm-12 form-control-container">
            <input type="text" class="form-control" id="my_user" name="my_user"
                   placeholder="Der Benutzername wird f&uuml;r die Kommentarfunktion ben&ouml;tigt"
                   value="' . (!empty($fill['user']) ? $fill['user'] : '') . '">
        </div>
    </div>
    ';
} else {
    $tpl_text .= '
    <input type="hidden" name="my_user" id="my_user" value=""/>';
}

/*$tpl_text .= '
<div class="form-group' . (!empty($fill['error']['my_email']) ? ' has-error' : '') . '">
    <div class="col-sm-12 form-control-container">
        <label class="nw-uppercase" for="my_email">E-Mail</label>
        <input type="email" class="form-control" name="my_email" id="my_email"
               value="' . (!empty($fill['email']) ? $fill['email'] : '') . '">
    </div>
</div>
';

if (empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['bolUseDOI'])) {
$tpl_text .= '
<div class="form-group' . (!empty($fill['error']['my_new_pass']) ? ' has-error' : '') . '">
    <div class="col-sm-12 form-control-container">
        <label class="nw-uppercase" for="my_new_pass">Passwort</label>
        <input type="password" class="form-control" id="my_new_pass" name="my_new_pass">
    </div>
</div>
';
}*/


if (!$shortRegister
    && !empty($em_projekt[$em_client]['myonline_kdnr'])
) {
    $tpl_text .= '
    <div class="form-group">
        <div class="col-sm-12 form-control-container">
            <input type="text" class="form-control" id="my_kdnr" name="my_kdnr" placeholder="Kundennummer"
                   value="' . (!empty($fill['kdnr']) ? $fill['kdnr'] : '') . '">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12 form-control-container">
            <p>Wenn Sie bereits Abonnent oder Anzeigenkunde sind, können Sie hier zusätzlich Ihre Kundennummer eingeben,
                die die Suche im System erleichtert. Diese Angabe finden Sie z. B. auf Ihrer NW-Karte.</p>
        </div>
    </div>
    ';
}
/*
$tpl_text .= '
<div class="form-group' . (!empty($fill['error']['my_agb']) ? ' has-error' : '') . '">
    <div class="col-sm-12 form-control-container">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="my_agb" ' . (!empty($fill['agb']) ? ' checked="checked"' : '') . '>
                Mit meiner Registrierung stimme ich den <a href="/agb" target="_blank">Nutzungsbedingungen</a> der
                NW zu.
            </label>
        </div>
    </div>
</div>

<div class="form-group' . (!empty($fill['error']['my_is_optin']) ? ' has-error' : '') . '">
    <div class="col-sm-12 form-control-container">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="my_is_optin" ' . (!empty($fill['is_optin']) ? ' checked="checked"' :
                '') . '>
                Ich bin jederzeit widerruflich damit einverstanden, dass mich die Zeitungsverlag Neue Westfälische
                GmbH & Co. KG,
                auch durch ihre Dienstleister, über ihre interessanten NW-Verlagsprodukte und -angebote (Zeitungen,
                Zeitschriften, Abo, Leserreisen, Leservorteile, NW-Karte,
                Gewinnspiele, Newsletter) per E-Mail informiert. </label>
        </div>
    </div>
</div>
';*/


$tpl_text .= ' 
    <div class="nw-text-xs nw-mb-3">
        <div class="nw-uppercase nw-font-medium nw-mb-4">*PFLICHTFELDER</div>
        <div class="nw-font-bold"> Ich erhalte durch die Registrierung die oben beschriebenen Vorteile.</div>
        <div>Im Gegenzug stelle ich dem Zeitungsverlag Neue Westfälische GmbH & Co. KG meine E-Mail-Adresse
            zum Versand redaktioneller
            Newsletter und zur Information über ihre interessanten NW-Verlagsprodukte und -angebote
            (Zeitungen, Zeitschriften, Abo, Leserreisen, Leservorteile,
            NW-Karte, Gewinnspiele) auch durch ihre Dienstleister zur Verfügung. Dies wird ausdrücklich als
            vertragliche Gegenleistung für das
            zur Verfügung gestellte Angebot vereinbart. Eine Weitergabe Ihrer personenbezogenen Daten an
            Dritte findet nicht statt. Rechtsgrundlage
            für die Datenverarbeitung ist Art. 6 Abs. 1 lit. b DSGVO. Ich habe jederzeit ohne Angabe von
            Gründen per E-Mail an datenschutz@nw.de oder in
            Textform an Zeitungsverlag Neue Westfälische GmbH & Co. KG, Abteilung Datenschutz, Niedernstraße
            21-27, 33602 Bielefeld die Möglichkeit,
            diesen Vertrag zu beenden, sodass damit die oben beschriebene Leistung,
            als auch die Gegenleistung (werbliche Ansprache per E-Mail) entfällt.
        </div>
    </div>
    ';

$tpl_text .= '
    <div class="form-group' . (!empty($fill['error']['my_agb']) ? ' has-error' : '') . '">
        <div class="nw-pr-4 nw-text-gray-700">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="my_agb"
                           class="nw-w-3 nw-h-3 nw-cursor-pointer' . (!empty($fill['agb']) ? ' checked=" checked"' : '')
    . '">
                    Ich stimme den Allgemeinen Geschäftsbedingungen <a class="nw-text-red-500 hover:nw-underline" href="/agb"
                                                                       target="_blank"> der Neuen Westfälischen </a> zu.
                </label>
            </div>
        </div>
    </div>
    ';
/*$tpl_text .= '
<div class="form-group' . (!empty($fill['error']['my_agb']) ? ' has-error' : '') . '">
    <div class="nw-mb-3 nw-pr-6 nw-text-gray-700 nw-text-sm ">
        <div class="checkbox">
            <label class="nw-font-normal">
                <input type="checkbox" name="my_agb" class="nw-w-3 nw-h-3 nw-cursor-pointer"' .
                (!empty($fill['agb']) ? ' checked="checked"' : '') . ' ">
                Mit meiner Registrierung stimme ich den <a href="/agb" target="_blank">Nutzungsbedingungen</a> der
                NW zu.
            </label>
        </div>
    </div>
</div>

<div class="form-group' . (!empty($fill['error']['my_is_optin']) ? ' has-error' : '') . '">
    <div class="nw-mb-3 nw-pr-6 nw-text-gray-700 nw-text-sm ">
        <div class="checkbox">
            <label class="nw-font-normal">
                <input type="checkbox" name="my_is_optin" class="nw-w-3 nw-h-3 nw-cursor-pointer checkbox-gray"' .
                (!empty($fill['is_optin']) ? ' checked="checked"' : '') . ' ">
                Ich bin jederzeit widerruflich damit einverstanden, dass mich die Zeitungsverlag Neue Westfälische
                GmbH & Co. KG,
                auch durch ihre Dienstleister, über ihre interessanten NW-Verlagsprodukte und -angebote (Zeitungen,
                Zeitschriften, Abo, Leserreisen, Leservorteile, NW-Karte,
                Gewinnspiele, Newsletter) per E-Mail informiert.
            </label>
        </div>
    </div>
</div>
';*/

if (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineOwnCaptcha'])) {
    $tpl_text .= '
    <!--<div class="form-group">-->
    <!--        <div class="col-sm-12 form-control-container">-->
    <!--            <div id="my_recaptcha"></div>-->
    <!--        </div>-->
    <!--    </div>--> ';
    /* $tpl_text .= '
    <div class="captcha-container">
        <label>Sicherheitsabfrage <span class="pflichtfeld">*</span></label>
        <div class="form-group">
            <img src="/_em_cms/locals/nw/captcha.php" id="captchaImage" alt="Captcha Image">
        </div>
        <div class="form-group">
            <label for="captchaAnswer" class="sr-only">Captcha Antwort</label>
            <input type="text" class="form-control" id="captchaAnswer" name="check" placeholder="Ergebnis"
                   autocomplete="off">
        </div>
    </div>
    ';*/
} else if (!empty($GLOBALS['em_bolMyOnlineCaptcha'])) {
    $tpl_text .= '
    <div class="nw-grid nw-grid-cols-2 form-group' . (!empty($fill['error']['my_captcha']) ? ' has-error' : '') . '">
        <div class="form-control-container">
            <label for="my_captcha" class="control-label">
                Sicherheitscode <span class="pflichtfeld">*</span>
            </label>
        </div>
        <div class="nw-col-span-2 form-control-container">
            <img src="' . $fill['captcha_url'] . '" border="0" style="width:170px; cursor: pointer;"
                 onclick="emMyCaptchaReload(this);" title="Sicherheitscode neu laden" id="em_my_captcha_img" alt=""/>
            <a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="emMyCaptchaReload(this);" style="
                width: 200px;
                margin: 20px 0;
                "><i class="fa fa-refresh"></i></a>
        </div>
    </div>
    <div class="form-group">
        <div class="nw-w-full form-control-container">
            <input type="text" class="form-control" id="my_captcha" name="my_captcha"
                   placeholder="Bitte geben Sie obenstehenden Code hier ein" value="">
        </div>
    </div>
    ';
}

$tpl_text .= '

    <div class="nw-mb-8 md:nw-mb-3">
        <div class="nw-w-full sm:nw-w-auto form-control-container nw-font-medium nw-text-xs">
            Bitte beachten Sie unsere <a href="/datenschutz/" class="nw-text-red-500 hover:nw-underline">Datenschutzhinweise</a>.
        </div>
    </div>
    <div class="nw-mb-8 md:nw-mb-4 clearfix">
             <div class="h-captcha form-control-container"  id="nw-h-captcha" data-sitekey="b9c2c8ff-2566-4856-a5e2-85fd51e76b07"></div>
     </div>
        <div class="nw-w-full sm:nw-w-auto clearfix form-control-container">
            <button type="button"
            '
    . (em_get_var_value('em_paywall_type') ? ' data-tracking-event="nwplus-register-send-click"' : '')
    . ' class=" nw-w-full nw-px-1
            sm:nw-px-3
            nw-text-white
            nw-bg-red-500
            nw-border
            nw-border-red-500
            nw-rounded-md
            nw-text-center
            nw-text-tiny
            nw-font-medium
            nw-cursor-pointer nw-py-3 hover:nw-bg-white hover:nw-text-red-500'
    . (em_get_var_value('em_paywall_type')
        ? ' for-tracking' : ''
    )
    . (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineReCaptcha'])
        ? ' g-recaptcha' : ''
    ) . '"'
    . (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineReCaptcha'])
        ? ' data-sitekey="' . $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['recaptcha_invisible_public_key'] .
        '" data-callback="mydaten_check"'
        : ' onclick="mydaten_check();"'
    )
    . '>Registrieren</button>
        </div>
    <input type="submit" class="hidden"/>
    </form>
</div>
<div class="nw-p-4 nw-rounded-md nw-bg-white nw-max-w-md nw-mx-auto nw-mt-3">
    <p class="nw-font-bold nw-text-base nw-pb-4">Sie haben Fragen zu Ihrer Anmeldung oder Registrierung?</p>
    <div class="nw-text-sm nw-flex nw-flex-col md:nw-flex-row nw-justify-between nw-gap-3">
        <div class="nw-font-medium">
            <p class="nw-text-gray-600 nw-uppercase nw-font-bold">KONTAKT</p>
            <p>Tel.: <a href="#" class="nw-cursor-pointer hover:nw-text-gray-600">(0521) 555 800</a></p>
            <p>E-Mail: <a href="#" class="nw-cursor-pointer hover:nw-text-gray-600 nw-underline">nwplus@nw.de</a></p>
        </div>
        <div class="nw-font-medium">
            <p class="nw-text-gray-600 nw-uppercase nw-font-bold">SERVICEZEITEN</p>
            <p>Mo - Fr: 6 - 10 Uhr <br>
                Sa: 6 - 13 Uhr <br>
                an Feiertagen: 7 - 13 Uhr<br>
                (außer Weihnachten und Ostern)
            </p>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    /* <![CDATA[ */
    jQuery(document).ready(function () {
        if (userLoyaltyClass) {
            jQuery("#my_user_loyalty_class").val(userLoyaltyClass);
        }
    });

   function mydaten_check(token) {
    var _objForm = document.my_daten;
    var labels = $(".input-label");

    var eyeIcon = $("#eye-img");
    $("#my_new_pass").attr("type", "password");
    eyeIcon.attr("src", "https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye.svg");

    var errorMessage = "Bitte füllen Sie die roten Felder aus!";

    var hasEmptyField = false; 

    if (!_objForm.my_email.value || !_objForm.my_email.value.match(/[^@]+@[^@]+\.\w{2,}/)) {
        labels.filter(".email-label").addClass("nw-text-red-500");
        $("#my_email").addClass("nw-border-red-500");
        hasEmptyField = true;
    } else {
        _objForm.my_user.value = _objForm.my_email.value;
        labels.filter(".email-label").removeClass("nw-text-red-500");
        $("#my_email").removeClass("nw-border-red-500");
    }

    if (!_objForm.my_new_pass.value) {
        labels.filter(".password-label").addClass("nw-text-red-500");
        $("#my_new_pass").addClass("nw-border-red-500");
        hasEmptyField = true;
    } else {
        labels.filter(".password-label").removeClass("nw-text-red-500");
        $("#my_new_pass").removeClass("nw-border-red-500");
    }

    if (!_objForm.nl_id.value) {
        labels.filter(".region-label").addClass("nw-text-red-500");
        $("#my_region").addClass("nw-border-red-500");
        hasEmptyField = true;
    } else {
        labels.filter(".region-label").removeClass("nw-text-red-500");
        $("#my_region").removeClass("nw-border-red-500");
    }
    
    if (!_objForm.my_gender.value) {
        labels.filter(".anrede-label").addClass("nw-text-red-500");
        $("#my_gender").addClass("nw-border-red-500");
        hasEmptyField = true;
    } else {
        labels.filter(".anrede-label").removeClass("nw-text-red-500");
        $("#my_gender").removeClass("nw-border-red-500");
    }

    if (!_objForm.my_firstname.value) {
        labels.filter(".vorname-label").addClass("nw-text-red-500");
        $("#my_firstname").addClass("nw-border-red-500");
        hasEmptyField = true;
    } else {
        labels.filter(".vorname-label").removeClass("nw-text-red-500");
        $("#my_firstname").removeClass("nw-border-red-500");
    }

    if (!_objForm.my_name.value) {
        labels.filter(".nachname-label").addClass("nw-text-red-500");
        $("#my_name").addClass("nw-border-red-500");
        hasEmptyField = true;
    } else {
        labels.filter(".nachname-label").removeClass("nw-text-red-500");
        $("#my_name").removeClass("nw-border-red-500");
    }

   /*  
   if (!_objForm.my_zip.value) {
        labels.filter(".plz-label").addClass("nw-text-red-500");
        $("#my_zip").addClass("nw-border-red-500");
        hasEmptyField = true;
    } else {
        labels.filter(".plz-label").removeClass("nw-text-red-500");
        $("#my_zip").removeClass("nw-border-red-500");
    } 
    */
        
    if (hasEmptyField) {
        // Show the error message for empty required fields
        $(".alert.alert-danger").removeClass("hidden").html(errorMessage);
        $(window).scrollTop(0);
        return false;
        }
        if (!_objForm.my_agb.checked) {
            jQuery(".alert.alert-danger").removeClass("hidden").html("Bitte akzeptieren Sie unsere Online-Nutzungsbedingungen!");
            _objForm.my_agb.focus();
            $(window).scrollTop(0);
            return false;
        }
        if (0 && !_objForm.my_is_optin.checked) {
            jQuery(".alert.alert-danger").removeClass("hidden").html("Bitte akzeptieren Sie das Werbeeinverständis!");
            _objForm.my_is_optin.focus();
            $(window).scrollTop(0);
            return false;
        }
        
      jQuery("#my_daten").submit();
    }

    function emMyCaptchaReload(_objImage) {
        objImg = jQuery("#em_my_captcha_img");
        if (objImg.length) {
            var objDate = new Date();
            objImg.attr("src", "' . $fill['captcha_url'] . (strstr($fill['captcha_url'], '?') ? '&' : '?') . 'nocache=" + objDate.getTime());

        }
    }

    function passwordToggle() {
        var passwordField = document.getElementById("my_new_pass");
        var eyeIcon = document.getElementById("eye-img");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.src = " https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye-slash.svg";
        } else {
            passwordField.type = "password";
            eyeIcon.src = "https://www-test2.nw.de/_em_daten/locals/module/nw/_includes/twig/current/public/images/eye.svg";
        }
    }
    jQuery(document).ready(function() {
        
        jQuery("#my_daten").on("submit", function (e) {
            // Check captcha is valid or not
            var formElement = document.getElementById("my_daten");
            var formData = new FormData(formElement);
                
            if (formData.get("h-captcha-response") === "") {
                 e.preventDefault();
                 return alert("Bitte füllen Sie das hCaptcha aus");
             }
        });
    });

    /*  function resetPasswordField() {
          var passwordField = document.getElementById("my_new_pass");
          passwordField.type = "password";
      }

      var myForm = document.getElementById("my_daten");
      myForm.addEventListener("submit", resetPasswordField); */

    /*
    $(document).ready(function() {
        var password = $("#my_new_pass"),
        confirm_password = $("#my_new_pass_confirm");

        function validatePassword() {
            if (password.val() != confirm_password.val()) {
                confirm_password[0].setCustomValidity("Password stimmt nicht überein");
            } else {
                confirm_password[0].setCustomValidity("");
            }
        }

        password.on("change", validatePassword);
        confirm_password.on("keyup", validatePassword);
    });
    */
</script>
' . (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineReCaptcha']) ? '
<script src="https://www.google.com/recaptcha/api.js" async defer></script>' : '') . '';