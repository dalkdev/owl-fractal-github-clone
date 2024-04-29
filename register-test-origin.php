<?php
$tpl_text = '';

$shortRegister = em_get_var_sended('complete') ? 0 : 1;

$tpl_text .= '<p class="alert alert-danger' . (empty($fill['update_error']) ? ' hidden' : '') . '">' . nl2br($fill['update_error']) . '</p>';

$tpl_text .= em_load_template("drittanbieter_upscore",$fill);

$tpl_text .= '

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

<div class="form-wrapper">
  <form name="my_daten" id="my_daten" action="' . $fill['form_action'] . '" class="myonline-form form-horizontal" method="post" ' . ($fill['js_proof'] ? 'onsubmit="return mydaten_check(this)"' : '') . ' role="form" >
  <input type="hidden" name="pid" value="2_1" />
  <input type="hidden" name="em_cnt" value="' . (!empty($GLOBALS['em_cnt']) ? $GLOBALS['em_cnt'] : '') . '" />
  <input type="hidden" name="ref" value="' . (!empty($fill['ref']) ? em_text_to_value($fill['ref']) : '') . '" />
  <input type="hidden" name="paywall_type" value="' . (!empty($fill['paywall_type']) ? $fill['paywall_type'] : '') . '" />
  <input type="hidden" name="my_user_loyalty_class" id="my_user_loyalty_class" value="" />

  <div class="form-group">

  </div>';

if (!$shortRegister) {
    $tpl_text .= '
  <div class="form-group">
    <div class="col-sm-12 form-control-container">
      <select name="my_gender" class="form-control" id="my_gender">
        <option value="" ' . (!empty($fill['sele_empty']) ? $fill['sele_empty'] : '') . '>Bitte wählen</option>
        <option value="Frau"' . $fill['sele_frau'] . '>Frau</option>
        <option value="Herr"' . $fill['sele_herr'] . '>Herr</option>
        ' . (!empty($em_projekt[$em_client]['myonline_firma']) ? '
        <option value="Firma"' . $fill['sele_firma'] . '>Firma</option>
        ' : '') . '
      </select>
    </div>
  </div>';
}

if (!$shortRegister
    && !empty($em_projekt[$em_client]['myonline_firma'])
) {
    $tpl_text .= '
  <div class="form-group">
    <div class="col-sm-12 form-control-container">
      <input type="text" class="form-control" id="my_company" name="my_company" placeholder="Firma" value="' . (!empty($fill['company']) ? $fill['company'] : '') . '">
    </div>
  </div>';
}

$tpl_text .= '
  <div class="form-group' . ((!empty($fill['error']['my_firstname']) || !empty($fill['error']['my_name'])) ? ' has-error' : '' ) . '">
    <div class="col-sm-12 form-control-container">
      <div class="row">
        <div class="col-xs-6">
          <label class="nw-uppercase" for="my_firstname">Vorname</label>
          <input type="text" class="form-control" id="my_firstname" name="my_firstname" value="' . (!empty($fill['firstname']) ? $fill['firstname'] : '') . '" />
        </div>
        <div class="col-xs-6">
          <label class="nw-uppercase" for="my_name">Nachname</label>
          <input type="text" class="form-control" id="my_name" name="my_name" value="' . (!empty($fill['name']) ? $fill['name'] : '') . '" />
        </div>
      </div>
    </div>
  </div>';

if (!$shortRegister) {
    $tpl_text .= '
  <div class="form-group' . (!empty($fill['error']['my_strasse']) || !empty($fill['error']['my_hausnr']) ? ' has-error' : '' ) . '">
    <div class="col-sm-12 form-control-container">
      <div class="row">
        <div class="col-xs-8">
          <input type="text" class="form-control" id="my_strasse" name="my_strasse" placeholder="Straße" value="' . (!empty($fill['street']) ? $fill['street'] : '') . '">
        </div>
        <div class="col-xs-4">
          <input type="text" class="form-control" id="my_hausnr" name="my_hausnr" placeholder="Nr." value="' . (!empty($fill['number']) ? $fill['number'] : '') . '">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group' . (!empty($fill['error']['my_zip']) || !empty($fill['error']['my_ort']) ? ' has-error' : '' ) . '">
    <div class="col-sm-12 form-control-container">
      <div class="row">
        <div class="col-xs-4">
          <input type="text" class="form-control" id="my_zip" name="my_zip" placeholder="PLZ" value="' . (!empty($fill['zip']) ? $fill['zip'] : '') . '">
        </div>
        <div class="col-xs-8">
          <input type="text" class="form-control" id="my_ort" name="my_ort" placeholder="Ort" value="' . (!empty($fill['city']) ? $fill['city'] : '') . '">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group' . (!empty($fill['error']['my_user']) ? ' has-error' : '' ) . '">
    <div class="col-sm-12 form-control-container">
      <input type="text" class="form-control" id="my_user" name="my_user" placeholder="Der Benutzername wird f&uuml;r die Kommentarfunktion ben&ouml;tigt" value="' . (!empty($fill['user']) ? $fill['user'] : '') . '">
    </div>
  </div>';
} else {
    $tpl_text .= '
  <input type="hidden" name="my_user" id="my_user" value="" />';
}

