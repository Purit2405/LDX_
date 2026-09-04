
@extends('layouts.admin.app')

@section('title', 'Edit News')

@section('page-title', 'Edit News')

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
                Edit
            </span>

        </div>

        <h1 class="ldx-page-title">
            Edit News
        </h1>

        <p class="ldx-page-description">
            แก้ไขข้อมูลข่าวสาร: {{ $news->title }}
        </p>

    </div>


    {{-- Alerts --}}
    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="ldx-alert ldx-alert-danger">
            {{ session('error') }}
        </div>

    @endif


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


    <div class="ldx-news-layout">

        {{-- Left Column --}}
        <div class="ldx-news-main">

            <form
                id="edit-news-form"
                method="POST"
                action="{{ route('admin.news.update', $news) }}"
                enctype="multipart/form-data"
                class="ldx-form"
            >

                @csrf
                @method('PUT')


                {{-- News Content --}}
                <div class="ldx-card">

                    <div class="ldx-card-header">

                        <h2 class="ldx-card-title">
                            News Content
                        </h2>

                    </div>


                    <div class="ldx-card-body">

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
                                value="{{ old('title', $news->title) }}"
                                required
                                maxlength="255"
                                class="ldx-input"
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
                                Slug
                            </label>

                            <input
                                id="slug"
                                type="text"
                                name="slug"
                                value="{{ old('slug', $news->slug) }}"
                                maxlength="255"
                                class="ldx-input"
                            >

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
                                class="ldx-textarea"
                            >{{ old('short_description', $news->short_description) }}</textarea>

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
                                Full Content
                            </label>

                            <textarea
                                id="content"
                                name="content"
                                rows="12"
                                class="ldx-textarea ldx-textarea-large"
                            >{{ old('content', $news->content) }}</textarea>

                            @error('content')
                                <p class="ldx-error">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- Media --}}
                <div class="ldx-card">

                    <div class="ldx-card-header">

                        <h2 class="ldx-card-title">
                            Media & Images
                        </h2>

                    </div>


                    <div class="ldx-card-body">

                        {{-- Upload --}}
                        <div class="ldx-form-group ldx-news-upload">

                            <label
                                for="images"
                                class="ldx-label"
                            >
                                Upload New Images
                            </label>

                            <input
                                id="images"
                                type="file"
                                name="images[]"
                                multiple
                                accept="image/jpeg,image/png,image/webp,image/avif"
                                class="ldx-file-input"
                            >

                            <p class="ldx-help">
                                รองรับไฟล์ JPG, PNG, WEBP หรือ AVIF ขนาดไม่เกิน 5MB ต่อรูป
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


                        {{-- Current Images --}}
                        <div class="ldx-news-current-images-header">

                            <label class="ldx-label">
                                Current Images
                            </label>

                            <span class="ldx-badge ldx-badge-muted">
                                {{ $news->images->count() }} Files
                            </span>

                        </div>


                        @if($news->images->count())

                            <div class="ldx-news-image-grid">

                                @foreach($news->images as $image)

                                    <div class="ldx-news-image-card">

                                        <div class="ldx-news-image-preview">

                                            <img
                                                src="{{ Storage::url($image->path) }}"
                                                alt="{{ $image->alt ?: $news->title }}"
                                            >

                                            <div class="ldx-news-image-overlay">

                                                <button
                                                    type="button"
                                                    onclick="document.getElementById('delete-img-{{ $image->id }}').submit();"
                                                    class="ldx-button ldx-button-danger ldx-button-sm"
                                                >
                                                    Delete Image
                                                </button>

                                            </div>

                                        </div>


                                        <div class="ldx-news-image-info">

                                            <p
                                                class="ldx-news-image-alt"
                                                title="{{ $image->alt ?: 'No alt text' }}"
                                            >
                                                {{ $image->alt ?: 'No alt text' }}
                                            </p>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <div class="ldx-empty ldx-empty-small">
                                <p class="ldx-empty-description">
                                    ยังไม่มีรูปภาพประกอบ
                                </p>
                            </div>

                        @endif

                    </div>

                </div>

            </form>


            {{-- Hidden Image Delete Forms --}}
            @foreach($news->images as $image)

                <form
                    id="delete-img-{{ $image->id }}"
                    method="POST"
                    action="{{ route('admin.news-images.destroy', $image) }}"
                    onsubmit="return confirm('ยืนยันลบเฉพาะรูปภาพนี้? ข่าวจะยังคงอยู่')"
                >

                    @csrf
                    @method('DELETE')

                </form>

            @endforeach

        </div>


        {{-- Right Column --}}
        <div class="ldx-news-sidebar">

            <div class="ldx-news-sidebar-sticky">

                {{-- Publish Settings --}}
                <div class="ldx-card">

                    <div class="ldx-card-header">

                        <h2 class="ldx-card-title">
                            Publish Settings
                        </h2>

                    </div>


                    <div class="ldx-card-body">

                        <div class="ldx-form-group">

                            <label
                                for="is_active"
                                class="ldx-label"
                            >
                                Status
                            </label>

                            <select
                                id="is_active"
                                form="edit-news-form"
                                name="is_active"
                                class="ldx-select"
                            >

                                <option
                                    value="1"
                                    @selected(old(
                                        'is_active',
                                        $news->is_active ? '1' : '0'
                                    ) === '1')
                                >
                                    🟢 Active (แสดงบนเว็บไซต์)
                                </option>

                                <option
                                    value="0"
                                    @selected(old(
                                        'is_active',
                                        $news->is_active ? '1' : '0'
                                    ) === '0')
                                >
                                    ⚪ Hidden (ซ่อนจากเว็บไซต์)
                                </option>

                            </select>

                        </div>


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
                                form="edit-news-form"
                                name="category_id"
                                required
                                class="ldx-select"
                            >

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        @selected(old(
                                            'category_id',
                                            $news->category_id
                                        ) == $category->id)
                                    >
                                        {{ $category->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="ldx-form-group">

                            <label
                                for="published_at"
                                class="ldx-label"
                            >
                                Published Date
                            </label>

                            <input
                                id="published_at"
                                form="edit-news-form"
                                type="datetime-local"
                                name="published_at"
                                value="{{ old(
                                    'published_at',
                                    $news->published_at
                                        ? $news->published_at->format('Y-m-d\TH:i')
                                        : ''
                                ) }}"
                                class="ldx-input"
                            >

                        </div>

                    </div>

                </div>


                {{-- Actions --}}
                <div class="ldx-card">

                    <div class="ldx-card-body ldx-action-stack">

                        <button
                            form="edit-news-form"
                            type="submit"
                            class="ldx-button ldx-button-primary ldx-button-full"
                        >
                            Save Changes
                        </button>

                        <a
                            href="{{ route('admin.news.index') }}"
                            class="ldx-button ldx-button-secondary ldx-button-full"
                        >
                            Cancel
                        </a>

                    </div>

                </div>


                {{-- Danger Zone --}}
                <div class="ldx-danger-zone">

                    <h2 class="ldx-danger-title">
                        Danger Zone
                    </h2>

                    <p class="ldx-danger-description">
                        การลบ News จะลบข้อมูลและรูปภาพทั้งหมดอย่างถาวร
                        ไม่สามารถกู้คืนได้
                    </p>


                    <form
                        method="POST"
                        action="{{ route('admin.news.destroy', $news) }}"
                        onsubmit="return confirm('ยืนยันลบ News นี้? ข้อมูลและรูปภาพทั้งหมดจะถูกลบถาวร')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="ldx-button ldx-button-danger ldx-button-full"
                        >
                            Delete Entire News
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

