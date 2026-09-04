
@extends('layouts.admin.app')

@section('title', 'Add Service')

@section('page-title', 'Add Service')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header">

        <div class="ldx-breadcrumb">
            <a
                href="{{ route('admin.services.index') }}"
                class="ldx-breadcrumb-link"
            >
                Services
            </a>

            <span class="ldx-breadcrumb-separator">/</span>

            <span class="ldx-breadcrumb-current">
                Add Service
            </span>
        </div>

        <h1 class="ldx-page-title">
            Add Service
        </h1>

        <p class="ldx-page-description">
            เพิ่มบริการใหม่ให้กับเว็บไซต์ LDX Elevator
        </p>

    </div>


    {{-- Errors --}}
    @if($errors->any())

        <div class="ldx-alert ldx-alert-danger">

            <div class="ldx-alert-title">
                กรุณาตรวจสอบข้อมูล
            </div>

            <ul class="ldx-alert-list">
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
        class="ldx-form"
    >

        @csrf


        {{-- Basic Information --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Basic Information
                </h2>

                <p class="ldx-card-description">
                    ข้อมูลหลักของบริการ
                </p>

            </div>


            <div class="ldx-card-body">

                <div class="ldx-form-grid ldx-form-grid-2">

                    {{-- Category --}}
                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Category
                            <span class="ldx-required">*</span>
                        </label>

                        <select
                            name="category_id"
                            required
                            class="ldx-select"
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
                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Service Name
                            <span class="ldx-required">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            required
                            placeholder="Passenger Elevator"
                            class="ldx-input"
                        >

                    </div>


                    {{-- Slug --}}
                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Slug
                        </label>

                        <input
                            type="text"
                            name="slug"
                            value="{{ old('slug') }}"
                            placeholder="passenger-elevator"
                            class="ldx-input"
                        >

                        <p class="ldx-help-text">
                            หากไม่กรอก ระบบจะสร้างจาก Service Name
                        </p>

                    </div>


                    {{-- Publish Date --}}
                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Publish Date
                        </label>

                        <input
                            type="date"
                            name="publish_date"
                            value="{{ old('publish_date', now()->format('Y-m-d')) }}"
                            class="ldx-input"
                        >

                        <p class="ldx-help-text">
                            วันที่เผยแพร่ ไม่มีเวลา
                        </p>

                    </div>


                    {{-- Status --}}
                    <div class="ldx-form-group">

                        <label class="ldx-label">
                            Status
                        </label>

                        <select
                            name="is_active"
                            class="ldx-select"
                        >

                            <option
                                value="1"
                                @selected(old('is_active', '1') === '1')
                            >
                                Active — แสดงบนเว็บไซต์
                            </option>

                            <option
                                value="0"
                                @selected(old('is_active') === '0')
                            >
                                Hidden — ซ่อนจากเว็บไซต์
                            </option>

                        </select>

                    </div>

                </div>

            </div>

        </div>


        {{-- Short Description --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Short Description
                </h2>

                <p class="ldx-card-description">
                    คำอธิบายสั้น ๆ ที่ใช้แสดงในรายการบริการ
                </p>

            </div>

            <div class="ldx-card-body">

                <textarea
                    name="short_description"
                    rows="4"
                    maxlength="500"
                    class="ldx-textarea"
                    placeholder="อธิบายบริการโดยย่อ..."
                >{{ old('short_description') }}</textarea>

            </div>

        </div>


        {{-- Content --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Service Details
                </h2>

                <p class="ldx-card-description">
                    รายละเอียดบริการแบบเต็ม
                </p>

            </div>

            <div class="ldx-card-body">

                <textarea
                    name="content"
                    rows="12"
                    class="ldx-textarea"
                    placeholder="รายละเอียดบริการ..."
                >{{ old('content') }}</textarea>

            </div>

        </div>


        {{-- Images --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Service Images
                </h2>

                <p class="ldx-card-description">
                    สามารถเลือกหลายรูปพร้อมกันได้ สูงสุด 20 รูป
                </p>

            </div>

            <div class="ldx-card-body">

                <div class="ldx-form-group">

                    <input
                        type="file"
                        name="images[]"
                        multiple
                        accept="image/jpeg,image/png,image/webp,image/avif"
                        class="ldx-file-input"
                    >

                    <p class="ldx-help-text">
                        JPG, PNG, WEBP หรือ AVIF — ขนาดไม่เกิน 5MB ต่อรูป
                    </p>

                </div>

            </div>

        </div>


        {{-- Buttons --}}
        <div class="ldx-form-actions ldx-form-actions-between">

            <a
                href="{{ route('admin.services.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="ldx-button ldx-button-primary"
            >
                Save Service
            </button>

        </div>

    </form>

</div>

@endsection

