
@extends('layouts.admin.app')

@section('title', 'Edit Service')

@section('page-title', 'Edit Service')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header">

        <div class="ldx-page-header-row">

            <div>

                <div class="ldx-breadcrumb">

                    <a
                        href="{{ route('admin.services.index') }}"
                        class="ldx-breadcrumb-link"
                    >
                        Services
                    </a>

                    <span class="ldx-breadcrumb-separator">/</span>

                    <span class="ldx-breadcrumb-current">
                        Edit
                    </span>

                </div>

                <h1 class="ldx-page-title">
                    Edit Service
                </h1>

                <p class="ldx-page-description">
                    แก้ไขข้อมูลบริการ
                </p>

            </div>


            {{-- Delete Service --}}
            <form
                method="POST"
                action="{{ route('admin.services.destroy', $service) }}"
                onsubmit="return confirm('⚠️ ต้องการลบบริการนี้ทั้งโพสต์จริงหรือไม่?\n\nข้อมูลบริการและรูปภาพทั้งหมดจะถูกลบ และไม่สามารถกู้คืนได้')"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="ldx-button ldx-button-danger"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="ldx-button-icon"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                        />
                    </svg>

                    Delete Service
                </button>

            </form>

        </div>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">

            <div class="ldx-alert-content">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="ldx-alert-icon"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        </div>

    @endif


    {{-- Error Messages --}}
    @if($errors->any())

        <div class="ldx-alert ldx-alert-danger">

            <div class="ldx-alert-title">
                กรุณาตรวจสอบข้อมูล
            </div>

            <ul class="ldx-alert-list">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Main Update Form --}}
    <form
        method="POST"
        action="{{ route('admin.services.update', $service) }}"
        enctype="multipart/form-data"
        class="ldx-form"
    >

        @csrf
        @method('PUT')


        {{-- Basic Information --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Basic Information
                </h2>

                <p class="ldx-card-description">
                    ข้อมูลพื้นฐานของบริการ
                </p>

            </div>


            <div class="ldx-card-body">

                <div class="ldx-form-grid ldx-form-grid-2">

                    {{-- Category --}}
                    <div class="ldx-form-group">

                        <label
                            for="category_id"
                            class="ldx-label"
                        >
                            Category
                            <span class="ldx-required">*</span>
                        </label>

                        <select
                            id="category_id"
                            name="category_id"
                            required
                            class="ldx-select"
                        >

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    @selected(
                                        old(
                                            'category_id',
                                            $service->category_id
                                        ) == $category->id
                                    )
                                >
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Title --}}
                    <div class="ldx-form-group">

                        <label
                            for="title"
                            class="ldx-label"
                        >
                            Service Name
                            <span class="ldx-required">*</span>
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $service->title) }}"
                            required
                            maxlength="255"
                            class="ldx-input"
                            placeholder="เช่น บริการติดตั้งลิฟต์"
                        >

                    </div>


                    {{-- Slug --}}
                    <div class="ldx-form-group">

                        <label
                            for="slug"
                            class="ldx-label"
                        >
                            Slug
                        </label>

                        <input
                            id="slug"
                            type="text"
                            name="slug"
                            value="{{ old('slug', $service->slug) }}"
                            maxlength="255"
                            class="ldx-input"
                            placeholder="service-slug"
                        >

                        <p class="ldx-help-text">
                            ใช้สำหรับ URL ของบริการ
                        </p>

                    </div>


                    {{-- Publish Date --}}
                    <div class="ldx-form-group">

                        <label
                            for="publish_date"
                            class="ldx-label"
                        >
                            Publish Date
                        </label>

                        <input
                            id="publish_date"
                            type="date"
                            name="publish_date"
                            value="{{ old(
                                'publish_date',
                                $service->publish_date
                                    ? $service->publish_date->format('Y-m-d')
                                    : now()->format('Y-m-d')
                            ) }}"
                            class="ldx-input"
                        >

                    </div>


                    {{-- Status --}}
                    <div class="ldx-form-group">

                        <label
                            for="is_active"
                            class="ldx-label"
                        >
                            Status
                        </label>

                        <select
                            id="is_active"
                            name="is_active"
                            class="ldx-select"
                        >

                            <option
                                value="1"
                                @selected(
                                    old(
                                        'is_active',
                                        $service->is_active ? '1' : '0'
                                    ) === '1'
                                )
                            >
                                Active — แสดงบนเว็บไซต์
                            </option>

                            <option
                                value="0"
                                @selected(
                                    old(
                                        'is_active',
                                        $service->is_active ? '1' : '0'
                                    ) === '0'
                                )
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
                    คำอธิบายสั้น ๆ สำหรับแสดงในรายการบริการ
                </p>

            </div>

            <div class="ldx-card-body">

                <textarea
                    name="short_description"
                    rows="4"
                    maxlength="500"
                    class="ldx-textarea"
                    placeholder="เขียนคำอธิบายสั้น ๆ ของบริการ..."
                >{{ old('short_description', $service->short_description) }}</textarea>

                <div class="ldx-character-count">
                    สูงสุด 500 ตัวอักษร
                </div>

            </div>

        </div>


        {{-- Service Content --}}
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
                    rows="14"
                    class="ldx-textarea ldx-textarea-content"
                    placeholder="รายละเอียดของบริการ..."
                >{{ old('content', $service->content) }}</textarea>

            </div>

        </div>


        {{-- Current Images --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <div class="ldx-card-header-row">

                    <div>

                        <h2 class="ldx-card-title">
                            Current Images
                        </h2>

                        <p class="ldx-card-description">
                            รูปภาพที่มีอยู่ในบริการนี้
                        </p>

                    </div>

                    <span class="ldx-badge ldx-badge-muted">
                        {{ $service->images->count() }}
                        {{ $service->images->count() === 1 ? 'Image' : 'Images' }}
                    </span>

                </div>

            </div>


            <div class="ldx-card-body">

                @if($service->images->count())

                    <div class="ldx-service-image-grid">

                        @foreach($service->images as $image)

                            <div class="ldx-service-image-card">

                                <div class="ldx-service-image">

                                    <img
                                        src="{{ Storage::url($image->path) }}"
                                        alt="{{ $image->alt ?: $service->title }}"
                                        loading="lazy"
                                    >

                                </div>


                                <div class="ldx-service-image-info">

                                    <p class="ldx-service-image-alt">
                                        {{ $image->alt ?: 'No alt text' }}
                                    </p>

                                    <p class="ldx-service-image-id">
                                        Image ID: {{ $image->id }}
                                    </p>


                                    {{-- DELETE ONLY IMAGE --}}
                                    <form
                                        method="POST"
                                        action="{{ route('admin.service-images.destroy', $image->id) }}"
                                        class="ldx-service-image-delete-form"
                                        onsubmit="return confirm('ต้องการลบรูปภาพนี้ใช่หรือไม่?\n\nเฉพาะรูปนี้จะถูกลบ\nService และรูปอื่นจะไม่ถูกลบ')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="ldx-button ldx-button-danger ldx-button-block ldx-button-sm"
                                        >

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="ldx-button-icon"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                />
                                            </svg>

                                            Delete This Image

                                        </button>

                                    </form>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="ldx-empty-state">

                        <div class="ldx-empty-state-icon">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="ldx-empty-state-svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>

                        </div>

                        <p class="ldx-empty-state-title">
                            ยังไม่มีรูปภาพ
                        </p>

                        <p class="ldx-empty-state-description">
                            สามารถเพิ่มรูปภาพได้จากด้านล่าง
                        </p>

                    </div>

                @endif

            </div>

        </div>


        {{-- Add Images --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Add More Images
                </h2>

                <p class="ldx-card-description">
                    เพิ่มรูปภาพใหม่หลายรูปพร้อมกัน
                </p>

            </div>

            <div class="ldx-card-body">

                <div class="ldx-form-group">

                    <label
                        for="images"
                        class="ldx-label"
                    >
                        Select Images
                    </label>

                    <input
                        id="images"
                        type="file"
                        name="images[]"
                        multiple
                        accept="image/jpeg,image/png,image/webp,image/avif"
                        class="ldx-file-input"
                    >

                    <p class="ldx-help-text">
                        JPG, PNG, WEBP หรือ AVIF
                        — ขนาดไม่เกิน 5MB ต่อรูป
                    </p>

                </div>

            </div>

        </div>


        {{-- Bottom Buttons --}}
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

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="ldx-button-icon"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

                Save Changes

            </button>

        </div>

    </form>

</div>

@endsection

