
@extends('layouts.admin.app')

@section('title', 'Project Details')

@section('page-title', 'Project Details')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header ldx-page-header-actions">

        <div>

            <div class="ldx-breadcrumb">

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="ldx-breadcrumb-link"
                >
                    Projects
                </a>

                <span class="ldx-breadcrumb-separator">/</span>

                <span class="ldx-breadcrumb-current">
                    View
                </span>

            </div>

            <h1 class="ldx-page-title">
                {{ $project->title }}
            </h1>

        </div>


        <a
            href="{{ route('admin.projects.edit', $project) }}"
            class="ldx-button ldx-button-primary"
        >
            Edit Project
        </a>

    </div>


    {{-- Information --}}
    <div class="ldx-card">

        <div class="ldx-card-header">

            <h2 class="ldx-card-title">
                Project Information
            </h2>

        </div>


        <div class="ldx-card-body">

            <div class="ldx-info-grid">

                {{-- Category --}}
                <div class="ldx-info-item">

                    <p class="ldx-info-label">
                        Category
                    </p>

                    <p class="ldx-info-value">
                        {{ $project->category?->name ?? '-' }}
                    </p>

                </div>


                {{-- Status --}}
                <div class="ldx-info-item">

                    <p class="ldx-info-label">
                        Status
                    </p>

                    <div>

                        @if($project->is_active)

                            <span class="ldx-badge ldx-badge-success">
                                Active
                            </span>

                        @else

                            <span class="ldx-badge ldx-badge-muted">
                                Hidden
                            </span>

                        @endif

                    </div>

                </div>


                {{-- Client --}}
                <div class="ldx-info-item">

                    <p class="ldx-info-label">
                        Client
                    </p>

                    <p class="ldx-info-value">
                        {{ $project->client ?: '-' }}
                    </p>

                </div>


                {{-- Location --}}
                <div class="ldx-info-item">

                    <p class="ldx-info-label">
                        Location
                    </p>

                    <p class="ldx-info-value">
                        {{ $project->location ?: '-' }}
                    </p>

                </div>


                {{-- Project Date --}}
                <div class="ldx-info-item">

                    <p class="ldx-info-label">
                        Project Date
                    </p>

                    <p class="ldx-info-value">
                        {{ $project->project_date?->format('d/m/Y') ?? '-' }}
                    </p>

                </div>


                {{-- Slug --}}
                <div class="ldx-info-item">

                    <p class="ldx-info-label">
                        Slug
                    </p>

                    <p class="ldx-info-value">
                        {{ $project->slug }}
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- Short Description --}}
    @if($project->short_description)

        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Short Description
                </h2>

            </div>

            <div class="ldx-card-body">

                <div class="ldx-content-text">
                    {{ $project->short_description }}
                </div>

            </div>

        </div>

    @endif


    {{-- Content --}}
    @if($project->content)

        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Project Details
                </h2>

            </div>

            <div class="ldx-card-body">

                <div class="ldx-content-long">
                    {{ $project->content }}
                </div>

            </div>

        </div>

    @endif


    {{-- Images --}}
    <div class="ldx-card">

        <div class="ldx-card-header">

            <h2 class="ldx-card-title">
                Project Images
            </h2>

            <p class="ldx-card-description">
                {{ $project->images->count() }} Images
            </p>

        </div>


        <div class="ldx-card-body">

            @if($project->images->count())

                <div class="ldx-project-image-grid">

                    @foreach($project->images as $image)

                        <div class="ldx-project-image-card">

                            <div class="ldx-project-image-preview">

                                <img
                                    src="{{ Storage::url($image->path) }}"
                                    alt="{{ $image->alt ?: $project->title }}"
                                    class="ldx-project-image"
                                >

                            </div>


                            @if($image->alt)

                                <div class="ldx-project-image-info">

                                    <p class="ldx-project-image-alt">
                                        {{ $image->alt }}
                                    </p>

                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>

            @else

                <div class="ldx-empty ldx-empty-small">

                    <p class="ldx-empty-description">
                        ยังไม่มีรูปภาพ
                    </p>

                </div>

            @endif

        </div>

    </div>


    {{-- Back --}}
    <div>

        <a
            href="{{ route('admin.projects.index') }}"
            class="ldx-page-back"
        >
            ← Back to Projects
        </a>

    </div>

</div>

@endsection

