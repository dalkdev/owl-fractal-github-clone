<?php
$tpl_text = '<style>
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
  /*  @media (min-width: 1025px) {
      .myonline-box {
        margin-top: -100px;
      }
    }*/

  .logo_myonline_mobile {
    margin-top: -50px;
    margin-bottom: 50px;
  }

  .myonline-form .captcha-container > label {
    white-space: nowrap;
    margin-right: 12px;
    margin-bottom: 18px;
  }
</style>

<div class="visible-xs">
  <a href="/" class="nav-logo text-center visible-xs logo_myonline_mobile">
    <img src="/_em_daten/nw/assets/img/logo-ohne-wortmarke.png" alt="Neue Westfälische" height="60">
  </a>
</div>


' . (!empty($fill['error']) ? '<p class="alert alert-danger">' . $fill['error'] . '</p>' : '') . '
<p class="alert alert-danger' . (empty($fill['update_error']) ? ' hidden' : '') . '">' . $fill['update_error'] . '</p>


<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-5">

  <form name="my_anmeldung" id="my_anmeldung" action="' . $fill['form_action'] . '" method="post" class="form-horizontal myonline-form">
    <input type="hidden" name="pid" value="7_1" />
    <input type="hidden" name="em_cnt" value="' . (!empty($GLOBALS['em_cnt']) ? $GLOBALS['em_cnt'] : '') . '" />
    <input type="hidden" name="ref" value="' . em_text_to_value($fill['ref']) . '" />
    <input type="hidden" name="my_user_loyalty_class" id="my_user_loyalty_class" value="" />

    <!--
        <div class="form-group' . (!empty($fill['error']['my_user']) ? ' has-error' : '' ) . '">
            <label for="my_user" class="col-sm-3 control-label">
                Benutzername <span class="pflichtfeld">*</span>
            </label>
            <div class="col-sm-9 form-control-container">
                <input id="my_user" name="my_user" class="form-control" id="my_user" value="' . (isset($fill['user']) ? $fill['user'] : '') . '" type="text" placeholder="Benutzername" />
            </div>
        </div>
    -->

    <div class="form-group">
      <div class="col-sm-12 form-control-container">
        <p class="form-header form-header-active">Passwort zurücksetzen</p>
      </div>
    </div>

    <div class="form-group' . (!empty($fill['error_fields']['my_email']) ? ' has-error' : '' ) . '">
      <label for="my_email" class="col-sm-4 col-md-3 control-label">
        E-Mail-Adresse <span class="pflichtfeld">*</span>
      </label>
      <div class="col-sm-8 col-md-9 form-control-container">
        <input type="text" class="form-control" name="my_email" id="my_email" placeholder="Tragen Sie hier Ihre E-Mail-Adresse ein">
      </div>
    </div>';

if (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineOwnCaptcha'])) {
    $tpl_text.= '
    <!--    <div class="form-group">-->
    <!--      <div class="col-sm-offset-3 col-sm-9 form-control-container">-->
    <!--        <div id="my_recaptcha"></div>-->
    <!--      </div>-->
    <!--    </div>-->';
    $tpl_text .= '
    <div class="captcha-container">
      <label class="col-sm-4 col-md-3 control-label">
        Sicherheitsabfrage <span class="pflichtfeld">*</span>
      </label>
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
    <div class="form-group' . (!empty($fill['error_fields']['my_captcha']) ? ' has-error' : '' ) . '">
      <label for="my_captcha" class="col-sm-4 col-md-3 control-label">
        Sicherheitscode <span class="pflichtfeld">*</span>
      </label>
      <div class="col-sm-8 col-md-9 form-control-container">
        <img src="' . $fill['captcha_url'] . '" border="0" style="width:170px; cursor: pointer;" onclick="emMyCaptchaReload(this);" title="Sicherheitscode neu laden" id="em_my_captcha_img" alt="" />
      </div>
    </div>
    <div class="form-group' . (!empty($fill['error_fields']['my_captcha']) ? ' has-error' : '' ) . '">
      <div class="col-sm-offset-3 col-sm-9 form-control-container">
        <input type="text" class="form-control" id="my_captcha" name="my_captcha" placeholder="Bitte geben Sie obenstehenden Code hier ein" value="">
      </div>
    </div>';
}
$tpl_text.= '
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9 clearfix form-control-container">
        <button type="button" class="btn btn-primary pull-left btn_recover margin-top-10" onclick="mydaten_check(document.my_anmeldung);">Absenden</button>
        <a href="' . $fill['url_back'] . '" class="btn btn-default pull-left btn_recover btn_recover_back margin-top-10">zur&uuml;ck zur Anmeldung</a>
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

    var onloadCallback = function() {
        grecaptcha.render("my_recaptcha", {
            "sitekey" : "' . $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['recaptcha_public_key'] . '"
        });
    };

    function mydaten_check(_objForm)
    {
        objRecaptcha = jQuery("#my_recaptcha");
        if (objRecaptcha.length) {
            jQuery.ajax({
                type: "POST",
                url: "' . $fill['recaptcha_url'] . '",
                data: {
                    response_token: grecaptcha.getResponse()
                },
                success: function(success)
                {
                    if (success === "1") {
                        _objForm.submit();
                    } else {
                        alert("Das reCAPTCHA war nicht korrekt!");
                        grecaptcha.reset();
                        jQuery("#my_recaptcha").focus();
                        return false;
                    }
                }
            });
        } else if (jQuery("#captchaAnswer").length > 0) {
            jQuery.ajax({
                type: "POST",
                url: "/_em_cms/locals/nw/captcha.php",
                data: "submit&check=" + jQuery("#captchaAnswer").val(),
                success: function(_strMessage)
                {
                    if (_strMessage == "1") {
                        _objForm.submit();
                    } else if (!jQuery("#captchaAnswer").val()) {
                        jQuery(".alert.alert-danger").removeClass("hidden").html("Das Eingabefeld ist leer");
                        // alert("Das Eingabefeld ist leer");
                        jQuery("#captchaAnswer").focus();
                        return false;
                    } else {
                        jQuery(".alert.alert-danger").removeClass("hidden").html("Die Antwort war nicht korrekt");
                        // alert("Die Antwort war nicht korrekt");
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
' . (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineReCaptcha']) ? '<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>' : '') . '';