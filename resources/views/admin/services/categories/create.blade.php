blade
@extends('layouts.admin.app')

@section('title', 'Add Service Category')
@section('page-title', 'Add Service Category')

@section('content')

<div class="mx-auto max-w-3xl space-y-6">

    <div>

        <a
            href="{{ route('admin.service-categories.index') }}"
            class="text-sm text-gray-500 hover:text-gray-900"
        >
            ← Back to Categories
        </a>

        <h1 class="mt-3 text-2xl font-bold text-gray-900">
            Add Service Category
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            สร้างหมวดหมู่สำหรับจัดกลุ่มบริการ
        </p>

    </div>


    @if($errors->any())

        <div class="rounded-xl border border-red-200 bg-red-50 p-5">

            <ul class="list-inside list-disc text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('admin.service-categories.store') }}"
        class="space-y-6"
    >

        @csrf


        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold">
                Category Information
            </h2>


            <div class="mt-6 space-y-5">

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
                        placeholder="Elevator Installation"
                        class="w-full rounded-lg border-gray-300 px-4 py-3 text-sm"
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
                        placeholder="elevator-installation"
                        class="w-full rounded-lg border-gray-300 px-4 py-3 text-sm"
                    >

                    <p class="mt-1 text-xs text-gray-500">
                        หากไม่กรอก ระบบจะสร้างให้อัตโนมัติ
                    </p>

                </div>


                {{-- Description --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        placeholder="รายละเอียดหมวดหมู่..."
                        class="w-full rounded-lg border-gray-300 px-4 py-3 text-sm"
                    >{{ old('description') }}</textarea>

                </div>


                {{-- Status --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Status
                    </label>

                    <select
                        name="is_active"
                        class="w-full rounded-lg border-gray-300 px-4 py-3 text-sm"
                    >

                        <option value="1" @selected(old('is_active', '1') === '1')>
                            Active — ใช้งาน
                        </option>

                        <option value="0" @selected(old('is_active') === '0')>
                            Hidden — ปิดการใช้งาน
                        </option>

                    </select>

                </div>

            </div>

        </div>


        <div class="flex items-center justify-between">

            <a
                href="{{ route('admin.service-categories.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-lg bg-gray-900 px-7 py-2.5 text-sm font-semibold text-white"
            >
                Save Category
            </button>

        </div>

    </form>

</div>

@endsection

