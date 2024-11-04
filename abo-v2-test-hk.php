<?php
$tpl_text = '';

//echo "<pre>";
//$arr = get_defined_vars();
//print_r($arr);
//echo "</pre>";
//die;

$abosV2 = array ("Wochenabo");
$strTextPflichtfeld = 'Bitte füllen Sie dieses Pflichtfeld aus.';

$simple = false;
$unique = false;
$fill['proof_address'] = true;

if (!empty($abosV2)) {
    foreach ($fill['abos'] as $abo) {
        if ($abo['id'] == 'W7VN_4461'
            || $abo['id'] == 'W7AJ_4461'
            || $abo['id'] == 'W2AF_4461'
            || $abo['id'] == 'W7WP_4461'
            || $abo['id'] == 'W7PR_4461'
            || $abo['id'] == 'W7WB_4461'
            || $abo['id'] == 'W7A2_4461'
            || $abo['id'] == 'W7A3_4461'
            || $abo['id'] == 'W7A3_4461'
        ) {
            $fill['proof_address'] = false;
        }
        $simple = $abo['id'] === $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['abo_simple_key'];
        if ($simple) {
            $fill['show_payment'] = false;
        }
        if (!empty($abo['price_unique'])) {
            $unique = true;
        }
    }
}

$strAbo = '';
if (!empty($fill['abos'])) {
    foreach ($fill['abos'] as $abo) {
        $strAbo .= !empty($strAbo) ? ', ' : '';
        $strAbo .= '' . em_htmlentities(!empty($abo['name']) ? $abo['name'] : '') . '';
    }
}

$strQuery = '';
if (!empty($fill['hidden_fields']['em_abos'])) {
    $strQuery .= '?abos=' . $fill['hidden_fields']['em_abos'];
}
if (!empty($_SESSION['abo_MyUserData']['redirect_cnt'])) {
    $arrContent = em_global::getContent($_SESSION['abo_MyUserData']['redirect_cnt']);
    $strQuery .= (empty($strQuery) ? '?' : '&') . 'em_cnt=' . $_SESSION['abo_MyUserData']['redirect_cnt'];
    if (!empty($arrContent['line_head'])) {
        $strQuery .= '&em_cnt_title=' . em_filename_format($arrContent['line_head']);
    }
}

if ($_SESSION['abo_AboSelected'][0] == 'WTAG_4461') {
    $fill['payment_type'] = 'paypal';
}

$tpl_text .= '
<link rel="stylesheet" type="text/css" href="https://www.haller-kreisblatt.de/_apps/nw/hk/abo_v2/aboshop-hk.css">
<link rel="stylesheet" href="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/fontawesome/css/all.min.css" />
<section id="booking-steps" class="booking-steps">
  <div id="mm-0" class="mm-page mm-slideout">

    <div class="abo abo-shop-update-2022" data-ad-tag="noad">
      
      <div class="main-registration">
        <div class="subheader-section position-sticky">
          <div class="subheader active">
            <!--<p class="step step-register">
            <img class="p-steps step1" src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/svgs/step1.svg" alt="step-done">-->
              <!-- <img class="p-steps-done" src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/svgs/step-done.svg" alt="step-done"> -->
              <!--' . (!empty($_SESSION['myONLINE_VARS']['my_signin']) ? 'Anmelden' : 'Registrieren') . ' Benutzerdaten</p>-->
            <!--<p class="step step-mydata"><img class="p-steps step2" src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/svgs/step2.svg" alt="step-done"> Kontaktdaten</p>-->
            <!--<p class="step step-payment"><img class="p-steps step3" src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/svgs/step3.svg" alt="step-done"> Zahlungsart</p>-->
            <!--<p class="step step-agreement"><img class="p-steps step4" src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/svgs/step4.svg" alt="step-done"> Bestellung überprüfen</p>-->
          </div>
        </div>';

//extended content
if (!empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['abo_extended_content'])
    && !empty($fill['abos'])
) {
    foreach (explode("\n", $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['abo_extended_content']) as $value) {
        list($strId, $strHtml) = explode(':', $value, 2);
        if ($fill['abos'][0]['id'] === $strId) {
            $tpl_text .= $strHtml;
            break;
        }
    }
}

