@extends('layouts.public.app')

@section('title', $article->title . ' | LDX Elevator')

@section('content')

<div class="ldx-public-news-detail-page">

    {{-- =====================================================
        HERO
    ====================================================== --}}

    <section class="ldx-public-news-detail-hero">

        <div class="ldx-container">

            <div class="ldx-public-news-detail-breadcrumb">

                <a href="{{ route('home') }}">
                    Home
                </a>

                <span>/</span>

                <a href="{{ route('public.news') }}">
                    News
                </a>

                <span>/</span>

                <span>
                    {{ $article->title }}
                </span>

            </div>


            @if($article->category)

                <div class="ldx-public-news-detail-category">
                    {{ $article->category->name }}
                </div>

            @endif


            <h1 class="ldx-public-news-detail-title">
                {{ $article->title }}
            </h1>


            @if($article->short_description)

                <p class="ldx-public-news-detail-description">
                    {{ $article->short_description }}
                </p>

            @endif


            @if($article->published_at)

                <div class="ldx-public-news-detail-date">

                    Published
                    {{ \Carbon\Carbon::parse($article->published_at)->format('d F Y') }}

                </div>

            @endif

        </div>

    </section>


    {{-- =====================================================
        ARTICLE
    ====================================================== --}}

    <section class="ldx-public-news-detail-main">

        <div class="ldx-container">

            @php
                $featuredImage = $article->images->first();
            @endphp


            @if($featuredImage)

                <div class="ldx-public-news-detail-featured">

                    <img
    src="{{ asset('storage/' . $featuredImage->path) }}"
    alt="{{ $featuredImage->alt ?? $article->title }}"
>

                </div>

            @endif


            <div class="ldx-public-news-detail-layout">

                {{-- Content --}}

                <article class="ldx-public-news-detail-content">

                    <div class="ldx-public-news-detail-content-eyebrow">
                        Article
                    </div>

                    <div class="ldx-public-news-detail-content-text">
                        {!! nl2br(e($article->content)) !!}
                    </div>

                </article>


                {{-- Sidebar --}}

                <aside class="ldx-public-news-detail-sidebar">

                    <div class="ldx-public-news-detail-info">

                        <h2>
                            Article Information
                        </h2>


                        @if($article->category)

                            <div class="ldx-public-news-detail-info-item">

                                <span>
                                    Category
                                </span>

                                <strong>
                                    {{ $article->category->name }}
                                </strong>

                            </div>

                        @endif


                        @if($article->published_at)

                            <div class="ldx-public-news-detail-info-item">

                                <span>
                                    Published
                                </span>

                                <strong>
                                    {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}
                                </strong>

                            </div>

                        @endif


                        <div class="ldx-public-news-detail-info-item">

                            <span>
                                Status
                            </span>

                            <strong>
                                Published
                            </strong>

                        </div>

                    </div>

                </aside>

            </div>


            {{-- =================================================
                Gallery
            ================================================== --}}

            @if($article->images->count() > 1)

                <div class="ldx-public-news-detail-gallery">

                    <div class="ldx-public-news-detail-gallery-header">

                        <span>
                            Gallery
                        </span>

                        <h2>
                            More From This Story
                        </h2>

                    </div>


                    <div class="ldx-public-news-detail-gallery-grid">

                        @foreach($article->images->skip(1) as $image)

                            <a
                                href="{{ asset('storage/' . $image->path) }}"
                                target="_blank"
                                class="ldx-public-news-detail-gallery-item"
                            >

                                <img
                                    src="{{ asset('storage/' . $image->path) }}"
                                    alt="{{ $article->title }}"
                                >

                            </a>

                        @endforeach

                    </div>

                </div>

            @endif


            {{-- =================================================
                Related News
            ================================================== --}}

            @if($relatedNews->count())

                <div class="ldx-public-related-news">

                    <div class="ldx-public-related-news-header">

                        <div>

                            <span>
                                Keep Exploring
                            </span>

                            <h2>
                                Related News
                            </h2>

                        </div>

                        <a href="{{ route('public.news') }}">
                            View All News →
                        </a>

                    </div>


                    <div class="ldx-public-related-news-grid">

                        @foreach($relatedNews as $related)

                            @php
                                $relatedImage = $related->images->first();
                            @endphp

                            <article class="ldx-public-related-news-card">

                                <a
                                    href="{{ route('public.news.show', $related->slug) }}"
                                >

                                    <div class="ldx-public-related-news-image">

                                        @if($relatedImage)

                                            <img
    src="{{ asset('storage/' . $relatedImage->path) }}"
    alt="{{ $relatedImage->alt ?? $related->title }}"
>

                                        @else

                                            <div class="ldx-public-news-card-placeholder">
                                                <span>LDX</span>
                                            </div>

                                        @endif

                                    </div>


                                    <div class="ldx-public-related-news-content">

                                        @if($related->category)

                                            <span>
                                                {{ $related->category->name }}
                                            </span>

                                        @endif

                                        <h3>
                                            {{ $related->title }}
                                        </h3>

                                        <small>
                                            Read Article →
                                        </small>

                                    </div>

                                </a>

                            </article>

                        @endforeach

                    </div>

                </div>

            @endif

        </div>

    </section>


    {{-- =====================================================
        CTA
    ====================================================== --}}

    <section class="ldx-public-news-cta">

        <div class="ldx-container">

            <div class="ldx-public-news-cta-inner">

                <span class="ldx-public-news-cta-eyebrow">
                    Let's Work Together
                </span>

                <h2 class="ldx-public-news-cta-title">
                    Ready to move
                    <br>
                    your project forward?
                </h2>

                <p class="ldx-public-news-cta-description">
                    ติดต่อทีมงาน LDX Elevator
                    เพื่อพูดคุยเกี่ยวกับโครงการของคุณ
                </p>

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