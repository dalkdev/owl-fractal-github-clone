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

// defined fill['abos']
if (!isset($fill['abos']) || !is_array($fill['abos'])) {
    $fill['abos'] = [];
}

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

$abo_urls = [
    'HK-Jahresabo' => 'https://www-test2.haller-kreisblatt.de/AboV2?abos=HK-Jahresabo',
    'HK-Plus-Angebot' => 'https://www-test2.haller-kreisblatt.de/AboV2?abos=HK-Plus-Angebot'
];

$abo_descriptions = [
    'HK-Jahresabo' => [
        'description' => '79 € im 1. Jahr und 99 € im 2. Jahr',
        'billing' => 'Jährliche Abrechnung',
        'second-billing' => 'danach 99 € jährlich & jederzeit kündbar',
        'third-billing' => 'inkl. HK-Karte',
        'forth-billing' => 'inkl. HK+-Updates per Mail',
        'angebot' => 'Jährlich'
    ],
    'HK-Plus-Angebot' => [
        'description' => '1 € / Woche (nach 1 Jahr 2 € / Woche)',
        'billing' => 'mtl. Abrechnung',
        'second-billing' => 'mtl. kündbar',
        'third-billing' => 'HK+-Updates per Mail',
        'angebot' => 'Monatlich'

    ]
];


#$selected_offer = isset($_GET['abos']) ? $_GET['abos'] : 'HK-Jahresabo';
$selected_offer =  $_GET['abos'];
if ($selected_offer)
    if (array_key_exists($selected_offer, $abo_urls))

        $offer_description = $abo_descriptions[$selected_offer];

/*if ($_SESSION['abo_AboSelected'][0] == 'WTAG_4461') {
    $fill['payment_type'] = 'paypal';
}*/



$tpl_text .= '
<link href="/_em_daten/locals/module/nw/_includes/twig/current/public/css/app.css?1699975342" rel="stylesheet">
<link href="/_em_daten/locals/module/nw/_includes/twig/current/public/css/app-patch.css?1701788182" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://www.haller-kreisblatt.de/_apps/nw/hk/abo_v2/aboshop-hk.css">
<link rel="stylesheet" href="https://www.haller-kreisblatt.de/_em_daten/mtrelaunch/abo/assets/fontawesome/css/all.min.css" />

<style>

input[type="radio"] {
  display: none;
}
.radio {
   padding-left: 0 !important; 
}
.main-registration .mt-registration .bezahlen .zahlungsrhythmus .payment-option .radio label {

   padding-left: 0 !important; 
}
[class*=radio] label {
   padding-left: 0 !important; 
}
.em-ul-check-green {
    padding-left: 0;
    list-style-type: none;
}
ul {
    margin-top: 0;
    margin-bottom: 10px;
    padding-left: 22px;
}
#abo_form .register-section .form-control .fas.showpassword {
    top: 10px !important;
}
.main-registration .mt-registration .active-bezahlen .active {
    background: #FFFFFF !important;
}
@media only screen and (max-width: 1024px) {
    .main-registration .mt-registration .checkout-agreement input[type=checkbox] + label {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        cursor: pointer;
    }
        .main-registration .mt-registration .checkout-agreement .agreement-label {
       
        flex-wrap: wrap;
    }
}
@media (min-width: 768px) and (max-width: 991px) {
    .main-registration .mt-registration {
        width: 600px;
    }
    .main-registration .mt-registration .registrieren {
    width: 600px;
    
    }
     .main-registration .mt-registration .meine-daten {
        padding: 0 32.5px;
    }
    .main-registration .mt-registration .bezahlen {
    width: 600px;
    }
    .main-registration .mt-registration .bezahlen .zahlungsrhythmus {

        padding: 20px 32.5px 0 32.5px;
    }
    .main-registration .mt-registration .checkout-agreement {
    width: 600px;
    margin: 20px 0;
    }
}
.em-ul-check-green li:before {
    text-shadow: none !important;
    -webkit-font-smoothing: antialiased;
    font-family: "fontawesome";
    speak: none;
    font-weight: 400;
    font-variant: normal !important;
    line-height: 1;
    text-transform: none;
    margin-right: 10px;
    content: "\f00c";
    top: 5px !important;
    color: #00B4D1 !important;
    left: 0;
}

.em-ul-check-green>li {
    text-align: left;
    color: black !important;
}

