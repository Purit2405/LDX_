blade
@extends('layouts.admin.app')

@section('title', 'Service Details')
@section('page-title', 'Service Details')

@section('content')

<div class="mx-auto max-w-6xl space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <div class="flex items-center gap-2 text-sm text-gray-500">

                <a
                    href="{{ route('admin.services.index') }}"
                    class="hover:text-gray-900"
                >
                    Services
                </a>

                <span>/</span>

                <span>Details</span>

            </div>

            <h1 class="mt-2 text-2xl font-bold text-gray-900">
                {{ $service->title }}
            </h1>

        </div>


        <div class="flex gap-3">

            <a
                href="{{ route('admin.services.edit', $service) }}"
                class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
            >
                Edit Service
            </a>

            <a
                href="{{ route('admin.services.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Back
            </a>

        </div>

    </div>


    {{-- Overview --}}
    <div class="grid gap-6 lg:grid-cols-3">

        {{-- Main --}}
        <div class="space-y-6 lg:col-span-2">

            {{-- Basic --}}
            <div class="rounded-xl bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-900">
                    Service Information
                </h2>


                <dl class="mt-6 space-y-5">

                    <div>

                        <dt class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Service Name
                        </dt>

                        <dd class="mt-1 text-sm font-medium text-gray-900">
                            {{ $service->title }}
                        </dd>

                    </div>


                    <div>

                        <dt class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Slug
                        </dt>

                        <dd class="mt-1 text-sm text-gray-600">
                            {{ $service->slug }}
                        </dd>

                    </div>


                    <div>

                        <dt class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Category
                        </dt>

                        <dd class="mt-1">

                            @if($service->category)

                                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                                    {{ $service->category->name }}
                                </span>

                            @else

                                <span class="text-sm text-gray-400">
                                    No Category
                                </span>

                            @endif

                        </dd>

                    </div>


                    <div>

                        <dt class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                            Publish Date
                        </dt>

                        <dd class="mt-1 text-sm text-gray-600">
                            {{ $service->publish_date?->format('d/m/Y') ?? '-' }}
                        </dd>

                    </div>

                </dl>

            </div>


            {{-- Description --}}
            <div class="rounded-xl bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-900">
                    Short Description
                </h2>

                <p class="mt-4 whitespace-pre-line text-sm leading-7 text-gray-600">
                    {{ $service->short_description ?: 'ไม่มีคำอธิบายสั้น' }}
                </p>

            </div>


            {{-- Content --}}
            <div class="rounded-xl bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-900">
                    Service Details
                </h2>

                <div class="mt-4 whitespace-pre-line text-sm leading-8 text-gray-700">
                    {{ $service->content ?: 'ไม่มีรายละเอียด' }}
                </div>

            </div>

        </div>


        {{-- Sidebar --}}
        <div class="space-y-6">

            {{-- Status --}}
            <div class="rounded-xl bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-900">
                    Status
                </h2>

                <div class="mt-4">

                    @if($service->is_active)

                        <span class="inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">
                            Active
                        </span>

                    @else

                        <span class="inline-flex rounded-full bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-600">
                            Hidden
                        </span>

                    @endif

                </div>

            </div>


            {{-- Images Count --}}
            <div class="rounded-xl bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-900">
                    Images
                </h2>

                <p class="mt-3 text-3xl font-bold text-gray-900">
                    {{ $service->images->count() }}
                </p>

                <p class="mt-1 text-sm text-gray-500">
                    รูปภาพทั้งหมด
                </p>

            </div>


            {{-- Dates --}}
            <div class="rounded-xl bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-900">
                    System Information
                </h2>

                <dl class="mt-4 space-y-4 text-sm">

                    <div>

                        <dt class="text-gray-400">
                            Created
                        </dt>

                        <dd class="mt-1 text-gray-700">
                            {{ $service->created_at?->format('d/m/Y H:i') }}
                        </dd>

                    </div>


                    <div>

                        <dt class="text-gray-400">
                            Last Updated
                        </dt>

                        <dd class="mt-1 text-gray-700">
                            {{ $service->updated_at?->format('d/m/Y H:i') }}
                        </dd>

                    </div>

                </dl>

            </div>

        </div>

    </div>


    {{-- Gallery --}}
    <div class="rounded-xl bg-white p-6 shadow-sm">

        <h2 class="text-lg font-semibold text-gray-900">
            Service Gallery
        </h2>


        @if($service->images->count())

            <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                @foreach($service->images as $image)

                    <div class="overflow-hidden rounded-xl border border-gray-200">

                        <img
                            src="{{ Storage::url($image->path) }}"
                            alt="{{ $image->alt ?: $service->title }}"
                            class="h-48 w-full object-cover"
                        >

                        <div class="p-3">

                            <p class="truncate text-xs text-gray-500">
                                {{ $image->alt ?: 'No alt text' }}
                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="mt-5 rounded-lg border border-dashed border-gray-300 p-10 text-center">

                <p class="text-sm text-gray-500">
                    ยังไม่มีรูปภาพ
                </p>

            </div>

        @endif

    </div>

</div>

@endsection

