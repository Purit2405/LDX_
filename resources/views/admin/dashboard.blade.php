@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')

<div class="mx-auto max-w-7xl space-y-6 pb-8">

    {{-- =========================================================
        Dashboard Header
    ========================================================== --}}

    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

        <div>

            <div class="flex items-center gap-2">

                <span class="h-2 w-2 rounded-full bg-green-500"></span>

                <span class="text-xs font-semibold uppercase tracking-wider text-green-600">
                    Administration
                </span>

            </div>

            <h1 class="mt-2 text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                Dashboard
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                ภาพรวมการจัดการเว็บไซต์ LDX Elevator
            </p>

        </div>


        <div class="flex items-center gap-3">

            <div class="rounded-xl border border-gray-200 bg-white px-4 py-3 shadow-sm">

                <p class="text-[11px] font-medium uppercase tracking-wide text-gray-400">
                    วันนี้
                </p>

                <p class="mt-0.5 text-sm font-semibold text-gray-900">
                    {{ now()->format('d/m/Y') }}
                </p>

            </div>

            <div class="rounded-xl border border-gray-200 bg-white px-4 py-3 shadow-sm">

                <p class="text-[11px] font-medium uppercase tracking-wide text-gray-400">
                    เวลา
                </p>

                <p class="mt-0.5 text-sm font-semibold text-gray-900">
                    {{ now()->format('H:i') }} น.
                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
        Welcome Card
    ========================================================== --}}

    <div class="relative overflow-hidden rounded-2xl bg-gray-950 shadow-sm">

        {{-- Decorative background --}}

        <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-white/[0.03]"></div>

        <div class="pointer-events-none absolute -bottom-32 right-24 h-72 w-72 rounded-full bg-white/[0.02]"></div>


        <div class="relative flex flex-col gap-6 p-6 sm:p-8 lg:flex-row lg:items-center lg:justify-between">

            <div>

                <p class="text-sm font-medium text-gray-400">
                    Welcome back
                </p>

                <h2 class="mt-2 text-2xl font-bold text-white sm:text-3xl">
                    {{ auth()->user()->name }}
                </h2>

                <p class="mt-2 max-w-xl text-sm leading-6 text-gray-400">
                    จัดการและดูแลข้อมูลเว็บไซต์ LDX Elevator
                    ได้จากหน้า Dashboard นี้
                </p>

            </div>


            <a
                href="{{ route('admin.quote-requests.index') }}"
                class="inline-flex w-fit items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-gray-900 transition hover:bg-gray-100"
            >

                <svg
                    class="h-4 w-4"
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

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">


        {{-- Services --}}

        <a
            href="{{ route('admin.services.index') }}"
            class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-gray-300 hover:shadow-md"
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Services
                    </p>

                    <p class="mt-3 text-3xl font-bold tracking-tight text-gray-900">
                        {{ number_format($servicesCount) }}
                    </p>

                </div>


                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 transition group-hover:bg-gray-900 group-hover:text-white">

                    <svg
                        class="h-5 w-5 text-gray-700 group-hover:text-white"
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

            <div class="mt-4 flex items-center justify-between">

                <span class="text-xs text-gray-400">
                    บริการทั้งหมด
                </span>

                <span class="text-xs font-medium text-gray-400 transition group-hover:text-gray-900">
                    ดูข้อมูล →
                </span>

            </div>

        </a>


        {{-- Projects --}}

        <a
            href="{{ route('admin.projects.index') }}"
            class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-gray-300 hover:shadow-md"
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Projects
                    </p>

                    <p class="mt-3 text-3xl font-bold tracking-tight text-gray-900">
                        {{ number_format($projectsCount) }}
                    </p>

                </div>


                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 transition group-hover:bg-gray-900">

                    <svg
                        class="h-5 w-5 text-gray-700 group-hover:text-white"
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

            <div class="mt-4 flex items-center justify-between">

                <span class="text-xs text-gray-400">
                    ผลงานทั้งหมด
                </span>

                <span class="text-xs font-medium text-gray-400 transition group-hover:text-gray-900">
                    ดูข้อมูล →
                </span>

            </div>

        </a>


        {{-- News --}}

        <a
            href="{{ route('admin.news.index') }}"
            class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-gray-300 hover:shadow-md"
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        News
                    </p>

                    <p class="mt-3 text-3xl font-bold tracking-tight text-gray-900">
                        {{ number_format($newsCount) }}
                    </p>

                </div>


                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 transition group-hover:bg-gray-900">

                    <svg
                        class="h-5 w-5 text-gray-700 group-hover:text-white"
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

            <div class="mt-4 flex items-center justify-between">

                <span class="text-xs text-gray-400">
                    ข่าวทั้งหมด
                </span>

                <span class="text-xs font-medium text-gray-400 transition group-hover:text-gray-900">
                    ดูข้อมูล →
                </span>

            </div>

        </a>


        {{-- Quote Requests --}}

        <a
            href="{{ route('admin.quote-requests.index') }}"
            class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-gray-300 hover:shadow-md"
        >

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-gray-500">
                        Quote Requests
                    </p>

                    <p class="mt-3 text-3xl font-bold tracking-tight text-gray-900">
                        {{ number_format($quoteRequestsCount) }}
                    </p>

                </div>


                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 transition group-hover:bg-gray-900">

                    <svg
                        class="h-5 w-5 text-gray-700 group-hover:text-white"
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

            <div class="mt-4 flex items-center justify-between">

                <span class="text-xs text-gray-400">
                    คำขอทั้งหมด
                </span>

                @if($pendingQuotes > 0)

                    <span class="text-xs font-semibold text-gray-900">
                        {{ $pendingQuotes }} รายการรอดำเนินการ
                    </span>

                @else

                    <span class="text-xs text-gray-400">
                        ไม่มีรายการรอ
                    </span>

                @endif

            </div>

        </a>

    </div>


    {{-- =========================================================
        Quote Request Section
    ========================================================== --}}

    <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">

        <div class="border-b border-gray-100 px-6 py-5">

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h2 class="text-lg font-semibold text-gray-900">
                        Quote Requests
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        สถานะคำขอใบเสนอราคาจากลูกค้า
                    </p>

                </div>

                <a
                    href="{{ route('admin.quote-requests.index') }}"
                    class="text-sm font-semibold text-gray-700 transition hover:text-gray-950"
                >
                    จัดการคำขอทั้งหมด →
                </a>

            </div>

        </div>


        <div class="grid gap-4 p-6 sm:grid-cols-2 lg:grid-cols-5">


            {{-- Pending --}}

            <div class="rounded-xl border border-yellow-100 bg-yellow-50 p-4">

                <div class="flex items-center justify-between">

                    <span class="text-xs font-semibold uppercase tracking-wide text-yellow-700">
                        Pending
                    </span>

                    <span class="h-2 w-2 rounded-full bg-yellow-500"></span>

                </div>

                <p class="mt-3 text-2xl font-bold text-yellow-900">
                    {{ number_format($pendingQuotes) }}
                </p>

                <p class="mt-1 text-xs text-yellow-700">
                    รอติดต่อ
                </p>

            </div>


            {{-- Contacted --}}

            <div class="rounded-xl border border-blue-100 bg-blue-50 p-4">

                <div class="flex items-center justify-between">

                    <span class="text-xs font-semibold uppercase tracking-wide text-blue-700">
                        Contacted
                    </span>

                    <span class="h-2 w-2 rounded-full bg-blue-500"></span>

                </div>

                <p class="mt-3 text-2xl font-bold text-blue-900">
                    {{ number_format($contactedQuotes) }}
                </p>

                <p class="mt-1 text-xs text-blue-700">
                    ติดต่อแล้ว
                </p>

            </div>


            {{-- Quoted --}}

            <div class="rounded-xl border border-purple-100 bg-purple-50 p-4">

                <div class="flex items-center justify-between">

                    <span class="text-xs font-semibold uppercase tracking-wide text-purple-700">
                        Quoted
                    </span>

                    <span class="h-2 w-2 rounded-full bg-purple-500"></span>

                </div>

                <p class="mt-3 text-2xl font-bold text-purple-900">
                    {{ number_format($quotedQuotes) }}
                </p>

                <p class="mt-1 text-xs text-purple-700">
                    ส่งใบเสนอราคาแล้ว
                </p>

            </div>


            {{-- Completed --}}

            <div class="rounded-xl border border-green-100 bg-green-50 p-4">

                <div class="flex items-center justify-between">

                    <span class="text-xs font-semibold uppercase tracking-wide text-green-700">
                        Completed
                    </span>

                    <span class="h-2 w-2 rounded-full bg-green-500"></span>

                </div>

                <p class="mt-3 text-2xl font-bold text-green-900">
                    {{ number_format($completedQuotes) }}
                </p>

                <p class="mt-1 text-xs text-green-700">
                    ดำเนินการเสร็จสิ้น
                </p>

            </div>


            {{-- Cancelled --}}

            <div class="rounded-xl border border-red-100 bg-red-50 p-4">

                <div class="flex items-center justify-between">

                    <span class="text-xs font-semibold uppercase tracking-wide text-red-700">
                        Cancelled
                    </span>

                    <span class="h-2 w-2 rounded-full bg-red-500"></span>

                </div>

                <p class="mt-3 text-2xl font-bold text-red-900">
                    {{ number_format($cancelledQuotes) }}
                </p>

                <p class="mt-1 text-xs text-red-700">
                    ยกเลิก
                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
        Recent Activity
    ========================================================== --}}

    <div class="grid gap-6 lg:grid-cols-2">


        {{-- =====================================================
            Recent Quote Requests
        ====================================================== --}}

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-gray-100 px-6 py-5">

                <div>

                    <h2 class="text-lg font-semibold text-gray-900">
                        Recent Quote Requests
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        คำขอใบเสนอราคาล่าสุด
                    </p>

                </div>

                <a
                    href="{{ route('admin.quote-requests.index') }}"
                    class="text-sm font-semibold text-gray-700 hover:text-gray-950"
                >
                    ดูทั้งหมด
                </a>

            </div>


            <div class="divide-y divide-gray-100">

                @forelse($recentQuoteRequests as $quote)

                    <a
                        href="{{ route('admin.quote-requests.show', $quote) }}"
                        class="block px-6 py-4 transition hover:bg-gray-50"
                    >

                        <div class="flex items-center gap-4">

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gray-100">

                                <svg
                                    class="h-5 w-5 text-gray-600"
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


                            <div class="min-w-0 flex-1">

                                <p class="truncate text-sm font-semibold text-gray-900">
                                    {{ $quote->full_name }}
                                </p>

                                <p class="mt-1 truncate text-xs text-gray-500">
                                    {{ $quote->phone }}
                                    @if($quote->installation_province)
                                        · {{ $quote->installation_province }}
                                    @endif
                                </p>

                            </div>


                            <div class="hidden shrink-0 text-right sm:block">

                                <span
                                    class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $quote->status_badge_class }}"
                                >
                                    {{ $quote->status_label }}
                                </span>

                                <p class="mt-1 text-[11px] text-gray-400">
                                    {{ $quote->created_at->format('d/m/Y H:i') }}
                                </p>

                            </div>

                        </div>

                    </a>

                @empty

                    <div class="px-6 py-12 text-center">

                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100">

                            <svg
                                class="h-5 w-5 text-gray-400"
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

                        <p class="mt-3 text-sm font-medium text-gray-600">
                            ยังไม่มีคำขอใบเสนอราคา
                        </p>

                        <p class="mt-1 text-xs text-gray-400">
                            เมื่อมีลูกค้าส่งแบบฟอร์ม ข้อมูลจะแสดงที่นี่
                        </p>

                    </div>

                @endforelse

            </div>

        </div>


        {{-- =====================================================
            Recent News
        ====================================================== --}}

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-gray-100 px-6 py-5">

                <div>

                    <h2 class="text-lg font-semibold text-gray-900">
                        Recent News
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        ข่าวสารล่าสุด
                    </p>

                </div>

                <a
                    href="{{ route('admin.news.index') }}"
                    class="text-sm font-semibold text-gray-700 hover:text-gray-950"
                >
                    ดูทั้งหมด
                </a>

            </div>


            <div class="divide-y divide-gray-100">

                @forelse($recentNews as $news)

                    <a
                        href="{{ route('admin.news.edit', $news) }}"
                        class="block px-6 py-4 transition hover:bg-gray-50"
                    >

                        <div class="flex items-center gap-4">

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100">

                                <svg
                                    class="h-5 w-5 text-gray-600"
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


                            <div class="min-w-0 flex-1">

                                <p class="truncate text-sm font-semibold text-gray-900">
                                    {{ $news->title }}
                                </p>

                                <p class="mt-1 text-xs text-gray-400">
                                    {{ $news->created_at->format('d/m/Y H:i') }}
                                </p>

                            </div>


                            @if($news->is_active)

                                <span class="shrink-0 rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                    Active
                                </span>

                            @else

                                <span class="shrink-0 rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                                    Inactive
                                </span>

                            @endif

                        </div>

                    </a>

                @empty

                    <div class="px-6 py-12 text-center">

                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100">

                            <svg
                                class="h-5 w-5 text-gray-400"
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

                        <p class="mt-3 text-sm font-medium text-gray-600">
                            ยังไม่มีข่าวสาร
                        </p>

                        <p class="mt-1 text-xs text-gray-400">
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

    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

        <div>

            <h2 class="text-lg font-semibold text-gray-900">
                Quick Actions
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                ทางลัดสำหรับการจัดการข้อมูลที่ใช้บ่อย
            </p>

        </div>


        <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">


            {{-- Add Service --}}

            <a
                href="{{ route('admin.services.create') }}"
                class="group flex items-center gap-4 rounded-xl border border-gray-200 p-4 transition hover:border-gray-300 hover:bg-gray-50"
            >

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gray-900">

                    <svg
                        class="h-5 w-5 text-white"
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

                <div class="min-w-0">

                    <p class="text-sm font-semibold text-gray-900">
                        เพิ่มบริการ
                    </p>

                    <p class="mt-0.5 text-xs text-gray-500">
                        Add Service
                    </p>

                </div>

            </a>


            {{-- Add Project --}}

            <a
                href="{{ route('admin.projects.create') }}"
                class="group flex items-center gap-4 rounded-xl border border-gray-200 p-4 transition hover:border-gray-300 hover:bg-gray-50"
            >

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gray-900">

                    <svg
                        class="h-5 w-5 text-white"
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

                <div>

                    <p class="text-sm font-semibold text-gray-900">
                        เพิ่มผลงาน
                    </p>

                    <p class="mt-0.5 text-xs text-gray-500">
                        Add Project
                    </p>

                </div>

            </a>


            {{-- Add News --}}

            <a
                href="{{ route('admin.news.create') }}"
                class="group flex items-center gap-4 rounded-xl border border-gray-200 p-4 transition hover:border-gray-300 hover:bg-gray-50"
            >

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gray-900">

                    <svg
                        class="h-5 w-5 text-white"
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

                <div>

                    <p class="text-sm font-semibold text-gray-900">
                        เพิ่มข่าวสาร
                    </p>

                    <p class="mt-0.5 text-xs text-gray-500">
                        Add News
                    </p>

                </div>

            </a>


            {{-- SEO --}}

            <a
                href="{{ route('admin.seo.index') }}"
                class="group flex items-center gap-4 rounded-xl border border-gray-200 p-4 transition hover:border-gray-300 hover:bg-gray-50"
            >

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gray-900">

                    <svg
                        class="h-5 w-5 text-white"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M10 13a5 5 0 007.07.07l2-2a5 5 0 00-7.07-7.07l-1.15 1.15m3.15 5.92a5 5 0 00-7.07-.07l-2 2a5 5 0 007.07 7.07l1.15-1.15"
                        />
                    </svg>

                </div>

                <div>

                    <p class="text-sm font-semibold text-gray-900">
                        จัดการ SEO
                    </p>

                    <p class="mt-0.5 text-xs text-gray-500">
                        SEO Settings
                    </p>

                </div>

            </a>

        </div>

    </div>


    {{-- =========================================================
        System Information
    ========================================================== --}}

    <div class="grid gap-6 lg:grid-cols-2">


        {{-- Website Status --}}

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <div>

                <h2 class="text-lg font-semibold text-gray-900">
                    Website Status
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    สถานะระบบเว็บไซต์ในปัจจุบัน
                </p>

            </div>


            <div class="mt-6 divide-y divide-gray-100">


                {{-- Website --}}

                <div class="flex items-center justify-between py-4 first:pt-0">

                    <div class="flex items-center gap-3">

                        <span class="relative flex h-2.5 w-2.5">

                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>

                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-green-500"></span>

                        </span>

                        <span class="text-sm font-medium text-gray-700">
                            Website
                        </span>

                    </div>

                    <span class="text-xs font-semibold text-green-600">
                        Online
                    </span>

                </div>


                {{-- Database --}}

                <div class="flex items-center justify-between py-4">

                    <div class="flex items-center gap-3">

                        <span class="h-2.5 w-2.5 rounded-full bg-green-500"></span>

                        <span class="text-sm font-medium text-gray-700">
                            Database
                        </span>

                    </div>

                    <span class="text-xs font-semibold text-green-600">
                        Connected
                    </span>

                </div>


                {{-- Authentication --}}

                <div class="flex items-center justify-between py-4 last:pb-0">

                    <div class="flex items-center gap-3">

                        <span class="h-2.5 w-2.5 rounded-full bg-green-500"></span>

                        <span class="text-sm font-medium text-gray-700">
                            Authentication
                        </span>

                    </div>

                    <span class="text-xs font-semibold text-green-600">
                        Active
                    </span>

                </div>

            </div>

        </div>


        {{-- System Information --}}

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <div>

                <h2 class="text-lg font-semibold text-gray-900">
                    System Information
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    ข้อมูลสภาพแวดล้อมของระบบ
                </p>

            </div>


            <div class="mt-6 divide-y divide-gray-100">


                <div class="flex items-center justify-between py-4 first:pt-0">

                    <span class="text-sm text-gray-500">
                        Laravel
                    </span>

                    <span class="text-sm font-semibold text-gray-900">
                        {{ app()->version() }}
                    </span>

                </div>


                <div class="flex items-center justify-between py-4">

                    <span class="text-sm text-gray-500">
                        PHP
                    </span>

                    <span class="text-sm font-semibold text-gray-900">
                        {{ PHP_VERSION }}
                    </span>

                </div>


                <div class="flex items-center justify-between py-4">

                    <span class="text-sm text-gray-500">
                        Environment
                    </span>

                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
                        {{ app()->environment() }}
                    </span>

                </div>


                <div class="flex items-center justify-between py-4 last:pb-0">

                    <span class="text-sm text-gray-500">
                        Server Time
                    </span>

                    <span class="text-sm font-semibold text-gray-900">
                        {{ now()->format('d/m/Y H:i:s') }}
                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        Footer
    ========================================================== --}}

    <div class="border-t border-gray-200 pt-6">

        <p class="text-center text-xs text-gray-400">
            LDX Elevator Administration Panel
        </p>

    </div>

</div>

@endsection