@media only screen and (max-width: 479px) {
    .main-registration .mt-plus-section .mt-container img {
        width: 75% !important;
        margin: auto;
        display: block;
    }
}

@media (max-width: 479px) {
    .mt-plus-section .mt-container img {
        margin-bottom: 30px !important;
    }
}
@media (min-width: 768px) {
    .hk-col-2 {
        display: flex;;
        max-width: 16.666667%;
    }
}
.main-registration .mt-registration .checkout-agreement .agreement-label .checkbox-span, .main-registration .mt-registration .checkout-agreement .agreement-text .checkbox-span {
    color: #00B4D1 !important;
}
.main-registration .mt-registration .bezahlen .zahlungsrhythmus .sepa-payment-container .checkout-agreement input[type=checkbox] + label:before {
    flex-shrink: 0 !important;
}
.main-registration .mt-registration .checkout-agreement input[type=checkbox]:checked + label:before {
    background-color: #00B4D1 !important;
    border-color:#00B4D1 !important;
}

.main-registration .mt-registration .checkout-agreement input[type=checkbox] + label:before {
    border: 2px solid #00B4D1 !important;
        flex-shrink: 0 !important;
}
.main-registration .mt-registration .registrieren .form-control .input {
    padding: 13px 10px !important;
}
.main-registration .mt-registration .checkout-agreement .agreement-text .agreement-text-email {
    color: #00B4D1 !important;
}
.main-registration .mt-registration .checkout-agreement .agreement-box {
    grid-template-columns: 3fr 1fr 3fr !important;
    gap: 8px ;
}
.main-registration .mt-registration .registrieren .form-control .warning-texts .error {
  color: #E5001A !important ;
   background: white;
}

.main-registration .mt-registration .registrieren .form-control .warning-texts .success {
    color: #34AE24;
    background: white;
}
@media (min-width: 640px) and (max-width: 767px) {
    .main-registration .mt-registration .checkout-agreement .agreement-box {
    grid-template-columns: 3fr 1fr 4fr !important;
    }
    .main-registration .mt-registration {
        width: 600px;
    }
    .main-registration .mt-registration .registrieren {
    width: 600px;
    
    }
     .main-registration .mt-registration .meine-daten {
        padding: 0 32.5px;
    }
    .main-registration .mt-registration .bezahlen {
    width: 600px;
    }
    .main-registration .mt-registration .bezahlen .zahlungsrhythmus {

        padding: 20px 32.5px 0 32.5px;
    }
    .main-registration .mt-registration .checkout-agreement {
    width: 600px;
    margin: 20px 0;
    }
}
#my_gender {
    color: #777 !important;
}
.login select, .abo select {
    text-transform: none !important;
}

select {
    border-radius: 0;
    text-transform: uppercase;
    width: 100%;
    outline: none;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    cursor: pointer;
    border: 1px solid #DDDDDD;
    font-size: 16px;
    line-height: 26px;
    letter-spacing: -0.32px;
    font-style: normal;
    font-weight: 400;
    text-align: left;
    padding: 6px 10px;
    font-family: "Open Sans";
}
.select-container {
  position: relative;
  display: inline-block;
}

select {
  padding-right: 30px; 
  appearance: none;
  -webkit-appearance: none; 
  -moz-appearance: none; 
}

.arrow {
  position: absolute;
  top: 50%;
  right: 10px;
  width: 0;
  height: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid #333; 
  transform: translateY(-50%);
  pointer-events: none; 
}

