@extends('layouts.admin.app')

@section('title', 'Create News Category')
@section('page-title', 'Create News Category')

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

            <span>Create</span>

        </div>


        <h1 class="mt-2 text-2xl font-bold text-gray-900">
            Create News Category
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            สร้างหมวดหมู่ข่าวใหม่
        </p>

    </div>


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


    {{-- Form --}}
    <form
        method="POST"
        action="{{ route('admin.news-categories.store') }}"
        class="space-y-6"
    >

        @csrf


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
                        value="{{ old('name') }}"
                        required
                        maxlength="255"
                        placeholder="เช่น Company News"
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
                        value="{{ old('slug') }}"
                        maxlength="255"
                        placeholder="company-news"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-gray-500 focus:outline-none"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        หากไม่กรอก ระบบจะสร้าง Slug จากชื่อหมวดหมู่อัตโนมัติ
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

                        <option value="1" @selected(old('is_active', '1') === '1')>
                            Active — แสดงบนเว็บไซต์
                        </option>

                        <option value="0" @selected(old('is_active') === '0')>
                            Hidden — ซ่อนจากเว็บไซต์
                        </option>

                    </select>

                </div>

            </div>

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
                Create Category
            </button>

        </div>

    </form>

</div>

@endsection