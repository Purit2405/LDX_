
@extends('layouts.admin.app')

@section('title', 'Add Project')

@section('page-title', 'Add Project')

@section('content')

<div class="ldx-page ldx-page-form">

    {{-- Header --}}
    <div class="ldx-page-header">

        <div class="ldx-breadcrumb">

            <a
                href="{{ route('admin.projects.index') }}"
                class="ldx-breadcrumb-link"
            >
                Projects
            </a>

            <span class="ldx-breadcrumb-separator">/</span>

            <span class="ldx-breadcrumb-current">
                Add
            </span>

        </div>

        <h1 class="ldx-page-title">
            Add Project
        </h1>

        <p class="ldx-page-description">
            เพิ่มข้อมูลโครงการใหม่
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

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Form --}}
    <form
        method="POST"
        action="{{ route('admin.projects.store') }}"
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
                    ข้อมูลพื้นฐานของโครงการ
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

                        @error('category_id')

                            <p class="ldx-error">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Title --}}
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
                            value="{{ old('title') }}"
                            required
                            class="ldx-input"
                            placeholder="Project Name"
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
                            Slug
                        </label>

                        <input
                            id="slug"
                            type="text"
                            name="slug"
                            value="{{ old('slug') }}"
                            class="ldx-input"
                            placeholder="project-name"
                        >

                        <p class="ldx-help">
                            เว้นว่างได้ ระบบจะสร้างจาก Project Name
                        </p>

                        @error('slug')

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
                            Project Date
                        </label>

                        <input
                            id="project_date"
                            type="date"
                            name="project_date"
                            value="{{ old(
                                'project_date',
                                now()->format('Y-m-d')
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
                            Client
                        </label>

                        <input
                            id="client"
                            type="text"
                            name="client"
                            value="{{ old('client') }}"
                            class="ldx-input"
                            placeholder="Client name"
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
                            Location
                        </label>

                        <input
                            id="location"
                            type="text"
                            name="location"
                            value="{{ old('location') }}"
                            class="ldx-input"
                            placeholder="Project location"
                        >

                        @error('location')

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
                            Status
                        </label>

                        <select
                            id="is_active"
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

                        @error('is_active')

                            <p class="ldx-error">
                                {{ $message }}
                            </p>

                        @enderror

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

            </div>

            <div class="ldx-card-body">

                <div class="ldx-form-group">

                    <textarea
                        name="short_description"
                        rows="4"
                        maxlength="500"
                        class="ldx-textarea"
                        placeholder="Short description..."
                    >{{ old('short_description') }}</textarea>

                    @error('short_description')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>

        </div>


        {{-- Content --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Project Details
                </h2>

            </div>

            <div class="ldx-card-body">

                <div class="ldx-form-group">

                    <textarea
                        name="content"
                        rows="12"
                        class="ldx-textarea ldx-textarea-large"
                        placeholder="Project details..."
                    >{{ old('content') }}</textarea>

                    @error('content')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>

        </div>


        {{-- Images --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Project Images
                </h2>

                <p class="ldx-card-description">
                    สามารถเลือกรูปหลายรูปพร้อมกันได้
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

                    <p class="ldx-help">
                        JPG, PNG, WEBP หรือ AVIF — ขนาดไม่เกิน 5MB ต่อรูป
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

                </div>

            </div>

        </div>


        {{-- Buttons --}}
        <div class="ldx-form-actions ldx-form-actions-between">

            <a
                href="{{ route('admin.projects.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="ldx-button ldx-button-primary"
            >
                Create Project
            </button>

        </div>

    </form>

</div>

@endsection

