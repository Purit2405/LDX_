@extends('layouts.admin.app')

@section('title', 'View News')

@section('page-title', 'View News')

@section('content')

<div class="mx-auto max-w-5xl space-y-6">


{{-- Header --}}
<div>

    <div class="flex items-center gap-2 text-sm text-gray-500">

        <a
            href="{{ route('admin.news.index') }}"
            class="hover:text-gray-900"
        >
            News
        </a>

        <span>/</span>

        <span>View</span>

    </div>

    <div class="mt-2 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <h1 class="text-2xl font-bold text-gray-900">
                {{ $news->title }}
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                ดูรายละเอียดข่าวสาร
            </p>

        </div>


        {{-- Actions --}}
        <div class="flex gap-2">

            <a
                href="{{ route('admin.news.edit', $news) }}"
                class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
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
                    class="rounded-lg bg-red-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-red-700"
                >
                    Delete
                </button>

            </form>

        </div>

    </div>

</div>


{{-- Main Information --}}
<div class="rounded-xl bg-white p-6 shadow-sm">

    <div class="flex items-center justify-between">

        <h2 class="text-lg font-semibold text-gray-900">
            News Information
        </h2>


        {{-- Status --}}
        @if($news->is_active)

            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                Active
            </span>

        @else

            <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                Hidden
            </span>

        @endif

    </div>


    <div class="mt-6 grid gap-6 md:grid-cols-2">

        {{-- Category --}}
        <div>

            <div class="text-xs font-medium uppercase text-gray-400">
                Category
            </div>

            <div class="mt-1 text-sm font-medium text-gray-900">

                @if($news->category)

                    {{ $news->category->name }}

                @else

                    <span class="text-gray-400">
                        No Category
                    </span>

                @endif

            </div>

        </div>


        {{-- Slug --}}
        <div>

            <div class="text-xs font-medium uppercase text-gray-400">
                Slug
            </div>

            <div class="mt-1 break-all text-sm text-gray-700">
                {{ $news->slug }}
            </div>

        </div>


        {{-- Published Date --}}
        <div>

            <div class="text-xs font-medium uppercase text-gray-400">
                Published Date
            </div>

            <div class="mt-1 text-sm text-gray-700">

                @if($news->published_at)

                    {{ $news->published_at->format('d/m/Y H:i') }}

                @else

                    <span class="text-gray-400">
                        Not published
                    </span>

                @endif

            </div>

        </div>


        {{-- Created --}}
        <div>

            <div class="text-xs font-medium uppercase text-gray-400">
                Created At
            </div>

            <div class="mt-1 text-sm text-gray-700">
                {{ $news->created_at->format('d/m/Y H:i') }}
            </div>

        </div>

    </div>

</div>


{{-- Short Description --}}
<div class="rounded-xl bg-white p-6 shadow-sm">

    <h2 class="text-lg font-semibold text-gray-900">
        Short Description
    </h2>

    @if($news->short_description)

        <p class="mt-5 whitespace-pre-line text-sm leading-7 text-gray-700">
            {{ $news->short_description }}
        </p>

    @else

        <p class="mt-5 text-sm text-gray-400">
            ไม่มีคำอธิบายสั้น
        </p>

    @endif

</div>


{{-- Content --}}
<div class="rounded-xl bg-white p-6 shadow-sm">

    <h2 class="text-lg font-semibold text-gray-900">
        News Content
    </h2>

    @if($news->content)

        <div class="mt-5 whitespace-pre-line text-sm leading-8 text-gray-700">
            {{ $news->content }}
        </div>

    @else

        <p class="mt-5 text-sm text-gray-400">
            ไม่มีเนื้อหา
        </p>

    @endif

</div>


{{-- Images --}}
<div class="rounded-xl bg-white p-6 shadow-sm">

    <div class="flex items-center justify-between">

        <div>

            <h2 class="text-lg font-semibold text-gray-900">
                News Images
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                รูปภาพทั้งหมดของ News
            </p>

        </div>

        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
            {{ $news->images->count() }} Images
        </span>

    </div>


    @if($news->images->count())

        <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

            @foreach($news->images as $image)

                <div class="overflow-hidden rounded-xl border border-gray-200">

                    <a
                        href="{{ Storage::url($image->path) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >

                        <img
                            src="{{ Storage::url($image->path) }}"
                            alt="{{ $image->alt ?: $news->title }}"
                            class="h-52 w-full object-cover transition hover:scale-105"
                        >

                    </a>


                    <div class="p-4">

                        <p class="truncate text-sm font-medium text-gray-700">
                            {{ $image->alt ?: 'No alt text' }}
                        </p>

                        <p class="mt-1 text-xs text-gray-400">
                            Click image to view full size
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


{{-- Bottom Actions --}}
<div class="flex items-center justify-between">

    <a
        href="{{ route('admin.news.index') }}"
        class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
    >
        ← Back to News
    </a>


    <a
        href="{{ route('admin.news.edit', $news) }}"
        class="rounded-lg bg-gray-900 px-6 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
    >
        Edit News
    </a>

</div>


</div>

@endsection