$tpl_text .= '
        <form class="mt-registration js--validate-form" id="abo_form" action="' . $GLOBALS['em_dir']['current'] . '/success' . $strQuery . '#booking-thanks" method="post">
        <input type="hidden" name="em_action" value="success" />
        <input type="hidden" name="reinit_sso_attr" value="1" />';
if (!empty($fill['hidden_fields'])) {
    foreach ($fill['hidden_fields'] as $strKey => $mixValue) {
        $tpl_text .= '
        <input type="hidden" name="' . $strKey . '" value="' . $mixValue . '" />';
    }
}

if (!empty($fill['error_message'])) {
    $tpl_text .= '<p class="alert alert-danger">
      <strong>Es ist leider ein Fehler aufgetreten:</strong><br />
            ' . $fill['error_message'] . '
        </p>';
}

$tpl_text .= '
          <h1 class="registration-title">'. $strAbo .'</h1>
          <div class="registrieren register-section pb-4">
            <!--<h2 class="registrieren-subtitle">' . (!empty($_SESSION['myONLINE_VARS']['my_signin']) ? 'Anmelden' : 'Registrieren') . '</h2>-->
            <h2 class="registrieren-subtitle"> Anmelden</h2>
            <div class="form-control">
              <input class="input error-input regular" type="email" placeholder="E-Mail' . (!empty($_SESSION['myONLINE_VARS']['my_email']) ? '' : '*') . '" name="my_email"
                     id="email" value="' . (!empty($fill['my_email']) ? $fill['my_email'] : '') . '" ' . (!empty($_SESSION['myONLINE_VARS']['my_email']) ? 'readonly' : 'required') . '>
              <input class="" type="hidden" id="my_user" name="my_user" value="' . (!empty($fill['my_user']) ? $fill['my_user'] : '') . '" ' . (!empty($_SESSION['myONLINE_VARS']['my_user']) ? 'readonly' : 'required') . ' maxlength="55">
              <i class="fa-solid fa-check success-icon normal-icon"></i>
            </div>
            ' . ((empty($_SESSION['myONLINE_VARS']['my_gp_no_viva']) && empty($_SESSION['myONLINE_VARS']['my_user'])) ? '
            <div class="form-control">
              <input class="input error-input regular" type="password" placeholder="Passwort*" name="my_new_pass"
                     id="psw">
              <i class="fa-solid fa-check success-icon normal-icon"></i>
              
              <script>
                $("#my_email").change(function () {
                    $("#my_user").val(this.value)
                });
                </script>
            </div>' : '') . '
          </div>
          <div class="meine-daten register-section pb-4">
            <h2 class="meine-daten-title">Kontaktdaten</h2>
            <div class="select-menu' . ((!empty($_SESSION['myONLINE_VARS']['my_signin']) && !empty($fill['my_gender'])) ? ' hidden' : '') . '">   
                <select name="my_gender" id="my_gender" required' . ($simple ? ' disabled' : '') . '>
                    <option value="">Anrede*</option>
                    <option value="Herr"' . ((!empty($fill['my_gender']) && ($fill['my_gender'] === 'Herr' || $fill['my_gender'] === 'Herrn')) ? " selected" : "") . '>Herr</option>
                    <option value="Frau"' . ((!empty($fill['my_gender']) && $fill['my_gender'] === 'Frau') ? " selected" : "") . '>Frau</option>
                    ' . (!empty($em_projekt[$em_client]['myonline_firma']) ? '
                    <option value="Firma"' . ((!empty($fill['my_gender']) && $fill['my_gender'] === 'Firma') ? " selected" : "") . '>Firma</option>
                    ' : '') . '
                </select>
              ' . ($simple ? '<input type="hidden" name="my_gender" value="' . $fill['my_gender'] . '">' : '') . '
            </div>
            <div class="form-control company' . ((!empty($fill['my_gender']) && $fill['my_gender'] !== 'Firma') ? ' hidden' : '') . '">
              <input type="text" id="cname" class="" name="my_company" placeholder="Firma" value="' . (!empty($fill['my_company']) ? $fill['my_company'] : '') . '" ' . ((!empty($fill['my_gender']) && $fill['my_gender'] === 'Firma') ? ' required ' : '') . ($simple ? ' readonly' : '') . '>
              <i class="fa-solid fa-check success-icon normal-icon "></i>
            </div>
            <div class="form-control name">
              <input type="text" id="fname" class="" name="my_firstname" data-v-min-length="2" required placeholder="Vorname' . (!empty($_SESSION['myONLINE_VARS']['my_firstname']) ? '' : '*') . '" value="' . (!empty($fill['my_firstname']) ? $fill['my_firstname'] : '') . '" ' . ((!empty($fill['my_gender']) && $fill['my_gender'] !== 'Firma') ? 'required' : '') . (!empty($_SESSION['myONLINE_VARS']['my_firstname']) || $simple ? ' readonly' : '') . ' maxlength="50" onkeyup="emFillPaymentAccountOwner()" onchange="this.onkeyup()">
              <i class="fa-solid fa-check success-icon normal-icon "></i>
            </div>
            <div class="form-control name">
              <input type="text" id="lname" class="" name="my_name" data-v-min-length="2" required placeholder="Nachname' . (!empty($_SESSION['myONLINE_VARS']['my_name']) ? '' : '*') . '" value="' . (!empty($fill['my_name']) ? $fill['my_name'] : '') . '" ' . ((!empty($fill['my_gender']) && $fill['my_gender'] !== 'Firma') ? 'required' : '') . (!empty($_SESSION['myONLINE_VARS']['my_name']) || $simple ? ' readonly' : '') . ' maxlength="50" onkeyup="emFillPaymentAccountOwner()" onchange="this.onkeyup()">
              <i class="fa-solid fa-check success-icon normal-icon "></i>
            </div>
            <div class="input-holder form-control">
              <div class="">
                <input class="street-input" type="text" id="street"' . ($fill['proof_address'] ? ' data-v-min-length="2"' : '') . ' name="my_street" placeholder="Straße' . ($fill['proof_address'] ? '*' : '') . '" value="' . (!empty($fill['my_street']) ? $fill['my_street'] : '') . '"' . ($fill['proof_address'] ? ' required' : '') . ' maxlength="50"' . ($simple ? ' readonly' : '') . '>
                <i class="fa-solid fa-check success-icon normal-icon "></i>
              </div>
              <div class="right">
                <input class="number-input" type="text" id="number" name="my_number" placeholder="Nr.' . ($fill['proof_address'] ? '*' : '') . '" value="' . (!empty($fill['my_number']) ? $fill['my_number'] : '') . '"' . ($fill['proof_address'] ? ' required' : '') . ' maxlength="10"' . ($simple ? ' readonly' : '') . '>
                <i class="fa-solid fa-check success-icon normal-icon "></i>
              </div>

            </div>


            <div class="input-holder form-control">
              <div class="ort-icon">
                <input class="number-input" type="text" id="plz" name="my_zip" placeholder="PLZ' . ($fill['proof_address'] ? '*' : '') . '" value="' . (!empty($fill['my_zip']) ? $fill['my_zip'] : '') . '"' . ($fill['proof_address'] ? ' required' : '') . ' pattern="\d{5}" maxlength="5"' . ($simple ? ' readonly' : '') . '>
                <i class="fa-solid fa-check success-icon normal-icon plz-icon"></i>
              </div>
              <div class="">
                <input class="street-input" type="text" id="ort"' . ($fill['proof_address'] ? ' data-v-min-length="3"' : '') . ' name="my_city" placeholder="Ort' . ($fill['proof_address'] ? '*' : '') . '" value="' . (!empty($fill['my_city']) ? $fill['my_city'] : '') . '"' . ($fill['proof_address'] ? ' required' : '') . ' maxlength="50"' . ($simple ? ' readonly' : '') . '>
                <i class="fa-solid fa-check success-icon normal-icon "></i>
              </div>
            </div>
            
