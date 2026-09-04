
@extends('layouts.public')

@section('content')

<div class="public-site">

    {{-- =========================================================
        TOP BAR
    ========================================================== --}}
    <div class="topbar bg-dark text-white py-2 d-none d-lg-block">
        <div class="container-fluid px-5 d-flex justify-content-between small">
            <div>
                LDX Elevator — Elevator & Escalator Solutions
            </div>

            <div>
                <i class="fa fa-phone-alt me-2"></i>
                Contact our team for a quotation
            </div>
        </div>
    </div>


    {{-- =========================================================
        NAVBAR
    ========================================================== --}}
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 shadow-sm">
        <div class="container-fluid px-lg-5">

            <a href="{{ route('home') }}" class="navbar-brand py-3">
                <span class="ldx-logo">LDX</span>
                <span class="ldx-logo-sub">ELEVATOR</span>
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#publicNavbar"
                aria-controls="publicNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="publicNavbar">

                <div class="navbar-nav ms-auto p-4 p-lg-0">

                    <a href="{{ route('home') }}"
                       class="nav-item nav-link active">
                        Home
                    </a>

                    <a href="#about"
                       class="nav-item nav-link">
                        About
                    </a>

                    <a href="#services"
                       class="nav-item nav-link">
                        Services
                    </a>

                    <a href="#projects"
                       class="nav-item nav-link">
                        Projects
                    </a>

                    <a href="#news"
                       class="nav-item nav-link">
                        News
                    </a>

                    <a href="{{ route('quote.create') }}"
                       class="btn btn-primary px-4 d-flex align-items-center ms-lg-3">
                        Request a Quote
                    </a>

                </div>

            </div>
        </div>
    </nav>


    {{-- =========================================================
        HERO SLIDER
    ========================================================== --}}
    <header id="header-carousel"
            class="carousel slide"
            data-bs-ride="carousel">

        <div class="carousel-inner">

            {{-- Slide 1 --}}
            <div class="carousel-item active">

                <img
                    src="{{ asset('vendor/industrio/img/carousel-1.jpg') }}"
                    class="w-100"
                    alt="LDX Elevator"
                >

                <div class="carousel-caption">

                    <div class="container">

                        <div class="row justify-content-start">

                            <div class="col-lg-7 text-start">

                                <p class="text-primary text-uppercase fw-bold mb-2">
                                    LDX Elevator
                                </p>

                                <h1 class="display-2 text-white fw-bold mb-4">
                                    Reliable Elevator Solutions for Every Building
                                </h1>

                                <p class="fs-5 text-white mb-4">
                                    Design, installation, modernization and maintenance
                                    of elevator and vertical transportation systems.
                                </p>

                                <a href="#services"
                                   class="btn btn-primary py-3 px-5 me-3">
                                    Our Services
                                </a>

                                <a href="{{ route('quote.create') }}"
                                   class="btn btn-light py-3 px-5">
                                    Get a Quote
                                </a>

                            </div>

                        </div>

                    </div>

                </div>
            </div>


            {{-- Slide 2 --}}
            <div class="carousel-item">

                <img
                    src="{{ asset('vendor/industrio/img/carousel-2.jpg') }}"
                    class="w-100"
                    alt="Elevator and Escalator"
                >

                <div class="carousel-caption">

                    <div class="container">

                        <div class="row justify-content-end">

                            <div class="col-lg-7 text-end">

                                <p class="text-primary text-uppercase fw-bold mb-2">
                                    Safety • Quality • Service
                                </p>

                                <h2 class="display-2 text-white fw-bold mb-4">
                                    Moving People Safely, Moving Businesses Forward
                                </h2>

                                <p class="fs-5 text-white mb-4">
                                    Professional solutions backed by experienced
                                    technicians and dependable after-sales service.
                                </p>

                                <a href="#projects"
                                   class="btn btn-primary py-3 px-5 me-3">
                                    View Projects
                                </a>

                                <a href="#about"
                                   class="btn btn-light py-3 px-5">
                                    About LDX
                                </a>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>


        {{-- Carousel Previous --}}
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#header-carousel"
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon"></span>
        </button>


        {{-- Carousel Next --}}
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#header-carousel"
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon"></span>
        </button>

    </header>


    {{-- =========================================================
        ABOUT
    ========================================================== --}}
    <section id="about" class="py-5 py-lg-6">

        <div class="container py-5">

            <div class="row g-5 align-items-center">

                {{-- Image --}}
                <div class="col-lg-6">

                    <div class="position-relative">

                        <img
                            src="{{ $about?->company_image
                                ? asset('storage/' . $about->company_image)
                                : asset('vendor/industrio/img/about-1.jpg') }}"
                            class="img-fluid w-100 rounded"
                            alt="{{ $about?->company_name ?? 'LDX Elevator' }}"
                        >

                        <div class="about-badge shadow">
                            <strong>LDX</strong>
                            <span>Elevator Solutions</span>
                        </div>

                    </div>

                </div>


                {{-- Content --}}
                <div class="col-lg-6">

                    <p class="section-label">
                        About Us
                    </p>

                    <h2 class="display-5 fw-bold mb-4">
                        {{ $about?->tagline
                            ?? 'Your trusted partner in vertical transportation' }}
                    </h2>

                    <p class="lead">
                        {{ $about?->short_description
                            ?? 'LDX Elevator delivers dependable elevator and escalator solutions for residential, commercial and industrial buildings.' }}
                    </p>

                    <p>
                        {{ $about?->description
                            ?? 'From consultation and system design to installation, modernization and maintenance, our team focuses on safety, quality and long-term reliability.' }}
                    </p>

                    <a href="#services"
                       class="btn btn-primary py-3 px-5 mt-2">
                        Discover Our Services
                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        STATISTICS
    ========================================================== --}}
    <section class="stats-section py-5 bg-primary text-white">

        <div class="container py-3">

            <div class="row g-4 text-center">

                <div class="col-6 col-lg-3">
                    <div class="stat-number">
                        10+
                    </div>
                    <div>
                        Years Experience
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-number">
                        100+
                    </div>
                    <div>
                        Projects Completed
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-number">
                        50+
                    </div>
                    <div>
                        Happy Clients
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-number">
                        24/7
                    </div>
                    <div>
                        Service Support
                    </div>
                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        SERVICES
    ========================================================== --}}
    <section id="services"
             class="py-5 py-lg-6 bg-light">

        <div class="container py-5">

            <div class="text-center mx-auto mb-5"
                 style="max-width:700px">

                <p class="section-label">
                    Our Services
                </p>

                <h2 class="display-5 fw-bold">
                    Complete Elevator & Escalator Services
                </h2>

                <p class="text-muted">
                    Professional solutions designed around your building,
                    safety requirements and operating needs.
                </p>

            </div>


            <div class="row g-4">

                @forelse($services as $service)

                    @php
                        $serviceImage = $service->images->first()?->path;
                    @endphp

                    <div class="col-md-6 col-lg-4">

                        <article class="service-card h-100 bg-white shadow-sm rounded overflow-hidden">

                            @if($serviceImage)

                                <img
                                    src="{{ asset('storage/' . $serviceImage) }}"
                                    class="w-100"
                                    alt="{{ $service->title }}"
                                >

                            @else

                                <img
                                    src="{{ asset('vendor/industrio/img/service-1.jpg') }}"
                                    class="w-100"
                                    alt="{{ $service->title }}"
                                >

                            @endif


                            <div class="p-4">

                                <p class="text-primary small fw-bold text-uppercase mb-2">
                                    {{ $service->category?->name ?? 'LDX Service' }}
                                </p>

                                <h3 class="h4">
                                    {{ $service->title }}
                                </h3>

                                <p class="text-muted mb-0">
                                    {{ $service->short_description }}
                                </p>

                            </div>

                        </article>

                    </div>

                @empty

                    @foreach([
                        'Elevator Installation',
                        'Elevator Modernization',
                        'Elevator Maintenance'
                    ] as $title)

                        <div class="col-md-6 col-lg-4">

                            <article class="service-card h-100 bg-white shadow-sm rounded overflow-hidden">

                                <img
                                    src="{{ asset('vendor/industrio/img/service-1.jpg') }}"
                                    class="w-100"
                                    alt="{{ $title }}"
                                >

                                <div class="p-4">

                                    <p class="text-primary small fw-bold text-uppercase">
                                        LDX Service
                                    </p>

                                    <h3 class="h4">
                                        {{ $title }}
                                    </h3>

                                    <p class="text-muted">
                                        Reliable vertical transportation solutions
                                        tailored to your building.
                                    </p>

                                </div>

                            </article>

                        </div>

                    @endforeach

                @endforelse

            </div>

        </div>

    </section>


    {{-- =========================================================
        PROJECTS
    ========================================================== --}}
    <section id="projects" class="py-5 py-lg-6">

        <div class="container py-5">

            <div class="d-flex flex-column flex-lg-row
                        justify-content-between
                        align-items-lg-end mb-5">

                <div>

                    <p class="section-label">
                        Our Projects
                    </p>

                    <h2 class="display-5 fw-bold mb-0">
                        Selected LDX Projects
                    </h2>

                </div>

                <p class="text-muted mt-3 mt-lg-0 mb-0"
                   style="max-width:500px">

                    Explore examples of our elevator and vertical
                    transportation work.

                </p>

            </div>


            <div class="row g-4">

                @forelse($projects as $project)

                    @php
                        $projectImage = $project->images->first()?->path;
                    @endphp

                    <div class="col-md-6 col-lg-4">

                        <article class="project-card position-relative overflow-hidden rounded">

                            <img
                                src="{{ $projectImage
                                    ? asset('storage/' . $projectImage)
                                    : asset('vendor/industrio/img/project-1.jpg') }}"
                                class="w-100"
                                alt="{{ $project->title }}"
                            >

                            <div class="project-overlay">

                                <small>
                                    {{ $project->category?->name ?? 'Project' }}
                                </small>

                                <h3 class="h4 text-white mb-1">
                                    {{ $project->title }}
                                </h3>

                                <span>
                                    {{ $project->location }}
                                </span>

                            </div>

                        </article>

                    </div>

                @empty

                    @foreach(range(1, 6) as $i)

                        <div class="col-md-6 col-lg-4">

                            <article class="project-card position-relative overflow-hidden rounded">

                                <img
                                    src="{{ asset('vendor/industrio/img/project-' . $i . '.jpg') }}"
                                    class="w-100"
                                    alt="LDX Project"
                                >

                                <div class="project-overlay">

                                    <small>
                                        LDX Project
                                    </small>

                                    <h3 class="h4 text-white">
                                        Elevator Installation Project
                                    </h3>

                                    <span>
                                        Thailand
                                    </span>

                                </div>

                            </article>

                        </div>

                    @endforeach

                @endforelse

            </div>

        </div>

    </section>


    {{-- =========================================================
        WHY LDX
    ========================================================== --}}
    <section class="py-5 py-lg-6 bg-light">

        <div class="container py-5">

            <div class="text-center mb-5">

                <p class="section-label">
                    Why LDX
                </p>

                <h2 class="display-5 fw-bold">
                    Built Around Safety & Reliability
                </h2>

            </div>


            <div class="row g-4">

                @foreach([
                    [
                        '01',
                        'Safety First',
                        'Every solution starts with safety, standards and responsible engineering.'
                    ],
                    [
                        '02',
                        'Quality Installation',
                        'Careful installation and testing for dependable day-to-day operation.'
                    ],
                    [
                        '03',
                        'Long-Term Support',
                        'Maintenance and after-sales support to keep your system performing.'
                    ]
                ] as $item)

                    <div class="col-md-4">

                        <div class="feature-box bg-white rounded shadow-sm p-4 h-100">

                            <div class="feature-number">
                                {{ $item[0] }}
                            </div>

                            <h3 class="h4">
                                {{ $item[1] }}
                            </h3>

                            <p class="text-muted mb-0">
                                {{ $item[2] }}
                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    {{-- =========================================================
        CERTIFICATES
    ========================================================== --}}
    @if($certificates->isNotEmpty())

        <section class="py-5 py-lg-6">

            <div class="container py-4">

                <div class="text-center mb-5">

                    <p class="section-label">
                        Certificates
                    </p>

                    <h2 class="display-5 fw-bold">
                        Quality You Can Trust
                    </h2>

                </div>


                <div class="row g-4 justify-content-center">

                    @foreach($certificates as $certificate)

                        <div class="col-6 col-md-4 col-lg-2 text-center">

                            <div class="certificate-card p-3 border rounded h-100">

                                @if($certificate->image)

                                    <img
                                        src="{{ asset('storage/' . $certificate->image) }}"
                                        class="img-fluid mb-3"
                                        alt="{{ $certificate->name }}"
                                    >

                                @endif

                                <h4 class="h6 mb-1">
                                    {{ $certificate->name }}
                                </h4>

                                <small class="text-muted">
                                    {{ $certificate->issuer }}
                                </small>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

    @endif


    {{-- =========================================================
        NEWS
    ========================================================== --}}
    @if($news->isNotEmpty())

        <section id="news"
                 class="py-5 py-lg-6 bg-light">

            <div class="container py-5">

                <div class="text-center mb-5">

                    <p class="section-label">
                        Latest News
                    </p>

                    <h2 class="display-5 fw-bold">
                        News & Updates
                    </h2>

                </div>


                <div class="row g-4">

                    @foreach($news as $item)

                        <div class="col-md-4">

                            <article class="news-card bg-white rounded shadow-sm h-100 p-4">

                                <p class="text-primary small fw-bold">

                                    {{ optional($item->published_at)->format('d M Y') }}

                                </p>

                                <h3 class="h4">
                                    {{ $item->title }}
                                </h3>

                                <p class="text-muted">
                                    {{ $item->short_description }}
                                </p>

                            </article>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

    @endif


    {{-- =========================================================
        CLIENTS
    ========================================================== --}}
    @if($clients->isNotEmpty())

        <section class="py-5">

            <div class="container py-4">

                <div class="text-center mb-4">

                    <p class="section-label">
                        Our Clients
                    </p>

                    <h2 class="h2 fw-bold">
                        Trusted by Our Clients
                    </h2>

                </div>


                <div class="row align-items-center justify-content-center g-4">

                    @foreach($clients as $client)

                        <div class="col-6 col-md-3 col-lg-2 text-center">

                            @if($client->logo)

                                <img
                                    src="{{ asset('storage/' . $client->logo) }}"
                                    class="client-logo img-fluid"
                                    alt="{{ $client->name }}"
                                >

                            @else

                                <span class="fw-semibold">
                                    {{ $client->name }}
                                </span>

                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

    @endif


    {{-- =========================================================
        QUOTE CTA
    ========================================================== --}}
    <section class="quote-cta py-5">

        <div class="container py-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <p class="text-white text-uppercase fw-bold mb-2">
                        Let's talk about your project
                    </p>

                    <h2 class="display-5 text-white fw-bold mb-0">
                        Need a reliable elevator solution?
                    </h2>

                </div>


                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                    <a href="{{ route('quote.create') }}"
                       class="btn btn-light btn-lg px-5 py-3">

                        Request a Quote

                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        FOOTER
    ========================================================== --}}
    <footer class="bg-dark text-white pt-5 pb-4">

        <div class="container">

            <div class="row g-4">

                {{-- Company --}}
                <div class="col-lg-5">

                    <div class="ldx-footer-logo mb-3">
                        LDX
                        <span>ELEVATOR</span>
                    </div>

                    <p class="text-white-50">
                        Elevator and escalator solutions focused on safety,
                        quality and dependable service.
                    </p>

                </div>


                {{-- Quick Links --}}
                <div class="col-sm-6 col-lg-3">

                    <h4 class="h5 mb-3">
                        Quick Links
                    </h4>

                    <a href="#about"
                       class="footer-link">
                        About
                    </a>

                    <a href="#services"
                       class="footer-link">
                        Services
                    </a>

                    <a href="#projects"
                       class="footer-link">
                        Projects
                    </a>

                    <a href="#news"
                       class="footer-link">
                        News
                    </a>

                </div>


                {{-- Contact --}}
                <div class="col-sm-6 col-lg-4">

                    <h4 class="h5 mb-3">
                        Contact
                    </h4>

                    <p class="text-white-50 mb-2">
                        Contact LDX Elevator for consultation and quotation.
                    </p>

                    <a href="{{ route('quote.create') }}"
                       class="btn btn-primary mt-2">

                        Request a Quote

                    </a>

                </div>

            </div>


            <hr class="border-secondary my-4">


            <p class="text-white-50 small mb-0">
                © {{ date('Y') }} LDX Elevator. All rights reserved.
            </p>

        </div>

    </footer>

</div>

@endsection
