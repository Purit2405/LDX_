@extends('layouts.public.app')

@section('title', 'Projects | LDX Elevator')

@section('content')

<div class="ldx-projects-page">

    {{-- =====================================================
        HERO
    ====================================================== --}}

    <section class="ldx-projects-hero">

        <div class="ldx-container">

            <div class="ldx-projects-hero-grid">

                <div class="ldx-projects-hero-content">

                    <span class="ldx-projects-eyebrow">
                        OUR PROJECTS
                    </span>

                    <h1 class="ldx-projects-title">
                        Projects That
                        <span>Move People.</span>
                    </h1>

                    <p class="ldx-projects-description">
                        Explore our elevator and vertical transportation
                        projects delivered for buildings, businesses,
                        and communities.
                    </p>

                </div>


                <div class="ldx-projects-hero-number">

                    <span>
                        PROJECTS
                    </span>

                    <strong>
                        {{ $projects->count() }}
                    </strong>

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

                <a
                    href="{{ route('public.projects') }}"
                    class="
                        ldx-projects-filter-item
                        {{ !$selectedCategory ? 'is-active' : '' }}
                    "
                >
                    All Projects
                </a>


                @foreach($categories as $category)

                    <a
                        href="{{ route('public.projects', ['category' => $category->slug]) }}"
                        class="
                            ldx-projects-filter-item
                            {{ $selectedCategory === $category->slug ? 'is-active' : '' }}
                        "
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

    <section class="ldx-projects-content">

        <div class="ldx-container">

            <div class="ldx-projects-section-header">

                <div>

                    <span class="ldx-projects-section-eyebrow">
                        {{ $currentCategory?->name ?? 'ALL PROJECTS' }}
                    </span>

                    <h2>
                        {{ $currentCategory?->name ?? 'Featured Projects' }}
                    </h2>

                </div>


                <span class="ldx-projects-result-count">
                    {{ $projects->count() }}
                    {{ $projects->count() === 1 ? 'Project' : 'Projects' }}
                </span>

            </div>



            @if($projects->count())

                <div class="ldx-projects-grid">

                    @foreach($projects as $project)

                        @php
                            $projectImage = $project->images->first();
                        @endphp

                        <a
                            href="{{ route('public.projects.show', $project->slug) }}"
                            class="ldx-project-card"
                        >

                            {{-- IMAGE --}}

                            <div class="ldx-project-card-media">

                                @if($projectImage)

                                    <img
                                        src="{{ asset('storage/' . $projectImage->path) }}"
                                        alt="{{ $projectImage->alt ?? $project->title }}"
                                        loading="lazy"
                                    >

                                @else

                                    <div class="ldx-project-card-placeholder">
                                        <span>LDX</span>
                                    </div>

                                @endif


                                <div class="ldx-project-card-overlay"></div>


                                <span class="ldx-project-card-number">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>


                                <span class="ldx-project-card-arrow">
                                    →
                                </span>

                            </div>


                            {{-- CONTENT --}}

                            <div class="ldx-project-card-content">

                                @if($project->category)

                                    <span class="ldx-project-card-category">
                                        {{ $project->category->name }}
                                    </span>

                                @endif


                                <h3>
                                    {{ $project->title }}
                                </h3>


                                @if($project->short_description)

                                    <p>
                                        {{ $project->short_description }}
                                    </p>

                                @elseif($project->location)

                                    <p>
                                        {{ $project->location }}
                                    </p>

                                @endif


                                <div class="ldx-project-card-meta">

                                    @if($project->client)

                                        <span>
                                            {{ $project->client }}
                                        </span>

                                    @endif

                                    @if($project->project_date)

                                        <span>
                                            {{ \Carbon\Carbon::parse($project->project_date)->format('Y') }}
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                <div class="ldx-projects-empty">

                    <div class="ldx-projects-empty-icon">
                        —
                    </div>

                    <h3>
                        No Projects Found
                    </h3>

                    <p>
                        There are currently no projects in this category.
                    </p>


                    @if($selectedCategory)

                        <a
                            href="{{ route('public.projects') }}"
                            class="ldx-projects-empty-link"
                        >
                            View All Projects
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
                        HAVE A PROJECT IN MIND?
                    </span>

                    <h2>
                        Let's build something
                        that moves.
                    </h2>

                    <p>
                        Talk to our team about your elevator
                        or vertical transportation project.
                    </p>

                </div>


                <a
                    href="{{ route('public.quote') }}"
                    class="ldx-projects-cta-button"
                >
                    <span>Request a Quote</span>

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