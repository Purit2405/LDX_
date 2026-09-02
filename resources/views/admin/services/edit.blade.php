@extends('layouts.admin.app')

@section('title', 'Edit Service')

@section('page-title', 'Edit Service')

@section('content')

<div class="mx-auto max-w-5xl space-y-6">


{{-- ========================================================= --}}
{{-- Header --}}
{{-- ========================================================= --}}

<div>
    <div class="flex items-center gap-2 text-sm text-gray-500">

        <a
            href="{{ route('admin.services.index') }}"
            class="transition hover:text-gray-900"
        >
            Services
        </a>

        <span>/</span>

        <span>Edit</span>

    </div>

    <div class="mt-2 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Edit Service
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                แก้ไขข้อมูลบริการ
            </p>
        </div>

        {{-- Delete Service --}}
        <form
            method="POST"
            action="{{ route('admin.services.destroy', $service) }}"
            onsubmit="return confirm('⚠️ ต้องการลบบริการนี้ทั้งโพสต์จริงหรือไม่?\n\nข้อมูลบริการและรูปภาพทั้งหมดจะถูกลบ และไม่สามารถกู้คืนได้')"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-red-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-red-700"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                    />
                </svg>

                Delete Service
            </button>

        </form>

    </div>
</div>


{{-- ========================================================= --}}
{{-- Success Message --}}
{{-- ========================================================= --}}

@if(session('success'))

    <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">

        <div class="flex items-center gap-2">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M5 13l4 4L19 7"
                />
            </svg>

            {{ session('success') }}

        </div>

    </div>

@endif


{{-- ========================================================= --}}
{{-- Error Messages --}}
{{-- ========================================================= --}}

@if($errors->any())

    <div class="rounded-xl border border-red-200 bg-red-50 p-5">

        <div class="font-semibold text-red-700">
            กรุณาตรวจสอบข้อมูล
        </div>

        <ul class="mt-2 list-inside list-disc text-sm text-red-600">

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


{{-- ========================================================= --}}
{{-- Main Update Form --}}
{{-- ========================================================= --}}

<form
    method="POST"
    action="{{ route('admin.services.update', $service) }}"
    enctype="multipart/form-data"
    class="space-y-6"
