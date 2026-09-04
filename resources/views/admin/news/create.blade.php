
@extends('layouts.admin.app')

@section('title', 'Create News')

@section('page-title', 'Create News')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header">

        <div class="ldx-breadcrumb">
            <a
                href="{{ route('admin.news.index') }}"
                class="ldx-breadcrumb-link"
            >
                News
            </a>

            <span class="ldx-breadcrumb-separator">/</span>

            <span class="ldx-breadcrumb-current">
                Create
            </span>
        </div>

        <h1 class="ldx-page-title">
            Create News
        </h1>

        <p class="ldx-page-description">
            เพิ่มข่าวสารใหม่เข้าสู่เว็บไซต์
        </p>

    </div>


    {{-- Validation Errors --}}
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
        action="{{ route('admin.news.store') }}"
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
                            News Title
                            <span class="ldx-required">*</span>
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            required
                            maxlength="255"
                            placeholder="ชื่อข่าว"
                            class="ldx-input"
                        >

                        @error('title')
                            <p class="ldx-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Slug --}}
                    <div class="ldx-form-group ldx-form-group-full">

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
                            maxlength="255"
                            placeholder="ปล่อยว่างเพื่อสร้างอัตโนมัติ"
                            class="ldx-input"
                        >

                        <p class="ldx-help">
                            หากไม่กรอก ระบบจะสร้าง Slug จากชื่อ News อัตโนมัติ
                        </p>

                        @error('slug')
                            <p class="ldx-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Published At --}}
                    <div class="ldx-form-group">

                        <label
                            for="published_at"
                            class="ldx-label"
                        >
                            Published Date
                        </label>

                        <input
                            id="published_at"
                            type="datetime-local"
                            name="published_at"
                            value="{{ old('published_at') }}"
                            class="ldx-input"
                        >

                        @error('published_at')
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
                                @selected(old('is_active', '1') == '1')
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

                <p class="ldx-card-description">
                    คำอธิบายสั้น ๆ สำหรับแสดงในรายการข่าว
                </p>

            </div>


            <div class="ldx-card-body">

                <div class="ldx-form-group">

                    <textarea
                        name="short_description"
                        rows="4"
                        placeholder="คำอธิบายสั้น ๆ..."
                        class="ldx-textarea"
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
                    Content
                </h2>

                <p class="ldx-card-description">
                    เนื้อหาข่าวทั้งหมด
                </p>

            </div>


            <div class="ldx-card-body">

                <div class="ldx-form-group">

                    <textarea
                        name="content"
                        rows="14"
                        placeholder="รายละเอียดข่าว..."
                        class="ldx-textarea ldx-textarea-large"
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
                    Images
                </h2>

                <p class="ldx-card-description">
                    สามารถเพิ่มรูปภาพหลายรูปพร้อมกันได้
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
                href="{{ route('admin.news.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="ldx-button ldx-button-primary"
            >
                Create News
            </button>

        </div>

    </form>

</div>

@endsection
