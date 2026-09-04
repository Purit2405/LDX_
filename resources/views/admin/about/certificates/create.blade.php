
@extends('layouts.admin.app')

@section('title', 'Add Certificate')

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
            Add Certificate
        </h1>

        <p class="ldx-page-description">
            เพิ่มใบรับรอง มาตรฐาน หรือเอกสารรับรองของบริษัท
        </p>

    </div>


    {{-- Validation Error --}}
    @if ($errors->any())

        <div class="ldx-alert ldx-alert-danger">

            <div class="ldx-alert-content">

                <div>

                    <p class="ldx-alert-title">
                        กรุณาตรวจสอบข้อมูล
                    </p>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- Form --}}
    <form
        method="POST"
        action="{{ route('admin.about.certificates.store') }}"
        enctype="multipart/form-data"
        class="ldx-form"
    >

        @csrf


        {{-- Basic Information --}}
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
                        value="{{ old('name') }}"
                        required
                        placeholder="เช่น ISO 9001:2015"
                        class="ldx-input"
                    >

                    @error('name')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Certificate Number + Issuer --}}
                <div class="ldx-form-grid">

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
                            value="{{ old('certificate_number') }}"
                            placeholder="เช่น CERT-2026-001"
                            class="ldx-input"
                        >

                        @error('certificate_number')

                            <p class="ldx-error">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


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
                            value="{{ old('issuer') }}"
                            placeholder="เช่น ISO / TISI / TÜV"
                            class="ldx-input"
                        >

                        @error('issuer')

                            <p class="ldx-error">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>


                {{-- Issued Date --}}
                <div class="ldx-form-group ldx-form-group-small">

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
                        value="{{ old('issued_date') }}"
                        class="ldx-input"
                    >

                    @error('issued_date')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>

        </div>


        {{-- Certificate Image --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Certificate Image
                </h2>

                <p class="ldx-card-description">
                    อัปโหลดรูปใบรับรองของบริษัท
                </p>

            </div>


            <div class="ldx-card-body">

                <div class="ldx-form-group">

                    <label
                        for="image"
                        class="ldx-label"
                    >
                        Certificate Image
                        <span class="ldx-required">*</span>
                    </label>

                    <input
                        id="image"
                        type="file"
                        name="image"
                        accept=".jpg,.jpeg,.png,.webp,.avif,image/*"
                        required
                        class="ldx-file-input"
                    >

                    <p class="ldx-help">
                        รองรับ JPG, JPEG, PNG, WEBP และ AVIF ขนาดไม่เกิน 5MB
                    </p>

                    @error('image')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>

        </div>


        {{-- Description --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Description
                </h2>

                <p class="ldx-card-description">
                    รายละเอียดเพิ่มเติมเกี่ยวกับ Certificate
                </p>

            </div>


            <div class="ldx-card-body">

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
                    >{{ old('description') }}</textarea>

                    @error('description')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>

        </div>


        {{-- Status --}}
        <div class="ldx-card">

            <div class="ldx-card-body">

                <label class="ldx-checkbox">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ old('is_active', true) ? 'checked' : '' }}
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
                Save Certificate
            </button>

        </div>

    </form>

</div>

@endsection