</style>
<section id="booking-steps" class="nw-mx-2  booking-steps">
  <div id="mm-0" class="mm-page mm-slideout">

    <div class="abo abo-shop-update-2022" data-ad-tag="noad">
      
      <div class="main-registration">
        <div class="subheader-section position-sticky">
          <div class="subheader active">
            <!--<p class="step step-register">
            <img class="p-steps step1" src="https://www.hk.de/_em_daten/mtrelaunch/abo/assets/svgs/step1.svg" alt="step-done">-->
              <!-- <img class="p-steps-done" src="https://www.hk.de/_em_daten/mtrelaunch/abo/assets/svgs/step-done.svg" alt="step-done"> -->
              <!--' . (!empty($_SESSION['myONLINE_VARS']['my_signin']) ? 'Anmelden' : 'Registrieren') . ' Benutzerdaten</p>-->
            <!--<p class="step step-mydata"><img class="p-steps step2" src="https://www.hk.de/_em_daten/mtrelaunch/abo/assets/svgs/step2.svg" alt="step-done"> Kontaktdaten</p>-->
            <!--<p class="step step-payment"><img class="p-steps step3" src="https://www.hk.de/_em_daten/mtrelaunch/abo/assets/svgs/step3.svg" alt="step-done"> Zahlungsart</p>-->
            <!--<p class="step step-agreement"><img class="p-steps step4" src="https://www.hk.de/_em_daten/mtrelaunch/abo/assets/svgs/step4.svg" alt="step-done"> Bestellung überprüfen</p>-->
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
<section class="mt-plus-section" style="margin: 40px 20px 20px 20px">
  <div class="nw-flex nw-flex-col md:nw-flex-row  nw-justify-center nw-gap-8 ">
    <div class="hk-col-2" style="position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;">
      <div class="mt-container">
        <img src="/_em_daten/mtrelaunch/abo/assets/images/tablet-phone.png" alt="tablet&amp;phone" style="width: 90%;">
      </div>
    </div>
    <div>
      <div class="nw-text-2xl">
        <h2 class="nw-mb-2">Ihr gewünschtes Produkt: <span style="color:#00B4D1 ;font-weight:bold;font-size: 30px;line-height: 32px;"> HK+</span></h2><!--
          <p> 
             <span class="nw-text-base"><b>1 € / Woche (nach 1 Jahr 2 €/Woche) </b></span> 
             <span class="nw-text-sm nw-block" >Monatliche Abrechnung  </span>
             <span class="nw-text-sm nw-block" >monatlich kündbar   </span>
             <span class="nw-text-sm nw-block" >NW+-Updates per Mail </span>
          </p>-->
          ';


if ($offer_description) {
    $tpl_text .= '<ul class="em-ul-check-green">
        <li class="nw-text-sm nw-block">' . $offer_description["description"] . '</li>';


    if (isset($offer_description["billing"])) {
        $tpl_text .= '<li class="nw-text-sm nw-block">' . $offer_description["billing"] . '</li>';
    }


    if (isset($offer_description["second-billing"])) {
        $tpl_text .= '<li class="nw-text-sm nw-block">' . $offer_description["second-billing"] . '</li>';
    }


    if (isset($offer_description["third-billing"])) {
        $tpl_text .= '<li class="nw-text-sm nw-block">' . $offer_description["third-billing"] . '</li>';
    }
    if (isset($offer_description["forth-billing"])) {
        $tpl_text .= '<li class="nw-text-sm nw-block">' . $offer_description["forth-billing"] . '</li>';
    }



    $tpl_text .= '</ul>';
}


$tpl_text .='</div>
    </div>
  </div>
</section>
        <form class="mt-registration js--validate-form" style="  border-top: 3px solid #00B4D1 !important; " id="abo_form" action="' . $GLOBALS['em_dir']['current'] . '/success' . $strQuery . '#booking-thanks" method="post">
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
         <!--<h1 class="registration-title">'. $strAbo .'</h1>-->
          <div class="registrieren register-section pb-4">
            <!--<h2 class="registrieren-subtitle">' . (!empty($_SESSION['myONLINE_VARS']['my_signin']) ? 'Anmelden' : 'Registrieren') . '</h2>-->
            <h2 class="registrieren-subtitle">Anmelden oder Registrieren</h2>
            <div class="form-control">
              <input class="input error-input regular" style="width: 100%;
    height: 55px;
    border: 1px solid #DDDDDD;
    font-size: 16px;" type="email" placeholder="E-Mail' . (!empty($_SESSION['myONLINE_VARS']['my_email']) ? '' : '*') . '" name="my_email"
                     id="email" value="' . (!empty($fill['my_email']) ? $fill['my_email'] : '') . '" ' . (!empty($_SESSION['myONLINE_VARS']['my_email']) ? 'readonly' : 'required') . '>
              <input class="" type="hidden" id="my_user" name="my_user" value="' . (!empty($fill['my_user']) ? $fill['my_user'] : '') . '" ' . (!empty($_SESSION['myONLINE_VARS']['my_user']) ? 'readonly' : 'required') . ' maxlength="55">
              <i class="fa-solid fa-check success-icon normal-icon"></i>
            </div>
            ' . ((empty($_SESSION['myONLINE_VARS']['my_gp_no_viva']) && empty($_SESSION['myONLINE_VARS']['my_user'])) ? '
            <div class="form-control">
              <input class="input error-input regular"  required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" style="width: 100%;
    height: 55px;
    border: 1px solid #DDDDDD;
    font-size: 16px;" type="password" placeholder="Passwort*" name="my_new_pass"
                     id="psw">
            
