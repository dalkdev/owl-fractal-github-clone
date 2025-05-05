<style>
    .article-detail-entry-content ul>li::before {
        display: none;
    }
</style>
<div class="nw-pb-8 paywall-overlay-rebrush-2023 nw-mt-8 nw-relative" style="max-width: 540px">
    <div class="nw-bg-white nw-px-6 nw-pt-10 nw-pb-6 nw-border-2 confetti-particles nw-relative nw-rounded-md nw-max-w-full nw-mx-auto">
        <div class="nwplus-on-border nw-p-2 nw-bg-white">
            <img class="" src="https://www.nw.de/_apps/nw/plus.svg" alt="">
        </div>
        <div class="nw-flex nw-items-center nw-flex-col">
            <div>
                <p style="font-size:24px;padding-bottom: 0" class="nw-text-2xl nw-text-center nw-font-bold nw-text-black nw-pb-0">Jetzt weiter mit NW+</p>
            </div>
            <div style="border-top-left-radius:0;border-top-right-radius:0" class="nw-text-gray-400 nw-text-center nw-text-xs md:nw-text-md">
                <p style="font-size:1em!important" class="nw-py-2 nw-text-center">
                    Sie haben bereits ein Digital-Abo?
                    <a style="float:none;text-decoration:underline!important;" href="#" class="nw-font-bold nw-float-right hover:nw-text-white toLogin nw-underline"
                       onclick="toggleLoginBox(false);">
                        Zum Login
                    </a>
                </p>
            </div>
        </div>
        {% for aboKey, abo in aboOptions %}
        <div  class="abo-container {% if aboKey == 'yearly' %}nw-bg-custom-blue{% endif %} nw-rounded-md nw-py-8 nw-px-6 nw-pb-2 {% if aboKey == 'weekly' %}nw-mb-4{% endif %}" onclick="changeAbo('{{ aboKey }}')">
            <div class="nw-flex nw-justify-between nw-items-center nw-mb-1">
                <div>
                    <img class="" style="width:45px" src="https://www.nw.de/_apps/nw/plus.svg" alt="">
                </div>
                <div>
                    {% if aboKey == 'yearly' %}
                    <div class="nw-bg-black nw-py-2 nw-px-4 nw-rounded-lg">
                        <p style="padding-bottom: 0!important;font-size:0.75rem!important;" class="nw-text-white nw-text-xs nw-mb-0 nw-font-bold">{{ abo.description }}</p>
                    </div>
                    {% endif %}
                </div>
            </div>
            <div class="nw-flex nw-justify-between nw-mb-2">
                <div class="nw-flex nw-flex-col nw-gap-4 nw-items-center nw-mt-2">
                    <label class="nw-flex nw-items-center">
                        <input type="radio" name="aboOverlay" value="{{ aboKey }}" {% if aboKey == 'yearly' %}checked{% endif %} onclick="changeAbo('{{ aboKey }}')">
                        <span class="nw-font-bold nw-my-1 nw-block nw-text-lg nw-text-gray-600 nw-pl-2">{{ abo.price }}</span>
                    </label>
                </div>
            </div>

            <div class="{% if aboKey == 'weekly' %}nw-hidden{% endif %}" data-target="{{ aboKey }}">
                <div class="nw-text-left nw-w-full">
                    <div class="nw-my-2">
                        <ul style="max-width:100%!important;width:100%!important;margin: 0!important;list-style-type:none!important;" class="nw-list-none nw-ml-0">
                            {% for benefit in abo.benefits %}
                            <li style="font-size: 1rem;!important;line-height: 1.5rem!important;width:100%!important;" class="nw-flex nw-items-start nw-text-sm sm:nw-text-sm nw-gap-2 nw-text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#406b4d" stroke-width="2" style="flex-shrink: 0;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>
                                            {{ benefit|raw }}
                                        </span>
                            </li>
                            {% endfor %}
                        </ul>
                    </div>

                    <div class="buttonWrap nw-flex nw-flex-col nw-items-center nw-justify-center nw-mt-4 nw-mb-3" >
                        <button
                            {% if aboKey == 'yearly' %}style="background-color: #005C9E;"{% endif %}
                        class="funnel-entry nw-btn-icon-primary nw-rounded-3xl"
                        data-upscore-conversion="1" onclick="handleButtonClick{% if aboKey == 'yearly' %}Yearly{% endif %}(event);_paq.push(['trackEvent', 'overlay', 'click', '{{ abo.matomo_product }}', '{{ returnId }}']);_paq.push(['trackEvent', 'CheckoutStep', '{\'produktname\': \'{{ abo.matomo_product }}\', \'Stepname\': \'Overlay Klick\', \'cmsId\': \'{{ returnId }}\'}', '1']);
                        {% if aboKey == 'weekly' %}
                        document.getElementById('checkoutjump').submit()
                        {% endif %}
                        {% if aboKey == 'yearly' %}
                        document.getElementById('checkoutjumpyearly').submit()
                        {% endif %};"
                        data-event-value="paywall-overlay-click" data-label="Artikel-Overlay" data-product="{{ abo.dataProduct }}" data-price="{{ abo.dataPrice }}">
                        <svg id="spinner{% if aboKey == 'yearly' %}1{% endif %}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="nw-hidden spinner nw-mr-1.5 nw-h-5 nw-w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"></path>
                        </svg>
                        <span id="loadingText{% if aboKey == 'yearly' %}1{% endif %}">{{ abo.cta | raw }}</span>
                        </button>

                    </div>
                    <div class="nw-w-full nw-max-w-md nw-mx-auto nw-pb-4 nw-px-4">
                        <!-- Überschrift -->
                        <button
                            id="toggleButton"
                            class="nw-w-full nw-py-2 nw-rounded nw-flex nw-items-center nw-justify-center"
                            onclick="toggleInfo{{ aboKey }}()"
                        >
                            <span style="font-size:14px" class="nw-mr-1">Mehr Informationen</span>
                            <svg
                                id="icon-{{ aboKey }}"
                                width="20"
                                data-slot="icon"
                                fill="none"
                                stroke-width="1.5"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                class="nw-transition-transform nw-duration-300"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"></path>
                            </svg>
                        </button>

                        <!-- Versteckbarer Bereich -->
                        <div
                            id="infoSection-{{ aboKey }}"
                            class="nw-hidden nw-mt-1 nw-text-sm nw-text-gray-700"
                        >
                            {% if aboKey == 'weekly' %}
                            <p style="font-size:12px;line-height: 1.25rem;" class="nw-text-xs">
                                Ab dem 7. Monat nutzen Sie das Angebot für derzeit monatlich 8,00 € und ab dem 13. Monat für monatlich 14,90 € automatisch weiter. Sie können dieses Angebot jederzeit bequem monatlich kündigen.
                            </p>
                            {% endif %}
                            {% if aboKey == 'yearly' %}
                            <p style="font-size:12px;line-height: 1.25rem;" class="nw-text-xs">
                                Ab dem 7. Monat nutzen Sie das Angebot zum gültigen Bezugspreis (derzeit monatlich 14,90 €) automatisch weiter. Sie können dann dieses Angebot jederzeit bequem kündigen.
                            </p>                                {% endif %}
                        </div>

                    </div>

                    <script>
                      function toggleInfo{{ aboKey }}() {
                        const infoSection = document.getElementById("infoSection-{{ aboKey }}");
                        const icon = document.getElementById("icon-{{ aboKey }}");

                        // Toggle the hidden class for the info section
                        infoSection.classList.toggle("nw-hidden");

                        // Add or remove the rotate class to rotate the arrow
                        if (infoSection.classList.contains("nw-hidden")) {
                          icon.classList.remove("nw-rotate-180");
                        } else {
                          icon.classList.add("nw-rotate-180");
                        }
                      }
                    </script>

                    <style>
                        .nw-rotate-180 {
                            transform: rotate(180deg);
                        }
                        .nw-transition-transform {
                            transition: transform 0.3s ease-in-out;
                        }
                    </style>



                </div>
            </div>
        </div>
        {% endfor %}
        <div style="border-top-left-radius:0;border-top-right-radius:0" class="nw-text-gray-400 nw-mt-4 nw-text-center nw-text-xs md:nw-text-md">
            <p style="font-size:14px!important" class="nw-py-2 nw-text-center">
                <span>Sie haben bereits ein Print-Abo?</span><br>
                <a style="float:none;text-decoration:underline!important;" target="_blank" href="https://shop.nw.de/nw/nw-webabo-als-zusatz-zur-zeitung" class="nw-float-right hover:nw-text-white toLogin nw-underline nw-font-bold" onclick="_paq.push(['trackEvent', 'overlay', 'nwdigital', '', '{{ returnId }}']);">
                    Hier rabattiert Digital-Zugang bestellen
                </a>
            </p>
        </div>
    </div>
