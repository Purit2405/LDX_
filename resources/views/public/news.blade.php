@extends('layouts.public.app')

@section('title', 'News & Insights | LDX Elevator')

@section('content')

<div class="ldx-public-news-page">

    {{-- =====================================================
        HERO
    ====================================================== --}}

    <section class="ldx-public-news-hero">

        <div class="ldx-container">

            <div class="ldx-public-news-hero-inner">

                <div>

                    <div class="ldx-public-news-eyebrow">
                        News & Insights
                    </div>

                    <h1 class="ldx-public-news-hero-title">
                        News That
                        <span>Moves Forward.</span>
                    </h1>

                    <p class="ldx-public-news-hero-description">
                        ติดตามข่าวสาร ความเคลื่อนไหว และเรื่องราว
                        จาก LDX Elevator รวมถึงข้อมูลด้านลิฟต์
                        เทคโนโลยี และโซลูชันสำหรับอาคารสมัยใหม่
                    </p>

                </div>


                <div class="ldx-public-news-hero-stat">

                    <span class="ldx-public-news-stat-label">
                        Published Articles
                    </span>

                    <span class="ldx-public-news-stat-number">
                        {{ $news->count() }}
                    </span>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
        CATEGORY FILTER
    ====================================================== --}}

    <section class="ldx-public-news-filter-section">

        <div class="ldx-container">

            <div class="ldx-public-news-filter">

                <a
                    href="{{ route('public.news') }}"
                    class="ldx-public-news-filter-link
                        {{ !$selectedCategory ? 'is-active' : '' }}"
                >
                    All News
                </a>


                @foreach($categories as $category)

                    <a
                        href="{{ route('public.news', ['category' => $category->slug]) }}"
                        class="ldx-public-news-filter-link
                            {{ $selectedCategory === $category->slug ? 'is-active' : '' }}"
                    >
                        {{ $category->name }}
                    </a>

                @endforeach

            </div>

        </div>

    </section>


    {{-- =====================================================
        NEWS LIST
    ====================================================== --}}

    <section class="ldx-public-news-section">

        <div class="ldx-container">

            <div class="ldx-public-news-section-header">

                <div>

                    <span class="ldx-public-news-section-eyebrow">
                        Latest Updates
                    </span>

                    <h2 class="ldx-public-news-section-title">

                        @if($currentCategory)
                            {{ $currentCategory->name }}
                        @else
                            Latest News
                        @endif

                    </h2>

                </div>


                <span class="ldx-public-news-section-count">
                    {{ $news->count() }}
                    {{ $news->count() === 1 ? 'Article' : 'Articles' }}
                </span>

            </div>


            @if($news->count())

                <div class="ldx-public-news-grid">

                    @foreach($news as $article)

                        @php
                            $newsImage = $article->images->first();
                        @endphp

                        <article class="ldx-public-news-card">

                            <a
                                href="{{ route('public.news.show', $article->slug) }}"
                                class="ldx-public-news-card-link"
                            >

                                {{-- Image --}}

                                <div class="ldx-public-news-card-image">

                                    @if($newsImage)

                                        <img
    src="{{ asset('storage/' . $newsImage->path) }}"
    alt="{{ $newsImage->alt ?? $article->title }}"
>

                                    @else

                                        <div class="ldx-public-news-card-placeholder">
                                            <span>LDX</span>
                                        </div>

                                    @endif


                                    <div class="ldx-public-news-card-overlay">

                                        <span class="ldx-public-news-card-number">
                                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </span>

                                        <span class="ldx-public-news-card-arrow">
                                            →
                                        </span>

                                    </div>

                                </div>


                                {{-- Content --}}

                                <div class="ldx-public-news-card-content">

                                    @if($article->category)

                                        <span class="ldx-public-news-card-category">
                                            {{ $article->category->name }}
                                        </span>

                                    @endif


                                    <h3 class="ldx-public-news-card-title">
                                        {{ $article->title }}
                                    </h3>


                                    @if($article->short_description)

                                        <p class="ldx-public-news-card-description">
                                            {{ $article->short_description }}
                                        </p>

                                    @endif


                                    <div class="ldx-public-news-card-meta">

                                        @if($article->published_at)

                                            <span>
                                                {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}
                                            </span>

                                        @endif

                                        <span>
                                            Read Article →
                                        </span>

                                    </div>

                                </div>

                            </a>

                        </article>

                    @endforeach

                </div>

            @else

                <div class="ldx-public-news-empty">

                    <span class="ldx-public-news-empty-label">
                        NEWS
                    </span>

                    <h3>
                        No news available
                    </h3>

                    <p>
                        ยังไม่มีข่าวสารในหมวดหมู่นี้
                    </p>

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
                    Work With LDX
                </span>

                <h2 class="ldx-public-news-cta-title">
                    Have a project
                    <br>
                    that needs to move?
                </h2>

                <p class="ldx-public-news-cta-description">
                    พูดคุยกับทีมงาน LDX Elevator
                    เพื่อหาโซลูชันที่เหมาะกับโครงการของคุณ
                </p>

                <a
                    href="{{ route('public.quote') }}"
                    class="ldx-public-news-cta-button"
                >
                    Request a Quote
                    <span>→</span>
                </a>

            </div>

        </div>

    </section>

</div>

@endsection