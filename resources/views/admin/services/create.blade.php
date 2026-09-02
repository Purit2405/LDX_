blade
@extends('layouts.admin.app')

@section('title', 'Add Service')
@section('page-title', 'Add Service')

@section('content')

<div class="mx-auto max-w-5xl space-y-6">

    {{-- Header --}}
    <div>

        <div class="flex items-center gap-2 text-sm text-gray-500">

            <a
                href="{{ route('admin.services.index') }}"
                class="hover:text-gray-900"
            >
                Services
            </a>

            <span>/</span>

            <span>Add Service</span>

        </div>

        <h1 class="mt-2 text-2xl font-bold text-gray-900">
            Add Service
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            เพิ่มบริการใหม่ให้กับเว็บไซต์ LDX Elevator
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

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('admin.services.store') }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf


        {{-- Basic --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-gray-900">
                Basic Information
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                ข้อมูลหลักของบริการ
            </p>


            <div class="mt-6 grid gap-6 md:grid-cols-2">

                {{-- Category --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Category <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="category_id"
                        required
                        class="w-full rounded-lg border-gray-300 px-4 py-3 text-sm"
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
                        Service Name <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        placeholder="Passenger Elevator"
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
                        placeholder="passenger-elevator"
                        class="w-full rounded-lg border-gray-300 px-4 py-3 text-sm"
                    >

                    <p class="mt-1 text-xs text-gray-500">
                        หากไม่กรอก ระบบจะสร้างจาก Service Name
                    </p>

                </div>


                {{-- Publish Date --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Publish Date
                    </label>

                    <input
                        type="date"
                        name="publish_date"
                        value="{{ old('publish_date', now()->format('Y-m-d')) }}"
                        class="w-full rounded-lg border-gray-300 px-4 py-3 text-sm"
                    >

                    <p class="mt-1 text-xs text-gray-500">
                        วันที่เผยแพร่ ไม่มีเวลา
                    </p>

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

            <p class="mt-1 text-sm text-gray-500">
                คำอธิบายสั้น ๆ ที่ใช้แสดงในรายการบริการ
            </p>

            <textarea
                name="short_description"
                rows="4"
                maxlength="500"
                class="mt-5 w-full rounded-lg border-gray-300 px-4 py-3 text-sm"
                placeholder="อธิบายบริการโดยย่อ..."
            >{{ old('short_description') }}</textarea>

        </div>


        {{-- Content --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-gray-900">
                Service Details
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                รายละเอียดบริการแบบเต็ม
            </p>

            <textarea
                name="content"
                rows="12"
                class="mt-5 w-full rounded-lg border-gray-300 px-4 py-3 text-sm"
                placeholder="รายละเอียดบริการ..."
            >{{ old('content') }}</textarea>

        </div>


        {{-- Images --}}
        <div class="rounded-xl bg-white p-6 shadow-sm">

            <h2 class="text-lg font-semibold text-gray-900">
                Service Images
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                สามารถเลือกหลายรูปพร้อมกันได้ สูงสุด 20 รูป
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
                href="{{ route('admin.services.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-lg bg-gray-900 px-7 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
            >
                Save Service
            </button>

        </div>

    </form>

</div>

@endsection

