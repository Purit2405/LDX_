@extends('layouts.public.app')

@section('title', 'LDX Elevator | Elevator Solutions')

@section('description', 'LDX Elevator provides professional elevator installation, modernization, maintenance and repair solutions for modern buildings and businesses.')

@section('content')


{{-- ======================================================================
     HERO
     ====================================================================== --}}
<section class="ldx-home-hero">

    <div class="ldx-home-hero-background">
        <div class="ldx-home-hero-grid"></div>
        <div class="ldx-home-hero-glow"></div>
    </div>


    <div class="ldx-public-container">

        <div class="ldx-home-hero-layout">


            {{-- ==========================================================
                 HERO CONTENT
                 ========================================================== --}}
            <div class="ldx-home-hero-content">

                <div class="ldx-home-eyebrow">

                    <span class="ldx-home-eyebrow-line"></span>

                    <span>
                        ELEVATOR SOLUTIONS
                    </span>

                </div>


                <h1>
                    Moving People.
                    <br>

                    <span>
                        Elevating
                    </span>

                    Possibilities.
                </h1>


                <p>
                    Reliable elevator solutions designed for
                    modern buildings, businesses and communities.
                </p>


                <div class="ldx-home-hero-actions">

                    <a href="{{ url('/services') }}"
                       class="ldx-home-button ldx-home-button-primary">

                        <span>
                            Explore Services
                        </span>

                        <span>
                            →
                        </span>

                    </a>


                    <a href="{{ url('/contact') }}"
                       class="ldx-home-button ldx-home-button-outline">

                        <span>
                            Contact Us
                        </span>

                        <span>
                            ↗
                        </span>

                    </a>

                </div>

            </div>


            {{-- ==========================================================
                 HERO VISUAL
                 ========================================================== --}}
            <div class="ldx-home-hero-visual">

                <div class="ldx-home-building">

                    <div class="ldx-home-building-top">

                        <span></span>
                        <span></span>
                        <span></span>

                    </div>


                    <div class="ldx-home-building-shaft">

                        <div class="ldx-home-elevator">

                            <div class="ldx-home-elevator-door left"></div>
                            <div class="ldx-home-elevator-door right"></div>

                            <div class="ldx-home-elevator-light"></div>

                        </div>

                    </div>


                    <div class="ldx-home-building-floor floor-1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="ldx-home-building-floor floor-2">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="ldx-home-building-floor floor-3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="ldx-home-building-floor floor-4">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                </div>


                <div class="ldx-home-experience-badge">

                    <strong>
                        20+
                    </strong>

                    <span>
                        Years of
                        <br>
                        Experience
                    </span>

                </div>

            </div>

        </div>

    </div>


    <div class="ldx-home-hero-bottom">

        <div class="ldx-public-container">

            <div class="ldx-home-hero-bottom-inner">

                <div class="ldx-home-hero-index">

                    <span>
                        01
                    </span>

                    <span class="line"></span>

                    <span>
                        LDX ELEVATOR
                    </span>

                </div>

                <span class="ldx-home-scroll">
                    SCROLL TO EXPLORE ↓
                </span>

            </div>

        </div>

    </div>

</section>



{{-- ======================================================================
     ABOUT
     ====================================================================== --}}
<section class="ldx-home-about">

    <div class="ldx-public-container">

        <div class="ldx-home-section-label">

            <span>01</span>

            <span class="line"></span>

            <span>
                ABOUT LDX
            </span>

        </div>


        <div class="ldx-home-about-grid">

            <div class="ldx-home-about-heading">

                <h2>
                    Engineering movement
                    <span>
                        with confidence.
                    </span>
                </h2>

            </div>


            <div class="ldx-home-about-content">

                <p class="lead">
                    LDX Elevator provides dependable elevator
                    solutions focused on safety, quality and
                    long-term performance.
                </p>

                <p>
                    From new elevator installations to modernization,
                    maintenance and repair, our team delivers
                    solutions tailored to the requirements of
                    each building.
                </p>


                <a href="{{ url('/about') }}"
                   class="ldx-home-text-link">

                    <span>
                        Discover LDX
                    </span>

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>


        <div class="ldx-home-statistics">

            <div class="ldx-home-stat">

                <strong>
                    20+
                </strong>

                <span>
                    Years of
                    <br>
                    Experience
                </span>

            </div>


            <div class="ldx-home-stat">

                <strong>
                    500+
                </strong>

                <span>
                    Projects
                    <br>
                    Completed
                </span>

            </div>


            <div class="ldx-home-stat">

                <strong>
                    24/7
                </strong>

                <span>
                    Service &
                    <br>
                    Support
                </span>

            </div>


            <div class="ldx-home-stat">

                <strong>
                    100%
                </strong>

                <span>
                    Safety
                    <br>
                    Focused
                </span>

            </div>

        </div>

    </div>

