
@extends('layouts.admin.app')

@section('title', 'Add Project')
@section('page-title', 'Add Project')

@section('content')

<div class="mx-auto max-w-5xl space-y-6">

    {{-- Header --}}
    <div>

        <div class="flex items-center gap-2 text-sm text-gray-500">

            <a
                href="{{ route('admin.projects.index') }}"
                class="hover:text-gray-900"
            >
                Projects
            </a>

            <span>/</span>

            <span>Add</span>

        </div>

        <h1 class="mt-2 text-2xl font-bold text-gray-900">
            Add Project
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            เพิ่มข้อมูลโครงการใหม่
        </p>

    </div>


    {{-- Errors --}}
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
        action="{{ route('admin.projects.store') }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf


        {{-- Basic Information --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-gray-900">
                Basic Information
            </h2>

            <div class="mt-6 grid gap-6 md:grid-cols-2">

                {{-- Category --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Category <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="category_id"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                    >

                        <option value="">
                            Select Category
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected(old('category_id') == $category->id)
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Title --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Project Name <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                        placeholder="Project Name"
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
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                        placeholder="project-name"
                    >

                    <p class="mt-1 text-xs text-gray-500">
                        เว้นว่างได้ ระบบจะสร้างจาก Project Name
                    </p>

                </div>


                {{-- Project Date --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Project Date
                    </label>

                    <input
                        type="date"
                        name="project_date"
                        value="{{ old('project_date', now()->format('Y-m-d')) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                    >

                </div>


                {{-- Client --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Client
                    </label>

                    <input
                        type="text"
                        name="client"
                        value="{{ old('client') }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                        placeholder="Client name"
                    >

                </div>


                {{-- Location --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Location
                    </label>

                    <input
                        type="text"
                        name="location"
                        value="{{ old('location') }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                        placeholder="Project location"
                    >

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


        {{-- Short Description --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-gray-900">
                Short Description
            </h2>

            <textarea
                name="short_description"
                rows="4"
                maxlength="500"
                class="mt-5 w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                placeholder="Short description..."
            >{{ old('short_description') }}</textarea>

        </div>


        {{-- Content --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-gray-900">
                Project Details
            </h2>

            <textarea
                name="content"
                rows="12"
                class="mt-5 w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                placeholder="Project details..."
            >{{ old('content') }}</textarea>

        </div>


        {{-- Images --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-gray-900">
                Project Images
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                สามารถเลือกรูปหลายรูปพร้อมกันได้
            </p>

            <div class="mt-5">

                <input
                    type="file"
                    name="images[]"
                    multiple
                    accept="image/jpeg,image/png,image/webp,image/avif"
                    class="block w-full rounded-lg border border-gray-300 p-3 text-sm"
                >

                <p class="mt-2 text-xs text-gray-500">
                    JPG, PNG, WEBP หรือ AVIF — ขนาดไม่เกิน 5MB ต่อรูป
                </p>

            </div>

        </div>


        {{-- Buttons --}}
        <div class="flex items-center justify-between">

            <a
                href="{{ route('admin.projects.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-lg bg-gray-900 px-7 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
            >
                Create Project
            </button>

        </div>

    </form>

</div>

@endsection