' . ((!empty($fill['my_sso_id']) && (!empty($fill['my_phone_prefix']) || empty($fill['my_cellphone_prefix']) || !empty($fill['phone_required']))) ? '
                <div class="input-holder form-control">
                <div>
                  <input class="number-input" type="text" id="vorwahl" name="my_phone_prefix" placeholder="Vorwahl' . (!empty($fill['phone_required']) ? ' *' : '') . '" value="' . (!empty($fill['my_phone_prefix']) ? $fill['my_phone_prefix'] : '') . '"' . (!empty($fill['phone_required']) ? ' required' : '') . ' pattern="\d{4,5}" maxlength="6">
                  </div>
                  <div>
                  <input class="street-input" type="tel" id="tel" name="my_phone"
                         placeholder="Telefon (Festnetz)' . (!empty($fill['phone_required']) ? ' *' : '') . '" value="' . (!empty($fill['my_phone']) ? $fill['my_phone'] : '') . '"' . (!empty($fill['phone_required']) ? ' required' : '') . ' pattern=".{3,10}" maxlength="11">
                  </div>
                  <!--<i class="fa-solid fa-circle-info"></i>-->
                </div>' : '') . '
' . ((!empty($fill['my_sso_id']) && !empty($fill['my_cellphone_prefix'])) ? '
                <div class="input-holder form-control">
                <div>
                  <input class="number-input" type="text" id="vorwahl" name="my_cellphone_prefix" placeholder="Vorwahl" value="' . (!empty($fill['my_cellphone_prefix']) ? $fill['my_cellphone_prefix'] : '') . '" pattern="\d{4,5}" maxlength="6">
                  </div>
                  <div>
                  <input class="street-input" type="tel" id="tel" name="my_cellphone"
                         placeholder="Telefon (Mobil)" value="' . (!empty($fill['my_cellphone']) ? $fill['my_cellphone'] : '') . '" pattern=".{3,10}" maxlength="11">
                  </div>
                  <!--<i class="fa-solid fa-circle-info"></i>-->
                </div>' : '') . '
