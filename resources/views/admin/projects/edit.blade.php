
@extends('layouts.admin.app')

@section('title', 'Edit Project')

@section('page-title', 'Edit Project')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header ldx-page-header-actions">

        <div>

            <div class="ldx-breadcrumb">

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="ldx-breadcrumb-link"
                >
                    Projects
                </a>

                <span class="ldx-breadcrumb-separator">/</span>

                <span class="ldx-breadcrumb-current">
                    Edit Project
                </span>

            </div>

            <h1 class="ldx-page-title">
                Edit Project:
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
                Back to List
            </a>

        </div>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">

            <span>
                {{ session('success') }}
            </span>

        </div>

    @endif


    {{-- Error --}}
    @if(session('error'))

        <div class="ldx-alert ldx-alert-danger">

            <span>
                {{ session('error') }}
            </span>

        </div>

    @endif


    {{-- Validation Errors --}}
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


    {{-- Update Form --}}
    <form
        method="POST"
        action="{{ route('admin.projects.update', $project) }}"
        enctype="multipart/form-data"
        class="ldx-form"
    >

        @csrf
        @method('PUT')


        <div class="ldx-project-edit-layout">

            {{-- Left Column --}}
            <div class="ldx-project-main">

                {{-- Project Details --}}
                <div class="ldx-card">

                    <div class="ldx-card-header">

                        <h2 class="ldx-card-title">
                            Project Details
                        </h2>

                    </div>


                    <div class="ldx-card-body">

                        <div class="ldx-form-group">

                            <label
                                for="title"
                                class="ldx-label"
                            >
                                Project Name
                                <span class="ldx-required">*</span>
                            </label>

                            <input
                                id="title"
                                type="text"
                                name="title"
                                value="{{ old(
                                    'title',
                                    $project->title
                                ) }}"
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
                                value="{{ old(
                                    'slug',
                                    $project->slug
                                ) }}"
                                class="ldx-input"
                                placeholder="project-url-slug"
                            >

                            <p class="ldx-help">
                                หากเว้นว่าง ระบบจะสร้าง URL ให้อัตโนมัติจากชื่อโปรเจกต์
                            </p>

                            @error('slug')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        <div class="ldx-form-group">

                            <label
                                for="short_description"
                                class="ldx-label"
                            >
                                Short Description
                            </label>

                            <textarea
                                id="short_description"
                                name="short_description"
                                rows="3"
                                maxlength="500"
                                class="ldx-textarea"
                                placeholder="สรุปเนื้อหาย่อสั้นๆ (สูงสุด 500 ตัวอักษร)..."
                            >{{ old(
                                'short_description',
                                $project->short_description
                            ) }}</textarea>

                            @error('short_description')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        <div class="ldx-form-group">

                            <label
                                for="content"
                                class="ldx-label"
                            >
                                Detailed Content
                            </label>

                            <textarea
                                id="content"
                                name="content"
                                rows="10"
                                class="ldx-textarea ldx-textarea-large"
                                placeholder="รายละเอียดแบบเต็มของโครงการ..."
                            >{{ old(
                                'content',
                                $project->content
                            ) }}</textarea>

                            @error('content')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>

                </div>

            </div>


            {{-- Right Column --}}
            <div class="ldx-project-sidebar">

                <div class="ldx-card">

                    <div class="ldx-card-header">

                        <h2 class="ldx-card-title">
                            Project Settings
                        </h2>

                    </div>


                    <div class="ldx-card-body">

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
                                            $project->is_active
                                                ? '1'
                                                : '0'
                                        ) === '1'
                                    )
                                >
                                    Active — แสดงบนเว็บ
                                </option>

                                <option
                                    value="0"
                                    @selected(
                                        old(
                                            'is_active',
                                            $project->is_active
                                                ? '1'
                                                : '0'
                                        ) === '0'
                                    )
                                >
                                    Hidden — ซ่อนจากเว็บ
                                </option>

                            </select>

                            @error('is_active')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        <div class="ldx-form-group">

                            <label
                                for="project_date"
                                class="ldx-label"
                            >
                                Project Date
                            </label>

                            <input
                                id="project_date"
                                type="date"
                                name="project_date"
                                value="{{ old(
                                    'project_date',
                                    $project->project_date
                                        ? $project->project_date->format('Y-m-d')
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


                        <div class="ldx-form-group">

                            <label
                                for="client"
                                class="ldx-label"
                            >
                                Client
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
                                placeholder="ชื่อลูกค้าผู้ว่าจ้าง..."
                            >

                            @error('client')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        <div class="ldx-form-group">

                            <label
                                for="location"
                                class="ldx-label"
                            >
                                Location
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
                                placeholder="สถานที่ติดตั้ง..."
                            >

                            @error('location')

                                <p class="ldx-error">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>

                </div>


                {{-- Submit --}}
                <div class="ldx-form-actions ldx-form-actions-stack">

                    <button
                        type="submit"
                        class="ldx-button ldx-button-primary ldx-button-full"
                    >
                        Save Changes
                    </button>

                    <a
                        href="{{ route('admin.projects.index') }}"
                        class="ldx-button ldx-button-secondary ldx-button-full"
                    >
                        Cancel
                    </a>

                </div>

            </div>

        </div>

    </form>


    {{-- Media Management --}}
    <div class="ldx-card ldx-project-media">

        <div class="ldx-card-header ldx-card-header-actions">

            <div>

                <h2 class="ldx-card-title">
                    Project Images Management
                </h2>

                <p class="ldx-card-description">
                    จัดการรูปภาพที่มีอยู่ หรืออัปโหลดภาพเพิ่มเติมเข้าสู่โปรเจกต์
                </p>

            </div>

            <span class="ldx-badge">
                {{ $project->images->count() }} Images
            </span>

        </div>


        <div class="ldx-card-body">

            {{-- Current Gallery --}}
            @if($project->images->count())

                <div class="ldx-project-image-grid">

                    @foreach($project->images as $image)

                        <div class="ldx-project-image-card">

                            <div class="ldx-project-image-preview">

                                <img
                                    src="{{ Storage::url($image->path) }}"
                                    alt="{{ $image->alt ?: $project->title }}"
                                    class="ldx-project-image"
                                >

                            </div>


                            <div class="ldx-project-image-info">

                                <p
                                    class="ldx-project-image-alt"
                                    title="{{ $image->alt ?: 'No alt text' }}"
                                >
                                    {{ $image->alt ?: 'No alt text' }}
                                </p>


                                <form
                                    method="POST"
                                    action="{{ route(
                                        'admin.project-images.destroy',
                                        $image
                                    ) }}"
                                    onsubmit="return confirm('ยืนยันลบรูปภาพนี้? (ข้อมูล Project จะยังคงอยู่)')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="ldx-button ldx-button-danger ldx-button-sm ldx-button-full"
                                    >
                                        Delete Image
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="ldx-empty">

                    <p class="ldx-empty-title">
                        ยังไม่มีรูปภาพประกอบในโครงการนี้
                    </p>

                </div>

            @endif


            {{-- Upload More --}}
            <div class="ldx-project-upload">

                <h3 class="ldx-project-upload-title">
                    Upload More Images
                </h3>

                <form
                    method="POST"
                    action="{{ route(
                        'admin.projects.update',
                        $project
                    ) }}"
                    enctype="multipart/form-data"
                    id="upload-more-form"
                >

                    @csrf
                    @method('PUT')

                    <div class="ldx-form-group">

                        <input
                            type="file"
                            name="images[]"
                            multiple
                            accept="image/jpeg,image/png,image/webp,image/avif"
                            class="ldx-file-input"
                        >

                    </div>

                    <p class="ldx-help">
                        รองรับไฟล์: JPG, PNG, WEBP หรือ AVIF
                        (ขนาดไม่เกิน 5MB ต่อรูป สามารถเลือกหลายรูปพร้อมกันได้)
                    </p>

                    <button
                        type="submit"
                        class="ldx-button ldx-button-primary ldx-button-sm"
                    >
                        Upload Images
                    </button>

                </form>

            </div>

        </div>

    </div>


    {{-- Danger Zone --}}
    <div class="ldx-danger-zone">

        <div class="ldx-danger-content">

            <div>

                <h2 class="ldx-danger-title">
                    Danger Zone
                </h2>

                <p class="ldx-danger-description">
                    การลบโครงการจะทำการลบข้อมูลทั้งหมดและลบไฟล์ภาพที่เกี่ยวข้องออกจากระบบอย่างถาวร
                    ไม่สามารถกู้คืนได้
                </p>

            </div>


            <form
                method="POST"
                action="{{ route(
                    'admin.projects.destroy',
                    $project
                ) }}"
                onsubmit="return confirm('⚠️ ยืนยันลบ Project นี้อย่างถาวร? ข้อมูลและรูปภาพทั้งหมดจะหายไป')"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="ldx-button ldx-button-danger"
                >
                    Delete Project
                </button>

            </form>

        </div>

    </div>

</div>

@endsection

