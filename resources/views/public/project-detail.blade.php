@extends('layouts.public.app')

@section('title', $project->title . ' | LDX Elevator')

@section('content')

<div class="ldx-project-detail">

    {{-- =====================================================
        HERO
    ====================================================== --}}

    <section class="ldx-project-detail-hero">

        <div class="ldx-container">

            <div class="ldx-project-detail-breadcrumb">

                <a href="{{ route('public.projects') }}">
                    Projects
                </a>

                <span>/</span>

                <span>
                    {{ $project->title }}
                </span>

            </div>


            <div class="ldx-project-detail-heading">

                @if($project->category)

                    <span class="ldx-project-detail-eyebrow">
                        {{ $project->category->name }}
                    </span>

                @endif


                <h1>
                    {{ $project->title }}
                </h1>


                @if($project->short_description)

                    <p>
                        {{ $project->short_description }}
                    </p>

                @endif

            </div>

        </div>

    </section>



    {{-- =====================================================
        MAIN IMAGE
    ====================================================== --}}

    @php
        $heroImage = $project->images->first();
    @endphp


    @if($heroImage)

        <section class="ldx-project-detail-main-image">

            <div class="ldx-container">

                <div class="ldx-project-detail-image">

                    <img
    src="{{ asset('storage/' . $heroImage->path) }}"
    alt="{{ $heroImage->alt ?? $project->title }}"
>

                </div>

            </div>

        </section>

    @endif



    {{-- =====================================================
        PROJECT INFORMATION
    ====================================================== --}}

    <section class="ldx-project-detail-information">

        <div class="ldx-container">

            <div class="ldx-project-detail-grid">

                {{-- CONTENT --}}

                <article class="ldx-project-detail-content">

                    <div class="ldx-project-detail-section-heading">

                        <span>01</span>

                        <h2>
                            Project Overview
                        </h2>

                    </div>


                    @if($project->content)

                        <div class="ldx-project-detail-rich-content">
                            {!! nl2br(e($project->content)) !!}
                        </div>

                    @else

                        <p>
                            Project details will be available soon.
                        </p>

                    @endif

                </article>



                {{-- INFO --}}

                <aside>

                    <div class="ldx-project-detail-info-card">

                        <div class="ldx-project-detail-info-title">
                            Project Information
                        </div>


                        @if($project->client)

                            <div class="ldx-project-detail-info-row">

                                <span>
                                    Client
                                </span>

                                <strong>
                                    {{ $project->client }}
                                </strong>

                            </div>

                        @endif


                        @if($project->location)

                            <div class="ldx-project-detail-info-row">

                                <span>
                                    Location
                                </span>

                                <strong>
                                    {{ $project->location }}
                                </strong>

                            </div>

                        @endif


                        @if($project->category)

                            <div class="ldx-project-detail-info-row">

                                <span>
                                    Category
                                </span>

                                <strong>
                                    {{ $project->category->name }}
                                </strong>

                            </div>

                        @endif


                        @if($project->project_date)

                            <div class="ldx-project-detail-info-row">

                                <span>
                                    Project Date
                                </span>

                                <strong>
                                    {{ \Carbon\Carbon::parse($project->project_date)->format('d M Y') }}
                                </strong>

                            </div>

                        @endif

                    </div>

                </aside>

            </div>

        </div>

    </section>



    {{-- =====================================================
        GALLERY
    ====================================================== --}}

    @if($project->images->count() > 1)

        <section class="ldx-project-detail-gallery">

            <div class="ldx-container">

                <div class="ldx-project-detail-section-heading">

                    <span>02</span>

                    <h2>
                        Project Gallery
                    </h2>

                </div>


                <div class="ldx-project-detail-gallery-grid">

                    @foreach($project->images as $image)

                        <a
                            href="{{ asset('storage/' . $image->path) }}"
                            target="_blank"
                            class="ldx-project-detail-gallery-item"
                        >

                            <img
                                src="{{ asset('storage/' . $image->path) }}"
                                alt="{{ $project->title }}"
                            >

                            <span>
                                View Image
                            </span>

                        </a>

                    @endforeach

                </div>

            </div>

        </section>

    @endif



    {{-- =====================================================
        CTA
    ====================================================== --}}

    <section class="ldx-project-detail-cta">

        <div class="ldx-container">

            <div class="ldx-project-detail-cta-inner">

                <div>

                    <span>
                        START YOUR PROJECT
                    </span>

                    <h2>
                        Have a similar project?
                    </h2>

                    <p>
                        Let our team help bring your project
                        to life.
                    </p>

                </div>


                <a href="{{ route('public.quote') }}">
    Request a Quote

    <svg viewBox="0 0 24 24" aria-hidden="true">
        <path d="M5 12h13"></path>
        <path d="m13 6 6 6-6 6"></path>
    </svg>
</a>

            </div>

        </div>

    </section>

</div>

@endsection