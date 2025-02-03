<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

<script>

</script>

<style>
    body{
        font-family: 'Roboto', sans-serif;
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
    .pt-0{
        padding-top:0!important;
    }
    .pt-30{
        padding-top:30px!important;
    }
    .pb-30{
        padding-bottom:30px!important;
    }
    .py-30{
        padding:30px 0px!important;
    }
    .mx-auto{
        margin: 0 auto;
    }
    .mb-5px{
        margin-bottom:5px;
    }
    .mb-10px{
        margin-bottom:10px;
    }
    .w-auto{
        width:auto!important;
    }
    p{
        font-size:20px;
        line-height:28px;
    }
    .col-xs-9{
        width:90%;
    }
    @media (min-width: 1024px) {
        .col-xs-9{
            width:60%;
        }
        p{
            font-size:22px;
            line-height:28px;
        }
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
            padding: 60px 0;
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
        margin:50px auto 25px auto;
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
    .app_functions .col-md-4{
        padding-bottom:30px;
    }
    .app_functions .col-md-4:last-child{
        padding-bottom:0px;
    }
    @media (min-width: 1024px) {
        .app_functions {
            text-align:left;
        }
        .app_functions .col-md-4{
            padding-bottom:0px;
        }
    }
    .app_links{
        display:flex;
        justify-content: center;
    }



    .app_abo_shop_btn{
        padding:10px 15px;
        background-color:#d20a11;
        color:#fff;
        display:block;
        border: 1px solid #fff;
        text-align:center;
        margin-left:auto;
    }
    .app_abo_shop_btn:hover{
        background-color:#fff;
        border: 1px solid #d20a11;
        color:#d20a11!important;
    }
    .app_abo_shop_btn:visited{
        color:#fff;
    }
    .app_price_col{
        padding-top:10px;
        padding-bottom:7px;
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
    .app_price_headline{
        margin-bottom:20px;
        font-size:18px;
        font-weight:bold;
        display: flex;
        font-weight: bold;
        justify-content: center;
        align-content: center;
    }
    .app_price_img {
        width:40px;
        display:inline-block;
        margin-right:8px;
    }
    @media (min-width: 1024px) {
        .app_price_col .wrap{
            float:left;
        }
        .app_abo_shop_btn{
            width:200px;
        }

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
    .app_plus_icon:hover {
        cursor:pointer;
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

    .toggleButton svg {
        transition: transform 0.3s ease;
    }
</style>



<div class="row white_bg app_list_point app_introduce  flex-center">


    <div class="col-md-6 flex-center-all">
        <div class="flex-wrap-cust">
            <h1 class="app_title text-center">Unsere News-App</h1>
            <p class="text-center">Jetzt verfügbar in den Stores.<br> Hier gehts zum kostenlosen Download.</p><br>
            <div class="app_links">
                <div class="apple">
                    <img class="mobil-none mx-auto nw-hidden md:nw-block" style="width:150px"src="https://www.nw.de/_apps/nw/assets/app/qrcode_apple_neu.svg" >
                    <a href="https://apps.apple.com/app/apple-store/id1532888930?pt=503434&ct=landingpage-stores-livegang&mt=8" target="_blank"><img src="https://www.nw.de/_apps/nw/assets/app/apple_store.png" ></a></div>
                <div class="android">
                    <img class="nw-hidden mx-auto md:nw-block " style="width:150px" src="https://www.nw.de/_apps/nw/assets/app/qrcode_android_neu.svg" >
                    <a href="https://play.google.com/store/apps/details?id=de.nw.news.ampapp&referrer=utm_source%3Dlandingpage%26utm_medium%3Dstores%26utm_term%3Dnewsapp%26utm_campaign%3Dlivegang%26anid%3Dadmob" target="_blank"><img src="https://www.nw.de/_apps/nw/assets/app/google_store.png" ></a></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-center">
        <img class="mx-auto w-auto" src="https://www.nw.de/_apps/nw/assets/app/iphone-screen-vorschau-app_startseite.png">
    </div>
</div>

<div class="row white_bg app_features">
    <div class="app_icon_point col-md-4">
        <div class="text-center">
            <img class="app_teaser_icon" src="https://www.nw.de/_apps/nw/assets/app/icon-newspaper_infobox.png">
        </div>
        <p class="app_teaser text-center">Wichtige News aus OWL und der Welt sowie exklusive Hintergründe</p>
    </div>

    <div class="app_icon_point col-md-4">
        <div class="text-center">
            <img class="app_teaser_icon" src="https://www.nw.de/_apps/nw/assets/app/icon-iphone-notification.png">
        </div>
        <p class="app_teaser text-center">Nützliche Funktionen: Push-Nachrichten, Artikel teilen und vieles mehr</p>
    </div>


    <div class="app_icon_point col-md-4">
        <div class="col-md-push-6 text-center">
            <img class="app_teaser_icon" src="https://www.nw.de/_apps/nw/assets/app/icon-system-phones_infobox.png">
        </div>
        <p class="app_teaser text-center">Kostenlos in allen Stores für Android und iOS erhältlich</p>
    </div>
</div>

<div class="row gray_bg">
    <div class="col-md-12 col-sm-12 text-center">
        <span class="app_teaser_underline">Auch unterwegs<br>immer auf dem Laufenden bleiben.</span>
    </div>

</div>
<div class="row app_functions gray_bg">
    <div class="col-md-4 flex-center-all">
        <div class="flex-wrap-cust">
            <img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/app/asset-phone_screen-young.png">
            <p class="app_teaser_point">Immer aktuell - täglich neue Artikel</p>
            <p class="app_function_desc">Mehr als 140 Redakteure, Reporter und Fotografen versorgen Sie laufend mit exklusiven News, Hintergründen sowie Kommentaren.</p>
        </div>
    </div>

    <div class="col-md-4 flex-center-all">
        <div class="flex-wrap-cust">
            <img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/app/asset-phone_screen-region.png">
            <p class="app_teaser_point">App individuell zusammenstellen</p><p class="app_function_desc">Sortieren Sie die Themen in der News-App ganz nach Ihrem Interesse. Treffen Sie im Menü Ihre individuelle Auswahl und legen Sie die passende Schriftgröße fest.</p>
        </div>
    </div>


    <div class="col-md-4 flex-center-all">
        <div class="flex-wrap-cust">
            <img class="app_teaser_image" src="https://www.nw.de/_apps/nw/assets/app/asset-phone_screen-fussball.png">
            <p class="app_teaser_point">Top-News per Push-Mitteilung</p><p class="app_function_desc">Damit wir Sie direkt auf dem Handy über aktuelle Neuigkeiten informieren können, aktivieren Sie einfach die Push-Mitteilungen.</p>
        </div>
    </div>
</div>
<div class="row pb-0 nw-flex nw-items-center nw-flex-col nw-gap-4 gray_bg nw-pb-3">
    <div class="nw-flex nw-justify-between nw-gap-3">
        <img class="" src="https://www.nw.de/_apps/nw/plus.svg" alt="">
        <p style="font-size: 16px;
    line-height: 21px;" class="nw-text-black nw-text-base">Exklusiv für<br>Abonnenten</p><p class="nw-text-black nw-text-base"></p>
    </div>
    <div class="">
        <p class="nw-text-3xl nw-font-bold nw-text-black">Artikel in voller Länge lesen</p><p class="nw-text-black nw-text-center nw-text-base nw-pt-1">NW+-Updates per E-Mail</p>
    </div>
</div>
<!--<div class="row gray_bg flex-center-all pb-0 pt-0">

    <div style="display:flex; justify-content: center" class="col-md-12 col-xs-12 gray-bg app_price_col">
        <div  class="wrap nw-flex nw-justify-center gray-bg">
            <a class="app_abo_shop_btn" href="https://www.nw.de/abos" target="_blank">Angebot entdecken</a>
        </div>
    </div>
</div>-->
<!-- -->
<div class="row gray_bg flex-center-all pb-0 pt-0">

    <div class="col-md-6 col-xs-9 white_bg app_price_col">
        <div class="wrap">
            <p class="app_abo_title">NW+ Wochenabo</p>
            <span class="app_price">1 €</span> / Woche
        </div>
        <a class="app_abo_shop_btn" href="https://www.nw.de/abos" target="_blank">Angebot sichern</a>

        <!-- -->


        <div class="nw-w-full nw-mx-auto nw-p-4">
            <!--Button -->
            <button class="toggleButton nw-w-full nw-py-2 nw-rounded nw-flex nw-items-center nw-justify-center">
                <span style="font-size:14px" class="nw-mr-1">Mehr Informationen</span>
                <svg class="icon-weekly" width="20" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="nw-transition-transform nw-duration-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"></path>
                </svg>
            </button>

            <!-- Versteckbarer Bereich  -->
            <div class="infoSection nw-pt-4" style="display: none;">
                <p class="nw-text-xs">
                    Ab dem 7. Monat nutzen Sie das Angebot für derzeit monatlich 8,00 € und ab dem 13. Monat für monatlich 14,90 € automatisch weiter. Sie können dieses Angebot jederzeit bequem monatlich kündigen. Die Abrechnung erfolgt monatlich.
                </p>
            </div>
        </div>


    </div>
</div>
<!-- -->
<div class="row gray_bg flex-center-all pb-30">
    <div class="col-md-6 col-xs-9 white_bg app_price_col">
        <div class="wrap">
            <p class="app_abo_title">NW+ Jahres-Abo</p>
            <span class="app_price">149,00 €</span> / Jahr
        </div>

        <a class="app_abo_shop_btn" href="https://www.nw.de/abos" target="_blank">Angebot sichern</a>
        <!-- -->
        <div class="nw-w-full nw-mx-auto nw-p-4">
            <!--  Button -->
            <button class="toggleButton nw-w-full nw-py-2 nw-rounded nw-flex nw-items-center nw-justify-center">
                <span style="font-size:14px" class="nw-mr-1">Mehr Informationen</span>
                <svg class="icon-yearly" width="20" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="nw-transition-transform nw-duration-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"></path>
                </svg>
            </button>

            <!-- Versteckbarer Bereich -->
            <div class="infoSection nw-pt-4" style="display: none;">
                <p class="nw-text-xs">
                    Ab dem 2. Jahr können Sie dieses Angebot jederzeit bequem kündigen.
                </p>
            </div>
        </div>
        <!-- -->

    </div>
</div>
<!-- -->
<div class="row gray_bg flex-center-all">
    <div class="col-md-12 text-center">




    </div>
</div>


<div class="col-md-12 app_questions text-center">
    <h2 class="app_teaser_point app_font_28">Haben Sie noch Fragen?</h2>
</div>


<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon" ></span><div class="collapser">Ist die NW News-App kostenlos oder muss ich dafür bezahlen? </div>
    <div class="app_faq_info">
        NW News ist kostenlos. Alle Artikel, die Sie auf NW.de lesen können, stehen Ihnen auch in der App zur Verfügung. Um die mit dem NW+ Symbol gekennzeichneten Artikel zu lesen, benötigen Sie ein Webabo oder In-App-Abo.
    </div>
</div>


<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">Was ist der Unterschied zwischen Webabo und In-App-Abo?</div>
    <div class="app_faq_info">
        Mit dem Webabo greifen Sie auf alle Inhalte auf NW.de und die mit NW+ gekennzeichneten Artikel zu. Sie können es bequem in wenigen Schritten in unserem Aboshop bestellen. Mit dem In-App-Abo haben Sie nur in der App Zugang zu den NW+ Artikeln, es lässt sich in der App bestellen.
    </div>
</div>



<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">Was ist der Unterschied zwischen NW News und der ePaper-App?</div>
    <div class="app_faq_info">
        Unsere neue App ist eine optimale Ergänzung zum digitalen Angebot auf NW.de und der gedruckten Zeitung. NW News beinhaltet alle Artikel, die auch auf der Webseite verfügbar sind – allerdings an Ihre individuellen Lesebedürfnisse und Interessen angepasst.
        Die ePaper-App ist unsere digitale NW in der klassischen Zeitungsoptik.
    </div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">Was ist der Unterschied zwischen NW.de und der App NW News?</div>
    <div class="app_faq_info">
        Die Webseite nw.de ist das über den Webbrowser erreichbare Nachrichtenangebot der Neuen Westfälischen. Leser finden hier – laufend aktualisiert – Nachrichten aus ihrer Region und der Welt. Alle auf nw.de verfügbaren Nachrichten sind auch in der NW-News-App zu finden. Die App dient als mobil optimierte Version des Webangebotes und bietet dem Smartphone-Nutzer einige Vorteile.
    </div>
</div>



<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">Was ist NW+?</div>
    <div class="app_faq_info">
        In unserem digitalen Nachrichtenangebot sind einige Artikel nur zugänglich, wenn Sie bereits ein Abonnement (z.B. Webabo NW+) abgeschlossen haben. Plus-Inhalte erkennen Sie am roten NW+ Symbol.
    </div>
</div>

<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">Warum muss man für NW+-Inhalte zahlen?</div>
    <div class="app_faq_info">
        Unser Online-Angebot ist, genau wie unsere Tageszeitung, ein Produkt von engagiertem und hochwertigem lokalem und regionalem Journalismus. Mit mehr als 140 Redakteuren, Reportern und Fotografen halten wir Sie jeden Tag aufs Neue kritisch über lokale, regionale und globale Geschehen informiert. Unser digitales Angebot wird laufend aktualisiert. Analog zur gedruckten Zeitung ist auch unser Online-Angebot nur über Einnahmen aus Werbung und Abonnements finanzierbar.
    </div>
</div>



<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">Wo kann ich mir die App herunterladen?</div>
    <div class="app_faq_info">
        NW News ist für alle Smartphones verfügbar, die mit den gängigen Betriebssystemen Android oder iOS ausgestattet sind. Sie finden unsere App über die Suchfunktion im Google Play Store (Android) oder – wenn Sie ein Apple-Gerät nutzen – im App Store (iOS).
    </div>
</div>


<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">Was bringen mir die Push-Mitteilungen?</div>
    <div class="app_faq_info">
        Push-Mitteilungen sind kurze Textnachrichten, die Ihnen auf dem Bildschirm Ihres Smartphones oder Tablets eingeblendet werden. Egal ob DSC Arminia Bielefeld, Kreis Gütersloh oder Ostwestfalen & die Welt, mit der praktischen Push-Funktion unserer App werden Sie umgehend über aktuelle Meldungen zu den von Ihnen festgelegten Themen informiert. Sie können Ihre gewählten Sofort-Benachrichtigungen jederzeit in den App-Einstellungen unter “Push-Mitteilungen” bearbeiten. </div>
</div>



<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">Welche Vorteile bietet mir die Nutzung von NW News?</div>
    <div class="app_faq_info">
        Unsere App ist perfekt für alle geeignet, die viel unterwegs sind und ihre Nachrichten immer griffbereit dabeihaben möchten. NW News wird laufend aktualisiert und bietet praktische Einstellungsmöglichkeiten. Mit Hilfe der personalisierbaren Push-Mitteilungen können Sie als Leser selbst festlegen, über welche Ereignisse und Themen Sie auch auf Ihrem Handy umgehend informiert werden möchten.
    </div>

</div>


<div class="app_faq col-md-8 col-md-offset-2 col-sm-12"><span class="app_plus_icon"></span><div class="collapser">Was mache ich, wenn ich Probleme mit der App habe?</div>
    <div class="app_faq_info">
        Bei Problemen mit der App wenden Sie sich gerne an unseren Kundenservice. Sie erreichen uns jederzeit per Mail unter nwplus@nw.de. In der Regel können wir Ihnen schnell weiterhelfen!
    </div>
</div>
<!-- -->
<script>


  document.querySelectorAll('.toggleButton').forEach((button) => {
    button.addEventListener('click', () => {

      var moreInfoText = button.nextElementSibling;
      var buttonIcon = button.querySelector('svg');

      // Umschalten
      if (moreInfoText.style.display === 'none' || moreInfoText.style.display === '') {
        moreInfoText.style.display = 'block';
        buttonIcon.style.transform = 'rotate(180deg)';
      } else {
        moreInfoText.style.display = 'none';
        buttonIcon.style.transform = 'rotate(0deg)';
      }
    });
  });


</script>