$tpl_text .= '
  <div class="form-group' . (!empty($fill['error']['my_email']) ? ' has-error' : '' ) . '">
    <div class="col-sm-12 form-control-container">
      <label class="nw-uppercase" for="my_email">E-Mail</label>
      <input type="email" class="form-control" name="my_email" id="my_email" value="' . (!empty($fill['email']) ? $fill['email'] : '') . '">
    </div>
  </div>';

if (empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['bolUseDOI'])) {
    $tpl_text .= '
  <div class="form-group' . (!empty($fill['error']['my_new_pass']) ? ' has-error' : '' ) . '">
    <div class="col-sm-12 form-control-container">
      <label class="nw-uppercase" for="my_new_pass">Passwort</label>
      <input type="password" class="form-control" id="my_new_pass" name="my_new_pass">
    </div>
  </div>';
}

if (!$shortRegister
    && !empty($em_projekt[$em_client]['myonline_kdnr'])
) {
    $tpl_text .= '
  <div class="form-group">
    <div class="col-sm-12 form-control-container">
      <input type="text" class="form-control" id="my_kdnr" name="my_kdnr" placeholder="Kundennummer" value="' . (!empty($fill['kdnr']) ? $fill['kdnr'] : '') . '">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12 form-control-container">
      <p>Wenn Sie bereits Abonnent oder Anzeigenkunde sind, können Sie hier zusätzlich Ihre Kundennummer eingeben, die die Suche im System erleichtert. Diese Angabe finden Sie z. B. auf Ihrer NW-Karte.</p>
    </div>
  </div>';
}

$tpl_text .= '
  <div class="form-group' . (!empty($fill['error']['my_agb']) ? ' has-error' : '' ) . '">
    <div class="col-sm-12 form-control-container">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="my_agb" ' . (!empty($fill['agb']) ? ' checked="checked"' : '') . '>
          Mit meiner Registrierung stimme ich den <a href="/agb" target="_blank">Nutzungsbedingungen</a> der NW zu.
        </label>
      </div>
    </div>
  </div>

  <div class="form-group' . (!empty($fill['error']['my_is_optin']) ? ' has-error' : '' ) . '">
    <div class="col-sm-12 form-control-container">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="my_is_optin" ' . (!empty($fill['is_optin']) ? ' checked="checked"' : '') . '>
          Ich bin jederzeit widerruflich damit einverstanden, dass mich die Zeitungsverlag Neue Westfälische GmbH & Co. KG, auch durch ihre Dienstleister, über ihre interessanten NW-Verlagsprodukte und -angebote (Zeitungen, Zeitschriften, Abo, Leserreisen, Leservorteile, NW-Karte, Gewinnspiele, Newsletter) per E-Mail informiert.                </label>
      </div>
    </div>
  </div>';

if (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineOwnCaptcha'])) {
    $tpl_text.= '
  <!--<div class="form-group">-->
  <!--        <div class="col-sm-12 form-control-container">-->
  <!--            <div id="my_recaptcha"></div>-->
  <!--        </div>-->
  <!--    </div>-->';
    $tpl_text .= '
    <div class="captcha-container">
        <label>Sicherheitsabfrage <span class="pflichtfeld">*</span></label>
        <div class="form-group">
            <img src="/_em_cms/locals/nw/captcha.php" id="captchaImage" alt="Captcha Image">
        </div>
        <div class="form-group">
            <label for="captchaAnswer" class="sr-only">Captcha Antwort</label>
            <input type="text" class="form-control" id="captchaAnswer" name="check" placeholder="Ergebnis" autocomplete="off">
        </div>
    </div>';
} else if (!empty($GLOBALS['em_bolMyOnlineCaptcha'])) {
    $tpl_text.= '
  <div class="form-group' . (!empty($fill['error']['my_captcha']) ? ' has-error' : '' ) . '">
    <div class="col-sm-6 text-right">
      <label for="my_captcha" class="control-label">
        Sicherheitscode <span class="pflichtfeld">*</span>
      </label>
    </div>
    <div class="col-sm-12 form-control-container">
      <img src="' . $fill['captcha_url'] . '" border="0" style="width:170px; cursor: pointer;" onclick="emMyCaptchaReload(this);" title="Sicherheitscode neu laden" id="em_my_captcha_img" alt="" />
      <a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="emMyCaptchaReload(this);"><i class="fa fa-refresh"></i></a>

    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12 form-control-container">
      <input type="text" class="form-control" id="my_captcha" name="my_captcha" placeholder="Bitte geben Sie obenstehenden Code hier ein" value="">
    </div>
  </div>';
}

