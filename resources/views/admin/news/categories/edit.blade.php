@extends('layouts.admin.app')

@section('title', 'Edit News Category')
@section('page-title', 'Edit News Category')

@section('content')

<div class="mx-auto max-w-3xl space-y-6">

    {{-- Header --}}
    <div>

        <div class="flex items-center gap-2 text-sm text-gray-500">

            <a
                href="{{ route('admin.news-categories.index') }}"
                class="hover:text-gray-900"
            >
                News Categories
            </a>

            <span>/</span>

            <span>Edit</span>

        </div>


        <h1 class="mt-2 text-2xl font-bold text-gray-900">
            Edit News Category
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            แก้ไขข้อมูลหมวดหมู่ข่าว
        </p>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error --}}
    @if(session('error'))

        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ session('error') }}
        </div>

    @endif


    {{-- Validation Errors --}}
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


    {{-- Main Form --}}
    <form
        method="POST"
        action="{{ route('admin.news-categories.update', $newsCategory) }}"
        class="space-y-6"
    >

        @csrf
        @method('PUT')


        {{-- Information --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-gray-900">
                Category Information
            </h2>


            <div class="mt-6 space-y-5">

                {{-- Name --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Category Name
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $newsCategory->name) }}"
                        required
                        maxlength="255"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-gray-500 focus:outline-none"
                    >

                </div>


                {{-- Slug --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Slug
                    </label>

                    <input
                        type="text"
                        name="slug"
                        value="{{ old('slug', $newsCategory->slug) }}"
                        maxlength="255"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-gray-500 focus:outline-none"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        ระบบจะตรวจสอบ Slug ซ้ำให้อัตโนมัติ
                    </p>

                </div>


                {{-- Status --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Status
                    </label>

                    <select
                        name="is_active"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                    >

                        <option
                            value="1"
                            @selected(old(
                                'is_active',
                                $newsCategory->is_active ? '1' : '0'
                            ) === '1')
                        >
                            Active — แสดงบนเว็บไซต์
                        </option>

                        <option
                            value="0"
                            @selected(old(
                                'is_active',
                                $newsCategory->is_active ? '1' : '0'
                            ) === '0')
                        >
                            Hidden — ซ่อนจากเว็บไซต์
                        </option>

                    </select>

                </div>

            </div>

        </div>


        {{-- Category Usage --}}
        <div class="rounded-xl bg-gray-50 p-6">

            <h2 class="text-sm font-semibold text-gray-900">
                Category Usage
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                หมวดหมู่นี้มี News อยู่
                <span class="font-semibold text-gray-900">
                    {{ $newsCategory->news()->count() }}
                </span>
                รายการ
            </p>

            <p class="mt-2 text-xs text-gray-500">
                หมวดหมู่ที่มี News อยู่จะไม่สามารถลบได้
            </p>

        </div>


        {{-- Buttons --}}
        <div class="flex items-center justify-between">

            <a
                href="{{ route('admin.news-categories.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Cancel
            </a>


            <button
                type="submit"
                class="rounded-lg bg-gray-900 px-7 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
            >
                Save Changes
            </button>

        </div>

    </form>


    {{-- Danger Zone --}}
    <div class="rounded-xl border border-red-200 bg-red-50 p-6">

        <h2 class="text-lg font-semibold text-red-700">
            Danger Zone
        </h2>

        <p class="mt-1 text-sm text-red-600">
            ลบหมวดหมู่นี้ได้เฉพาะกรณีที่ไม่มี News อยู่ภายในหมวดหมู่
        </p>


        <form
            method="POST"
            action="{{ route('admin.news-categories.destroy', $newsCategory) }}"
            class="mt-5"
            onsubmit="return confirm('ยืนยันลบหมวดหมู่นี้?')"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="rounded-lg bg-red-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-red-700"
            >
                Delete Category
            </button>

        </form>

    </div>

</div>

@endsection