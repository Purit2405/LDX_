@extends('layouts.public.app')

@section('title', 'Services | LDX Elevator')

@section('content')

<div class="ldx-services-page">

    {{-- =========================================================
        Hero
    ========================================================== --}}

    <section class="ldx-services-hero">

        <div class="ldx-services-hero-grid"></div>

        <div class="ldx-services-hero-glow"></div>

        <div class="ldx-container">

            <div class="ldx-services-hero-content">

                <div class="ldx-section-eyebrow">
                    <span class="ldx-section-eyebrow-line"></span>
                    OUR SERVICES
                </div>

                <h1 class="ldx-services-hero-title">
                    Elevator Solutions
                    <span>Built for Every Journey.</span>
                </h1>

                <p class="ldx-services-hero-description">
                    โซลูชันระบบลิฟต์และบริการที่ออกแบบมาเพื่อความปลอดภัย
                    ประสิทธิภาพ และความมั่นใจในการใช้งานในทุกอาคาร
                </p>

            </div>

        </div>

    </section>


    {{-- =========================================================
        Category Filter
    ========================================================== --}}

    <section class="ldx-services-filter-section">

        <div class="ldx-container">

            <div class="ldx-services-filter">

                {{-- All Services --}}

                <a
                    href="{{ route('public.services') }}"
                    class="ldx-services-filter-item {{ !$selectedCategory ? 'is-active' : '' }}"
                >
                    <span class="ldx-services-filter-number">
                        {{ $services->count() }}
                    </span>

                    <span>
                        All Services
                    </span>
                </a>


                {{-- Categories --}}

                @foreach($categories as $category)

                    @php
                        $categoryCount = $services->where('category_id', $category->id)->count();
                    @endphp

                    <a
                        href="{{ route('public.services', ['category' => $category->slug]) }}"
                        class="ldx-services-filter-item {{ $selectedCategory === $category->slug ? 'is-active' : '' }}"
                    >

                        <span>
                            {{ $category->name }}
                        </span>

                    </a>

                @endforeach

            </div>

        </div>

    </section>


    {{-- =========================================================
        Services Content
    ========================================================== --}}

    <section class="ldx-services-content">

        <div class="ldx-container">

            {{-- Section Header --}}

            <div class="ldx-services-section-header">

                <div>

                    <div class="ldx-section-label">
                        @if($currentCategory)
                            {{ $currentCategory->name }}
                        @else
                            OUR SERVICES
                        @endif
                    </div>

                    <h2 class="ldx-services-section-title">

                        @if($currentCategory)
                            {{ $currentCategory->name }}
                        @else
                            Complete Elevator Solutions
                        @endif

                    </h2>

                </div>

                <div class="ldx-services-result-count">
                    <strong>{{ $services->count() }}</strong>
                    {{ $services->count() === 1 ? 'Service' : 'Services' }}
                </div>

            </div>


            {{-- =================================================
                Services Grid
            ================================================== --}}

            @if($services->count())

                <div class="ldx-services-grid">

                    @foreach($services as $service)

                        <article class="ldx-service-card">

                            {{-- Image --}}

                            <a
                                href="{{ url('/services/' . $service->slug) }}"
                                class="ldx-service-card-image"
                            >

                                @if($service->images && $service->images->count())

                                    @php
                                        $mainImage = $service->images->first();
                                    @endphp

                                    <img
                                        src="{{ asset('storage/' . $mainImage->path) }}"
                                        alt="{{ $mainImage->alt ?? $service->title }}"
                                        loading="lazy"
                                    >

                                @elseif(!empty($service->image))

                                    <img
                                        src="{{ asset('storage/' . $service->image) }}"
                                        alt="{{ $service->title }}"
                                        loading="lazy"
                                    >

                                @else

                                    <div class="ldx-service-card-placeholder">

                                        <span class="ldx-service-placeholder-icon">
                                            ↑
                                        </span>

                                        <span>
                                            LDX ELEVATOR
                                        </span>

                                    </div>

                                @endif


                                {{-- Image Overlay --}}

                                <div class="ldx-service-card-image-overlay"></div>


                                {{-- Number --}}

                                <span class="ldx-service-card-number">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>


                                {{-- Arrow --}}

                                <span class="ldx-service-card-image-arrow">
                                    →
                                </span>

                            </a>


                            {{-- Content --}}

                            <div class="ldx-service-card-content">

                                {{-- Category --}}

                                @if($service->category)

                                    <div class="ldx-service-card-category">

                                        <span class="ldx-service-card-category-line"></span>

                                        {{ $service->category->name }}

                                    </div>

                                @endif


                                {{-- Title --}}

                                <h3 class="ldx-service-card-title">

                                    <a
    href="{{ route('public.services.show', $service->slug) }}"
    class="ldx-service-card-link"
>
    <span>View Service</span>

    <svg viewBox="0 0 24 24" aria-hidden="true">
        <path d="M5 12h13"></path>
        <path d="m13 6 6 6-6 6"></path>
    </svg>
</a>

                                </h3>


                                {{-- Description --}}

                                @if($service->short_description)

                                    <p class="ldx-service-card-description">
                                        {{ $service->short_description }}
                                    </p>

                                @endif


                                {{-- Link --}}

                                <a
                                    href="{{ url('/services/' . $service->slug) }}"
                                    class="ldx-service-card-link"
                                >

                                    <span>
                                        View Service
                                    </span>

                                    <span class="ldx-service-card-link-arrow">
                                        →
                                    </span>

                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>

            @else

                {{-- =================================================
                    Empty State
                ================================================== --}}

                <div class="ldx-services-empty">

                    <div class="ldx-services-empty-icon">
                        —
                    </div>

                    <h3>
                        No Services Found
                    </h3>

                    <p>
                        ขออภัย ขณะนี้ยังไม่มีบริการในหมวดหมู่นี้
                    </p>

                    @if($selectedCategory)

                        <a
                            href="{{ route('public.services') }}"
                            class="ldx-public-button ldx-public-button-outline"
                        >
                            View All Services
                        </a>

                    @endif

                </div>

            @endif

        </div>

    </section>


    {{-- =========================================================
        CTA
    ========================================================== --}}

    <section class="ldx-services-cta">

        <div class="ldx-container">

            <div class="ldx-services-cta-inner">

                <div class="ldx-services-cta-content">

                    <div class="ldx-section-eyebrow">
                        <span class="ldx-section-eyebrow-line"></span>
                        NEED A SOLUTION?
                    </div>

                    <h2>
                        Let's Build the Right
                        <span>Elevator Solution.</span>
                    </h2>

                    <p>
                        ติดต่อทีมงาน LDX Elevator
                        เพื่อปรึกษาและออกแบบโซลูชันที่เหมาะสมกับอาคารของคุณ
                    </p>

                </div>

                <div class="ldx-services-cta-action">

                    <a
                        href="{{ url('/contact') }}"
                        class="ldx-public-button ldx-public-button-primary"
                    >
                        Contact Us
                        <span>→</span>
                    </a>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection
