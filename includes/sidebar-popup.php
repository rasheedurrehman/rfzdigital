 <!-- side bar popup -->

<div id="scrollTriggerPopup" class="scroll-trigger-popup">
    <button class="close-btn" onclick="closeScrollPopup()">✖</button>
    <h4>Get a Professional Website for Your Business</h4>
    <!-- <p>Speak with our experts and take your ideas to the next level.</p> -->
    <a href="https://rfzdigital.co.uk/contact-us" target="_blank">
        Contact Us
    </a>
</div>

<style>
/* Custom Scroll Popup Styling */
.scroll-trigger-popup {
    position: fixed;
    right: 5px;
    bottom: 130px;
    width: 265px;
    background: linear-gradient(135deg, yellow, yellow);
    color: white;
    border-radius: 12px;
    box-shadow: 0px 4px 15px rgba(0, 72, 255, 0.4);
    padding: 20px;
    display: none;
    z-index: 1000;
    opacity: 0;
    transition: opacity 0.5s ease-in-out, transform 0.3s ease-in-out;
    transform: translateY(20px);
}

.scroll-trigger-popup.show {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.scroll-trigger-popup h4 {
    color: #000;
    font-size: 18px;
    padding-top: 6px;
    margin-bottom: 10px;
    font-weight: bold;
}

.scroll-trigger-popup p {
    font-size: 14px;
    margin-bottom: 15px;
}

.scroll-trigger-popup a {
    display: block; /* Make it behave like a block element */
    text-align: center; /* Center the text inside */
    background: #000;
    color: #FFF;
    font-weight: bold;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
    margin: 10px auto 0 auto; /* Centering the button with some top margin */
    width: 50%;
}

.scroll-trigger-popup button {
    background: #00d8ff;
    color: #002855;
    font-weight: bold;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    width: 100%;
    font-weight: 600;
}

.scroll-trigger-popup .close-btn {
    color: #000 !important;
    position: absolute;
    top: -6px;
    right: -113px;
    background: none;
    border: none;
    font-size: 18px;
    color: white;
    cursor: pointer;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("scrollTriggerPopup");
    let hasPopupShown = false;

    function checkScroll() {
        const totalHeight = document.body.scrollHeight - window.innerHeight;
        const scrolled = (window.scrollY / totalHeight) * 100;

        if (scrolled >= 20 && !hasPopupShown) {
            popup.classList.add("show");
            hasPopupShown = true; // Ensure it appears only once per session
        }
    }

    // Fix: Define close function globally
    window.closeScrollPopup = function () {
        popup.classList.remove("show");
    };

    window.addEventListener("scroll", checkScroll);
});
</script>