' . (empty($fill['my_sso_id']) ? '
                <div class="input-holder form-control">
                <div>
                  <input class="number-input" type="text" id="vorwahl" name="my_phone_prefix" placeholder="Vorwahl' . (!empty($fill['phone_required']) ? ' *' : '') . '" value="' . (!empty($fill['my_phone_prefix']) ? $fill['my_phone_prefix'] : '') . '"' . (!empty($fill['phone_required']) ? ' required' : '') . ' pattern="\d{4,5}" maxlength="6">
                  </div>
                  <div>
                  <input class="street-input" type="tel" id="tel" name="my_phone"
                         placeholder="Telefon' . (!empty($fill['phone_required']) ? ' *' : '') . '" value="' . (!empty($fill['my_phone']) ? $fill['my_phone'] : '') . '"' . (!empty($fill['phone_required']) ? ' required' : '') . ' pattern=".{3,10}" maxlength="11">
                  </div>
                  <!--<i class="fa-solid fa-circle-info"></i>-->
                </div>' : '') . '

            <div class="input-holder form-control name' . ((!empty($fill['my_gender']) && $fill['my_gender'] === 'Firma') ? ' hidden' : '') . '">
              <input onfocus="(this.type=\'date\')" class="geburtsdatum" type="text" id="geburtsdatum"
                     name="my_birthday" placeholder="Geburtsdatum (tt.mm.jjjj)" value="' . (!empty($fill['my_birthday']) ? date('d.m.Y', strtotime($fill['my_birthday'])) : '') . '">
              <!--<i class="fa-solid fa-circle-info"></i>-->
            </div>

          </div>
          
          ' . ((!empty($fill['price_sum_month']) && !empty($fill['price_sum_year'])) ? '
    <script>
        jQuery(function() {
            var strValue = jQuery("input:radio[name=em_payment_method]:checked").val();

            if (strValue == "m") {
                jQuery(".preis-gesamt.month").removeClass("hidden");
                jQuery(".preis-gesamt.year").addClass("hidden");
            } else if (strValue == "j") {
                jQuery(".preis-gesamt.year").removeClass("hidden");
                jQuery(".preis-gesamt.month").addClass("hidden");
            }

            jQuery("input:radio[name=em_payment_method]").change(function() {
                if (this.value == "m") {
                    jQuery(".preis-gesamt.month").removeClass("hidden");
                    jQuery(".preis-gesamt.year").addClass("hidden");
                    if (jQuery("#abo_form").attr("action").indexOf("AJ") !== -1) {
                        jQuery("#abo_form").attr("action", jQuery("#abo_form").attr("action").replace("AJ", "VN"));
                    }
                    if (jQuery("input[name=em_abos]").val().indexOf("AJ") !== -1) {
                        jQuery("input[name=em_abos]").val(jQuery("input[name=em_abos]").val().replace("AJ", "VN"));
                    }
                } else if (this.value == "j") {
                    jQuery(".preis-gesamt.year").removeClass("hidden");
                    jQuery(".preis-gesamt.month").addClass("hidden");
                    if (jQuery("#abo_form").attr("action").indexOf("VN") !== -1) {
                        jQuery("#abo_form").attr("action", jQuery("#abo_form").attr("action").replace("VN", "AJ"));
                    }
                    if (jQuery("input[name=em_abos]").val().indexOf("VN") !== -1) {
                        jQuery("input[name=em_abos]").val(jQuery("input[name=em_abos]").val().replace("VN", "AJ"));
                    }
                }
            });
        });
    </script>'
        : ''
    );