</section>



{{-- ======================================================================
     SERVICES
     ====================================================================== --}}
<section class="ldx-home-services">

    <div class="ldx-public-container">

        <div class="ldx-home-section-header">

            <div class="ldx-home-section-label">

                <span>02</span>

                <span class="line"></span>

                <span>
                    OUR SERVICES
                </span>

            </div>


            <div class="ldx-home-section-header-row">

                <h2>
                    Solutions built
                    <br>
                    <span>
                        for every journey.
                    </span>
                </h2>


                <a href="{{ url('/services') }}"
                   class="ldx-home-outline-link">

                    <span>
                        View All Services
                    </span>

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>


        <div class="ldx-home-services-grid">


            {{-- SERVICE 01 --}}
            <a href="{{ url('/services') }}"
               class="ldx-home-service-card">

                <span class="ldx-home-service-number">
                    01
                </span>


                <div class="ldx-home-service-icon">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.4"
                         aria-hidden="true">

                        <rect x="5"
                              y="3"
                              width="14"
                              height="18"
                              rx="2"/>

                        <path d="M9 3v18"/>
                        <path d="M15 3v18"/>
                        <path d="M8 12h8"/>

                    </svg>

                </div>


                <div class="ldx-home-service-content">

                    <h3>
                        Elevator Installation
                    </h3>

                    <p>
                        Complete elevator installation solutions
                        designed around your building requirements.
                    </p>

                </div>


                <span class="ldx-home-service-arrow">
                    ↗
                </span>

            </a>



            {{-- SERVICE 02 --}}
            <a href="{{ url('/services') }}"
               class="ldx-home-service-card">

                <span class="ldx-home-service-number">
                    02
                </span>


                <div class="ldx-home-service-icon">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.4"
                         aria-hidden="true">

                        <path d="M12 3v18"/>
                        <path d="M5 7h14"/>
                        <path d="M5 17h14"/>

                        <circle cx="12"
                                cy="12"
                                r="7"/>

                    </svg>

                </div>


                <div class="ldx-home-service-content">

                    <h3>
                        Modernization
                    </h3>

                    <p>
                        Upgrade existing elevator systems for
                        improved safety, performance and efficiency.
                    </p>

                </div>


                <span class="ldx-home-service-arrow">
                    ↗
                </span>

            </a>



            {{-- SERVICE 03 --}}
            <a href="{{ url('/services') }}"
               class="ldx-home-service-card">

                <span class="ldx-home-service-number">
                    03
                </span>


                <div class="ldx-home-service-icon">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.4"
                         aria-hidden="true">

                        <circle cx="12"
                                cy="12"
                                r="8"/>

                        <path d="M12 8v4l3 2"/>

                    </svg>

                </div>


                <div class="ldx-home-service-content">

                    <h3>
                        Maintenance
                    </h3>

                    <p>
                        Preventive maintenance programs that help
                        keep your elevator operating reliably.
                    </p>

                </div>


                <span class="ldx-home-service-arrow">
                    ↗
                </span>

            </a>



            {{-- SERVICE 04 --}}
            <a href="{{ url('/services') }}"
               class="ldx-home-service-card">

                <span class="ldx-home-service-number">
                    04
                </span>


                <div class="ldx-home-service-icon">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.4"
                         aria-hidden="true">

                        <path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>

                        <path d="M9 12l2 2 4-4"/>

                    </svg>

                </div>


                <div class="ldx-home-service-content">

                    <h3>
                        Repair & Inspection
                    </h3>

                    <p>
                        Professional inspection and repair services
                        to maintain safety and system performance.
                    </p>

                </div>


                <span class="ldx-home-service-arrow">
                    ↗
                </span>

            </a>

        </div>

    </div>

