'<?php
$tpl_text = '
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

.form-control {
font-size: 13px;
color: #000;
background-color: #ffffff;
border: none !important;
border-bottom: 1px solid #757575 !important;
font-style: italic;
-moz-box-shadow: none;
-webkit-box-shadow: none;
box-shadow: none;
}
.form-header {
font-size: 18px;
color: #8d8d8d;
}

.form-header-active {
font-size: 20px;
color: #000000;
text-decoration: underline;
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
.captcha-container > label {
color: #5e5e5e;
}
/* SICHERHEITSABFRAGE */

.captcha-container > label {
margin-bottom: 19px;
margin-right: 10px;
color: #5e5e5e;
font-size: 15px;
}

.captcha-container > label sup {
color: red;
}
input#captchaAnswer::placeholder {
font-size: 12px;
font-weight: 400;
font-style: italic
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

  <form name="my_anmeldung" id="my_anmeldung" action="https://www-test2.nw.de/profil" method="post" class="nw-p-6 nw-border nw-border-gray-500 nw-rounded-lg nw-m-4">
    <input type="hidden" name="pid" value="7_1">
    <input type="hidden" name="em_cnt" value="">
    <input type="hidden" name="ref" value="">
    <input type="hidden" name="my_user_loyalty_class" id="my_user_loyalty_class" value="">

    <!--
    <div class="form-group">
    <label for="my_user" class="col-sm-3 control-label">
    Benutzername <span class="pflichtfeld">*</span>
    </label>
    <div class="col-sm-9 form-control-container">
    <input id="my_user" name="my_user" class="form-control" id="my_user" value="" type="text" placeholder="Benutzername" />
    </div>
    </div>
    -->

    <div class="nw-mb-4">
      <p class="nw-underline nw-text-xl">Passwort zurücksetzen</p>
    </div>

    <div class="nw-mb-2 nw-flex">
      <label for="my_email" class="nw-pr-2 nw-text-gray-500 nw-text-sm nw-w-1/4">
        E-Mail-Adresse <span class="nw-text-red-500">*</span>
      </label>
      <div class="nw-w-3/4">
        <input type="text" class="nw-border-b nw-text-sm nw-w-full" name="my_email" id="my_email" placeholder="Tragen Sie hier Ihre E-Mail-Adresse ein">
      </div>
    </div>
    <!--    <div class="form-group">-->
    <!--      <div class="col-sm-offset-3 col-sm-9 form-control-container">-->
    <!--        <div id="my_recaptcha"></div>-->
    <!--      </div>-->
    <!--    </div>-->
    <div class="captcha-container nw-flex nw-justify-start nw-items-center">
      <label class="nw-mb-5 nw-mt-2 nw-text-base nw-col-sm-4 nw-col-md-3 nw-control-label">
        Sicherheitsabfrage <span class="nw-text-red-500">*</span>
      </label>
      <div class="nw-mb-2">
        <img src="/_em_cms/locals/nw/captcha.php" id="captchaImage" alt="Captcha Image">
      </div>
      <div class="nw-mb-2 nw-w-14">
        <label for="captchaAnswer" class="nw-sr-only">Captcha Antwort</label>
        <input type="text" class="nw-p-0 nw-w-14 nw-h-auto nw-font-bold nw-text-base placeholder:nw-text-xs placeholder:nw-font-medium" id="captchaAnswer" name="check" placeholder="Ergebnis" autocomplete="off">
      </div>
    </div>

    <div class="nw-mt-4">
      <button type="button" class="nw-mb-4 nw-py-2 nw-px-4 nw-flex nw-justify-center nw-items-center nw-rounded-lg nw-border nw-text-white nw-bg-red-500 nw-border-red-500 nw-w-full md:nw-w-1/2 hover:nw-bg-white hover:nw-text-red-500" onclick="mydaten_check(document.my_anmeldung);">Absenden</button>
      <a href="https://www-test2.nw.de/profil?pid=1" class="nw-flex nw-justify-center nw-items-center nw-text-center nw-rounded-lg nw-border nw-text-white nw-bg-gray-500 nw-border-gray-500 nw-w-full md:nw-w-1/2 nw-py-2 nw-px-4 hover:nw-bg-white hover:nw-text-black">zurück zur Anmeldung</a>
    </div>

    <input type="submit" class="nw-hidden">
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