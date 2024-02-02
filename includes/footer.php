
<div id="cookieConsentContainer" style="display: none;">
    <p>This site uses cookies to enhance your experience. By continuing, you accept our <a href="#" id="openCookiePolicy">cookie policy</a>.</p>
    <button id="acceptCookies">Allow</button>
    <button id="declineCookies">Deny</button>
</div>




<!-- Modale Conteneur -->
<div id="cookiePolicyModal" class="modal-container">
    <!-- Modale -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-title">Cookie Policy</span>
            <hr/>
            <div class="cookie-policy">
                <p>Our website uses cookies and other tracking technologies to enhance your user experience while navigating our site, as well as to analyze traffic and understand where our visitors are coming from. By continuing to use our site, you consent to the use of these tracking technologies.</p>

                <h3>What is a Cookie?</h3>
                <p>A cookie is a small text file stored on your device by the websites you visit. They are widely used to make websites work more efficiently, as well as to provide information to the owners of the site.</p>

                <h3>How Do We Use Cookies?</h3>
                <ul>
                    <li><strong>Essential Cookies:</strong> Some cookies are essential to allow you to navigate our site and use its features. Without these cookies, services like navigating between pages cannot be provided.</li>
                    <li><strong>Performance and Analytics Cookies:</strong> We use performance cookies to collect information about how visitors use our site in order to improve the content of the site, tailor it to the needs of visitors, and increase usability. For example, we use IP addresses to analyze trends, administer the site, and track user movements on the site. This information is used to enhance user experience and optimize our website.</li>
                </ul>

                <h3>Managing Your Cookie Preferences</h3>
                <p>You have the option to configure your browser to accept all cookies, reject all cookies, or notify you when a cookie is set. As every browser is different, we encourage you to consult your browser's Help menu to understand how to modify your cookie preferences. Please note that some features of the site may not function properly if you choose to refuse cookies.</p>

                <h3>Your Consent</h3>
                <p>By using our site, you consent to the use of cookies and the tracking technologies mentioned above. If you choose not to accept the use of these cookies, we cannot guarantee that our site will work as intended during your visit. This may affect your ability to use some services or features of the site.</p>

                <p>For more information on managing your personal data, please see our <a href="#">Privacy Policy</a>.</p>
            </div>

            <button class="modal-close" onclick="closeModal()">×</button>
        </div>
        <div class="modal-body">
            <p></p>
        </div>
        <div class="modal-footer">
            <button onclick="closeModal()" class="modal-footer-btn">Close</button>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var consent = localStorage.getItem('cookieConsent');
        if (consent !== "given") {
            document.getElementById('cookieConsentContainer').style.display = 'block';
        }

        document.getElementById('acceptCookies').addEventListener('click', function() {
            localStorage.setItem('cookieConsent', 'given');
            document.getElementById('cookieConsentContainer').style.display = 'none';
        });

        document.getElementById('declineCookies').addEventListener('click', function() {
            document.getElementById('cookieConsentContainer').style.display = 'none';
        });

        document.getElementById('openCookiePolicy').addEventListener('click', function(e) {
            e.preventDefault();
            openModal();
        });

    });

    function closeModal() {
        document.getElementById('cookiePolicyModal').style.display = 'none';
    }

    function openModal() {
        document.getElementById('cookiePolicyModal').style.display = 'block';
    }


</script>



<footer class="text-gray-500 section_bg_light body-font" data-scroll>
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-white">
            <img src=/assets/img/fav.png alt="footer logo" width=40>
            <span class="ml-3 text-xl">AegisTeam</span>
        </a>
        <p class="text-sm text-gray-600 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4" data-splitting>
            © 2024 AegisTeam —
            <a href=https://github.com/YuketsuSh class="text-gray-500 ml-1" target=_blank rel="noopener noreferrer">Yuketsu</a>
        </p>

        <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a href=//discord.gg/aegisteam class=text-gray-600>
               <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 40 40" width="40px" height="40px"><path fill="#dcd5f2" d="M13.89,29.87L11.5,33.5c-1.65-0.05-7.81-1.2-10-5c0-8.09,3.27-17.58,4.84-19.01	C9.58,6.92,14.5,6.5,14.5,6.5s0.62,1.33,1.06,2.39C17.5,8.56,19.14,8.5,20,8.5s2.5,0.06,4.44,0.39C24.88,7.83,25.5,6.5,25.5,6.5	s4.92,0.42,8.16,2.99c1.57,1.43,4.84,10.79,4.84,18.89c-2.19,3.79-8.35,5.07-10,5.12l-2.39-3.63c-1.69,0.37-3.72,0.63-6.11,0.63	S15.58,30.24,13.89,29.87z"/><ellipse cx="14.5" cy="21" fill="#fff" rx="3" ry="3.5"/><ellipse cx="25.5" cy="21" fill="#fff" rx="3" ry="3.5"/><path fill="#8b75a1" d="M28.228,34.009l-2.402-3.87l0.85-0.527l2.093,3.372c2.013-0.168,7.254-1.487,9.232-4.745	c-0.037-8.045-3.328-17.146-4.677-18.377c-2.577-2.044-6.381-2.675-7.527-2.825c-0.177,0.375-0.479,1.037-0.74,1.729L24.12,8.412	c0.416-1.1,0.912-2.094,0.933-2.136l0.152-0.304l0.338,0.029c0.207,0.018,5.113,0.467,8.428,3.099	C35.666,10.646,39,20.039,39,28.375v0.134l-0.066,0.116c-2.259,3.921-8.427,5.313-10.418,5.375L28.228,34.009z"/><path fill="#8b75a1" d="M14.5,25c-1.93,0-3.5-1.794-3.5-4s1.57-4,3.5-4s3.5,1.794,3.5,4S16.43,25,14.5,25z M14.5,18	c-1.379,0-2.5,1.346-2.5,3s1.121,3,2.5,3s2.5-1.346,2.5-3S15.879,18,14.5,18z"/><path fill="#8b75a1" d="M25.5,25c-1.93,0-3.5-1.794-3.5-4s1.57-4,3.5-4s3.5,1.794,3.5,4S27.43,25,25.5,25z M25.5,18	c-1.379,0-2.5,1.346-2.5,3s1.121,3,2.5,3s2.5-1.346,2.5-3S26.879,18,25.5,18z"/><path fill="#8b75a1" d="M11.768,34.009L11.484,34C9.99,33.953,3.44,32.87,1.066,28.75L1,28.634V28.5	c0-8.105,3.313-17.834,5.004-19.376c3.34-2.655,8.246-3.104,8.453-3.122l0.338-0.029l0.152,0.304	c0.021,0.042,0.517,1.036,0.933,2.136l-0.936,0.354c-0.262-0.692-0.563-1.354-0.74-1.728C13.057,7.187,9.25,7.821,6.651,9.884	C5.329,11.093,2.037,20.247,2,28.364c1.955,3.214,7.162,4.462,9.237,4.621l2.092-3.255l0.842,0.541L11.768,34.009z"/><path fill="#8b75a1" d="M20,31c-8.343,0-12.498-3.081-12.671-3.211l0.604-0.797C7.974,27.021,12.022,30,20,30	s12.026-2.979,12.066-3.009l0.604,0.797C32.498,27.919,28.343,31,20,31z"/><path fill="#8b75a1" d="M30.902,11.519C26.518,9.122,21.051,9,20,9s-6.518,0.122-10.902,2.519l-0.48-0.877	C13.216,8.127,18.906,8,20,8s6.784,0.127,11.383,2.642L30.902,11.519z"/></svg>
            </a>
        </span>

    </div>
</footer>