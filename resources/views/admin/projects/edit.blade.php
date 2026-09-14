
@extends('layouts.admin.app')

@section('title', 'แก้ไขโครงการ')

@section('page-title', 'แก้ไขโครงการ')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- =========================================================
        HEADER
    ========================================================== --}}

    <div class="ldx-page-header ldx-page-header-actions">

        <div>

            <div class="ldx-breadcrumb">

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="ldx-breadcrumb-link"
                >
                    โครงการ
                </a>

                <span class="ldx-breadcrumb-separator">
                    /
                </span>

                <span class="ldx-breadcrumb-current">
                    แก้ไขโครงการ
                </span>

            </div>

            <h1 class="ldx-page-title">

                แก้ไขโครงการ:

                <span class="ldx-page-title-accent">
                    {{ $project->title }}
                </span>

            </h1>

            <p class="ldx-page-description">
                แก้ไขข้อมูล รายละเอียด และรูปภาพของโครงการ
            </p>

        </div>


        <div class="ldx-page-header-actions">

            <a
                href="{{ route('admin.projects.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                กลับไปหน้ารายการ
            </a>

        </div>

    </div>


    {{-- =========================================================
        SUCCESS MESSAGE
    ========================================================== --}}

    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">

            <span>
                {{ session('success') }}
            </span>

        </div>

    @endif


    {{-- =========================================================
        ERROR MESSAGE
    ========================================================== --}}

    @if(session('error'))

        <div class="ldx-alert ldx-alert-danger">

            <span>
                {{ session('error') }}
            </span>

        </div>

    @endif


    {{-- =========================================================
        VALIDATION ERRORS
    ========================================================== --}}

    @if($errors->any())

        <div class="ldx-alert ldx-alert-danger">

            <div class="ldx-alert-title">
                กรุณาตรวจสอบความถูกต้องของข้อมูล
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


    {{-- =========================================================
        EDIT PROJECT FORM
    ========================================================== --}}

    <form
        method="POST"
        action="{{ route('admin.projects.update', $project->id) }}"
        enctype="multipart/form-data"
        class="ldx-form"
    >

        @csrf

        @method('PUT')


        <div class="ldx-project-edit-layout">


            {{-- =================================================
                LEFT COLUMN
            ================================================== --}}

            <div class="ldx-project-main">


                {{-- =================================================
                    PROJECT DETAILS
                ================================================== --}}

                <div class="ldx-card">

                    <div class="ldx-card-header">

                        <h2 class="ldx-card-title">
                            รายละเอียดโครงการ
                        </h2>

                        <p class="ldx-card-description">
                            ข้อมูลรายละเอียดของโครงการ
                        </p>

                    </div>


                    <div class="ldx-card-body">


                        {{-- Project Name --}}

                        <div class="ldx-form-group">

                            <label
                                for="title"
                                class="ldx-label"
                            >
                                ชื่อโครงการ

                                <span class="ldx-required">
                                    *
                                </span>
                            </label>

                            <input
                                id="title"
                                type="text"
                                name="title"
                                value="{{ old('title', $project->title) }}"
                                required
                                class="ldx-input"
                                placeholder="ระบุชื่อโครงการ..."
                            >

                            @error('title')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Slug --}}

                        <div class="ldx-form-group">

                            <label
                                for="slug"
                                class="ldx-label"
                            >
                                Slug (URL)
                            </label>

                            <input
                                id="slug"
                                type="text"
                                name="slug"
                                value="{{ old('slug', $project->slug) }}"
                                class="ldx-input"
                                placeholder="project-url-slug"
                            >

                            <p class="ldx-help">
                                หากเว้นว่าง ระบบจะสร้าง URL
                                อัตโนมัติจากชื่อโครงการ
                            </p>

                            @error('slug')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Short Description --}}

                        <div class="ldx-form-group">

                            <label
                                for="short_description"
                                class="ldx-label"
                            >
                                คำอธิบายโดยย่อ
                            </label>

                            <textarea
                                id="short_description"
                                name="short_description"
                                rows="4"
                                maxlength="500"
                                class="ldx-textarea"
                                placeholder="สรุปเนื้อหาโครงการโดยย่อ..."
                            >{{ old('short_description', $project->short_description) }}</textarea>

                            <p class="ldx-help">
                                สูงสุด 500 ตัวอักษร
                            </p>

                            @error('short_description')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Detailed Content --}}

                        <div class="ldx-form-group">

                            <label
                                for="content"
                                class="ldx-label"
                            >
                                รายละเอียดโครงการ
                            </label>

                            <textarea
                                id="content"
                                name="content"
                                rows="12"
                                class="ldx-textarea ldx-textarea-large"
                                placeholder="ระบุรายละเอียดแบบเต็มของโครงการ..."
                            >{{ old('content', $project->content) }}</textarea>

                            @error('content')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                RIGHT COLUMN
            ================================================== --}}

            <div class="ldx-project-sidebar">


                {{-- =================================================
                    PROJECT SETTINGS
                ================================================== --}}

                <div class="ldx-card">

                    <div class="ldx-card-header">

                        <h2 class="ldx-card-title">
                            ตั้งค่าโครงการ
                        </h2>

                        <p class="ldx-card-description">
                            ตั้งค่าพื้นฐานของโครงการ
                        </p>

                    </div>


                    <div class="ldx-card-body">


                        {{-- Category --}}

                        <div class="ldx-form-group">

                            <label
                                for="category_id"
                                class="ldx-label"
                            >
                                หมวดหมู่

                                <span class="ldx-required">
                                    *
                                </span>
                            </label>

                            <select
                                id="category_id"
                                name="category_id"
                                required
                                class="ldx-select"
                            >

                                <option value="">
                                    เลือกหมวดหมู่
                                </option>

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        @selected(
                                            old(
                                                'category_id',
                                                $project->category_id
                                            ) == $category->id
                                        )
                                    >
                                        {{ $category->name }}
                                    </option>

                                @endforeach

                            </select>

                            @error('category_id')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Status --}}

                        <div class="ldx-form-group">

                            <label
                                for="is_active"
                                class="ldx-label"
                            >
                                สถานะ
                            </label>

                            @php

                                $currentStatus = (string) old(
                                    'is_active',
                                    $project->is_active ? '1' : '0'
                                );

                            @endphp

                            <select
                                id="is_active"
                                name="is_active"
                                class="ldx-select"
                            >

                                <option
                                    value="1"
                                    @selected($currentStatus === '1')
                                >
                                    Active — แสดงบนเว็บไซต์
                                </option>

                                <option
                                    value="0"
                                    @selected($currentStatus === '0')
                                >
                                    Hidden — ซ่อนจากเว็บไซต์
                                </option>

                            </select>

                            @error('is_active')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Project Date --}}

                        <div class="ldx-form-group">

                            <label
                                for="project_date"
                                class="ldx-label"
                            >
                                วันที่ดำเนินโครงการ
                            </label>

                            <input
                                id="project_date"
                                type="date"
                                name="project_date"
                                value="{{ old(
                                    'project_date',
                                    $project->project_date
                                        ? \Illuminate\Support\Carbon::parse(
                                            $project->project_date
                                        )->format('Y-m-d')
                                        : ''
                                ) }}"
                                class="ldx-input"
                            >

                            @error('project_date')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Client --}}

                        <div class="ldx-form-group">

                            <label
                                for="client"
                                class="ldx-label"
                            >
                                ลูกค้า
                            </label>

                            <input
                                id="client"
                                type="text"
                                name="client"
                                value="{{ old(
                                    'client',
                                    $project->client
                                ) }}"
                                class="ldx-input"
                                placeholder="ระบุชื่อลูกค้า..."
                            >

                            @error('client')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Location --}}

                        <div class="ldx-form-group">

                            <label
                                for="location"
                                class="ldx-label"
                            >
                                สถานที่
                            </label>

                            <input
                                id="location"
                                type="text"
                                name="location"
                                value="{{ old(
                                    'location',
                                    $project->location
                                ) }}"
                                class="ldx-input"
                                placeholder="ระบุสถานที่โครงการ..."
                            >

                            @error('location')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                    </div>

                </div>


                {{-- =================================================
                    SAVE BUTTONS
                ================================================== --}}

                <div class="ldx-form-actions ldx-form-actions-stack">

                    <button
                        type="submit"
                        class="ldx-button ldx-button-primary ldx-button-full"
                    >
                        บันทึกการแก้ไข
                    </button>

                    <a
                        href="{{ route('admin.projects.index') }}"
                        class="ldx-button ldx-button-secondary ldx-button-full"
                    >
                        ยกเลิก
                    </a>

                </div>


            </div>

        </div>

    </form>


    {{-- =========================================================
        MEDIA MANAGEMENT
    ========================================================== --}}

    <div class="ldx-card ldx-project-media">


        {{-- =====================================================
            MEDIA HEADER
        ====================================================== --}}

        <div class="ldx-card-header ldx-card-header-actions">

            <div>

                <h2 class="ldx-card-title">
                    จัดการรูปภาพโครงการ
                </h2>

                <p class="ldx-card-description">
                    จัดการรูปภาพที่มีอยู่
                    หรืออัปโหลดรูปภาพเพิ่มเติมเข้าสู่โครงการ
                </p>

            </div>


            <span class="ldx-badge">

                {{ $project->images->count() }}

                รูป

            </span>

        </div>


        <div class="ldx-card-body">


            {{-- =================================================
                CURRENT GALLERY
            ================================================== --}}

            @if($project->images->count() > 0)


                <div class="ldx-project-image-grid">


                    @foreach($project->images as $image)


                        <div class="ldx-project-image-card">


                            {{-- Image Preview --}}

                            <div class="ldx-project-image-preview">

                                @if($image->path)

                                    <img
                                        src="{{ asset('storage/' . $image->path) }}"
                                        alt="{{ $image->alt ?: $project->title }}"
                                        class="ldx-project-image"
                                        loading="lazy"
                                    >

                                @else

                                    <div class="ldx-empty">

                                        <p class="ldx-empty-title">
                                            ไม่มีไฟล์รูปภาพ
                                        </p>

                                    </div>

                                @endif

                            </div>


                            {{-- Image Information --}}

                            <div class="ldx-project-image-info">

                                <p
                                    class="ldx-project-image-alt"
                                    title="{{ $image->alt ?: 'ไม่มีคำอธิบายรูปภาพ' }}"
                                >
                                    {{ $image->alt ?: 'ไม่มีคำอธิบายรูปภาพ' }}
                                </p>


                                {{-- Delete Image --}}

                                <form
                                    method="POST"
                                    action="{{ route(
                                        'admin.project-images.destroy',
                                        $image->id
                                    ) }}"
                                    onsubmit="return confirm(
                                        'ยืนยันลบรูปภาพนี้? ข้อมูลโครงการจะยังคงอยู่'
                                    )"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="ldx-button ldx-button-danger ldx-button-sm ldx-button-full"
                                    >
                                        ลบรูปภาพ
                                    </button>

                                </form>

                            </div>

                        </div>


                    @endforeach


                </div>


            @else


                {{-- No Images --}}

                <div class="ldx-empty">

                    <p class="ldx-empty-title">
                        ยังไม่มีรูปภาพประกอบในโครงการนี้
                    </p>

                    <p class="ldx-empty-description">
                        สามารถอัปโหลดรูปภาพได้จากด้านล่าง
                    </p>

                </div>


            @endif


            {{-- =================================================
                UPLOAD MORE IMAGES
            ================================================== --}}

            <div class="ldx-project-upload">

                <h3 class="ldx-project-upload-title">
                    เพิ่มรูปภาพ
                </h3>

                <p class="ldx-help">
                    เพิ่มรูปภาพใหม่เข้าสู่โครงการ
                    โดยรูปภาพเดิมจะไม่ถูกลบ
                </p>


                {{-- Separate Upload Form --}}

                <form
                    method="POST"
                    action="{{ route(
                        'admin.projects.images.upload',
                        $project->id
                    ) }}"
                    enctype="multipart/form-data"
                    id="upload-more-form"
                >

                    @csrf


                    <div class="ldx-form-group">

                        <input
                            type="file"
                            name="images[]"
                            multiple
                            accept=".jpg,.jpeg,.png,.webp,.avif,image/jpeg,image/png,image/webp,image/avif"
                            class="ldx-file-input"
                            required
                        >

                    </div>


                    <p class="ldx-help">
                        รองรับ JPG, JPEG, PNG, WEBP และ AVIF
                        ขนาดไม่เกิน 5MB ต่อรูป
                        และสามารถเลือกหลายรูปพร้อมกันได้
                        รวมทั้งหมดไม่เกิน 20 รูปต่อโครงการ
                    </p>


                    @error('images')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror


                    @error('images.*')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror


                    <button
                        type="submit"
                        class="ldx-button ldx-button-primary ldx-button-sm"
                    >
                        อัปโหลดรูปภาพ
                    </button>

                </form>

            </div>


        </div>

    </div>


    {{-- =========================================================
        DANGER ZONE
    ========================================================== --}}

    <div class="ldx-danger-zone">

        <div class="ldx-danger-content">


            <div>

                <h2 class="ldx-danger-title">
                    Danger Zone
                </h2>

                <p class="ldx-danger-description">
                    การลบโครงการจะทำการลบข้อมูลทั้งหมด
                    และลบไฟล์ภาพที่เกี่ยวข้องออกจากระบบอย่างถาวร
                    ไม่สามารถกู้คืนได้
                </p>

            </div>


            {{-- Delete Project --}}

            <form
                method="POST"
                action="{{ route(
                    'admin.projects.destroy',
                    $project->id
                ) }}"
                onsubmit="return confirm(
                    '⚠️ ยืนยันลบ Project นี้อย่างถาวร? ข้อมูลและรูปภาพทั้งหมดจะหายไป'
                )"
            >

                @csrf

                @method('DELETE')

                <button
                    type="submit"
                    class="ldx-button ldx-button-danger"
                >
                    ลบโครงการ
                </button>

            </form>


        </div>

    </div>


</div>

@endsection

