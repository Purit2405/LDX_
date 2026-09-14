@extends('layouts.public.app')

@section('title', $service->title . ' | LDX Elevator')

@section('content')

<div class="ldx-service-detail">

{{-- =====================================================
    HERO
====================================================== --}}

<section class="ldx-service-detail-hero">

    <div class="ldx-container">

        <div class="ldx-service-detail-breadcrumb">

            <a href="{{ route('public.services') }}">
                บริการ
            </a>

            <span>/</span>

            <span>
                {{ $service->title }}
            </span>

        </div>


        <div class="ldx-service-detail-hero-grid">

            <div class="ldx-service-detail-hero-content">

                @if($service->category)

                    <div class="ldx-service-detail-eyebrow">
                        {{ $service->category->name }}
                    </div>

                @endif


                <h1 class="ldx-service-detail-title">
                    {{ $service->title }}
                </h1>


                @if($service->short_description)

                    <p class="ldx-service-detail-description">
                        {{ $service->short_description }}
                    </p>

                @endif


                <div class="ldx-service-detail-meta">

                    @if($service->publish_date)

                        <div class="ldx-service-detail-meta-item">

                            <span class="ldx-service-detail-meta-label">
                                เผยแพร่เมื่อ
                            </span>

                            <span class="ldx-service-detail-meta-value">
                                {{ \Carbon\Carbon::parse($service->publish_date)->format('F Y') }}
                            </span>

                        </div>

                    @endif

                </div>

            </div>


            {{-- HERO IMAGE --}}

            <div class="ldx-service-detail-hero-media">

                @php
                    $heroImage = $service->images->first();
                @endphp

                @if($heroImage)

                    <img
                        src="{{ asset('storage/' . $heroImage->path) }}"
                        alt="{{ $heroImage->alt ?? $service->title }}"
                    >

                @elseif($service->image)

                    <img
                        src="{{ asset('storage/' . $service->image) }}"
                        alt="{{ $service->title }}"
                    >

                @else

                    <div class="ldx-service-detail-placeholder">
                        <span>LDX</span>
                    </div>

                @endif

            </div>

        </div>

    </div>

</section>



{{-- =====================================================
    CONTENT
====================================================== --}}

<section class="ldx-service-detail-content-section">

    <div class="ldx-container">

        <div class="ldx-service-detail-layout">

            {{-- MAIN CONTENT --}}

            <article class="ldx-service-detail-content">

                <div class="ldx-service-detail-section-heading">

                    <span>01</span>

                    <h2>
                        ภาพรวมบริการ
                    </h2>

                </div>


                @if($service->content)

                    <div class="ldx-service-detail-rich-content">
                        {!! nl2br(e($service->content)) !!}
                    </div>

                @else

                    <p class="ldx-service-detail-empty-content">
                        ข้อมูลบริการจะพร้อมให้ดูเร็ว ๆ นี้
                    </p>

                @endif

            </article>



            {{-- SIDEBAR --}}

            <aside class="ldx-service-detail-sidebar">

                <div class="ldx-service-detail-info-card">

                    <div class="ldx-service-detail-info-heading">
                        ข้อมูลบริการ
                    </div>


                    @if($service->category)

                        <div class="ldx-service-detail-info-row">

                            <span>
                                หมวดหมู่
                            </span>

                            <strong>
                                {{ $service->category->name }}
                            </strong>

                        </div>

                    @endif


                    @if($service->publish_date)

                        <div class="ldx-service-detail-info-row">

                            <span>
                                เผยแพร่เมื่อ
                            </span>

                            <strong>
                                {{ \Carbon\Carbon::parse($service->publish_date)->format('d M Y') }}
                            </strong>

                        </div>

                    @endif


                    <div class="ldx-service-detail-info-row">

                        <span>
                            สถานะ
                        </span>

                        <strong class="ldx-service-detail-status">
                            พร้อมให้บริการ
                        </strong>

                    </div>

                </div>

            </aside>

        </div>

    </div>

</section>



{{-- =====================================================
    GALLERY
====================================================== --}}

@if($service->images->count() > 1)

    <section class="ldx-service-detail-gallery-section">

        <div class="ldx-container">

            <div class="ldx-service-detail-section-heading">

                <span>02</span>

                <h2>
                    แกลเลอรีบริการ
                </h2>

            </div>


            <div class="ldx-service-detail-gallery">

                @foreach($service->images as $image)

                    <a
                        href="{{ asset('storage/' . $image->path) }}"
                        class="ldx-service-detail-gallery-item"
                        target="_blank"
                        rel="noopener noreferrer"
                    >

                        <img
                            src="{{ asset('storage/' . $image->path) }}"
                            alt="{{ $image->alt ?? $service->title }}"
                            loading="lazy"
                        >

                    </a>

                @endforeach

            </div>

        </div>

    </section>

@endif



{{-- =====================================================
    CTA
====================================================== --}}

<section class="ldx-service-detail-cta">

    <div class="ldx-container">

        <div class="ldx-service-detail-cta-inner">

            <div>

                <span class="ldx-service-detail-cta-eyebrow">
                    เริ่มต้นโครงการของคุณ
                </span>

                <h2>
                    สนใจบริการนี้หรือไม่?
                </h2>

                <p>
                    พูดคุยกับทีมงาน LDX Elevator
                    เกี่ยวกับความต้องการด้านลิฟต์
                    และโครงการของคุณ
                </p>

            </div>


            <a
                href="{{ url('/quote') }}"
                class="ldx-service-detail-cta-button"
            >
                <span>
                    ขอใบเสนอราคา
                </span>

                <svg
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <path d="M5 12h13"></path>
                    <path d="m13 6 6 6-6 6"></path>
                </svg>

            </a>

        </div>

    </div>

</section>

</div>

@endsection