</section>



{{-- ======================================================================
     PROJECTS
     ====================================================================== --}}
<section class="ldx-home-projects">

    <div class="ldx-public-container">

        <div class="ldx-home-section-header">

            <div class="ldx-home-section-label">

                <span>03</span>

                <span class="line"></span>

                <span>
                    FEATURED PROJECTS
                </span>

            </div>


            <div class="ldx-home-section-header-row">

                <h2>
                    Built for performance.
                    <br>
                    <span>
                        Designed to last.
                    </span>
                </h2>


                <a href="{{ url('/projects') }}"
                   class="ldx-home-outline-link">

                    <span>
                        View Projects
                    </span>

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>


        <div class="ldx-home-projects-grid">


            {{-- PROJECT 01 --}}
            <a href="{{ url('/projects') }}"
               class="ldx-home-project-card ldx-home-project-large">

                <div class="ldx-home-project-image">

                    <div class="ldx-home-project-placeholder">

                        <span>
                            PROJECT 01
                        </span>

                        <strong>
                            Commercial
                            <br>
                            Building
                        </strong>

                    </div>

                </div>


                <div class="ldx-home-project-info">

                    <div>

                        <span>
                            COMMERCIAL
                        </span>

                        <h3>
                            Modern Commercial Elevator
                        </h3>

                    </div>

                    <span class="arrow">
                        ↗
                    </span>

                </div>

            </a>



            {{-- PROJECT 02 --}}
            <a href="{{ url('/projects') }}"
               class="ldx-home-project-card">

                <div class="ldx-home-project-image">

                    <div class="ldx-home-project-placeholder">

                        <span>
                            PROJECT 02
                        </span>

                        <strong>
                            Residential
                            <br>
                            Tower
                        </strong>

                    </div>

                </div>


                <div class="ldx-home-project-info">

                    <div>

                        <span>
                            RESIDENTIAL
                        </span>

                        <h3>
                            High-Rise Residential
                        </h3>

                    </div>

                    <span class="arrow">
                        ↗
                    </span>

                </div>

            </a>



            {{-- PROJECT 03 --}}
            <a href="{{ url('/projects') }}"
               class="ldx-home-project-card">

                <div class="ldx-home-project-image">

                    <div class="ldx-home-project-placeholder">

                        <span>
                            PROJECT 03
                        </span>

                        <strong>
                            Office
                            <br>
                            Complex
                        </strong>

                    </div>

                </div>


                <div class="ldx-home-project-info">

                    <div>

                        <span>
                            OFFICE
                        </span>

                        <h3>
                            Corporate Office Elevator
                        </h3>

                    </div>

                    <span class="arrow">
                        ↗
                    </span>

                </div>

            </a>

        </div>

    </div>

</section>



{{-- ======================================================================
     WHY LDX
     ====================================================================== --}}
<section class="ldx-home-why">

    <div class="ldx-public-container">

        <div class="ldx-home-section-label">

            <span>04</span>

            <span class="line"></span>

            <span>
                WHY LDX
            </span>

        </div>


        <div class="ldx-home-why-grid">

            <div class="ldx-home-why-heading">

                <h2>
                    More than an elevator.
                    <span>
                        A complete solution.
                    </span>
                </h2>

                <p>
                    We combine engineering expertise, quality
                    workmanship and responsive service to deliver
                    elevator systems you can depend on.
                </p>

            </div>


            <div class="ldx-home-why-list">


                <div class="ldx-home-why-item">

                    <span class="number">
                        01
                    </span>

                    <div>

                        <h3>
                            Safety First
                        </h3>

                        <p>
                            Every solution is designed with safety,
                            reliability and compliance in mind.
                        </p>

                    </div>

                </div>


                <div class="ldx-home-why-item">

                    <span class="number">
                        02
                    </span>

                    <div>

                        <h3>
                            Quality Engineering
                        </h3>

                        <p>
                            Practical engineering solutions built
                            for long-term performance.
                        </p>

                    </div>

                </div>


                <div class="ldx-home-why-item">

                    <span class="number">
                        03
                    </span>

                    <div>

                        <h3>
                            Professional Service
                        </h3>

                        <p>
                            Our team provides reliable support from
                            installation through ongoing maintenance.
                        </p>

                    </div>

                </div>


                <div class="ldx-home-why-item">

                    <span class="number">
                        04
                    </span>

                    <div>

                        <h3>
                            Customer Focus
                        </h3>

                        <p>
                            Every project is tailored to the unique
                            needs of our customers and their buildings.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- ======================================================================
     NEWS
     ====================================================================== --}}
