@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')

<div class="ldx-dashboard">

    {{-- =========================================================
        Dashboard Header
    ========================================================== --}}

    <div class="ldx-dashboard-header">

        <div>

            <div class="ldx-dashboard-status">

                <span class="ldx-status-dot ldx-status-dot-online"></span>

                <span class="ldx-dashboard-status-label">
                    Administration
                </span>

            </div>

            <h1 class="ldx-page-title">
                Dashboard
            </h1>

            <p class="ldx-page-description">
                ภาพรวมการจัดการเว็บไซต์ LDX Elevator
            </p>

        </div>


        <div class="ldx-dashboard-date">

            <div class="ldx-dashboard-date-card">

                <p class="ldx-dashboard-date-label">
                    วันนี้
                </p>

                <p class="ldx-dashboard-date-value">
                    {{ now()->format('d/m/Y') }}
                </p>

            </div>

            <div class="ldx-dashboard-date-card">

                <p class="ldx-dashboard-date-label">
                    เวลา
                </p>

                <p class="ldx-dashboard-date-value">
                    {{ now()->format('H:i') }} น.
                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
        Welcome Card
    ========================================================== --}}

    <div class="ldx-welcome-card">

        {{-- Decorative background --}}

        <div class="ldx-welcome-decoration ldx-welcome-decoration-top"></div>

        <div class="ldx-welcome-decoration ldx-welcome-decoration-bottom"></div>


        <div class="ldx-welcome-content">

            <div>

                <p class="ldx-welcome-label">
                    Welcome back
                </p>

                <h2 class="ldx-welcome-title">
                    {{ auth()->user()->name }}
                </h2>

                <p class="ldx-welcome-description">
                    จัดการและดูแลข้อมูลเว็บไซต์ LDX Elevator
                    ได้จากหน้า Dashboard นี้
                </p>

            </div>


            <a
                href="{{ route('admin.quote-requests.index') }}"
                class="ldx-button ldx-button-light ldx-welcome-action"
            >

                <svg
                    class="ldx-icon ldx-icon-sm"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 10h8M8 14h5m-9 5l-1 3 3-1h10a5 5 0 005-5V8a5 5 0 00-5-5H7a5 5 0 00-5 5v6a5 5 0 005 5h2"
                    />
                </svg>

                ดูคำขอใบเสนอราคา

            </a>

        </div>

    </div>


    {{-- =========================================================
        KPI Statistics
    ========================================================== --}}

    <div class="ldx-kpi-grid">


        {{-- Services --}}

        <a
            href="{{ route('admin.services.index') }}"
            class="ldx-kpi-card"
        >

            <div class="ldx-kpi-card-header">

                <div>

                    <p class="ldx-kpi-label">
                        Services
                    </p>

                    <p class="ldx-kpi-value">
                        {{ number_format($servicesCount) }}
                    </p>

                </div>


                <div class="ldx-kpi-icon">

                    <svg
                        class="ldx-icon"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M12 4v16m8-8H4"
                        />
                    </svg>

                </div>

            </div>

            <div class="ldx-kpi-footer">

                <span class="ldx-kpi-meta">
                    บริการทั้งหมด
                </span>

                <span class="ldx-kpi-link">
                    ดูข้อมูล →
                </span>

            </div>

        </a>


        {{-- Projects --}}

        <a
            href="{{ route('admin.projects.index') }}"
            class="ldx-kpi-card"
        >

            <div class="ldx-kpi-card-header">

                <div>

                    <p class="ldx-kpi-label">
                        Projects
                    </p>

                    <p class="ldx-kpi-value">
                        {{ number_format($projectsCount) }}
                    </p>

                </div>


                <div class="ldx-kpi-icon">

                    <svg
                        class="ldx-icon"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3 7h18M3 7l2 13h14l2-13"
                        />
                    </svg>

                </div>

            </div>

            <div class="ldx-kpi-footer">

                <span class="ldx-kpi-meta">
                    ผลงานทั้งหมด
                </span>

                <span class="ldx-kpi-link">
                    ดูข้อมูล →
                </span>

            </div>

        </a>


        {{-- News --}}

        <a
            href="{{ route('admin.news.index') }}"
            class="ldx-kpi-card"
        >

            <div class="ldx-kpi-card-header">

                <div>

                    <p class="ldx-kpi-label">
                        News
                    </p>

                    <p class="ldx-kpi-value">
                        {{ number_format($newsCount) }}
                    </p>

                </div>


                <div class="ldx-kpi-icon">

                    <svg
                        class="ldx-icon"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M6 4h12a2 2 0 012 2v14l-4-2-4 2-4-2-4 2V6a2 2 0 012-2z"
                        />
                    </svg>

                </div>

            </div>

            <div class="ldx-kpi-footer">

                <span class="ldx-kpi-meta">
                    ข่าวทั้งหมด
                </span>

                <span class="ldx-kpi-link">
                    ดูข้อมูล →
                </span>

            </div>

        </a>


        {{-- Quote Requests --}}

        <a
            href="{{ route('admin.quote-requests.index') }}"
            class="ldx-kpi-card"
        >

            <div class="ldx-kpi-card-header">

                <div>

                    <p class="ldx-kpi-label">
                        Quote Requests
                    </p>

                    <p class="ldx-kpi-value">
                        {{ number_format($quoteRequestsCount) }}
                    </p>

                </div>


                <div class="ldx-kpi-icon">

                    <svg
                        class="ldx-icon"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M21 11.5a8.38 8.38 0 01-.9 3.8A8.5 8.5 0 1112.5 3a8.38 8.38 0 018.5 8.5z"
                        />
                    </svg>

                </div>

            </div>

            <div class="ldx-kpi-footer">

                <span class="ldx-kpi-meta">
                    คำขอทั้งหมด
                </span>

                @if($pendingQuotes > 0)

                    <span class="ldx-kpi-pending">
                        {{ $pendingQuotes }} รายการรอดำเนินการ
                    </span>

                @else

                    <span class="ldx-kpi-meta">
                        ไม่มีรายการรอ
                    </span>

                @endif

            </div>

        </a>

    </div>


    {{-- =========================================================
        Quote Request Section
    ========================================================== --}}

    <div class="ldx-section-card">

        <div class="ldx-section-header">

            <div>

                <h2 class="ldx-section-title">
                    Quote Requests
                </h2>

                <p class="ldx-section-description">
                    สถานะคำขอใบเสนอราคาจากลูกค้า
                </p>

            </div>

            <a
                href="{{ route('admin.quote-requests.index') }}"
                class="ldx-section-link"
            >
                จัดการคำขอทั้งหมด →
            </a>

        </div>


        <div class="ldx-status-grid">


            {{-- Pending --}}

            <div class="ldx-status-card ldx-status-card-pending">

                <div class="ldx-status-card-header">

                    <span class="ldx-status-card-label">
                        Pending
                    </span>

                    <span class="ldx-status-dot ldx-status-dot-pending"></span>

                </div>

                <p class="ldx-status-card-value">
                    {{ number_format($pendingQuotes) }}
                </p>

                <p class="ldx-status-card-description">
                    รอติดต่อ
                </p>

            </div>


            {{-- Contacted --}}

            <div class="ldx-status-card ldx-status-card-contacted">

                <div class="ldx-status-card-header">

                    <span class="ldx-status-card-label">
                        Contacted
                    </span>

                    <span class="ldx-status-dot ldx-status-dot-contacted"></span>

                </div>

                <p class="ldx-status-card-value">
                    {{ number_format($contactedQuotes) }}
                </p>

                <p class="ldx-status-card-description">
                    ติดต่อแล้ว
                </p>

            </div>


            {{-- Quoted --}}

            <div class="ldx-status-card ldx-status-card-quoted">

                <div class="ldx-status-card-header">

                    <span class="ldx-status-card-label">
                        Quoted
                    </span>

                    <span class="ldx-status-dot ldx-status-dot-quoted"></span>

                </div>

                <p class="ldx-status-card-value">
                    {{ number_format($quotedQuotes) }}
                </p>

                <p class="ldx-status-card-description">
                    ส่งใบเสนอราคาแล้ว
                </p>

            </div>


            {{-- Completed --}}

            <div class="ldx-status-card ldx-status-card-completed">

                <div class="ldx-status-card-header">

                    <span class="ldx-status-card-label">
                        Completed
                    </span>

                    <span class="ldx-status-dot ldx-status-dot-completed"></span>

                </div>

                <p class="ldx-status-card-value">
                    {{ number_format($completedQuotes) }}
                </p>

                <p class="ldx-status-card-description">
                    ดำเนินการเสร็จสิ้น
                </p>

            </div>


            {{-- Cancelled --}}

            <div class="ldx-status-card ldx-status-card-cancelled">

                <div class="ldx-status-card-header">

                    <span class="ldx-status-card-label">
                        Cancelled
                    </span>

                    <span class="ldx-status-dot ldx-status-dot-cancelled"></span>

                </div>

                <p class="ldx-status-card-value">
                    {{ number_format($cancelledQuotes) }}
                </p>

                <p class="ldx-status-card-description">
                    ยกเลิก
                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
        Recent Activity
    ========================================================== --}}

    <div class="ldx-recent-grid">


        {{-- =====================================================
            Recent Quote Requests
        ====================================================== --}}

        <div class="ldx-section-card ldx-recent-card">

            <div class="ldx-section-header">

                <div>

                    <h2 class="ldx-section-title">
                        Recent Quote Requests
                    </h2>

                    <p class="ldx-section-description">
                        คำขอใบเสนอราคาล่าสุด
                    </p>

                </div>

                <a
                    href="{{ route('admin.quote-requests.index') }}"
                    class="ldx-section-link"
                >
                    ดูทั้งหมด
                </a>

            </div>


            <div class="ldx-recent-list">

                @forelse($recentQuoteRequests as $quote)

                    <a
                        href="{{ route('admin.quote-requests.show', $quote) }}"
                        class="ldx-recent-item"
                    >

                        <div class="ldx-recent-icon ldx-recent-icon-round">

                            <svg
                                class="ldx-icon"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M20 21a8 8 0 00-16 0m8-10a4 4 0 100-8 4 4 0 000 8z"
                                />
                            </svg>

                        </div>


                        <div class="ldx-recent-content">

                            <p class="ldx-recent-title">
                                {{ $quote->full_name }}
                            </p>

                            <p class="ldx-recent-meta">
                                {{ $quote->phone }}
                                @if($quote->installation_province)
                                    · {{ $quote->installation_province }}
                                @endif
                            </p>

                        </div>


                        <div class="ldx-recent-side">

                            <span
                                class="ldx-status-badge {{ $quote->status_badge_class }}"
                            >
                                {{ $quote->status_label }}
                            </span>

                            <p class="ldx-recent-date">
                                {{ $quote->created_at->format('d/m/Y H:i') }}
                            </p>

                        </div>

                    </a>

                @empty

                    <div class="ldx-empty-state">

                        <div class="ldx-empty-state-icon">

                            <svg
                                class="ldx-icon"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M8 10h8M8 14h5m-9 5l-1 3 3-1h10a5 5 0 005-5V8a5 5 0 00-5-5H7a5 5 0 00-5 5v6a5 5 0 005 5h2"
                                />
                            </svg>

                        </div>

                        <p class="ldx-empty-state-title">
                            ยังไม่มีคำขอใบเสนอราคา
                        </p>

                        <p class="ldx-empty-state-description">
                            เมื่อมีลูกค้าส่งแบบฟอร์ม ข้อมูลจะแสดงที่นี่
                        </p>

                    </div>

                @endforelse

            </div>

        </div>


        {{-- =====================================================
            Recent News
        ====================================================== --}}

        <div class="ldx-section-card ldx-recent-card">

            <div class="ldx-section-header">

                <div>

                    <h2 class="ldx-section-title">
                        Recent News
                    </h2>

                    <p class="ldx-section-description">
                        ข่าวสารล่าสุด
                    </p>

                </div>

                <a
                    href="{{ route('admin.news.index') }}"
                    class="ldx-section-link"
                >
                    ดูทั้งหมด
                </a>

            </div>


            <div class="ldx-recent-list">

                @forelse($recentNews as $news)

                    <a
                        href="{{ route('admin.news.edit', $news) }}"
                        class="ldx-recent-item"
                    >

                        <div class="ldx-recent-icon ldx-recent-icon-square">

                            <svg
                                class="ldx-icon"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M6 4h12a2 2 0 012 2v14l-4-2-4 2-4-2-4 2V6a2 2 0 012-2z"
                                />
                            </svg>

                        </div>


                        <div class="ldx-recent-content">

                            <p class="ldx-recent-title">
                                {{ $news->title }}
                            </p>

                            <p class="ldx-recent-meta">
                                {{ $news->created_at->format('d/m/Y H:i') }}
                            </p>

                        </div>


                        @if($news->is_active)

                            <span class="ldx-badge ldx-badge-success">
                                Active
                            </span>

                        @else

                            <span class="ldx-badge ldx-badge-muted">
                                Inactive
                            </span>

                        @endif

                    </a>

                @empty

                    <div class="ldx-empty-state">

                        <div class="ldx-empty-state-icon">

                            <svg
                                class="ldx-icon"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M6 4h12a2 2 0 012 2v14l-4-2-4 2-4-2-4 2V6a2 2 0 00-2-2z"
                                />
                            </svg>

                        </div>

                        <p class="ldx-empty-state-title">
                            ยังไม่มีข่าวสาร
                        </p>

                        <p class="ldx-empty-state-description">
                            เพิ่มข่าวสารเพื่อให้แสดงที่นี่
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>


    {{-- =========================================================
        Quick Actions
    ========================================================== --}}

    <div class="ldx-section-card ldx-quick-actions">

        <div>

            <h2 class="ldx-section-title">
                Quick Actions
            </h2>

            <p class="ldx-section-description">
                ทางลัดสำหรับการจัดการข้อมูลที่ใช้บ่อย
            </p>

        </div>


        <div class="ldx-quick-action-grid">


            {{-- Add Service --}}

            <a
                href="{{ route('admin.services.create') }}"
                class="ldx-quick-action"
            >

                <div class="ldx-quick-action-icon">

                    <svg
                        class="ldx-icon"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4"
                        />
                    </svg>

                </div>

                <div class="ldx-quick-action-content">

                    <p class="ldx-quick-action-title">
                        เพิ่มบริการ
                    </p>

                    <p class="ldx-quick-action-description">
                        Add Service
                    </p>

                </div>

            </a>


            {{-- Add Project --}}

            <a
                href="{{ route('admin.projects.create') }}"
                class="ldx-quick-action"
            >

                <div class="ldx-quick-action-icon">

                    <svg
                        class="ldx-icon"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4"
                        />
                    </svg>

                </div>

                <div class="ldx-quick-action-content">

                    <p class="ldx-quick-action-title">
                        เพิ่มผลงาน
                    </p>

                    <p class="ldx-quick-action-description">
                        Add Project
                    </p>

                </div>

            </a>


            {{-- Add News --}}

            <a
                href="{{ route('admin.news.create') }}"
                class="ldx-quick-action"
            >

                <div class="ldx-quick-action-icon">

                    <svg
                        class="ldx-icon"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4"
                        />
                    </svg>

                </div>

                <div class="ldx-quick-action-content">

                    <p class="ldx-quick-action-title">
                        เพิ่มข่าวสาร
                    </p>

                    <p class="ldx-quick-action-description">
                        Add News
                    </p>

                </div>

            </a>

        </div>

    </div>

</div>

@endsection