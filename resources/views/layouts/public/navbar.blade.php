<header class="ldx-public-navbar">

    <div class="ldx-public-navbar-inner">

        {{-- ============================================================
             BRAND
             ============================================================ --}}
        <a href="{{ url('/') }}"
           class="ldx-public-navbar-brand"
           aria-label="LDX Elevator Home">

            <span class="ldx-public-navbar-mark">
                LDX
            </span>

            <span class="ldx-public-navbar-brand-text">
                ELEVATOR
            </span>

        </a>


        {{-- ============================================================
             DESKTOP NAVIGATION
             ============================================================ --}}
        <nav class="ldx-public-navbar-menu"
             aria-label="Primary navigation">

            <a href="{{ url('/') }}"
               class="ldx-public-navbar-link {{ request()->is('/') ? 'is-active' : '' }}">
                Home
            </a>

            <a href="{{ route('public.about') }}"
               class="ldx-public-navbar-link {{ request()->is('about*') ? 'is-active' : '' }}">
                About Us
            </a>

            <a href="{{ route('public.services') }}"
               class="ldx-public-navbar-link {{ request()->is('services*') ? 'is-active' : '' }}">
                Services
            </a>

            <a href="{{ route('public.projects') }}"
               class="ldx-public-navbar-link {{ request()->is('projects*') ? 'is-active' : '' }}">
                Projects
            </a>

            <a href="{{ url('/news') }}"
               class="ldx-public-navbar-link {{ request()->is('news*') ? 'is-active' : '' }}">
                News
            </a>

        </nav>


        {{-- ============================================================
             DESKTOP CONTACT
             ============================================================ --}}
        <a href="{{ url('/contact') }}"
           class="ldx-public-navbar-contact">

            <span>
                Contact Us
            </span>

            <span class="ldx-public-navbar-contact-arrow">
                ↗
            </span>

        </a>


        {{-- ============================================================
             MOBILE TOGGLE
             ============================================================ --}}
        <button type="button"
                class="ldx-public-navbar-toggle"
                aria-label="Open navigation menu"
                aria-expanded="false"
                aria-controls="ldx-public-mobile-menu">

            <span></span>
            <span></span>
            <span></span>

        </button>

    </div>


    {{-- ================================================================
         MOBILE NAVIGATION
         ================================================================ --}}
    <div id="ldx-public-mobile-menu"
         class="ldx-public-navbar-mobile">

        <nav class="ldx-public-navbar-mobile-menu"
             aria-label="Mobile navigation">

            <a href="{{ url('/') }}"
               class="ldx-public-navbar-mobile-link {{ request()->is('/') ? 'is-active' : '' }}">
                <span>01</span>
                <strong>Home</strong>
                <span>↗</span>
            </a>

            <a href="{{ url('/about') }}"
               class="ldx-public-navbar-mobile-link {{ request()->is('about*') ? 'is-active' : '' }}">
                <span>02</span>
                <strong>About Us</strong>
                <span>↗</span>
            </a>

            <a href="{{ url('/services') }}"
               class="ldx-public-navbar-mobile-link {{ request()->is('services*') ? 'is-active' : '' }}">
                <span>03</span>
                <strong>Services</strong>
                <span>↗</span>
            </a>

            <a href="{{ url('/projects') }}"
               class="ldx-public-navbar-mobile-link {{ request()->is('projects*') ? 'is-active' : '' }}">
                <span>04</span>
                <strong>Projects</strong>
                <span>↗</span>
            </a>

            <a href="{{ url('/news') }}"
               class="ldx-public-navbar-mobile-link {{ request()->is('news*') ? 'is-active' : '' }}">
                <span>05</span>
                <strong>News</strong>
                <span>↗</span>
            </a>

        </nav>


        <div class="ldx-public-navbar-mobile-contact">

            <span>
                HAVE A PROJECT IN MIND?
            </span>

            <a href="{{ url('/contact') }}">
                Contact LDX Elevator
                <span>→</span>
            </a>

        </div>

    </div>

</header>