<i class="fa-solid fa-check success-icon normal-icon"></i>
              
              <script>
                $("#my_email").change(function () {
                    $("#my_user").val(this.value)
                });
                </script>
            </div>' : '') . '
          </div>
          <div class="meine-daten register-section" style="padding-bottom: 32px !important;">
            <h2 class="meine-daten-title">Kontaktdaten</h2>
            <div class="select-container select-menu' . ((!empty($_SESSION['myONLINE_VARS']['my_signin']) && !empty($fill['my_gender'])) ? ' hidden' : '') . '">   
                <select name="my_gender" id="my_gender" required' . ($simple ? ' disabled' : '') . '>
                     <option value="">Anrede *</option>
                    <option value="Herr"' . ((!empty($fill['my_gender']) && ($fill['my_gender'] === 'Herr' || $fill['my_gender'] === 'Herrn')) ? " selected" : "") . '>Herr</option>
                    <option value="Frau"' . ((!empty($fill['my_gender']) && $fill['my_gender'] === 'Frau') ? " selected" : "") . '>Frau</option>
                    ' . (!empty($em_projekt[$em_client]['myonline_firma']) ? '
                    <option value="Firma"' . ((!empty($fill['my_gender']) && $fill['my_gender'] === 'Firma') ? " selected" : "") . '>Firma</option>
                    ' : '') . '
                    <option value="Divers" ' . ((!empty($fill['my_gender']) && $fill['my_gender'] === 'Divers') ? " selected" : "") . '>Divers</option>
                </select>
              ' . ($simple ? '<input type="hidden" name="my_gender" value="' . $fill['my_gender'] . '">' : '') . '
               <span class="arrow"></span>
            </div>
            <div class="form-control company' . ((!empty($fill['my_gender']) && $fill['my_gender'] !== 'Firma') ? ' hidden' : '') . '">
              <input type="text" id="cname" class="" name="my_company" placeholder="Firma" value="' . (!empty($fill['my_company']) ? $fill['my_company'] : '') . '" ' . ((!empty($fill['my_gender']) && $fill['my_gender'] === 'Firma') ? ' required ' : '') . ($simple ? ' readonly' : '') . '>
              <i class="fa-solid fa-check success-icon normal-icon "></i>
            </div>
            <div class="form-control name">
              <input type="text" id="fname"  class="" name="my_firstname" data-v-min-length="2" required placeholder="Vorname' . (!empty($_SESSION['myONLINE_VARS']['my_firstname']) ? '' : '*') . '" value="' . (!empty($fill['my_firstname']) ? $fill['my_firstname'] : '') . '" ' . ((!empty($fill['my_gender']) && $fill['my_gender'] !== 'Firma') ? 'required' : '') . (!empty($_SESSION['myONLINE_VARS']['my_firstname']) || $simple ? ' readonly' : '') . ' maxlength="50" onkeyup="emFillPaymentAccountOwner()" onchange="this.onkeyup()">
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
                <input class="number-input" type="text" id="plz" pattern="\d{5}" name="my_zip" placeholder="PLZ' . ($fill['proof_address'] ? '*' : '') . '" value="' . (!empty($fill['my_zip']) ? $fill['my_zip'] : '') . '"' . ($fill['proof_address'] ? ' required' : '') . ' pattern="\d{5}" maxlength="5"' . ($simple ? ' readonly' : '') . '>
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
          <div class="zahlungsrhythmus">
             <h3>Zahlungsrhythmus</h3>
              <div class="input-container">
                <div class="left-radio">
                  <input type="radio" id="" name="em_payment_method" value="m">';

                  if ($offer_description) {
                      if (isset($offer_description["angebot"])) {
                          $tpl_text .= '<label for=" ">' . $offer_description["angebot"] . '</label>';
                      }
                  }
    $tpl_text .=' </div>
              </div>
          </div> 
          <div class="zahlungsrhythmus"  style=" display:none !important;">
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
           <div  class="zahlungsrhythmus bottom-px active" style="margin-top: 0 !important;">
                  <h3>Zahlweise</h3>
                  <div class="payment-option">
                    <div class="radio">
                  <input type="radio" id="payment-sepa" name="em_payment_type" value="bankeinzug"' .  ((empty($fill['payment_type']) || $fill['payment_type'] === "bankeinzug") ? 'checked' : ''). '>
                  <label for="payment-sepa">Bankeinzug</label>

                    </div>
                     <!--<div class="radio">
                      <input type="radio" id="payment-sepa" name="em_payment_type" value="bankeinzug"' . ((empty($fill['payment_type']) || $fill['payment_type'] === "bankeinzug") ? ' checked' : '') . '>
                      <label for="payment-sepa">Bankeinzug </label>
                    </div>-->
                       <!--
    <?php 
    if (!empty($GLOBALS["em_projekt"][$GLOBALS["em_subclient"]]["abo_" . $_SESSION["abo_AboSelected"][0] . "_paypal_plan_id"]) || $unique): 
    ?>
    <div class="radio paypal-radio">
      <input type="radio" id="payment-paypal" name="em_payment_type" value="paypal" 
        <?php echo (!empty($fill["payment_type"]) && $fill["payment_type"] === "paypal") ? "checked" : ""; ?>>
      <label for="payment-paypal">Paypal</label>
    </div>
    <img class="paypal-radio" src="https://www.hk.de/_em_daten/mtrelaunch/abo/assets/svgs/paypal-icon.svg" alt="PayPal" 
      style="margin-left: 10px; margin-top: -3px;" width="50">
    <?php endif; ?>-->
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
           
              <div class="sepa-payment-container sepa' . (isset($fill['payment_type']) && $fill['payment_type'] !== 'paypal' ? ' hidden' : '') . '" id="sepa">
                 
                
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
                    <input type="text" placeholder="Name" required="required">
                    <label class="form-control-label regular">Name der Bank*</label>
                    <i class="fa-solid fa-check success-icon normal-icon "></i>
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
                <!--<p class="sepa-info-p sepa-payment-container' . (isset($fill['payment_type']) && $fill['payment_type'] !== 'paypal' ? ' hidden' : '') . '">
                  Die Einzugsermächtigung kann jederzeit formlos widerrufen werden. Abbuchung erfolgt
                  zu Monatsbeginn.
                </p> -->
                <p class="sepa-info-p sepa-payment-container' . (isset($fill['payment_type']) && $fill['payment_type'] !== 'paypal' ? ' hidden' : '') . '"><b>SEPA-Laschriftmandat</b></p>
                <div class="checkout-agreement sepa-payment-container' . (isset($fill['payment_type']) && $fill['payment_type'] !== 'paypal' ? ' hidden' : '') . '">
                  <input data-error="' . $strTextPflichtfeld . '" style="display: block;" type="checkbox" name="payment_mandate" id="sepa-agreement" value="1"' . (!empty($fill['payment_mandate']) ? ' checked' : '') . ' required>
                
                  <label class="agreement-label" for="sepa-agreement" style="flex-wrap: nowrap !important;">
                   Ich ermächtige die Haller Kreisblatt Verlags GmbH, Zahlungen von meinem Konto mittels Lastschrift einzuziehen. Zugleich weise ich mein Kreditinstitut an, die von der Haller Kreisblatt Verlags GmbH auf mein Konto gezogenen Lastschriften einzulösen.*
                  </label>
                  
                  
                </div>

              </div>

            </div>
          </div>';
}
$tpl_text .= '  
          <div class="checkout-agreement" style="margin-top: 0 !important;">
          <div class="nw-mb-4">
            <input data-error="' . $strTextPflichtfeld . '" style="display: block;" type="checkbox" id="agreement" name="agb" required>
            <label class="agreement-label" for="agreement">
              Die <span><a href="https://www.haller-kreisblatt.de/microsites/agb?utm_campaign=kurzverlinkung&utm_source=agb" target="_blank" class="nw-underline checkbox-span underlineonHover">
                AGB</a></span>, die <span><a class="nw-underline checkbox-span underlineonHover" href="https://www.haller-kreisblatt.de/widerruf"
                         target="_blank"> Widerrufserklärung </a></span>
              und die <span><a class="nw-underline checkbox-span underlineonHover" href="https://www.haller-kreisblatt.de/microsites/datenschutz?utm_campaign=kurzverlinkung&utm_source=datenschutz"
                         target="_blank"> Datenschutzhinweise </a></span> habe ich gelesen und
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
            <div class="nw-mb-3">
          
            <input type="checkbox" id="perEmail" name="my_optin_agb_email">
            <label class="agreement-label" for="perEmail">
            Ich bin jederzeit widerruflich damit einverstanden, dass mich die Haller Kreisblatt Verlags-GmbH, auch durch ihre Dienstleister, über ihre interessanten Verlagsprodukte und -angebote (Zeitungen, Zeitschriften, Abo, Leserreisen, Leservorteile, HK-Karte, Gewinnspiele, Newsletter) per E-Mail informiert.  

            </label>
            
          
            </div>';
}
$tpl_text .= '
            <!-- Buttons for form -->
            <div class="agreement-box">
              <p class="agreement-pflichtfelder">* Pflichtfelder</p>

              <button type="button" class=" nw-text-center nw-w-full sm:nw-min-w-32 sm:nw-max-w-fit nw-text-gray-600 nw-whitespace-nowrap nw-bg-white
  nw-border nw-border-gray-600 nw-rounded-md nw-text-base nw-font-bold
  nw-cursor-pointer nw-py-3 nw-px-6 hover:nw-bg-gray-100 hover:nw-transition-all hover:nw-duration-300 focus:nw-bg-gray-200 focus:nw-transition-all
  disabled:nw-bg-white disabled:nw-text-gray-200 disabled:nw-border-gray-200 disabled:nw-cursor-not-allowed " >
                <a href="/abo" style="text-decoration: none;">
                  Zurück
                </a>
              </button>
              <!-- this are paypal and banks -->
              <button type="submit" class="sepa nw-text-center nw-w-full sm:nw-min-w-32 sm:nw-max-w-fit nw-whitespace-nowrap nw-text-white
  nw-bg-red-0 nw-rounded-md nw-text-base nw-font-bold
  nw-cursor-pointer nw-py-3 nw-px-6 hover:nw-bg-red-100 hover:nw-transition-all hover:nw-duration-300 focus:nw-bg-red-200 focus:nw-transition-all
  disabled:nw-bg-gray-500 disabled:nw-cursor-not-allowed changepayment">
               
                   Kostenpflichtig bestellen
              </button>

              <button type="submit" class="desc agreement-direkt-zu paypalpayment' . (isset($fill['payment_type']) && $fill['payment_type'] !== 'paypal' || !empty($fill['hidden_fields']['paypal_agreement_token']) ? '' : ' hidden')
    . '" data-upscore-conversion="2">
                <span class="agreement-direkt-btn semi-bold">
                  ' . (!empty($fill['show_payment']) ? 'Kostenpflichtig ' : '') . ($simple && !empty($fill['my_sso_id']) ? 'freischalten' : (empty($fill['my_sso_id']) ? 'bestellen' : 'bestellen')) . '
                </span>
              </button>
                                     
              <button type="submit" class="desc agreement-direkt-zu paypalpayment' . (isset($fill['payment_type']) && $fill['payment_type'] !== 'paypal' || !empty($fill['hidden_fields']['paypal_agreement_token']) ? '' : ' hidden') . '" data-upscore-conversion="2">
                <span class="text-white">Bezahlen mit</span> <img src="https://www.mt.de/_em_daten/mt/_layout/paypal.png" alt="PayPal" style="margin-left: 10px;" width="120">
              </button>
              <!--  
              <button type="submit" class="desc agreement-direkt-zu paypalpayment' . (isset($fill['payment_type']) && $fill['payment_type'] !== 'paypal' || !empty($fill['hidden_fields']['paypal_agreement_token']) ? '' : ' hidden') . '">
                <img src="https://www.mt.de/_em_daten/mtrelaunch/abo/assets/images/direkt-zu-paypal_image.png" alt="paypal">
              </button>
              -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
 
  <!--<script src="https://www.haller-kreisblatt.de/_em_daten/mtrelaunch/abo/assets/js/jbvalidator.min.js?v=12"></script>-->
  <script src="https://www.haller-kreisblatt.de/_em_daten/mtrelaunch/abo/assets/js/aboshop-update.js?v=7"></script>
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