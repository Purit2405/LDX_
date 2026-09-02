@extends('layouts.admin.app')

@section('title', 'Project Details')

@section('page-title', 'Project Details')

@section('content')

<div class="mx-auto max-w-5xl space-y-6">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-4">

        <div>

            <div class="flex items-center gap-2 text-sm text-gray-500">

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="hover:text-gray-900"
                >
                    Projects
                </a>

                <span>/</span>

                <span>View</span>

            </div>

            <h1 class="mt-2 text-2xl font-bold text-gray-900">
                {{ $project->title }}
            </h1>

        </div>


        <a
            href="{{ route('admin.projects.edit', $project) }}"
            class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
        >
            Edit Project
        </a>

    </div>


    {{-- Information --}}
    <div class="rounded-xl bg-white p-6 shadow-sm">

        <div class="grid gap-6 md:grid-cols-2">

            <div>

                <p class="text-xs font-medium uppercase text-gray-400">
                    Category
                </p>

                <p class="mt-1 text-sm font-semibold text-gray-900">
                    {{ $project->category?->name ?? '-' }}
                </p>

            </div>


            <div>

                <p class="text-xs font-medium uppercase text-gray-400">
                    Status
                </p>

                <div class="mt-1">

                    @if($project->is_active)

                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                            Active
                        </span>

                    @else

                        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                            Hidden
                        </span>

                    @endif

                </div>

            </div>


            <div>

                <p class="text-xs font-medium uppercase text-gray-400">
                    Client
                </p>

                <p class="mt-1 text-sm text-gray-700">
                    {{ $project->client ?: '-' }}
                </p>

            </div>


            <div>

                <p class="text-xs font-medium uppercase text-gray-400">
                    Location
                </p>

                <p class="mt-1 text-sm text-gray-700">
                    {{ $project->location ?: '-' }}
                </p>

            </div>


            <div>

                <p class="text-xs font-medium uppercase text-gray-400">
                    Project Date
                </p>

                <p class="mt-1 text-sm text-gray-700">
                    {{ $project->project_date?->format('d/m/Y') ?? '-' }}
                </p>

            </div>


            <div>

                <p class="text-xs font-medium uppercase text-gray-400">
                    Slug
                </p>

                <p class="mt-1 text-sm text-gray-700">
                    {{ $project->slug }}
                </p>

            </div>

        </div>

    </div>


    {{-- Short Description --}}
    @if($project->short_description)

        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-gray-900">
                Short Description
            </h2>

            <p class="mt-4 whitespace-pre-line text-sm leading-7 text-gray-600">
                {{ $project->short_description }}
            </p>

        </div>

    @endif


    {{-- Content --}}
    @if($project->content)

        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-gray-900">
                Project Details
            </h2>

            <div class="mt-4 whitespace-pre-line text-sm leading-7 text-gray-600">
                {{ $project->content }}
            </div>

        </div>

    @endif


    {{-- Images --}}
    <div class="rounded-xl bg-white p-6 shadow-sm">

        <h2 class="text-lg font-semibold text-gray-900">
            Project Images
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            {{ $project->images->count() }} Images
        </p>


        @if($project->images->count())

            <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                @foreach($project->images as $image)

                    <div class="overflow-hidden rounded-xl border border-gray-200">

                        <img
                            src="{{ Storage::url($image->path) }}"
                            alt="{{ $image->alt ?: $project->title }}"
                            class="h-56 w-full object-cover"
                        >

                        @if($image->alt)

                            <div class="p-3">

                                <p class="text-xs text-gray-500">
                                    {{ $image->alt }}
                                </p>

                            </div>

                        @endif

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


    <div>

        <a
            href="{{ route('admin.projects.index') }}"
            class="text-sm font-medium text-gray-600 hover:text-gray-900"
        >
            ← Back to Projects
        </a>

    </div>

</div>

@endsection