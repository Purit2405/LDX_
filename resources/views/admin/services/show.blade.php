
@extends('layouts.admin.app')

@section('title', 'Service Details')
@section('page-title', 'Service Details')

@section('content')

<div class="ldx-page ldx-page-extra-wide">

    {{-- Header --}}
    <div class="ldx-page-header ldx-page-header-row">

        <div>

            <div class="ldx-breadcrumb">

                <a
                    href="{{ route('admin.services.index') }}"
                    class="ldx-breadcrumb-link"
                >
                    Services
                </a>

                <span class="ldx-breadcrumb-separator">/</span>

                <span class="ldx-breadcrumb-current">
                    Details
                </span>

            </div>

            <h1 class="ldx-page-title">
                {{ $service->title }}
            </h1>

        </div>


        <div class="ldx-form-actions">

            <a
                href="{{ route('admin.services.edit', $service) }}"
                class="ldx-button ldx-button-primary"
            >
                Edit Service
            </a>

            <a
                href="{{ route('admin.services.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Back
            </a>

        </div>

    </div>


    {{-- Overview --}}
    <div class="ldx-details-layout">

        {{-- Main --}}
        <div class="ldx-details-main">

            {{-- Basic --}}
            <div class="ldx-card">

                <div class="ldx-card-header">

                    <h2 class="ldx-card-title">
                        Service Information
                    </h2>

                </div>


                <div class="ldx-card-body">

                    <dl class="ldx-info-list">

                        <div class="ldx-info-item">

                            <dt class="ldx-info-label">
                                Service Name
                            </dt>

                            <dd class="ldx-info-value ldx-info-value-primary">
                                {{ $service->title }}
                            </dd>

                        </div>


                        <div class="ldx-info-item">

                            <dt class="ldx-info-label">
                                Slug
                            </dt>

                            <dd class="ldx-info-value">
                                {{ $service->slug }}
                            </dd>

                        </div>


                        <div class="ldx-info-item">

                            <dt class="ldx-info-label">
                                Category
                            </dt>

                            <dd class="ldx-info-value">

                                @if($service->category)

                                    <span class="ldx-badge ldx-badge-muted">
                                        {{ $service->category->name }}
                                    </span>

                                @else

                                    <span class="ldx-table-secondary">
                                        No Category
                                    </span>

                                @endif

                            </dd>

                        </div>


                        <div class="ldx-info-item">

                            <dt class="ldx-info-label">
                                Publish Date
                            </dt>

                            <dd class="ldx-info-value">
                                {{ $service->publish_date?->format('d/m/Y') ?? '-' }}
                            </dd>

                        </div>

                    </dl>

                </div>

            </div>


            {{-- Description --}}
            <div class="ldx-card">

                <div class="ldx-card-header">

                    <h2 class="ldx-card-title">
                        Short Description
                    </h2>

                </div>

                <div class="ldx-card-body">

                    <p class="ldx-content-text">
                        {{ $service->short_description ?: 'ไม่มีคำอธิบายสั้น' }}
                    </p>

                </div>

            </div>


            {{-- Content --}}
            <div class="ldx-card">

                <div class="ldx-card-header">

                    <h2 class="ldx-card-title">
                        Service Details
                    </h2>

                </div>

                <div class="ldx-card-body">

                    <div class="ldx-content-text ldx-content-text-large">
                        {{ $service->content ?: 'ไม่มีรายละเอียด' }}
                    </div>

                </div>

            </div>

        </div>


        {{-- Sidebar --}}
        <div class="ldx-details-sidebar">

            {{-- Status --}}
            <div class="ldx-card">

                <div class="ldx-card-header">

                    <h2 class="ldx-card-title">
                        Status
                    </h2>

                </div>

                <div class="ldx-card-body">

                    @if($service->is_active)

                        <span class="ldx-badge ldx-badge-success ldx-badge-lg">
                            Active
                        </span>

                    @else

                        <span class="ldx-badge ldx-badge-muted ldx-badge-lg">
                            Hidden
                        </span>

                    @endif

                </div>

            </div>


            {{-- Images Count --}}
            <div class="ldx-card">

                <div class="ldx-card-header">

                    <h2 class="ldx-card-title">
                        Images
                    </h2>

                </div>

                <div class="ldx-card-body">

                    <p class="ldx-stat-value">
                        {{ $service->images->count() }}
                    </p>

                    <p class="ldx-stat-label">
                        รูปภาพทั้งหมด
                    </p>

                </div>

            </div>


            {{-- Dates --}}
            <div class="ldx-card">

                <div class="ldx-card-header">

                    <h2 class="ldx-card-title">
                        System Information
                    </h2>

                </div>

                <div class="ldx-card-body">

                    <dl class="ldx-info-list ldx-info-list-compact">

                        <div class="ldx-info-item">

                            <dt class="ldx-info-label">
                                Created
                            </dt>

                            <dd class="ldx-info-value">
                                {{ $service->created_at?->format('d/m/Y H:i') }}
                            </dd>

                        </div>


                        <div class="ldx-info-item">

                            <dt class="ldx-info-label">
                                Last Updated
                            </dt>

                            <dd class="ldx-info-value">
                                {{ $service->updated_at?->format('d/m/Y H:i') }}
                            </dd>

                        </div>

                    </dl>

                </div>

            </div>

        </div>

    </div>


    {{-- Gallery --}}
    <div class="ldx-card">

        <div class="ldx-card-header">

            <h2 class="ldx-card-title">
                Service Gallery
            </h2>

        </div>


        <div class="ldx-card-body">

            @if($service->images->count())

                <div class="ldx-service-gallery">

                    @foreach($service->images as $image)

                        <div class="ldx-service-gallery-item">

                            <img
                                src="{{ Storage::url($image->path) }}"
                                alt="{{ $image->alt ?: $service->title }}"
                                class="ldx-service-gallery-image"
                            >

                            <div class="ldx-service-gallery-info">

                                <p class="ldx-service-gallery-alt">
                                    {{ $image->alt ?: 'No alt text' }}
                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="ldx-empty-state">

                    <p class="ldx-empty-state-description">
                        ยังไม่มีรูปภาพ
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection

