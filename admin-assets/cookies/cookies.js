document.addEventListener("DOMContentLoaded", function () {
    if (!document.cookie.includes("cookieAccepted=true")) {
        document.getElementById("cookie-popup").style.display = "block";
    }

    document.getElementById("accept-all").addEventListener("click", function () {
        document.cookie = "cookieAccepted=true; path=/; max-age=" + 60 * 60 * 24 * 30;

        // Enable Google Analytics Consent
        gtag('consent', 'update', {
            'ad_storage': 'granted',
            'analytics_storage': 'granted',
            'personalization_storage': 'granted'
        });

        document.getElementById("cookie-popup").style.display = "none";
    });

    document.getElementById("reject-analytics").addEventListener("click", function () {
        // Disable Google Analytics Consent
        gtag('consent', 'update', {
            'ad_storage': 'denied',
            'analytics_storage': 'denied',
            'personalization_storage': 'denied'
        });

        document.getElementById("cookie-popup").style.display = "none";
    });
});