>

    @csrf
    @method('PUT')


    {{-- ===================================================== --}}
    {{-- Basic Information --}}
    {{-- ===================================================== --}}

    <div class="rounded-xl bg-white p-6 shadow-sm">

        <div>
            <h2 class="text-lg font-semibold text-gray-900">
                Basic Information
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                ข้อมูลพื้นฐานของบริการ
            </p>
        </div>


        <div class="mt-6 grid gap-6 md:grid-cols-2">


            {{-- Category --}}
            <div>

                <label
                    for="category_id"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Category
                    <span class="text-red-500">*</span>
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-gray-500 focus:ring-gray-500"
                >

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(
                                old(
                                    'category_id',
                                    $service->category_id
                                ) == $category->id
                            )
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Title --}}
            <div>

                <label
                    for="title"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Service Name
                    <span class="text-red-500">*</span>
                </label>

                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ old('title', $service->title) }}"
                    required
                    maxlength="255"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-gray-500 focus:ring-gray-500"
                    placeholder="เช่น บริการติดตั้งลิฟต์"
                >

            </div>


            {{-- Slug --}}
            <div>

                <label
                    for="slug"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Slug
                </label>

                <input
                    id="slug"
                    type="text"
                    name="slug"
                    value="{{ old('slug', $service->slug) }}"
                    maxlength="255"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-gray-500 focus:ring-gray-500"
                    placeholder="service-slug"
                >

                <p class="mt-1 text-xs text-gray-400">
                    ใช้สำหรับ URL ของบริการ
                </p>

            </div>


            {{-- Publish Date --}}
            <div>

                <label
                    for="publish_date"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Publish Date
                </label>

                <input
                    id="publish_date"
                    type="date"
                    name="publish_date"
                    value="{{ old(
                        'publish_date',
                        $service->publish_date
                            ? $service->publish_date->format('Y-m-d')
                            : now()->format('Y-m-d')
                    ) }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-gray-500 focus:ring-gray-500"
                >

            </div>


            {{-- Status --}}
            <div>

                <label
                    for="is_active"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Status
                </label>

                <select
                    id="is_active"
                    name="is_active"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-gray-500 focus:ring-gray-500"
                >

                    <option
                        value="1"
                        @selected(
                            old(
                                'is_active',
                                $service->is_active ? '1' : '0'
                            ) === '1'
                        )
                    >
                        Active — แสดงบนเว็บไซต์
                    </option>

                    <option
                        value="0"
                        @selected(
                            old(
                                'is_active',
                                $service->is_active ? '1' : '0'
                            ) === '0'
                        )
                    >
                        Hidden — ซ่อนจากเว็บไซต์
                    </option>

                </select>

            </div>

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- Short Description --}}
    {{-- ===================================================== --}}

    <div class="rounded-xl bg-white p-6 shadow-sm">

        <h2 class="text-lg font-semibold text-gray-900">
            Short Description
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            คำอธิบายสั้น ๆ สำหรับแสดงในรายการบริการ
        </p>

        <textarea
            name="short_description"
            rows="4"
            maxlength="500"
            class="mt-5 w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-gray-500 focus:ring-gray-500"
            placeholder="เขียนคำอธิบายสั้น ๆ ของบริการ..."
        >{{ old('short_description', $service->short_description) }}</textarea>

        <div class="mt-2 text-right text-xs text-gray-400">
            สูงสุด 500 ตัวอักษร
        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- Service Content --}}
    {{-- ===================================================== --}}

    <div class="rounded-xl bg-white p-6 shadow-sm">

        <h2 class="text-lg font-semibold text-gray-900">
            Service Details
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            รายละเอียดบริการแบบเต็ม
        </p>

        <textarea
            name="content"
            rows="14"
            class="mt-5 w-full rounded-lg border border-gray-300 px-4 py-3 text-sm leading-7 focus:border-gray-500 focus:ring-gray-500"
            placeholder="รายละเอียดของบริการ..."
        >{{ old('content', $service->content) }}</textarea>

    </div>


    {{-- ===================================================== --}}
    {{-- Current Images --}}
    {{-- ===================================================== --}}

    <div class="rounded-xl bg-white p-6 shadow-sm">

        <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">

            <div>

                <h2 class="text-lg font-semibold text-gray-900">
                    Current Images
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    รูปภาพที่มีอยู่ในบริการนี้
                </p>

            </div>


            <span class="inline-flex w-fit rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">

                {{ $service->images->count() }}

                {{ $service->images->count() === 1 ? 'Image' : 'Images' }}

            </span>

        </div>


        @if($service->images->count())

            <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                @foreach($service->images as $image)

                    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white">

                        {{-- Image --}}
                        <div class="relative">

                            <img
                                src="{{ Storage::url($image->path) }}"
                                alt="{{ $image->alt ?: $service->title }}"
                                class="h-52 w-full object-cover"
                                loading="lazy"
                            >

                        </div>


                        {{-- Image Information --}}
                        <div class="p-4">

                            <p class="truncate text-sm font-medium text-gray-700">

                                {{ $image->alt ?: 'No alt text' }}

                            </p>


                            <p class="mt-1 text-xs text-gray-400">

                                Image ID: {{ $image->id }}

                            </p>


                            {{-- DELETE ONLY IMAGE --}}
                            <form
                                method="POST"
                                action="{{ route('admin.service-images.destroy', $image->id) }}"
                                class="mt-4"
                                onsubmit="return confirm('ต้องการลบรูปภาพนี้ใช่หรือไม่?\n\nเฉพาะรูปนี้จะถูกลบ\nService และรูปอื่นจะไม่ถูกลบ')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-red-50 px-3 py-2.5 text-xs font-semibold text-red-600 transition hover:bg-red-100"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>

                                    Delete This Image

                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="mt-6 rounded-xl border border-dashed border-gray-300 p-10 text-center">

                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-gray-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                    </svg>

                </div>

                <p class="mt-3 text-sm font-medium text-gray-700">
                    ยังไม่มีรูปภาพ
                </p>

                <p class="mt-1 text-xs text-gray-400">
                    สามารถเพิ่มรูปภาพได้จากด้านล่าง
                </p>

            </div>

        @endif

    </div>


    {{-- ===================================================== --}}
    {{-- Add Images --}}
    {{-- ===================================================== --}}

    <div class="rounded-xl bg-white p-6 shadow-sm">

        <h2 class="text-lg font-semibold text-gray-900">
            Add More Images
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            เพิ่มรูปภาพใหม่หลายรูปพร้อมกัน
        </p>


        <div class="mt-5">

            <label
                for="images"
                class="mb-2 block text-sm font-medium text-gray-700"
            >
                Select Images
            </label>

            <input
                id="images"
                type="file"
                name="images[]"
                multiple
                accept="image/jpeg,image/png,image/webp,image/avif"
                class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-white p-3 text-sm"
            >

            <p class="mt-2 text-xs text-gray-500">
                JPG, PNG, WEBP หรือ AVIF
                — ขนาดไม่เกิน 5MB ต่อรูป
            </p>

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- Bottom Buttons --}}
    {{-- ===================================================== --}}

    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">

        <a
            href="{{ route('admin.services.index') }}"
            class="inline-flex items-center justify-center rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
        >
            Cancel
        </a>


        <button
            type="submit"
            class="inline-flex items-center justify-center gap-2 rounded-lg bg-gray-900 px-7 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-800"
        >

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M5 13l4 4L19 7"
                />
            </svg>

            Save Changes

        </button>

    </div>

</form>

</div>

@endsection
