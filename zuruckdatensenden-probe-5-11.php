<?php $tpl_text = '
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
<script src="https://js.hcaptcha.com/1/api.js" async defer></script>
<div class="visible-xs">
  <a href="/" class="nav-logo text-center visible-xs logo_myonline_mobile">
    <img src="/_em_daten/nw/assets/img/logo-ohne-wortmarke.png" alt="Neue Westfälische" height="60">
  </a>
</div>


' . (!empty($fill['error']) ? '<p class="alert alert-danger">' . $fill['error'] . '</p>' : '') . '
<p class="alert alert-danger' . (empty($fill['update_error']) ? ' hidden' : '') . '">' . $fill['update_error'] . '</p>


<div class="nw-bg-slate-300 nw-p-4 md:nw-p-8 nw-mb-6 nw-rounded-md">
  <div class="nw-bg-white nw-py-4 nw-px-4 md:nw-max-w-md nw-mx-auto nw-rounded-md">
    <div class="nw-mb-4">
      <p class="nw-text-left nw-text-lg nw-font-bold">
        Passwort zurücksetzen
      </p>
    </div>
    <div>
      <form name="my_anmeldung" id="my_anmeldung" action="https://www-test2.nw.de/profil"  method="post" style="padding: 0 !important; border: none !important;">
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
          <label class="nw-font-medium nw-text-xs nw-uppercase"
             for="my_email">
            E-Mail Adresse*
          </label>
          <input required
             class="nw-w-full nw-px-2 nw-py-3 nw-mx-auto
                            nw-inline-block nw-border nw-rounded-md
                            nw-text-base nw-box-border nw-cursor-pointer"
             pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$"
             type="email"
             placeholder=""
             name="my_email"
             id="my_email">
        </div>
        <!--    <div class="form-group">-->
        <!--      <div class="col-sm-offset-3 col-sm-9 form-control-container">-->
        <!--        <div id="my_recaptcha"></div>-->
        <!--      </div>-->
        <!--    </div>-->
       <!-- <div class="nw-flex nw-flex-col nw-justify-start nw-mb-6 nw-text-base">
          <label class="nw-mb-2 nw-control-label nw-font-bold">
            Sicherheitsabfrage
          </label>
          <div class="nw-flex nw-justify-start nw-items-center">
            <div>
              <img src="/_em_cms/locals/nw/captcha.php" id="captchaImage" alt="Captcha Image">
            </div>
            <div class="nw-mb-2 nw-grow">
              <label for="captchaAnswer" class="nw-sr-only">Captcha Antwort</label>
              <input type="text"
                 class="nw-w-full nw-border
                                   nw-rounded-md
                                   nw-p-2 nw-h-auto
                                   nw-font-bold nw-text-base
                                   placeholder:nw-text-xs
                                   placeholder:nw-font-medium"
                 id="captchaAnswer"
                 name="check"
                 placeholder="Ergebnis Sicherheitsabfrage"
                 autocomplete="off">
            </div>
          </div>
        </div>-->
        <!-- -->
             <div class="nw-mb-8 md:nw-mb-4 clearfix">
            
                <div class="h-captcha form-control-container"  id="h-captcha" data-sitekey="b9c2c8ff-2566-4856-a5e2-85fd51e76b07"></div>

              </div>
        <div class="nw-flex nw-flex-col">
                <button type="button" class=" nw-mb-4 nw-text-center nw-w-full nw-whitespace-nowrap nw-text-white
                nw-bg-red-0 nw-rounded-md nw-text-base nw-font-bold
                nw-cursor-pointer nw-py-3 nw-px-6 hover:nw-bg-red-100 hover:nw-transition-all hover:nw-duration-300 focus:nw-bg-red-200 focus:nw-transition-all
                   disabled:nw-bg-gray-500 disabled:nw-cursor-not-allowed "  onclick="mydaten_check(document.my_anmeldung);">Absenden
                </button>
                <a href="https://www-test2.nw.de/profil?pid=1" class="nw-text-center nw-w-full nw-text-gray-600 nw-whitespace-nowrap nw-bg-white
                nw-border nw-border-gray-600 nw-rounded-md nw-text-base nw-font-bold
              nw-cursor-pointer nw-py-3 nw-px-6 hover:nw-bg-gray-100 hover:nw-transition-all hover:nw-duration-300 focus:nw-bg-gray-200 focus:nw-transition-all
                  disabled:nw-bg-white disabled:nw-text-gray-200 disabled:nw-border-gray-200 disabled:nw-cursor-not-allowed">
                  zurück zur Anmeldung
                </a>
              </div>
        <input type="submit" class="nw-hidden">
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  /* <![CDATA[ */
  jQuery(document).ready(function(){
    if (userLoyaltyClass) {
      jQuery("#my_user_loyalty_class").val(userLoyaltyClass);
    }
  });
  
  function mydaten_check(_objForm) {
    var formElement = document.getElementById("my_anmeldung");
    var formData = new FormData(formElement);
    if (formData.get("h-captcha-response") === "") {
        return alert("Bitte füllen Sie das hCaptcha aus");
    }
    else {
        _objForm.submit();
    }
  }  
    
  function emMyCaptchaReload(_objElement) {
    if (typeof hcaptcha !== "undefined" && hcaptcha.reset) {
      hcaptcha.reset("h-captcha");  
    }
  }
  /* ]]> */
</script>

' . (!empty($GLOBALS['em_projekt'][$GLOBALS['em_client']]['bolMyOnlineReCaptcha']) ? '<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>' : '') . '
';