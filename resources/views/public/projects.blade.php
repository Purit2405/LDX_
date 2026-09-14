
@extends('layouts.public.app')

@section('title', 'โครงการ | LDX Elevator')

@section('content')

<div class="ldx-projects-page">

    {{-- =====================================================
        HERO
    ====================================================== --}}

    <section class="ldx-projects-hero">

        <div class="ldx-container">

            <div class="ldx-projects-hero-inner">

                <div class="ldx-projects-hero-content">

                    <span class="ldx-projects-eyebrow">
                        โครงการของเรา
                    </span>

                    <h1 class="ldx-projects-hero-title">
                        โครงการที่
                        <span>ขับเคลื่อนผู้คน</span>
                    </h1>

                    <p class="ldx-projects-hero-description">
                        สำรวจผลงานด้านลิฟต์และระบบขนส่งแนวดิ่ง
                        ที่ LDX Elevator ได้ส่งมอบให้กับอาคาร
                        ธุรกิจ และชุมชนในหลากหลายรูปแบบ
                    </p>

                </div>


                {{-- จำนวนโครงการ --}}

                <div class="ldx-projects-hero-stat">

                    <span class="ldx-projects-hero-stat-label">
                        จำนวนโครงการ
                    </span>

                    <span class="ldx-projects-hero-stat-number">
                        {{ $projects->count() }}
                    </span>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
        CATEGORY FILTER
    ====================================================== --}}

    <section class="ldx-projects-filter-section">

        <div class="ldx-container">

            <div class="ldx-projects-filter">

                {{-- ทุกโครงการ --}}

                <a
                    href="{{ route('public.projects') }}"
                    class="ldx-projects-filter-link {{ !$selectedCategory ? 'is-active' : '' }}"
                >
                    ทุกโครงการ
                </a>


                {{-- หมวดหมู่ --}}

                @foreach($categories as $category)

                    <a
                        href="{{ route('public.projects', ['category' => $category->slug]) }}"
                        class="ldx-projects-filter-link {{ $selectedCategory === $category->slug ? 'is-active' : '' }}"
                    >
                        {{ $category->name }}
                    </a>

                @endforeach

            </div>

        </div>

    </section>


    {{-- =====================================================
        PROJECTS
    ====================================================== --}}

    <section class="ldx-projects-section">

        <div class="ldx-container">

            {{-- Section Header --}}

            <div class="ldx-projects-section-header">

                <div>

                    <span class="ldx-projects-section-eyebrow">

                        @if($currentCategory)
                            {{ $currentCategory->name }}
                        @else
                            โครงการของเรา
                        @endif

                    </span>

                    <h2 class="ldx-projects-section-title">

                        @if($currentCategory)
                            {{ $currentCategory->name }}
                        @else
                            ผลงานโครงการของเรา
                        @endif

                    </h2>

                </div>


                <span class="ldx-projects-section-count">

                    {{ $projects->count() }}

                    โครงการ

                </span>

            </div>


            {{-- =================================================
                PROJECT LIST
            ================================================== --}}

            @if($projects->count())

                <div class="ldx-projects-grid">

                    @foreach($projects as $project)

                        @php
                            $projectImage = $project->images->first();
                        @endphp


                        <article class="ldx-project-card">

                            <a
                                href="{{ route('public.projects.show', $project->slug) }}"
                                class="ldx-project-card-link"
                                aria-label="ดูรายละเอียดโครงการ {{ $project->title }}"
                            >

                                {{-- =================================
                                    IMAGE
                                ================================== --}}

                                <div class="ldx-project-card-image">

                                    @if($projectImage)

                                        <img
                                            src="{{ asset('storage/' . $projectImage->path) }}"
                                            alt="{{ $projectImage->alt ?? $project->title }}"
                                            loading="lazy"
                                        >

                                    @else

                                        <div class="ldx-project-card-placeholder">

                                            <span>
                                                LDX
                                            </span>

                                        </div>

                                    @endif


                                    {{-- Image Overlay --}}

                                    <div class="ldx-project-card-overlay">

                                        <span class="ldx-project-card-number">
                                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </span>


                                        <span
                                            class="ldx-project-card-arrow"
                                            aria-hidden="true"
                                        >
                                            →
                                        </span>

                                    </div>

                                </div>


                                {{-- =================================
                                    CONTENT
                                ================================== --}}

                                <div class="ldx-project-card-content">

                                    {{-- Category --}}

                                    @if($project->category)

                                        <span class="ldx-project-card-category">
                                            {{ $project->category->name }}
                                        </span>

                                    @endif


                                    {{-- Title --}}

                                    <h3 class="ldx-project-card-title">
                                        {{ $project->title }}
                                    </h3>


                                    {{-- Description --}}

                                    @if($project->short_description)

                                        <p class="ldx-project-card-description">
                                            {{ $project->short_description }}
                                        </p>

                                    @elseif($project->location)

                                        <p class="ldx-project-card-description">
                                            {{ $project->location }}
                                        </p>

                                    @endif


                                    {{-- Meta --}}

                                    @if($project->client || $project->project_date)

                                        <div class="ldx-project-card-meta">

                                            @if($project->client)

                                                <span class="ldx-project-card-meta-item">
                                                    ลูกค้า: {{ $project->client }}
                                                </span>

                                            @endif


                                            @if($project->project_date)

                                                <span class="ldx-project-card-meta-item">
                                                    {{ \Carbon\Carbon::parse($project->project_date)->format('Y') }}
                                                </span>

                                            @endif

                                        </div>

                                    @endif

                                </div>

                            </a>

                        </article>

                    @endforeach

                </div>


            {{-- =================================================
                EMPTY STATE
            ================================================== --}}

            @else

                <div class="ldx-projects-empty">

                    <h3 class="ldx-projects-empty-title">
                        ไม่พบโครงการ
                    </h3>

                    <p class="ldx-projects-empty-description">
                        ขณะนี้ยังไม่มีโครงการในหมวดหมู่นี้
                    </p>


                    @if($selectedCategory)

                        <a
                            href="{{ route('public.projects') }}"
                            class="ldx-projects-empty-link"
                        >
                            ดูโครงการทั้งหมด
                        </a>

                    @endif

                </div>

            @endif

        </div>

    </section>



    {{-- =====================================================
        CTA
    ====================================================== --}}

    <section class="ldx-projects-cta">

        <div class="ldx-container">

            <div class="ldx-projects-cta-inner">

                <div>

                    <span class="ldx-projects-cta-eyebrow">
                        มีโครงการอยู่ในใจหรือไม่?
                    </span>

                    <h2 class="ldx-projects-cta-title">
                        มาสร้างโครงการ
                        <br>
                        ที่ขับเคลื่อนไปด้วยกัน
                    </h2>

                    <p class="ldx-projects-cta-description">
                        พูดคุยกับทีมงานของเราเกี่ยวกับโครงการลิฟต์
                        หรือระบบขนส่งแนวดิ่งที่คุณกำลังวางแผน
                    </p>

                </div>


                {{-- CTA Button --}}

                <a
                    href="{{ route('public.quote') }}"
                    class="ldx-projects-cta-button"
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