</div>

<style>
    .nw-bg-custom-blue{
        background-color:#EAF3FA ;
    }
    .nw-text-mob-res{
        font-size: .7rem!important;
    }
    /** MIN WIDTH SIMULATE **/
    @media screen and (min-width: 767px) {
        .paywall-overlay-rebrush-2023{
            min-width: 539px;
        }
        .nw-text-mob-res{
            font-size: .75rem!important;
        }
    }
    .nwplus-on-border{
        position: absolute;
        top:-23px;
        left: 50%;
        transform: translateX(-50%);
    }
    .paywall-overlay-rebrush-2023 label:hover,input[type=radio]:hover{
        cursor: pointer;
    }
    .paywall-overlay-rebrush-2023 span#strike{
        position: relative;
    }
    .paywall-overlay-rebrush-2023 span#strike:after{
        content: '';
        background: #fff;
        left: 0;
        top: 50%;
        width: 100%;
        height: 2px;
        position: absolute;
        display: inline-block;
        box-sizing: content-box;
        border-bottom: 2px solid #fff;
        transform: rotate(-16deg);
        border-radius: 1.5px;
    }
    input[type=radio] {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: #fff;
        margin: 0;
        font: inherit;
        color: currentColor;
        width: 22px;
        height: 22px;
        border: 1px solid currentColor;
        border-radius: 50%;
        transform: translateY(-0.075em);
        display: grid;
        place-content: center;
    }
    input[type=radio]::before {
        content: "";
        width: 10px;
        height: 10px;
        border-radius: 50%;
        transform: scale(0);
        transition: 120ms transform ease-in-out;
        box-shadow: inset 1em 1em #4F46E5;
        background-color: #4F46E5;
    }
    input[type=radio]:checked::before {
        transform: scale(1);
    }
    .spinner {
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
    #loadingButton:disabled{
        background-color: rgb(77, 77, 77)!important;
    }
    .abo-container {
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .abo-container:not(.nw-bg-light-0):hover {
        transform: scale(1.02);
        cursor: pointer;
    }
    .strike-through {
        position: relative;
        display: inline-block;
    }

    .strike-through::after {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        right: 0;
        border-top: 1px solid black; /* Anpassen für die Dicke der Linie */
        transform: rotate(-7deg); /* Anpassen für den Winkel der Linie */
    }
</style>
<script>
  function changeAbo(option) {
    const radioButton = document.querySelector(`.paywall-overlay-rebrush-2023 input[name="aboOverlay"][value="${option}"]`);
    if (radioButton) {
      radioButton.checked = true; // Setze den Radio-Button als ausgewählt
    }
    document.querySelectorAll('.paywall-overlay-rebrush-2023 .abo-container').forEach(div => {
      div.classList.remove('nw-bg-custom-blue');
    });
    document.querySelectorAll('[data-target]').forEach(div => {
      div.classList.add('nw-hidden');
    });
    const targetDiv = document.querySelector(`[data-target="${option}"]`);
    if (targetDiv) {
      targetDiv.classList.remove('nw-hidden');
      const parentDiv = targetDiv.closest('.paywall-overlay-rebrush-2023 .abo-container');
      if (parentDiv) {
        parentDiv.classList.add('nw-bg-custom-blue');
      }
    }

  }

  function handleButtonClick(event) {
    const loadingButton = event.currentTarget;
    const loadingText = loadingButton.querySelector('#loadingText');
    const spinner = loadingButton.querySelector('#spinner');
    loadingButton.disabled = true;
    loadingText.textContent = 'Lädt ...';
    spinner.classList.remove('nw-hidden');
    setTimeout(() => {
      loadingText.textContent = '{{offer.buttonText}}';
      spinner.classList.add('nw-hidden');
      loadingButton.disabled = false;
      loadingButton.blur();
    }, 5000);
  }
  function handleButtonClickYearly(event) {
    const loadingButton = event.currentTarget;
    const loadingText = loadingButton.querySelector('#loadingText1');
    const spinner = loadingButton.querySelector('#spinner1');
    loadingButton.disabled = true;
    loadingText.textContent = 'Lädt ...';
    spinner.classList.remove('nw-hidden');
    setTimeout(() => {
      loadingText.textContent = '{{offer.buttonText}}';
      spinner.classList.add('nw-hidden');
      loadingButton.disabled = false;
      loadingButton.blur();
    }, 5000);
  }
</script>
