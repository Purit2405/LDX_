@extends('layouts.admin.app')

@section('title', 'Edit Certificate')

@section('content')

<div class="mx-auto max-w-4xl space-y-6">


{{-- Header --}}
<div>
    <a
        href="{{ route('admin.about.certificates.index') }}"
        class="inline-flex items-center text-sm text-gray-500 transition hover:text-indigo-400"
    >
        ← Back to Certificates
    </a>

    <h1 class="mt-3 text-2xl font-bold text-white">
        Edit Certificate
    </h1>

    <p class="mt-1 text-sm text-gray-400">
        แก้ไขข้อมูลใบรับรองหรือมาตรฐานของบริษัท
    </p>
</div>


{{-- Validation Errors --}}
@if($errors->any())
    <div class="rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3">
        <p class="mb-2 text-sm font-semibold text-red-400">
            ไม่สามารถบันทึกข้อมูลได้
        </p>

        <ul class="list-inside list-disc space-y-1 text-xs text-red-300">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{-- Form --}}
<form
    method="POST"
    action="{{ route('admin.about.certificates.update', $certificate) }}"
    enctype="multipart/form-data"
    class="space-y-6"
>

    @csrf
    @method('PUT')


    <div class="space-y-6 rounded-2xl border border-gray-800 bg-gray-950 p-6">


        {{-- Certificate Name --}}
        <div>

            <label class="mb-2 block text-sm font-medium text-gray-300">
                Certificate Name <span class="text-red-400">*</span>
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $certificate->name) }}"
                required
                placeholder="ISO 9001:2015"
                class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-sm text-white outline-none transition focus:border-indigo-500"
            >

            @error('name')
                <p class="mt-2 text-xs text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Issuer + Certificate Number --}}
        <div class="grid gap-6 md:grid-cols-2">

            <div>

                <label class="mb-2 block text-sm font-medium text-gray-300">
                    Issuing Organization
                </label>

                <input
                    type="text"
                    name="issuer"
                    value="{{ old('issuer', $certificate->issuer) }}"
                    placeholder="ISO / TISI / TÜV"
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-sm text-white outline-none transition focus:border-indigo-500"
                >

                @error('issuer')
                    <p class="mt-2 text-xs text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-gray-300">
                    Certificate Number
                </label>

                <input
                    type="text"
                    name="certificate_number"
                    value="{{ old('certificate_number', $certificate->certificate_number) }}"
                    placeholder="CERT-2026-001"
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-sm text-white outline-none transition focus:border-indigo-500"
                >

                @error('certificate_number')
                    <p class="mt-2 text-xs text-red-400">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>


        {{-- Issued Date --}}
        <div>

            <label class="mb-2 block text-sm font-medium text-gray-300">
                Issued Date
            </label>

            <input
                type="date"
                name="issued_date"
                value="{{ old(
                    'issued_date',
                    $certificate->issued_date
                        ? $certificate->issued_date->format('Y-m-d')
                        : ''
                ) }}"
                class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-sm text-white outline-none transition focus:border-indigo-500"
            >

            @error('issued_date')
                <p class="mt-2 text-xs text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Current Image --}}
        @if($certificate->image)

            <div>

                <p class="mb-2 text-sm font-medium text-gray-300">
                    Current Certificate Image
                </p>

                <div class="overflow-hidden rounded-xl border border-gray-800 bg-gray-900">

                    <img
                        src="{{ Storage::url($certificate->image) }}"
                        alt="{{ $certificate->name }}"
                        class="max-h-80 w-full object-contain"
                    >

                </div>

            </div>

        @endif


        {{-- Replace Image --}}
        <div>

            <label class="mb-2 block text-sm font-medium text-gray-300">
                Replace Certificate Image
            </label>

            <input
                type="file"
                name="image"
                accept="image/jpeg,image/png,image/webp,image/avif"
                class="block w-full rounded-xl border border-gray-800 bg-gray-900 text-sm text-gray-400 file:mr-4 file:border-0 file:bg-indigo-600 file:px-4 file:py-3 file:text-white hover:file:bg-indigo-500"
            >

            <p class="mt-2 text-xs text-gray-500">
                JPG, JPEG, PNG, WEBP หรือ AVIF สูงสุด 5MB
            </p>

            @error('image')
                <p class="mt-2 text-xs text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Description --}}
        <div>

            <label class="mb-2 block text-sm font-medium text-gray-300">
                Description
            </label>

            <textarea
                name="description"
                rows="6"
                placeholder="รายละเอียด Certificate..."
                class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-sm text-white outline-none transition focus:border-indigo-500"
            >{{ old('description', $certificate->description) }}</textarea>

            @error('description')
                <p class="mt-2 text-xs text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Active --}}
        <div class="rounded-xl border border-gray-800 bg-gray-900/50 p-4">

            <label class="flex cursor-pointer items-center gap-3">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $certificate->is_active) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-gray-700 bg-gray-900 text-indigo-600 focus:ring-indigo-500"
                >

                <div>
                    <p class="text-sm font-medium text-gray-300">
                        Active Certificate
                    </p>

                    <p class="mt-0.5 text-xs text-gray-500">
                        แสดง Certificate นี้บนเว็บไซต์
                    </p>
                </div>

            </label>

        </div>

    </div>


    {{-- Actions --}}
    <div class="flex justify-end gap-3">

        <a
            href="{{ route('admin.about.certificates.index') }}"
            class="rounded-xl bg-gray-800 px-5 py-3 text-sm font-medium text-gray-300 transition hover:bg-gray-700"
        >
            Cancel
        </a>

        <button
            type="submit"
            class="rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-500"
        >
            Update Certificate
        </button>

    </div>

</form>

</div>

@endsection
