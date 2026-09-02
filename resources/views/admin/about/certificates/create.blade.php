@extends('layouts.admin.app')

@section('title', 'Add Certificate')

@section('content')

<div class="mx-auto max-w-4xl space-y-6">

    {{-- ============================================================
        HEADER
    ============================================================= --}}
    <div>

        <a
            href="{{ route('admin.about.certificates.index') }}"
            class="inline-flex items-center gap-2 text-sm text-gray-500 transition hover:text-[#f2a93b]"
        >
            <span>←</span>
            <span>Back to Certificates</span>
        </a>

        <h1 class="mt-4 text-2xl font-semibold tracking-tight text-white">
            Add Certificate
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            เพิ่มใบรับรอง มาตรฐาน หรือเอกสารรับรองของบริษัท
        </p>

    </div>


    {{-- ============================================================
        VALIDATION ERROR
    ============================================================= --}}
    @if ($errors->any())

        <div class="rounded-xl border border-red-900/50 bg-red-950/30 p-4">

            <div class="flex gap-3">

                <svg
                    class="mt-0.5 h-5 w-5 shrink-0 text-red-400"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v4m0 4h.01M10.29 3.86l-7.82 14a2 2 0 001.74 3h15.58a2 2 0 001.74-3l-7.82-14a2 2 0 00-3.42 0z"
                    />
                </svg>

                <div>

                    <p class="text-sm font-medium text-red-300">
                        กรุณาตรวจสอบข้อมูล
                    </p>

                    <ul class="mt-2 space-y-1 text-xs text-red-400">

                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- ============================================================
        FORM
    ============================================================= --}}
    <form
        method="POST"
        action="{{ route('admin.about.certificates.store') }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf


        {{-- ========================================================
            BASIC INFORMATION
        ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-[#23262c] bg-[#0b0d10]">

            <div class="border-b border-[#23262c] px-6 py-5">

                <h2 class="text-sm font-semibold text-[#ece9e2]">
                    Certificate Information
                </h2>

                <p class="mt-1 text-xs text-[#6f7278]">
                    ข้อมูลพื้นฐานของ Certificate
                </p>

            </div>


            <div class="space-y-6 p-6">

                {{-- Certificate Name --}}
                <div>

                    <label
                        for="name"
                        class="mb-2 block text-sm font-medium text-[#d8d5cd]"
                    >
                        Certificate Name
                        <span class="text-red-400">*</span>
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        placeholder="เช่น ISO 9001:2015"
                        class="w-full rounded-xl border border-[#2a2d33] bg-[#141619] px-4 py-3 text-sm text-white placeholder-[#55585f] outline-none transition focus:border-[#f2a93b] focus:ring-1 focus:ring-[#f2a93b]/30"
                    >

                    @error('name')
                        <p class="mt-2 text-xs text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Certificate Number + Issuer --}}
                <div class="grid gap-6 md:grid-cols-2">

                    {{-- Certificate Number --}}
                    <div>

                        <label
                            for="certificate_number"
                            class="mb-2 block text-sm font-medium text-[#d8d5cd]"
                        >
                            Certificate Number
                        </label>

                        <input
                            id="certificate_number"
                            type="text"
                            name="certificate_number"
                            value="{{ old('certificate_number') }}"
                            placeholder="เช่น CERT-2026-001"
                            class="w-full rounded-xl border border-[#2a2d33] bg-[#141619] px-4 py-3 text-sm text-white placeholder-[#55585f] outline-none transition focus:border-[#f2a93b] focus:ring-1 focus:ring-[#f2a93b]/30"
                        >

                        @error('certificate_number')
                            <p class="mt-2 text-xs text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Issuer --}}
                    <div>

                        <label
                            for="issuer"
                            class="mb-2 block text-sm font-medium text-[#d8d5cd]"
                        >
                            Issuing Organization
                        </label>

                        <input
                            id="issuer"
                            type="text"
                            name="issuer"
                            value="{{ old('issuer') }}"
                            placeholder="เช่น ISO / TISI / TÜV"
                            class="w-full rounded-xl border border-[#2a2d33] bg-[#141619] px-4 py-3 text-sm text-white placeholder-[#55585f] outline-none transition focus:border-[#f2a93b] focus:ring-1 focus:ring-[#f2a93b]/30"
                        >

                        @error('issuer')
                            <p class="mt-2 text-xs text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- Issued Date --}}
                <div class="max-w-md">

                    <label
                        for="issued_date"
                        class="mb-2 block text-sm font-medium text-[#d8d5cd]"
                    >
                        Issued Date
                    </label>

                    <input
                        id="issued_date"
                        type="date"
                        name="issued_date"
                        value="{{ old('issued_date') }}"
                        class="w-full rounded-xl border border-[#2a2d33] bg-[#141619] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b] focus:ring-1 focus:ring-[#f2a93b]/30"
                    >

                    @error('issued_date')
                        <p class="mt-2 text-xs text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

        </div>


        {{-- ========================================================
            CERTIFICATE IMAGE
        ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-[#23262c] bg-[#0b0d10]">

            <div class="border-b border-[#23262c] px-6 py-5">

                <h2 class="text-sm font-semibold text-[#ece9e2]">
                    Certificate Image
                </h2>

                <p class="mt-1 text-xs text-[#6f7278]">
                    อัปโหลดรูปใบรับรองของบริษัท
                </p>

            </div>


            <div class="p-6">

                <label
                    for="image"
                    class="mb-2 block text-sm font-medium text-[#d8d5cd]"
                >
                    Certificate Image
                    <span class="text-red-400">*</span>
                </label>

                <input
                    id="image"
                    type="file"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp,.avif,image/*"
                    required
                    class="block w-full cursor-pointer rounded-xl border border-[#2a2d33] bg-[#141619] text-sm text-[#8a8d94]
                    file:mr-4 file:border-0
                    file:bg-[#f2a93b]
                    file:px-5
                    file:py-3
                    file:text-sm
                    file:font-medium
                    file:text-[#0b0d10]
                    hover:file:bg-[#ffc15c]"
                >

                <p class="mt-2 text-xs text-[#55585f]">
                    รองรับ JPG, JPEG, PNG, WEBP และ AVIF ขนาดไม่เกิน 5MB
                </p>

                @error('image')
                    <p class="mt-2 text-xs text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>


        {{-- ========================================================
            DESCRIPTION
        ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-[#23262c] bg-[#0b0d10]">

            <div class="border-b border-[#23262c] px-6 py-5">

                <h2 class="text-sm font-semibold text-[#ece9e2]">
                    Description
                </h2>

                <p class="mt-1 text-xs text-[#6f7278]">
                    รายละเอียดเพิ่มเติมเกี่ยวกับ Certificate
                </p>

            </div>


            <div class="p-6">

                <label
                    for="description"
                    class="mb-2 block text-sm font-medium text-[#d8d5cd]"
                >
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="6"
                    placeholder="รายละเอียด Certificate..."
                    class="w-full resize-y rounded-xl border border-[#2a2d33] bg-[#141619] px-4 py-3 text-sm text-white placeholder-[#55585f] outline-none transition focus:border-[#f2a93b] focus:ring-1 focus:ring-[#f2a93b]/30"
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="mt-2 text-xs text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>


        {{-- ========================================================
            STATUS
        ========================================================= --}}
        <div class="overflow-hidden rounded-2xl border border-[#23262c] bg-[#0b0d10]">

            <div class="p-6">

                <label class="flex cursor-pointer items-start gap-3">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ old('is_active', true) ? 'checked' : '' }}
                        class="mt-0.5 h-4 w-4 rounded border-[#3a3d44] bg-[#141619] text-[#f2a93b] focus:ring-[#f2a93b]/30"
                    >

                    <span>

                        <span class="block text-sm font-medium text-[#d8d5cd]">
                            Active Certificate
                        </span>

                        <span class="mt-1 block text-xs text-[#6f7278]">
                            แสดง Certificate นี้บนเว็บไซต์
                        </span>

                    </span>

                </label>

            </div>

        </div>


        {{-- ========================================================
            ACTIONS
        ========================================================= --}}
        <div class="flex items-center justify-end gap-3">

            <a
                href="{{ route('admin.about.certificates.index') }}"
                class="rounded-xl border border-[#2a2d33] bg-[#141619] px-5 py-3 text-sm font-medium text-[#a3a6ad] transition hover:bg-[#1a1c20] hover:text-[#ece9e2]"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-xl bg-[#f2a93b] px-6 py-3 text-sm font-semibold text-[#0b0d10] transition hover:bg-[#ffc15c] focus:outline-none focus:ring-2 focus:ring-[#f2a93b]/40"
            >
                Save Certificate
            </button>

        </div>

    </form>

</div>

@endsection