$tpl_text.= '

  <div class="form-group">
    <div class="col-sm-12 form-control-container">
      Bitte beachten Sie unsere <a href="/datenschutz/">Datenschutzhinweise</a>.
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-12 clearfix form-control-container">
      <button type="button"'
    . (em_get_var_value('em_paywall_type') ? ' data-tracking-event="nwplus-register-send-click"' : '')
    . ' class="btn btn-primary'
    . (em_get_var_value('em_paywall_type')
        ? ' for-tracking' : ''
    )
    . (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineReCaptcha'])
        ? ' g-recaptcha' : ''
    ) . '"'
    . (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineReCaptcha'])
        ? ' data-sitekey="' . $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['recaptcha_invisible_public_key'] . '" data-callback="mydaten_check"'
        : ' onclick="mydaten_check();"'
    )
    . '>Registrieren</button>
    </div>
  </div>
  <input type="submit" class="hidden" />
  </form>
</div>


<script type="text/javascript">
    /* <![CDATA[ */
    jQuery(document).ready(function(){
        if (userLoyaltyClass) {
            jQuery("#my_user_loyalty_class").val(userLoyaltyClass);
        }
    });

    function mydaten_check(token)
    {
        var _objForm = document.my_daten;
        if (!_objForm.my_firstname.value) {
            jQuery(".alert.alert-danger").removeClass("hidden").html("Bitte tragen Sie Ihren Vornamen ein!");
            _objForm.my_firstname.focus();

            return false;
        }
        if (!_objForm.my_name.value) {
            jQuery(".alert.alert-danger").removeClass("hidden").html("Bitte tragen Sie Ihren Nachnamen ein!");
            _objForm.my_name.focus();
            return false;
        }
        if (!_objForm.my_email.value
            ||  !_objForm.my_email.value.match(/[^@]+@[^@]+\.\w{2,}/)
        ) {
            jQuery(".alert.alert-danger").removeClass("hidden").html("Bitte tragen Sie eine valide E-Mail-Adresse ein!");
            _objForm.my_email.focus;
            return false;
        } else {
            _objForm.my_user.value = _objForm.my_email.value;
        }
        if (!_objForm.my_new_pass.value) {
            jQuery(".alert.alert-danger").removeClass("hidden").html("Bitte tragen Sie ein Passwort ein!");
            _objForm.my_new_pass.focus();
            return false;
        }
        if (!_objForm.my_agb.checked) {
            jQuery(".alert.alert-danger").removeClass("hidden").html("Bitte akzeptieren Sie unsere Online-Nutzungsbedingungen!");
            _objForm.my_agb.focus();
            return false;
        }
        if (0 && !_objForm.my_is_optin.checked) {
            jQuery(".alert.alert-danger").removeClass("hidden").html("Bitte akzeptieren Sie das Werbeeinverständis!");
            _objForm.my_is_optin.focus();
            return false;
        }
        // objRecaptcha = jQuery("#my_recaptcha");
        objImg = jQuery("#em_my_captcha_img");
        if (token) {
            jQuery.ajax({
                type: "POST",
                url: "' . $fill['recaptcha_url'] . '",
                data: {
                    response_token: token,
                    type: "invisible"
                },
                success: function(success)
                {
                    if (success === "1") {
                        _objForm.submit();
                    } else {
                        grecaptcha.reset();
                        console.log("reCAPTCHA-Fehler")
                    }
                }
            });
        } else if (objImg.length > 0) {
            if (!_objForm.my_captcha.value) {
                jQuery(".alert.alert-danger").removeClass("hidden").html("Bitte geben Sie den Sicherheitscode an!");
                _objForm.my_captcha.focus();
                return false;
            } else {
                jQuery.ajax({
                    type: "POST",
                    url: "' . $fill['captcha_url'] . '",
                    data: "em_uc=" + jQuery("#my_captcha").val(),
                    success: function(_strMessage)
                    {
                        if (_strMessage == "1") {
                            _objForm.submit();
                        } else {
                            jQuery(".alert.alert-danger").removeClass("hidden").html("Der Sicherheitscode war nicht korrekt!");
                            jQuery("#my_captcha").focus();
                            return false;
                        }
                    }
                });
            }
        } else if (jQuery("#captchaAnswer").length > 0) {
            jQuery.ajax({
                type: "POST",
                url: "/_em_cms/locals/nw/captcha.php",
                data: "submit&check=" + jQuery("#captchaAnswer").val(),
                success: function(_strMessage)
                {
                    if (_strMessage == "1") {
                        jQuery("#my_daten").submit();
                    } else if (!jQuery("#captchaAnswer").val()) {
                        jQuery(".alert.alert-danger").removeClass("hidden").html("Das Eingabefeld ist leer");
                        jQuery("#captchaAnswer").focus();
                        return false;
                    } else {
                        jQuery(".alert.alert-danger").removeClass("hidden").html("Die Antwort war nicht korrekt");
                        jQuery("#captchaAnswer").focus();
                        return false;
                    }
                }
            });
        } else {
            _objForm.submit();
        }
    }

    function emMyCaptchaReload(_objImage)
    {
        objImg = jQuery("#em_my_captcha_img");
        if (objImg.length) {
            var objDate = new Date();
            objImg.attr("src", "' . $fill['captcha_url'] . (strstr($fill['captcha_url'], '?') ? '&' : '?') . 'nocache=" + objDate.getTime());

        }
    }
    /* ]]> */
</script>
' . (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineReCaptcha']) ? '<script src="https://www.google.com/recaptcha/api.js" async defer></script>' : '') . '';