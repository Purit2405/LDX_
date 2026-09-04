
@extends('layouts.admin.app')

@section('title', 'View News')

@section('page-title', 'View News')

@section('content')

<div class="ldx-page ldx-page-form">

    {{-- Header --}}
    <div class="ldx-page-header">

        <div class="ldx-breadcrumb">

            <a
                href="{{ route('admin.news.index') }}"
                class="ldx-breadcrumb-link"
            >
                News
            </a>

            <span class="ldx-breadcrumb-separator">/</span>

            <span class="ldx-breadcrumb-current">
                View
            </span>

        </div>


        <div class="ldx-page-header-actions">

            <div>

                <h1 class="ldx-page-title">
                    {{ $news->title }}
                </h1>

                <p class="ldx-page-description">
                    ดูรายละเอียดข่าวสาร
                </p>

            </div>


            <div class="ldx-actions">

                <a
                    href="{{ route('admin.news.edit', $news) }}"
                    class="ldx-button ldx-button-primary"
                >
                    Edit
                </a>


                <form
                    method="POST"
                    action="{{ route('admin.news.destroy', $news) }}"
                    onsubmit="return confirm('ยืนยันลบ News นี้? ข้อมูลและรูปภาพทั้งหมดจะถูกลบถาวร')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="ldx-button ldx-button-danger"
                    >
                        Delete
                    </button>

                </form>

            </div>

        </div>

    </div>


    {{-- News Information --}}
    <div class="ldx-card">

        <div class="ldx-card-header ldx-card-header-actions">

            <h2 class="ldx-card-title">
                News Information
            </h2>


            @if($news->is_active)

                <span class="ldx-badge ldx-badge-success">
                    Active
                </span>

            @else

                <span class="ldx-badge ldx-badge-muted">
                    Hidden
                </span>

            @endif

        </div>


        <div class="ldx-card-body">

            <div class="ldx-info-grid">

                {{-- Category --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        Category
                    </div>

                    <div class="ldx-info-value">

                        @if($news->category)

                            {{ $news->category->name }}

                        @else

                            <span class="ldx-muted">
                                No Category
                            </span>

                        @endif

                    </div>

                </div>


                {{-- Slug --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        Slug
                    </div>

                    <div class="ldx-info-value ldx-info-break">
                        {{ $news->slug }}
                    </div>

                </div>


                {{-- Published --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        Published Date
                    </div>

                    <div class="ldx-info-value">

                        @if($news->published_at)

                            {{ $news->published_at->format('d/m/Y H:i') }}

                        @else

                            <span class="ldx-muted">
                                Not published
                            </span>

                        @endif

                    </div>

                </div>


                {{-- Created --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        Created At
                    </div>

                    <div class="ldx-info-value">
                        {{ $news->created_at->format('d/m/Y H:i') }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Short Description --}}
    <div class="ldx-card">

        <div class="ldx-card-header">

            <h2 class="ldx-card-title">
                Short Description
            </h2>

        </div>


        <div class="ldx-card-body">

            @if($news->short_description)

                <p class="ldx-content-text">
                    {{ $news->short_description }}
                </p>

            @else

                <p class="ldx-muted">
                    ไม่มีคำอธิบายสั้น
                </p>

            @endif

        </div>

    </div>


    {{-- Content --}}
    <div class="ldx-card">

        <div class="ldx-card-header">

            <h2 class="ldx-card-title">
                News Content
            </h2>

        </div>


        <div class="ldx-card-body">

            @if($news->content)

                <div class="ldx-content-text ldx-content-long">
                    {{ $news->content }}
                </div>

            @else

                <p class="ldx-muted">
                    ไม่มีเนื้อหา
                </p>

            @endif

        </div>

    </div>


    {{-- Images --}}
    <div class="ldx-card">

        <div class="ldx-card-header ldx-card-header-actions">

            <div>

                <h2 class="ldx-card-title">
                    News Images
                </h2>

                <p class="ldx-card-description">
                    รูปภาพทั้งหมดของ News
                </p>

            </div>


            <span class="ldx-badge ldx-badge-muted">
                {{ $news->images->count() }} Images
            </span>

        </div>


        <div class="ldx-card-body">

            @if($news->images->count())

                <div class="ldx-news-image-grid ldx-news-image-grid-view">

                    @foreach($news->images as $image)

                        <div class="ldx-news-image-card">

                            <a
                                href="{{ Storage::url($image->path) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="ldx-news-image-preview"
                            >

                                <img
                                    src="{{ Storage::url($image->path) }}"
                                    alt="{{ $image->alt ?: $news->title }}"
                                >

                            </a>


                            <div class="ldx-news-image-info">

                                <p class="ldx-news-image-alt">
                                    {{ $image->alt ?: 'No alt text' }}
                                </p>

                                <p class="ldx-help">
                                    Click image to view full size
                                </p>

                            </div>

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


    {{-- Bottom Actions --}}
    <div class="ldx-form-actions ldx-form-actions-between">

        <a
            href="{{ route('admin.news.index') }}"
            class="ldx-button ldx-button-secondary"
        >
            ← Back to News
        </a>


        <a
            href="{{ route('admin.news.edit', $news) }}"
            class="ldx-button ldx-button-primary"
        >
            Edit News
        </a>

    </div>

</div>

@endsection