<section class="ldx-home-news">

    <div class="ldx-public-container">

        <div class="ldx-home-section-header">

            <div class="ldx-home-section-label">

                <span>05</span>

                <span class="line"></span>

                <span>
                    LATEST NEWS
                </span>

            </div>


            <div class="ldx-home-section-header-row">

                <h2>
                    Insights from
                    <br>
                    <span>
                        LDX Elevator.
                    </span>
                </h2>


                <a href="{{ url('/news') }}"
                   class="ldx-home-outline-link">

                    <span>
                        View All News
                    </span>

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>


        <div class="ldx-home-news-grid">


            {{-- NEWS 01 --}}
            <a href="{{ url('/news') }}"
               class="ldx-home-news-card">

                <div class="ldx-home-news-image">

                    <div class="ldx-home-news-placeholder">
                        NEWS
                    </div>

                </div>


                <div class="ldx-home-news-content">

                    <div class="ldx-home-news-meta">

                        <span>
                            COMPANY
                        </span>

                        <span>
                            01 SEP 2026
                        </span>

                    </div>

                    <h3>
                        Building better vertical
                        transportation solutions
                    </h3>

                    <span class="ldx-home-news-link">
                        Read Article →
                    </span>

                </div>

            </a>



            {{-- NEWS 02 --}}
            <a href="{{ url('/news') }}"
               class="ldx-home-news-card">

                <div class="ldx-home-news-image">

                    <div class="ldx-home-news-placeholder">
                        NEWS
                    </div>

                </div>


                <div class="ldx-home-news-content">

                    <div class="ldx-home-news-meta">

                        <span>
                            TECHNOLOGY
                        </span>

                        <span>
                            25 AUG 2026
                        </span>

                    </div>

                    <h3>
                        Why elevator modernization
                        matters for existing buildings
                    </h3>

                    <span class="ldx-home-news-link">
                        Read Article →
                    </span>

                </div>

            </a>



            {{-- NEWS 03 --}}
            <a href="{{ url('/news') }}"
               class="ldx-home-news-card">

                <div class="ldx-home-news-image">

                    <div class="ldx-home-news-placeholder">
                        NEWS
                    </div>

                </div>


                <div class="ldx-home-news-content">

                    <div class="ldx-home-news-meta">

                        <span>
                            MAINTENANCE
                        </span>

                        <span>
                            18 AUG 2026
                        </span>

                    </div>

                    <h3>
                        Simple steps to improve
                        elevator reliability
                    </h3>

                    <span class="ldx-home-news-link">
                        Read Article →
                    </span>

                </div>

            </a>

        </div>

    </div>

</section>



{{-- ======================================================================
     CTA
     ====================================================================== --}}
<section class="ldx-home-cta">

    <div class="ldx-home-cta-grid"></div>


    <div class="ldx-public-container">

        <div class="ldx-home-cta-content">

            <div class="ldx-home-eyebrow">

                <span class="ldx-home-eyebrow-line"></span>

                <span>
                    START YOUR PROJECT
                </span>

            </div>


            <h2>
                Ready to move
                <br>

                <span>
                    your project forward?
                </span>
            </h2>


            <p>
                Talk to our team about your elevator requirements
                and discover the right solution for your building.
            </p>


            <a href="{{ url('/contact') }}"
               class="ldx-home-button ldx-home-button-primary">

                <span>
                    Contact LDX Elevator
                </span>

                <span>
                    →
                </span>

            </a>

        </div>

    </div>

</section>


@endsection