if (
    (empty($fill['payment_gift_code_info']['data']['discount'])
        || empty($fill['payment_gift_code_info']['valid'])
        || (!empty($fill['payment_gift_code_info']['data']['discount'])
            && $fill['payment_gift_code_info']['data']['discount'] < 100
        )
    )
    && (empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['abo_no_payment'])
        || empty(array_intersect(explode("\n", $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['abo_no_payment']), $_SESSION['abo_AboSelected']))
    )
) {
    $tpl_text .= '          
          <div class="bezahlen  active-bezahlen register-section">
            <h3 class="title">Wie möchten Sie bezahlen?</h3>
            <div class="zahlungsrhythmus">
              <h3>Zahlungsrhythmus</h3>
              <div class="input-container">' . (!empty($abo['price_month']) ? '
                <div class="left-radio">
                  <input type="radio" id="month" name="em_payment_method" value="m"' . ((empty($fill['payment_method']) || $fill['payment_method'] === "m") ? ' checked' : '') . '>
                  <label for="month">' . (($_SESSION['abo_AboSelected'][0] == 'WTAG_4461' || $unique) ? 'Einmalig' : 'Monatlich') . ' <br> <span>' . str_replace('.', ',', $abo['price_month']) . ' €' . (($_SESSION['abo_AboSelected'][0] == 'WTAG_4461' || $unique) ? '' : ' pro ' . ($_SESSION['abo_AboSelected'][0] == 'W7WP_4461' ? 'Monat' : 'Monat')) .(($_SESSION["abo_AboSelected"][0] == 'W7VN_4461')?' (3 € im 1. Monat)':''). '</span></label>
                </div>' : '') . (!empty($abo['price_year']) ? '
                <div class="right-radio">
                  <input type="radio" id="year" name="em_payment_method" value="j"' . ($fill['payment_method'] === "j" ? ' checked' : '') . '>
                  <label for="year">Jährlich <br> <span>' . str_replace('.', ',', $abo['price_year']) . ' € pro Jahr</span></label>
                </div>' : '') . '

              </div>
            </div>
            <div class="zahlungsrhythmus bottom-px active">
              <h3>Zahlweise</h3>
              <div class="payment-option">'
        . ($_SESSION['abo_AboSelected'][0] != 'WTAG_4461' ? '
                <div class="radio">
                  <input type="radio" id="payment-sepa" name="em_payment_type" value="bankeinzug"' . ((empty($fill['payment_type']) || $fill['payment_type'] === "bankeinzug") ? ' checked' : '') . '>
                  <label for="payment-sepa">SEPA-Lastschrift </label>
                </div>
                <!-- <i class="fa-brands fa-cc-visa"></i> -->
                <img class="radio-sepa-img" src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/images/sepa-payment.png" alt="sepa-payment">'
            : ''
        )
        .
        ((!empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['abo_' . $_SESSION['abo_AboSelected'][0] . '_paypal_plan_id']) || $unique) ? '
                <div class="radio paypal-radio">
                  <input type="radio" id="payment-paypal" name="em_payment_type" value="paypal"' . ((!empty($fill['payment_type']) && $fill['payment_type'] === "paypal") ? ' checked' : '') . '>
                  <label for="payment-paypal">Paypal</label>
                </div>
                <img class="paypal-radio" src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/svgs/paypal-icon.svg" alt="PayPal" style="margin-left: 10px; margin-top: -3px;" width="50">

                ' : '') . '
              </div>
              <script>
                  jQuery(function() {
                      var strValue = jQuery("input:radio[name=em_payment_type]:checked").val();
        
                      if (strValue === "bankeinzug") {
                          jQuery(".payment-container").addClass("hidden");
                          jQuery(".sepa-payment-container").removeClass("hidden");
                          jQuery(".agreement-direkt-zu.changepayment").removeClass("hidden");
                          jQuery(".agreement-direkt-zu.paypalpayment").addClass("hidden");
                          jQuery("input[name=em_payment_account_owner], input[name=em_payment_iban]").attr("required", "");
                      } else if (strValue === "rechnung" || strValue === "paypal") {
                          jQuery(".sepa-payment-container").addClass("hidden");
                          jQuery("input[name=em_payment_account_owner], input[name=em_payment_iban]").removeAttr("required");
                          if (strValue === "paypal"
                            && !jQuery("input[name=paypal_agreement_token]").val()
                          ) {
                              jQuery(".payment-container").removeClass("hidden");
                              jQuery("input[name=em_action]").val("paypal");
                              jQuery(".agreement-direkt-zu.changepayment").addClass("hidden");
                              jQuery(".agreement-direkt-zu.paypalpayment").removeClass("hidden");
                          }
                          if (strValue === "rechnung") {
                              jQuery(".payment-container").addClass("hidden");
                              jQuery(".agreement-direkt-zu.changepayment").removeClass("hidden");
                              jQuery(".agreement-direkt-zu.paypalpayment").addClass("hidden");
                          }
                      }
        
                      jQuery("input:radio[name=em_payment_type]").click(function() {
                          if (this.value === "bankeinzug") {
                              jQuery(".payment-container").addClass("hidden");
                              jQuery(".sepa-payment-container").removeClass("hidden");
                              jQuery("input[name=em_payment_account_owner], input[name=em_payment_iban], input[name=payment_mandate]").attr("required", "");
                          } else {
                              jQuery(".sepa-payment-container").addClass("hidden");
                              jQuery("input[name=em_payment_account_owner], input[name=em_payment_iban], input[name=payment_mandate]").removeAttr("required");
                          }
        
                          if (this.value === "paypal") {
                              jQuery(".gutschein").addClass("hidden");
                              jQuery(".payment-container").removeClass("hidden");
                              jQuery("input[name=em_action]").val("paypal");
                              jQuery(".agreement-direkt-zu.changepayment").addClass("hidden");
                              jQuery(".agreement-direkt-zu.paypalpayment").removeClass("hidden");
                          } else {
                              jQuery(".gutschein").removeClass("hidden");
                              jQuery("input[name=em_action]").val("success");
                              jQuery(".agreement-direkt-zu.changepayment").removeClass("hidden");
                              jQuery(".agreement-direkt-zu.paypalpayment").addClass("hidden");
                          }
                          
                          if (this.value === "rechnung") {
                              jQuery(".payment-container").addClass("hidden");
                          }
                      });
                      ' . (em_session::getSessionValue('abo_AboSelected', 0) == 'WTAG_4461' ? 'jQuery("input:radio[name=em_payment_type]:checked").trigger("click");' : '') . '
                  });
              </script>
              <div class="payment-container desc' . ($fill['payment_type'] !== 'paypal' ? ' hidden' : '') . '" id="desc">
                <img src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/svgs/paypal-icon.svg" alt="paypal-icon">
                <p class="paypal-text">
                  Durch Klick auf <span>&ldquo;Bezahlen mit PayPal&rdquo;</span> am Ende des Bestellprozesses,
                  öffnet sich
                  die Internetseite des Zahlungsdienstleisters PayPal. Ihre Angaben werden von
                  Paypal an das Mindener Tageblatt übermittelt und Sie gelangen automatisch auf
                  die Seite &ldquo;Bestellbestätigung&rdquo;.
                </p>
              </div>
              <div class="sepa-payment-container sepa' . ($fill['payment_type'] === 'paypal' ? ' hidden' : '') . '" id="sepa">
                <div class="form-control">
                  <input type="text" id="kontoinhaber"  data-v-min-length="3" name="em_payment_account_owner" placeholder="Vorname Nachname"
                         value="' . (!empty($fill['payment_account_owner']) ? em_text_to_value($fill['payment_account_owner']) : '') . '" required>
                  <span class="highlight"></span>
                  <label class="form-control-label regular">Kontoinhaber*</label>
                  <i class="fa-solid fa-check success-icon normal-icon "></i>
                  <div class="warning-texts">
                    <small class="normal error success stayhidden">4 Zeichen</small>
                  </div>
                </div>
                <div class="form-control">
                  <input type="text" id="iban" name="em_payment_iban" placeholder="DE" value="' . (!empty($fill['payment_iban']) ? em_text_to_value($fill['payment_iban']) : '') . '" data-iban="true" required maxlength="22" onkeyup="this.value=this.value.replace(\' \', \'\')" onchange="this.onkeyup()">
                  <label class="form-control-label regular">IBAN*</label>
                  <i class="fa-solid fa-check success-icon normal-icon "></i>
                </div>
                <!--div class="form-control">
                  <input type="text" id="bank"  data-v-min-length="3"  name="em_payment_bank"
                         placeholder="Name der Bank"value="' . (!empty($fill['payment_bank']) ? em_text_to_value($fill['payment_bank']) : '') . '" required>
                  <label class="form-control-label regular">Bank *</label>
                  <i class="fa-solid fa-check success-icon normal-icon "></i>
                </div-->
                <!--<p style="margin-top:10px;">* Pflichtfelder</p>-->
                <p class="sepa-info-p sepa-payment-container' . ($fill['payment_type'] === 'paypal' ? ' hidden' : '') . '">
                  Die Einzugsermächtigung kann jederzeit formlos widerrufen werden. Abbuchung erfolgt
                  zu Monatsbeginn.
                </p>
                <p class="sepa-info-p sepa-payment-container' . ($fill['payment_type'] === 'paypal' ? ' hidden' : '') . '"><b>SEPA-Laschriftmandat</b></p>
                <div class="checkout-agreement sepa-payment-container' . ($fill['payment_type'] === 'paypal' ? ' hidden' : '') . '">
                  <input data-error="' . $strTextPflichtfeld . '" style="display: block;" type="checkbox" name="payment_mandate" id="sepa-agreement" value="1"' . (!empty($fill['payment_mandate']) ? ' checked' : '') . ' required>
                  <label class="agreement-label" for="sepa-agreement">
                    Mit den Einzug von Meinem Konto mittels <a href="https://www.mt.de/agb"
                                                               target="_blank" class="checkbox-span underlineonHover">
                      SEPA-Lanschriftmandat </a> bin ich einverstanden*
                  </label>
                </div>

              </div>

            </div>
          </div>';
}
$tpl_text .= '  
          <div class="checkout-agreement">
          <div class="mb-3">
            <input data-error="' . $strTextPflichtfeld . '" style="display: block;" type="checkbox" id="agreement" name="agb" required>
            <label class="agreement-label" for="agreement">
              Die <a href="https://www.mt.de/agb" target="_blank" class="checkbox-span underlineonHover">
                AGB </a>
              und die <a class="checkbox-span underlineonHover" href="https://www.mt.de/datenschutz"
                         target="_blank"> Datenschutzhinweise</a> habe ich gelesen und
              akzeptiert.*
            </label>
          </div>
            
            ';

