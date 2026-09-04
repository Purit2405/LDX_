
@extends('layouts.admin.app')

@section('title', 'Edit Certificate')

@section('content')

<div class="ldx-page ldx-page-form">

    {{-- Header --}}
    <div class="ldx-page-header">

        <a
            href="{{ route('admin.about.certificates.index') }}"
            class="ldx-page-back"
        >
            <span>←</span>
            <span>Back to Certificates</span>
        </a>

        <h1 class="ldx-page-title">
            Edit Certificate
        </h1>

        <p class="ldx-page-description">
            แก้ไขข้อมูลใบรับรองหรือมาตรฐานของบริษัท
        </p>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="ldx-alert ldx-alert-danger">

            <p class="ldx-alert-title">
                ไม่สามารถบันทึกข้อมูลได้
            </p>

            <ul>
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
        class="ldx-form"
    >

        @csrf
        @method('PUT')


        {{-- Certificate Information --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Certificate Information
                </h2>

                <p class="ldx-card-description">
                    ข้อมูลพื้นฐานของ Certificate
                </p>

            </div>


            <div class="ldx-card-body">

                {{-- Certificate Name --}}
                <div class="ldx-form-group">

                    <label
                        for="name"
                        class="ldx-label"
                    >
                        Certificate Name
                        <span class="ldx-required">*</span>
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name', $certificate->name) }}"
                        required
                        placeholder="ISO 9001:2015"
                        class="ldx-input"
                    >

                    @error('name')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Issuer + Certificate Number --}}
                <div class="ldx-form-grid">

                    {{-- Issuer --}}
                    <div class="ldx-form-group">

                        <label
                            for="issuer"
                            class="ldx-label"
                        >
                            Issuing Organization
                        </label>

                        <input
                            id="issuer"
                            type="text"
                            name="issuer"
                            value="{{ old('issuer', $certificate->issuer) }}"
                            placeholder="ISO / TISI / TÜV"
                            class="ldx-input"
                        >

                        @error('issuer')

                            <p class="ldx-error">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Certificate Number --}}
                    <div class="ldx-form-group">

                        <label
                            for="certificate_number"
                            class="ldx-label"
                        >
                            Certificate Number
                        </label>

                        <input
                            id="certificate_number"
                            type="text"
                            name="certificate_number"
                            value="{{ old('certificate_number', $certificate->certificate_number) }}"
                            placeholder="CERT-2026-001"
                            class="ldx-input"
                        >

                        @error('certificate_number')

                            <p class="ldx-error">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>


                {{-- Issued Date --}}
                <div class="ldx-form-group">

                    <label
                        for="issued_date"
                        class="ldx-label"
                    >
                        Issued Date
                    </label>

                    <input
                        id="issued_date"
                        type="date"
                        name="issued_date"
                        value="{{ old(
                            'issued_date',
                            $certificate->issued_date
                                ? $certificate->issued_date->format('Y-m-d')
                                : ''
                        ) }}"
                        class="ldx-input"
                    >

                    @error('issued_date')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Current Image --}}
                @if($certificate->image)

                    <div class="ldx-form-group">

                        <p class="ldx-label">
                            Current Certificate Image
                        </p>

                        <div class="ldx-image-preview">

                            <img
                                src="{{ Storage::url($certificate->image) }}"
                                alt="{{ $certificate->name }}"
                            >

                        </div>

                    </div>

                @endif


                {{-- Replace Image --}}
                <div class="ldx-form-group">

                    <label
                        for="image"
                        class="ldx-label"
                    >
                        Replace Certificate Image
                    </label>

                    <input
                        id="image"
                        type="file"
                        name="image"
                        accept="image/jpeg,image/png,image/webp,image/avif"
                        class="ldx-file-input"
                    >

                    <p class="ldx-help">
                        JPG, JPEG, PNG, WEBP หรือ AVIF สูงสุด 5MB
                    </p>

                    @error('image')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Description --}}
                <div class="ldx-form-group">

                    <label
                        for="description"
                        class="ldx-label"
                    >
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        placeholder="รายละเอียด Certificate..."
                        class="ldx-textarea"
                    >{{ old('description', $certificate->description) }}</textarea>

                    @error('description')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Active --}}
                <div class="ldx-status-box">

                    <label class="ldx-checkbox">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', $certificate->is_active) ? 'checked' : '' }}
                        >

                        <span>

                            <span class="ldx-checkbox-title">
                                Active Certificate
                            </span>

                            <span class="ldx-checkbox-description">
                                แสดง Certificate นี้บนเว็บไซต์
                            </span>

                        </span>

                    </label>

                </div>

            </div>

        </div>


        {{-- Actions --}}
        <div class="ldx-form-actions">

            <a
                href="{{ route('admin.about.certificates.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="ldx-button ldx-button-primary"
            >
                Update Certificate
            </button>

        </div>

    </form>

</div>

@endsection

