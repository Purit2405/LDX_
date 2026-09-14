<header class="ldx-public-navbar">

<div class="ldx-public-navbar-inner">

    {{-- ============================================================
         BRAND
         ============================================================ --}}
    <a href="{{ url('/') }}"
       class="ldx-public-navbar-brand"
       aria-label="หน้าหลัก LDX Elevator">

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
         aria-label="เมนูหลัก">

        <a href="{{ url('/') }}"
           class="ldx-public-navbar-link {{ request()->is('/') ? 'is-active' : '' }}">
            หน้าแรก
        </a>

        <a href="{{ route('public.about') }}"
           class="ldx-public-navbar-link {{ request()->is('about*') ? 'is-active' : '' }}">
            เกี่ยวกับเรา
        </a>

        <a href="{{ route('public.services') }}"
           class="ldx-public-navbar-link {{ request()->is('services*') ? 'is-active' : '' }}">
            บริการ
        </a>

        <a href="{{ route('public.projects') }}"
           class="ldx-public-navbar-link {{ request()->is('projects*') ? 'is-active' : '' }}">
            โครงการ
        </a>

        <a href="{{ url('/news') }}"
           class="ldx-public-navbar-link {{ request()->is('news*') ? 'is-active' : '' }}">
            ข่าวสาร
        </a>

    </nav>


    {{-- ============================================================
         DESKTOP CONTACT
         ============================================================ --}}
    <a href="{{ url('/contact') }}"
       class="ldx-public-navbar-contact">

        <span>
            ติดต่อเรา
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
            aria-label="เปิดเมนูนำทาง"
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
         aria-label="เมนูสำหรับมือถือ">

        <a href="{{ url('/') }}"
           class="ldx-public-navbar-mobile-link {{ request()->is('/') ? 'is-active' : '' }}">

            <span>01</span>

            <strong>
                หน้าแรก
            </strong>

            <span>↗</span>

        </a>


        <a href="{{ url('/about') }}"
           class="ldx-public-navbar-mobile-link {{ request()->is('about*') ? 'is-active' : '' }}">

            <span>02</span>

            <strong>
                เกี่ยวกับเรา
            </strong>

            <span>↗</span>

        </a>


        <a href="{{ url('/services') }}"
           class="ldx-public-navbar-mobile-link {{ request()->is('services*') ? 'is-active' : '' }}">

            <span>03</span>

            <strong>
                บริการ
            </strong>

            <span>↗</span>

        </a>


        <a href="{{ url('/projects') }}"
           class="ldx-public-navbar-mobile-link {{ request()->is('projects*') ? 'is-active' : '' }}">

            <span>04</span>

            <strong>
                โครงการ
            </strong>

            <span>↗</span>

        </a>


        <a href="{{ url('/news') }}"
           class="ldx-public-navbar-mobile-link {{ request()->is('news*') ? 'is-active' : '' }}">

            <span>05</span>

            <strong>
                ข่าวสาร
            </strong>

            <span>↗</span>

        </a>

    </nav>


    <div class="ldx-public-navbar-mobile-contact">

        <span>
            มีโครงการที่ต้องการปรึกษาหรือไม่?
        </span>

        <a href="{{ url('/contact') }}">
            ติดต่อ LDX Elevator

            <span>
                →
            </span>
        </a>

    </div>

</div>

</header>
