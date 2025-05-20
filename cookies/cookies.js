document.addEventListener("DOMContentLoaded", function () {
    function setCookie(name, value, days) {
        let expires = new Date();
        expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
        document.cookie = name + "=" + value + "; path=/; expires=" + expires.toUTCString() + "; SameSite=Lax";
    }

    function getCookie(name) {
        let match = document.cookie.match(new RegExp("(^| )" + name + "=([^;]+)"));
        return match ? match[2] : null;
    }

    console.log("Cookie Value on Load:", getCookie("cookieConsent")); // Debugging

    // If cookie is already set, do NOT show the popup
    if (getCookie("cookieConsent")) {
        document.getElementById("cookie-popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
        return;
    }

    // Otherwise, show the popup
    document.getElementById("cookie-popup").style.display = "block";
    document.getElementById("overlay").style.display = "block";

    function removeOverlay() {
        document.getElementById("cookie-popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }

    // Accept All Cookies
    document.getElementById("accept-all").addEventListener("click", function () {
        setCookie("cookieConsent", "all", 30);
        removeOverlay();
    });

    // Reject Cookies (Do NOT set a cookie)
    document.getElementById("reject-non-essential").addEventListener("click", function () {
        removeOverlay();
    });

    // Open Sidebar for Custom Choices
    document.getElementById("manage-cookies").addEventListener("click", function () {
        document.getElementById("cookie-sidebar").style.left = "0";
    });

    // Close Sidebar
    document.getElementById("close-sidebar").addEventListener("click", function () {
        document.getElementById("cookie-sidebar").style.left = "-450px";
    });

    // Confirm Custom Choices
    document.getElementById("confirm-choices").addEventListener("click", function () {
        let pref = document.getElementById("preferences-cookies").checked ? 'granted' : 'denied';
        let analytics = document.getElementById("analytics-cookies").checked ? 'granted' : 'denied';
        let ads = document.getElementById("advertising-cookies").checked ? 'granted' : 'denied';

        setCookie("cookieConsent", "custom", 30);
        document.getElementById("cookie-sidebar").style.left = "-450px";
        removeOverlay();
    });

    // Accept All from Sidebar
    document.getElementById("accept-all-sidebar").addEventListener("click", function () {
        setCookie("cookieConsent", "all", 30);
        document.getElementById("cookie-sidebar").style.left = "-450px";
        removeOverlay();
    });
});
