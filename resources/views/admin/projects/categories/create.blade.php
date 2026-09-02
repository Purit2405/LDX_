@extends('layouts.admin.app')

@section('title', 'Add Project Category')

@section('page-title', 'Add Project Category')

@section('content')

<div class="mx-auto max-w-3xl space-y-6">

    <div>

        <div class="flex items-center gap-2 text-sm text-gray-500">

            <a
                href="{{ route('admin.project-categories.index') }}"
                class="hover:text-gray-900"
            >
                Project Categories
            </a>

            <span>/</span>

            <span>Add</span>

        </div>

        <h1 class="mt-2 text-2xl font-bold text-gray-900">
            Add Project Category
        </h1>

    </div>


    @if($errors->any())

        <div class="rounded-xl border border-red-200 bg-red-50 p-5">

            <div class="font-semibold text-red-700">
                กรุณาตรวจสอบข้อมูล
            </div>

            <ul class="mt-2 list-inside list-disc text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('admin.project-categories.store') }}"
        class="rounded-xl bg-white p-6 shadow-sm"
    >

        @csrf


        <div class="space-y-6">

            {{-- Name --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Category Name <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                    placeholder="เช่น Elevator Installation"
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
                    placeholder="elevator-installation"
                >

            </div>


            {{-- Description --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                >{{ old('description') }}</textarea>

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
                        @selected(old('is_active', '1') === '1')
                    >
                        Active
                    </option>

                    <option
                        value="0"
                        @selected(old('is_active') === '0')
                    >
                        Hidden
                    </option>

                </select>

            </div>


            {{-- Buttons --}}
            <div class="flex items-center justify-between">

                <a
                    href="{{ route('admin.project-categories.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-gray-900 px-6 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
                >
                    Create Category
                </button>

            </div>

        </div>

    </form>

</div>

@endsection