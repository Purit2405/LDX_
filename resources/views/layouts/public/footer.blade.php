<footer class="ldx-public-footer">

    {{-- ================================================================
         FOOTER CTA
         ================================================================ --}}
    <section class="ldx-public-footer-cta">

        <div class="ldx-public-container">

            <div class="ldx-public-footer-cta-inner">

                <div>

                    <span class="ldx-public-footer-eyebrow">
                        LET'S WORK TOGETHER
                    </span>

                    <h2>
                        Move your project
                        <span>forward.</span>
                    </h2>

                </div>

                <a href="{{ url('/contact') }}"
                   class="ldx-public-footer-cta-button">

                    <span>
                        Start a Conversation
                    </span>

                    <span>
                        ↗
                    </span>

                </a>

            </div>

        </div>

    </section>


    {{-- ================================================================
         FOOTER MAIN
         ================================================================ --}}
    <div class="ldx-public-footer-main">

        <div class="ldx-public-container">

            <div class="ldx-public-footer-grid">


                {{-- ====================================================
                     BRAND
                     ==================================================== --}}
                <div class="ldx-public-footer-brand">

                    <a href="{{ url('/') }}"
                       class="ldx-public-footer-logo">

                        <span class="ldx-public-footer-mark">
                            LDX
                        </span>

                        <span>
                            ELEVATOR
                        </span>

                    </a>

                    <p>
                        Reliable elevator solutions designed
                        for modern buildings, businesses
                        and communities.
                    </p>


                    <div class="ldx-public-footer-social">

                        <a href="#"
                           aria-label="Facebook">
                            F
                        </a>

                        <a href="#"
                           aria-label="Instagram">
                            I
                        </a>

                        <a href="#"
                           aria-label="LinkedIn">
                            in
                        </a>

                    </div>

                </div>


                {{-- ====================================================
                     QUICK LINKS
                     ==================================================== --}}
                <div class="ldx-public-footer-column">

                    <span class="ldx-public-footer-column-title">
                        EXPLORE
                    </span>

                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    <a href="{{ url('/about') }}">
                        About Us
                    </a>

                    <a href="{{ url('/services') }}">
                        Services
                    </a>

                    <a href="{{ url('/projects') }}">
                        Projects
                    </a>

                    <a href="{{ url('/news') }}">
                        News
                    </a>

                </div>


                {{-- ====================================================
                     SERVICES
                     ==================================================== --}}
                <div class="ldx-public-footer-column">

                    <span class="ldx-public-footer-column-title">
                        SERVICES
                    </span>

                    <a href="{{ url('/services') }}">
                        Installation
                    </a>

                    <a href="{{ url('/services') }}">
                        Modernization
                    </a>

                    <a href="{{ url('/services') }}">
                        Maintenance
                    </a>

                    <a href="{{ url('/services') }}">
                        Repair & Inspection
                    </a>

                </div>


                {{-- ====================================================
                     CONTACT
                     ==================================================== --}}
                <div class="ldx-public-footer-column">

                    <span class="ldx-public-footer-column-title">
                        CONTACT
                    </span>

                    <div class="ldx-public-footer-address">

                        <p>
                            Bangkok, Thailand
                        </p>

                        <a href="tel:+66000000000"
                           class="ldx-public-footer-contact-link">
                            +66 00 000 0000
                        </a>

                        <a href="mailto:info@ldxelevator.com"
                           class="ldx-public-footer-contact-link">
                            info@ldxelevator.com
                        </a>

                    </div>

                </div>

            </div>


            {{-- ========================================================
                 FOOTER BOTTOM
                 ======================================================== --}}
            <div class="ldx-public-footer-bottom">

                <span>
                    © {{ date('Y') }} LDX Elevator.
                    All rights reserved.
                </span>

                <div>

                    <a href="#">
                        Privacy Policy
                    </a>

                    <a href="#">
                        Terms
                    </a>

                </div>

            </div>

        </div>

    </div>

</footer>