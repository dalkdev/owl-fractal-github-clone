<?php
$tpl_text = '';
$fill['nl_success_message'] = $fill['nl_success_message'] ?? '';
$paywallFreeArticlesOld = 0;
$paywallFreeArticlesNew = 0;
if (!empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['paywall_article_count_free'])
    && !empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['paywall_article_count_more_free_user_type_2'])
) {
    $paywallFreeArticlesOld = $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['paywall_article_count_free'];
    $paywallFreeArticlesNew = $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['paywall_article_count_free'] + $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['paywall_article_count_more_free_user_type_2'];
    if (!empty($fill['user_loyalty_class'])
        && 'rule1-loyal' == $fill['user_loyalty_class']
    ) {
        $paywallFreeArticlesNew = $paywallFreeArticlesNew + $GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['paywall_article_count_more_bonus_user'];
    }
}

$reg_wall =  $_POST['reg-wall'] ? '-reg-wall' : '' ;

$tpl_text .= '
<script>_paq.push(["trackEvent", "paywall", "registration' . $reg_wall  . ' ", "register-form completed"]);</script>

<div class="nw-bg-custom-1-700 nw-p-3 md:nw-p-8 nw-rounded-md">
        
         ';

if (!empty($fill['text'])) {
    $tpl_text .= '
    <div class="nw-bg-white nw-p-4 md:nw-max-w-md nw-mx-auto nw-rounded-md nw-mb-6">
        <div>
            <p
                class="
        nw-text-left
        nw-text-lg
        nw-font-bold
        nw-opacity-100
        nw-pb-1
      "
            >
                Registrierung
            </p>
        </div>
        <div class="nw-pt-1">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  
                class="nw-mx-auto nw-text-custom-1-700"
                width="40"
                height="40"">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
           </svg>

            <div
                class="
        nw-text-center
        nw-text-base
        nw-font-medium
        nw-pt-1
        nw-px-1
      "
            >
                <p>Vielen Dank für Ihre Registrierung</p>
            </div>
            <div
                class="
                nw-text-tiny
        nw-text-center
        nw-pt-0.5
        nw-px-1
        nw-mb-8
      "
            >
                <p class="nw-pt-0.5">
                    Bitte bestätigen Sie Ihre E-Mail-Adresse.
                </p>
                <p class="nw-pt-0.5">
                    Wir haben Ihnen dazu eine E-Mail zugeschickt.
                </p>
            </div>
    </div>
            ';
}

if (!empty($fill['paywall_type'])) {
    $tpl_text .= '<div class="hidden for-tracking-s" data-tracking-event="nwplus-register-success-show"></div>';

    if ($fill['paywall_type'] == "freemium"
        && empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['paywall_introduction_phase'])
    ) {
        $tpl_text .= '
                <p class="unterzeile-type-article margin-bottom-20 text-center">Jetzt sind es nur noch wenige Schritte: Wählen Sie aus den vorgeschlagenen Digital-Angeboten das
                passende für Sie heraus und nw.de steht Ihnen in vollem Umfang zur Verfügung.</p>';
    } else if ($fill['paywall_type'] == "metered") {
        $tpl_text .= '
                <p class="unterzeile-type-article margin-bottom-30 text-center">'
            . (empty($GLOBALS['em_projekt'][$GLOBALS['em_subclient']]['paywall_introduction_phase'])
                ? 'Als besonderes Dankeschön dürfen Sie ' . $paywallFreeArticlesNew . ' anstatt ' . $paywallFreeArticlesOld . ' Beiträge auf nw.de monatlich lesen.'
                : 'Als besonderes Dankeschön können Sie schon bald alle Beiträge auf nw.de lesen.') .
            '</p>';
    }
}
if (!empty($fill['ref'])) {
    $tpl_text .= '
           <p class="text-center">
                <a href="' . em_text_to_value($fill['ref']) . '" class="nw-border nw-border-red-500 nw-rounded nw-bg-red-500 hover:nw-bg-white nw-text-white nw-px-4 nw-py-2 nw-inline-flex">Zurück zum Beitrag</a>
            </p>';
}

$tpl_text .= '
            
      </div>  
       <div class="nw-bg-white nw-p-4 md:nw-max-w-md nw-mx-auto nw-rounded-md nw-mb-6">
             <div>
                <p class=" nw-text-left nw-text-lg nw-font-bold nw-opacity-100 nw-pb-1">
                    Anmeldung zum Abend-Newsletter
                </p>
            </div>
            <div class="nw-pt-1">
                <svg
                    class="nw-mx-auto nw-text-custom-1-700"
                    width="40"
                    height="40"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                />
                </svg>
                <div class="nw-text-center nw-text-base nw-font-medium nw-pt-1 nw-px-1 md:nw-max-w-xs nw-mx-auto">
                    <p>' . $fill['nl_success_message'] . '</p>
                </div>
            </div>
       </div>
      <div class="nw-p-4 nw-rounded-md nw-bg-white md:nw-max-w-md nw-mx-auto nw-mt-4">
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
</div>';

if (!empty($fill['paywall_type'])) {
    if ($fill['paywall_type'] == "freemium") {
        $tpl_text .= '
    <div class="row paid-content-bouncer margin-top-30 margin-bottom-40" style="width: 1020px;">
        <div class="col-xs-12 col-md-12 content-block-full-width">
            ' . em_load_modul(10986) . '
        </div>
    </div>
    <script>
    jQuery(function() {
        initFlexsliderProdukte();
    });
    </script>';
    }
}

$tpl_text .= '';