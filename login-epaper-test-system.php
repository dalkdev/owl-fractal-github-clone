<?php
$tpl_text = '';

if (!empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['noepaperlogin'])) {
    $tpl_text.='
<script type="text/javascript">
/*<![CDATA[*/
setTimeout(function() {
    window.location = "https://epaper.nw.de/?showpaywall";
}, 1000);
/*]]>*/
</script>
';
}

// Weiterleitung ohne Login bei IE...
if (!empty($_SERVER['HTTP_USER_AGENT'])
    && (
        (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)
        || (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)
    )
) {
    $tpl_text.='
<script type="text/javascript">
/*<![CDATA[*/
window.location = "https://epaper.nw.de/?showpaywall";
/*]]>*/
</script>
';
}
// ENDE Weiterleitung ohne Login bei IE...




$tpl_text.='

<style>
.btn-primary {color:#d20a11!important;}

body{
font-family: "Roboto", sans-serif;    
}
.em_ads_box_dynamic_remove{
    display:none;
}
.p-0{
    padding:0;
}
.pb-0{
    padding-bottom:0!important;
}
p{
   font-size:20px;
   line-height:28px;
}
@media (min-width: 1024px) { 
p{
   font-size:22px;
   line-height:28px;
}
p.app_abo_title {
    font-size:18px;
}
.row{
    padding: 30px 0;
}
.row.white_bg + .row.white_bg, .row.gray_bg + .row.gray_bg{
    padding-top:0;
}
.row.flex-center{
    display:block;
}
.flex-center-all{
    display:flex;
    justify-content: center;
}
@media (min-width: 1024px) { 
    .row{
      /*  padding: 60px 0;*/
    }
    .row.flex-center{
        display:flex;
        
        justify-content:center;
    }
}
.app_title {
            font-size:38px;
            display:block;
            font-weight:bold;
}

.app_under{
            display:block;
            margin-top:15px;
            margin-bottom: 40px;
}

@media (min-width: 1024px) { 
 .app_list_point{
    display:flex;
    align-items:center;
 }
}
.app_introduce img{
    width:200px;
}
.app_introduce .col-md-6:first-child{
    padding-bottom:40px;
}
@media (min-width: 1024px) { 
 .app_list_point{
    display:flex;
    align-items:center;
 }
 .app_introduce{
    padding-bottom:40px;
  }
}
.app_features{
    padding-bottom:60px;
}

.app_function_desc{
font-size:18px;    
}

.app_icon_point {
            margin:20px 0;
}

.app_teaser{
            width:270px;
            margin: 0 auto;
}

.app_teaser_title{
            font-size:20px;
            font-weight:500;
            text-transform:uppercase;
            display:block;
            margin-bottom:8px;
}
.app_teaser_underline {
            font-size:28px;
            font-weight:bold;
}

.app_teaser_point {
            font-size:20px;
            font-weight:bold;
            display:block;
            margin-bottom:8px;
}
.app_teaser_image {
            display:block;
            max-width:280px;
            margin:0 auto 20px;
}

.app_teaser_icon {
            margin:50px 0 25px 40%;
}

.white_bg{
            background:#fff;
}
.gray_bg{
            background:#F2F2F2;
}
.app_functions {
    text-align:center;
}
@media (min-width: 1024px) { 
.app_functions {
    text-align:left;
}
}
.app_links{
 display:flex;
    justify-content: center;
}

.app_functions .col-md-4{
    padding-bottom:0px;
}

.app_abo_shop_btn{
    margin-top:15px;
    padding:10px 15px;
    background-color:#d20a11;
    color:#fff;
    display:inline-block;
    border: 1px solid #fff;
    width:160px;
    
    text-align:center;
    float:right;
    margin-left:auto;
}
.app_abo_shop_btn:hover{
    background-color:#fff;
    border: 1px solid #d20a11;

}

.app_price_col{
    padding-top:10px;
    padding-bottom:7px;
    display:flex;
    align-items:center;
}

.app_price_col .wrap{
   float:left;  
 }

.app_price_col:first-child{
    margin-bottom:15px;
}
.app_price {
            font-size: 20px;
            font-weight: bold;
            line-height: 18px;
            text-align: right;
            margin-right:3px
}

.app_price_img {
            margin:0 15px;
            display:inline;
}

.app_questions{
    padding:60px 0px 20px 0;
    font-size:28px;
}

.app_faq {
            background-color: #F2F2F2;
            margin-bottom: 12px;
            padding: 10px;
            font-size: 20px;
            font-weight:bold;
}
.collapser{
cursor:pointer;    
}
.app_faq a{
  color:#000;
}
.app_faq.show .app_faq_info{
  display:block;
}
.app_faq_info {
            padding-top:10px;
            display:none;
            font-weight:normal;
}

.app_plus_icon {
            float:right;
}
.app_plus_icon:before {
            content:"+";
  
}
.app_faq.show .app_plus_icon:before {
            content:"-";
}


.app_font_28 {
            font-size:28px;
}

</style>








<!--LOGIN-->
<div class="sep-text single centered">
    <span class="sep-text-before"><span class="sep-text-line"></span></span>
    <div class="content">
        <h1 class="regular-title-wrapper">
            ePaper
        </h1>
    </div>
    <span class="sep-text-after"><span class="sep-text-line"></span></span>
</div>
<img class="img-responsive" style="margin: 0 auto; margin-top: 20px; margin-bottom: 20px;" src="https://www.nw.de/_apps/nw/assets/epaper_login/epaper_login.png" alt="ePaper &Uuml;berall" />




<!--Kachel-->
<div class="wrap-flex" style="display:flex;justify-content:center">
<div class="col-sm-8 col-md-8">
<div id="my_anmeldung" class="form-horizontal myonline-login-page-form">
<button style="margin-bottom:15px;width:200px" type="button" class="btn btn-primary center-block" onclick="window.scrollTo(0, 0);jQuery(\'#loginbox-navbar\').slideToggle(750);">Einloggen</button>
<a style="width:200px" href="https://shop.nw.de/epaper/" class="btn btn-default center-block">Zu den Abo-Angeboten</a>
</div>
</div>
</div>
<!--/LOGIN-->


<div class="row white_bg app_features">
<div class="app_icon_point col-md-4">
<div class="text-center">
<img class="app_teaser_icon" src="https://www.nw.de/_apps/nw/assets/epaper_login/news.png">
</div>
  <p class="app_teaser text-center">Alle digitalen Nachrichten mit dem ePaper, dem NW+ Webabo und der News App</p>
</div>

<div class="app_icon_point col-md-4">
<div class="text-center">
<img class="app_teaser_icon" src="https://www.nw.de/_apps/nw/assets/epaper_login/message.png">
</div>
  <p class="app_teaser text-center">Wichtige News aus OWL, der Welt und Ihrer Nachbarschaft mit exklusiven Hintergründen</p>
</div>


<div class="app_icon_point col-md-4">
<div class="col-md-push-6 text-center">
<img class="app_teaser_icon" src="https://www.nw.de/_apps/nw/assets/epaper_login/smartphones.png">
</div>
  <p class="app_teaser text-center">Im Browser oder kostenlos in allen Stores für Android und iOS erhältlich</p>
</div>
</div>
<!--/kachel-->

<!--Angebot-->
<div class="row gray_bg">
  <div class="col-md-12 col-sm-12 text-center">
<span class="app_teaser_underline">Ihre Zeitung in digitaler Form mit vielen Extras</span>
</div>

</div>
<div class="row app_functions gray_bg">
<div class="col-md-4 flex-center-all">
<div class="flex-wrap-cust">
<img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/epaper_login/alle_ausgaben_neu.png">
<p class="app_teaser_point">Vollumfänglicher Zugriff</p>
<p class="app_function_desc">Alle Lokalausgaben der NW und die Lokalausgabe des Haller Kreisblatts</p>
</div>
</div>

<div class="col-md-4 flex-center-all">
<div class="flex-wrap-cust">
<img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/epaper_login/epaper_sonntag_neu.png">
<p class="app_teaser_point">Exklusiv im ePaper</p><p class="app_function_desc">Die NW am Sonntag mit spannenden Geschichten im modernen Design</p>
</div>
</div>


<div class="col-md-4 flex-center-all">
<div class="flex-wrap-cust">
<img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/epaper_login/digitale_magazine_neu.png">
<p class="app_teaser_point">Mehr Inhalt</p><p class="app_function_desc">Alle 14 Tage ein spannendes Magazin wie z.B. GEO, Stern oder Brigitte</p>
</div>
</div>
</div>


<div class="row gray_bg flex-center-all">
<div class="col-md-12 text-center">
</div>
</div>
<!--zweite Reihe-->
<div class="row app_functions gray_bg">
<div class="col-md-4 flex-center-all">
<div class="flex-wrap-cust">
<img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/epaper_login/archiv_neu.png">
<p class="app_teaser_point">Umfassende Archivfunktion</p><p class="app_function_desc">Mit dem Kurz- und Langzeitarchiv in der Vergangenheit stöbern</p>
</div>
</div>

<div class="col-md-4 flex-center-all">
<div class="flex-wrap-cust">
<img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/epaper_login/raetsel_neu.png">
<p class="app_teaser_point">Interaktive Rätsel</p><p class="app_function_desc">Wöchentlich wechselnder Rätselspaß auf mindestens 18 Seiten</p>
</div>
</div>

<div class="col-md-4 flex-center-all">
<div class="flex-wrap-cust">
<img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/epaper_login/abend_neu.png">
<p class="app_teaser_point">Rund um die Uhr</p><p class="app_function_desc">Ihr Wissensvorsprung mit der NW am Abend täglich ab 21.45 Uhr</p>
</div>
</div>
<!--/zweite Reihe-->
</div>



<div class="row gray_bg flex-center-all">
<div class="col-md-12 text-center">
</div>
</div>

<div class="row gray_bg flex-center-all">
<div class="col-md-12 text-center">
<span class="app_teaser_underline"><img class="app_price_img" src="https://www.nw.de/_apps/nw/assets/epaper_login/logo_nw.svg" style="height:40px">Jetzt digitale Zeitung lesen!</span>

</div>
</div>
<div class="row gray_bg flex-center-all pb-0">

<div class="col-md-6 col-xs-9 white_bg app_price_col">
<div class="wrap">
<p class="app_abo_title">Das ePaper Schnupper-Angebot</p>
<span class="app_price">4 Wochen für nur 11,90€ testen</span></div>
<a class="app_abo_shop_btn" href="https://shop.nw.de/epaper/das-epaper-schnupper-angebot?c=132" target="_blank">Jetzt bestellen</a>
</div>
</div>
<div class="row gray_bg flex-center-all pb-0">
<div class="col-md-6 col-xs-9 white_bg app_price_col">
<div class="wrap">
<p class="app_abo_title">Das ePaper-Abo</p>
<span class="app_price">Alle Inhalte für 29,90€</span>/Monat
</div>

<a class="app_abo_shop_btn" href="https://shop.nw.de/epaper/das-epaper-die-digitale-zeitung?c=132" target="_blank">Angebot sichern</a>
</div>
</div>


<div class="row gray_bg flex-center-all pb-0">
<div class="col-md-6 col-xs-9 white_bg app_price_col">
<div class="wrap">
<p class="app_abo_title">Das NW-Bundle</p>
<span class="app_price">Inkl. Gerät für 34,90€</span>/Monat
</div>

<a class="app_abo_shop_btn" href="https://www.nw.de/bundle" target="_blank">Angebot sichern</a>
</div>
</div>




<div class="row gray_bg flex-center-all">
<div class="col-md-12 text-center">
</div>
</div>

<!--/Angebot-->

<!--epaper-app-->
<div class="row ">
  <div class="col-md-12 col-sm-12 text-center flex-center-all">
<p class="app_teaser_underline" style="
    margin-bottom: 10px;
">In der ePaper-App!</p>
</div>
  <div class="col-md-12 col-sm-12 text-center flex-center-all">
<p class="app_function_desc">Viele zusätzliche Vorteile und Inhalte.</p>
</div>
</div>


<div class="row app_functions ">
<div class="col-md-4 flex-center-all">
<div class="flex-wrap-cust">
<img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/epaper_login/zoom.png">
<p class="app_teaser_point text-center">Pinch & Zoom</p>
<p class="app_function_desc text-center">Vergrößern Sie den ausgewählten Artikel wie gewünscht mit zwei Fingern.</p>
</div>
</div>

<div class="col-md-4 flex-center-all">
<div class="flex-wrap-cust">
<img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/epaper_login/speaker.png">
<p class="app_teaser_point text-center">Vorlesefunktion</p><p class="app_function_desc text-center">Lassen Sie sich die Artikel bequem und einfach vorlesen.</p>
</div>
</div>


<div class="col-md-4 flex-center-all">
<div class="flex-wrap-cust">
<img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/epaper_login/wifi.png">
<p class="app_teaser_point text-center">Offline-Funktion</p><p class="app_function_desc text-center">Die gewünschte Ausgabe zu Hause herunterladen und unterwegs offline lesen.</p>
</div>
</div>
</div>


<div class="row gray_bg">
 <div class="col-md-12 col-sm-12 text-center">
<span class="app_teaser_underline">Hier geht es zum kostenlosen Download:</span>
</div>
</div>

<div class="row app_functions gray_bg">
<div class="col-md-6 flex-center-all">
<img src="https://www.nw.de/_apps/nw/assets/epaper_login/apple-store-badge.svg" style="max-width:300px;width:80%">
</div>

<div class="col-md-6 flex-center-all">
<img src="https://www.nw.de/_apps/nw/assets/epaper_login/google-play-badge.svg" style="max-width:300px;width:80%">
</div>
</div>
<!--/epaper-app-->

<!--Abo-Angebot
<div class="row flex-center-all">
<div class="col-md-12 text-center">
</div>
</div>
<div class="row gray_bg flex-center-all">
<div class="col-md-12 text-center">
<span class="app_teaser_underline"><img class="app_price_img" src="https://www.nw.de/_apps/nw/assets/epaper_login/logo_nw.svg" style="height:40px">Jetzt digitale Zeitung lesen!</span>

</div>
</div>

<div class="row gray_bg flex-center-all pb-0">

<div class="col-md-6 col-xs-9 white_bg app_price_col">
<div class="wrap">
<p class="app_abo_title">Das ePaper Schnupper-Angebot</p>
<span class="app_price">4 Wochen für nur 11,90€ testen</span>
</div>
<a class="app_abo_shop_btn" href="https://shop.nw.de/nw-webabo-angebot?c=131" target="_blank">Jetzt bestellen</a>
</div>
</div>

<div class="row gray_bg flex-center-all pb-0">
<div class="col-md-6 col-xs-9 white_bg app_price_col">
<div class="wrap">
<p class="app_abo_title">Das ePaper-Vollabonnement</p>
<span class="app_price">Alle Inhalte für 29,90€</span> / Monat
</div>

<a class="app_abo_shop_btn" href="https://shop.nw.de/nw/nw-webabo-jahres-angebot?c=131" target="_blank">Angebot sichern</a>
</div>
</div>
-->

<!--/Abo-Angebot-->




<!--FAQ-->
<div class="col-md-12 app_questions text-center flex-center-all">
<h2 class="app_teaser_point app_font_28">Haben Sie noch Fragen?</h2>
</div>



<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon" ></span><div class="collapser">1. Was ist das ePaper?</div>
<div class="app_faq_info">
Beim ePaper handelt es sich um die digitale 1:1 Version der gedruckten Zeitung. Darin enthalten sind alle Print-Lokalausgaben der NW und die Ausgabe des Haller Kreisblatts in gewohnter Zeitungsoptik.
</div>
</div>


<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">2. Was beinhaltet das ePaper-Abonnement?</div>
<div class="app_faq_info">
Im ePaper-Abonnement ist die digitale 1:1 Version der Print-Zeitung enthalten. Außerdem erhalten Sie damit Zugang zu allen Artikeln auf NW.de (NW+ Webabo). Zusätzlich können Sie damit kostenfrei die ePaper-App und die News App der NW nutzen.
</div>
</div>



<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">3. Wo kann ich das ePaper lesen?</div>
<div class="app_faq_info">
Das ePaper kann auf allen Endgeräten – egal ob Smartphone, Tablet oder PC – in jedem Internetbrowser (z.B. Firefox, Google Chrome, etc.) unter nw.de/epaper oder in der kostenfreien ePaper-App gelesen werden. Mit der Offline-Funktion können Sie das ePaper auch ohne Internet nutzen. Einfach vorher die gewünschte Ausgabe in der App herunterladen und dann lesen, wann und wo Sie möchten.
</div>
</div>


<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">4. Kann ich mit dem ePaper-Abonnement auch das NW+ Webabo nutzen?</div>
<div class="app_faq_info">
Ja – mit Ihrem ePaper-Abonnement erhalten Sie neben der digitalen Zeitung auch vollständigen Zugang zu allen Artikeln auf NW.de. Das NW+ Webabo ist automatisch in allen ePaper-Angeboten enthalten.
</div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">5. Was kostet das ePaper?</div>
<div class="app_faq_info">
Hier finden Sie alle ePaper-Angebote der Neuen Westfälischen mit den entsprechenden Preisen auf einen Blick: shop.nw.de/epaper/
</div>
</div>



<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">6. Wie und wo kann ich mich einloggen?</div>
<div class="app_faq_info">
Klicken Sie auf NW.de einfach oben rechts auf &bdquo;ePaper&ldquo;. Dort können Sie sich bequem mit Ihren Anmeldedaten einloggen. Andernfalls kommen Sie auch direkt über die URL nw.de/epaper auf die Seite zum Login.
</div>
</div>


<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">7. Kann ich das ePaper auch erst kostenfrei testen?</div>
<div class="app_faq_info">
Sie können das ePaper inkl. dem NW+ Webabo 12 Tage gratis und unverbindlich testen. Hier kommen Sie zur kostenlosen Probe: nw.de/eprobe. Kostenlose Probelieferungen dienen dazu, die NW kennenzulernen. Bitte haben Sie Verständnis dafür, dass sie daher pro Haushalt nur 1 x innerhalb von 6 Monaten in Anspruch genommen werden können.
</div>
</div>


<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">8. Wo finde ich die ePaper-App und wie kann ich diese installieren?</div>
<div class="app_faq_info">
Die ePaper-App ist auf allen Smartphones und Tablets verfügbar, die mit den gängigen Betriebssystemen Android oder iOS ausgestattet sind. Diese finden Sie im Google Play Store oder im App Store über die Suchfunktion, indem Sie &bdquo;NW ePaper&ldquo; eingeben.
</div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">9. Ist die ePaper-App kostenlos?</div>
<div class="app_faq_info">
Ja – die ePaper-App ist kostenlos. Melden Sie sich darin einfach mit Ihren Zugangsdaten an, um alle Inhalte in der App nutzen zu können.
</div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">10. Welche Vorteile/Funktionen bietet das ePaper?</div>
<div class="app_faq_info">
Mit Ihrem ePaper-Abonnement haben Sie neben Ihrer Lokalausgabe auch Zugriff auf alle weiteren Lokalausgaben der NW inkl. dem Haller Kreisblatt. Die Ausgaben sind bereits ab 3:30 Uhr morgens für Sie verfügbar. Zusätzlich haben Sie einen Wissensvorsprung mit der Abendausgabe ab 21:30 Uhr und der exklusiven NW am Sonntag. Alle 14 Tage erscheint ein digitales Magazin aus dem Medien-Portfolio von RTL, wie z.B. Stern, GEO oder Brigitte. Das ePaper-Abonnement bietet Ihnen zudem Zugriff auf das digitale Langzeitarchiv der NW. In der ePaper-App haben Sie mit der Offline-Funktion außerdem die Möglichkeit das ePaper auch ohne Internet nutzen. Einfach vorher die gewünschte Ausgabe in der App herunterladen und dann lesen, wann und wo Sie möchten. Mit der Vorlesefunktion können Sie sich Ihre Artikel bequem und einfach vorlesen lassen. Dazu müssen Sie einfach den gewünschten Artikel anklicken und die Vorlesefunktion über das Lautsprecher-Symbol starten. Vergrößern Sie die gewünschte Seite ganz einfach mit nur zwei Fingern. Zusätzlich enthalten ist ein 18-seitiges, wöchentlich wechselndes Rätselmagazin mit Schwedenrätsel, Sudoku, Schiffe versenken u.v.m.
</div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">11. Auf wie vielen Endgeräten kann ich das ePaper nutzen?</div>
<div class="app_faq_info">
Auf bis zu vier persönlichen Endgeräten. Die Weitergabe von Zugangsdaten an Dritte ist nicht gestattet. Die NW behält sich vor, den Zugang zum NW-ePaper zu sperren, wenn die missbräuchliche Weitergabe von Zugangsdaten an unberechtigte Dritte erfolgt.
</div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">12. Was ist der Unterschied zum NW+ Webabo?</div>
<div class="app_faq_info">
Das NW+ Webabo bietet Ihnen im Gegensatz zum ePaper-Abonnement nur den Zugang zu allen Plus-Artikeln auf der Website (NW.de). Das ePaper ist die digitale Version der gedruckten Zeitung und beinhaltet bereits den vollständigen Zugriff auf NW.de. Beim ePaper nutzen Sie die Möglichkeit, die Printausgabe der &bdquo;Neuen Westfälischen" digital – auf dem Computer oder via App auf dem Smartphone oder dem Tablet – zu lesen. Hier finden Sie alle Angebote des NW+ Webabos: shop.nw.de/nw/
</div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">13. Meine Frage wird hier nicht beantwortet. An wen kann ich mich wenden?</div>
<div class="app_faq_info">
Sie haben weitere Fragen oder Anregungen? Schreiben Sie gerne eine E-Mail an unseren Kundenservice (kundenservice@nw.de) oder melden Sie sich telefonisch unter 0521 555-888 bei uns.
</div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">14. Ich besitze kein mobiles Endgerät, auf dem ich das ePaper lesen kann. Was kann ich in dem Fall machen?</div>
<div class="app_faq_info">
Wir bieten neben dem ePaper-Abonnement auch ein sogenanntes Bundle-Angebot an. Dabei erhalten Sie für einen kleinen Aufpreis neben dem ePaper auch ein Tablet oder Smartphone dazu. Sie können sich unsere aktuellen Bundle-Angebote auf der folgenden Seite anschauen: nw.de/bundle
</div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">15. Ich kann mich nicht mehr einloggen. Was muss ich tun?</div>
<div class="app_faq_info">
In diesem Fall können Sie Ihr Kennwort einfach und selbstständig zurücksetzen. Klicken Sie dazu auf NW.de oben rechts auf das Profilsymbol oder geben Sie den Link www.nw.de/profil ein. Dort können Sie dann einfach auf die Schaltfläche &bdquo;Passwort vergessen?&ldquo; klicken, um ein neues Passwort zu vergeben. Geben Sie anschließend einfach Ihre registrierte Mail-Adresse ein, beantworten Sie die Sicherheitsfrage und klicken Sie auf Absenden. Sie erhalten dann in Kürze eine E-Mail, worüber Sie Ihr neues Passwort vergeben können. Sollten Sie anschließend weiterhin Probleme beim Einloggen haben, können Sie sich gerne per Mail (kundenservice@nw.de) oder telefonisch unter 0521 555-888 an unseren Kundenservice wenden.
</div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">16. Meine ePaper-App lässt sich nicht öffnen bzw. sie stürzt ab?</div>
<div class="app_faq_info">
Dieses Problem lässt sich in vielen Fällen durch eine einfache Neuinstallation der App lösen. Löschen Sie die ePaper-App dazu einmal auf Ihrem Endgerät und führen Sie einen erneuten Download aus. Sollte das Problem anschließend weiterhin bestehen, wenden Sie sich bitte per E-Mail (kundenservice@nw.de) oder telefonisch unter 0521 555-888 an unseren Kundenservice.
</div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">17. Ich kann keine Lokalausgaben downloaden bzw. es werden nicht alle Seiten angezeigt?</div>
<div class="app_faq_info">
Sollte eines der beiden Probleme bei Ihnen auftreten, wenden Sie sich bitte per E-Mail (kundenservice@nw.de) oder telefonisch unter 0521 555-888 an unseren Kundenservice, damit unsere IT diesen technischen Fehler beheben kann.
</div>
</div>


<script type="text/javascript">
    jQuery(document).ready(function(){
        if (userLoyaltyClass) {
            jQuery("#my_user_loyalty_class").val(userLoyaltyClass);
        }
    });
</script>';