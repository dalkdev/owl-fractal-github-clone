export function initPrivacybox() {

    privacyButtonHandler();

    function privacyButtonHandler() {
        const socialCookieStatus = getCookie("social-accept");
        if (socialCookieStatus === "accept") {
            displayAndHideClassInPrivacy(".nw-small-privacy-box", ".nw-big-privacy-box");
            document.querySelector(".togBtn").checked = true;
            acceptSocialMedia();
        } else {
            displayAndHideClassInPrivacy(".nw-big-privacy-box", ".nw-small-privacy-box");
        }

        let _tb = document.querySelector(".togBtn");

        if (_tb !== null)
        {
            _tb.addEventListener("change", function (e) {
                this.checked === true ? acceptSocialMedia() : declineSocialMedia();
            });
        }
    }

    function acceptSocialMedia() {
        document.querySelector(".togBtn").checked = true;
        displayAndHideClassInPrivacy(".nw-small-privacy-box", ".nw-big-privacy-box");
        const privacySocialReplacers = document.querySelectorAll(".privacy-social-replacer");
        privacySocialReplacers.forEach(function (replacer) {
            const replacerContent = replacer.getAttribute("data-content");
            replacer.parentNode.insertAdjacentHTML("afterbegin", "<div class='social-media-added'>" + replacerContent + "</div>");
        });

        if (document.querySelectorAll(".twitter-tweet").length) {
            loadScript('https://platform.twitter.com/widgets.js');
        }

        if (document.querySelectorAll(".instagram-media").length) {
            loadScript("https://www.instagram.com/embed.js", function () {
                window.instgrm.Embeds.process();
            });
        }

        if (document.querySelectorAll(".flourish-map").length) {
            loadScript("https://public.flourish.studio/resources/embed.js");
            loadScript("https://public.flourish.studio/resources/embedded.js");
        }

        if (document.querySelectorAll("div[data-type='AwesomeTableView']").length) {
            loadScript("https://awesome-table.com/AwesomeTableInclude.js");
        }

        setCookie("social-accept", "accept", 365);
    }

    function displayAndHideClassInPrivacy(displayClass, hideClass) {
        let _dc = document.querySelector(displayClass);
        if (_dc !== null)
            _dc.style.display = "block";
        let _hc = document.querySelector(hideClass)
        if (_hc !== null)
            _hc.style.display = "none";
    }

    function loadScript(url, callback) {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = url;
        script.onload = function () {
            if (callback) callback();
        };
        document.getElementsByTagName('head')[0].appendChild(script);
    }


    function declineSocialMedia() {
        let _spb = document.querySelector(".nw-small-privacy-box");
        let _bpb = document.querySelector(".nw-big-privacy-box");
        let _btn = document.querySelector(".togBtn")
        if (_spb !== null || _bpb !== null || _btn !== null)
        {
            _spb.style.display = "none";
            _bpb.style.display = "block";
            _btn.checked = false;
            document.querySelectorAll(".social-media-added").forEach(function (added) {
                added.remove();
            });
            setCookie("social-accept", "decline", 365);
        }
    }

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        const expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        const name = cname + "=";
        const decodedCookie = decodeURIComponent(document.cookie);
        const ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
}