if (!empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['abo_consent_hide'])
    && !empty(array_intersect(explode("\n", $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['abo_consent_hide']), $_SESSION['abo_AboSelected']))
) {
    $tpl_text.= '
            <input type="hidden" name="my_optin_agb_phone" value="1">
            <input type="hidden" name="my_optin_agb_email" value="1">';
} else {
    $tpl_text .= '
            <div class="mt-3">
            <p class="agreement-text" style="padding-bottom: 0;">
              <span class="agreement-text-span">Einwilligung der Kontaktaufnahme: </span>Es würde uns freuen, wenn Sie uns, der Bruns Verlags-GmbH & Co. KG (u. a. Mindener Tageblatt, MT clever, MT-Karte, Kauf lokal, Weserspucker), der Bruns Medienlogistik GmbH (Zustellung) und der Media-Reisen GmbH & Co. KG, die Erlaubnis erteilen, Sie künftig per E-Mail und/oder telefonisch zu kontaktieren, und zwar ausschließlich bezüglich verlagsrelevanter Themen zum Beispiel zu Kundenbefragungen, Gewinnspielen oder MT-Leserreisen.
            </p>
            <input type="checkbox" id="perEmail" name="my_optin_agb_email">
            <label class="agreement-label" for="perEmail">
              per E-Mail
            </label>
            
            <input type="checkbox" name="my_optin_agb_phone" id="perPhone">
            <label for="perPhone" class="agreement-label">
                per Telefon
            </label>
                                    
            <p class="agreement-text">Die erteilte Erlaubnis können Sie jederzeit formlos zentral per E-Mail
              unter
              <a href="mailto:vertrieb@mt.de" class="agreement-text-email darkBlue">
                vertrieb@mt.de
              </a>
              per Post an die Brunsverlags-GmbH & KG,
              Obermarktstraße 26-30, 33423
              Minden oder telefonisch unter 0571-88272 wiederrufen.
            </p>
            </div>';
}
$tpl_text .= '
            <!-- Buttons for form -->
            <div class="agreement-box">
              <p class="agreement-pflichtfelder">* Pflichtfelder</p>

              <button type="button" class="agreement-zuruck-btn">
                <a class="agreement-zuruck semi-bold" href="/abo">
                  Zurück
                </a>
              </button>
              <!-- this are paypal and banks -->

              <button type="submit" class="sepa agreement-direkt-zu changepayment' . ($fill['payment_type'] !== 'paypal' || !empty($fill['hidden_fields']['paypal_agreement_token']) ? '' : ' hidden') . '" data-upscore-conversion="2">
                <span class="agreement-direkt-btn semi-bold">
                  ' . (!empty($fill['show_payment']) ? 'Kostenpflichtig ' : '') . ($simple && !empty($fill['my_sso_id']) ? 'freischalten' : (empty($fill['my_sso_id']) ? 'bestellen' : 'bestellen')) . '
                </span>
              </button>
                                     
              <button type="submit" class="desc agreement-direkt-zu paypalpayment' . ($fill['payment_type'] === 'paypal' && empty($fill['hidden_fields']['paypal_agreement_token']) ? '' : ' hidden') . '" data-upscore-conversion="2">
                <span class="text-white">Bezahlen mit</span> <img src="https://www.mt.de/_em_daten/mt/_layout/paypal.png" alt="PayPal" style="margin-left: 10px;" width="120">
              </button>
              <!--  
              <button type="submit" class="desc agreement-direkt-zu paypalpayment' . ($fill['payment_type'] === 'paypal' && empty($fill['hidden_fields']['paypal_agreement_token']) ? '' : ' hidden') . '">
                <img src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/images/direkt-zu-paypal_image.png" alt="paypal">
              </button>
              -->
            </div>
          </div>

        </form>
      </div>


    </div>

  </div>
  <script src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/js/jquery-3.6.1.min.js"></script>
  <script src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/js/jbvalidator.min.js?v=12"></script>
  <script src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/js/aboshop-update.js?v=7"></script>
  <script>
    jQuery(document).ready(function() {

        jQuery( "#abo_form" ).on("submit", function( event ) {
            jQuery(".agreement-direkt-zu").addClass("loading-state");
            jQuery("button[type=submit]").attr("disabled", "disabled");
        });
    
        jQuery("#my_gender").on("change", function() {
            if (jQuery("#my_gender").val() === "Firma") {
                jQuery(".company").removeClass("hidden");
                jQuery("#geburtsdatum").addClass("hidden");
                jQuery("#geburtsdatum").val("");
                jQuery("#cname").prop("required", true);
                jQuery("#fname").prop("required", false);
                jQuery("#lname").prop("required", false);
            } else {
                jQuery(".company").addClass("hidden");
                jQuery("#cname").val("");
                jQuery("#geburtsdatum").removeClass("hidden");
                jQuery("#cname").prop("required", false);
                jQuery("#fname").prop("required", true);
                jQuery("#lname").prop("required", true);
            }
        });
        
        ' . (!empty($fill["phone_required"]) ? " jQuery(\"#abo_form\").submit();" : "") . '
        
        jQuery("#my_gender").change();
        jQuery("#fname").change();
    });
    
    function emFillPaymentAccountOwner() {
        if (jQuery("#fname").val() || jQuery("#lname").val()) {
            jQuery("#kontoinhaber").val(jQuery("#fname").val() + " " + jQuery("#lname").val());
        }
    }
    
    window.history.pushState({}, null, window.location.href.replace("/success", "/checkout"));
  </script>
</section>';