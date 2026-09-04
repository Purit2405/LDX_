
@extends('layouts.admin.app')

@section('title', 'Add Service Category')

@section('page-title', 'Add Service Category')

@section('content')

<div class="ldx-page ldx-page-narrow">

    {{-- Header --}}
    <div class="ldx-page-header">

        <a
            href="{{ route('admin.service-categories.index') }}"
            class="ldx-back-link"
        >
            ← Back to Categories
        </a>

        <h1 class="ldx-page-title">
            Add Service Category
        </h1>

        <p class="ldx-page-description">
            สร้างหมวดหมู่สำหรับจัดกลุ่มบริการ
        </p>

    </div>


    {{-- Validation Error --}}
    @if($errors->any())

        <div class="ldx-alert ldx-alert-danger">

            <ul class="ldx-alert-list">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <form
        method="POST"
        action="{{ route('admin.service-categories.store') }}"
        class="ldx-form"
    >

        @csrf


        {{-- Category Information --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Category Information
                </h2>

            </div>


            <div class="ldx-card-body ldx-form-stack">

                {{-- Name --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Category Name
                        <span class="ldx-required">*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        placeholder="Elevator Installation"
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
                        placeholder="elevator-installation"
                        class="ldx-input"
                    >

                    <p class="ldx-help-text">
                        หากไม่กรอก ระบบจะสร้างให้อัตโนมัติ
                    </p>

                </div>


                {{-- Description --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        placeholder="รายละเอียดหมวดหมู่..."
                        class="ldx-textarea"
                    >{{ old('description') }}</textarea>

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
                            Active — ใช้งาน
                        </option>

                        <option
                            value="0"
                            @selected(old('is_active') === '0')
                        >
                            Hidden — ปิดการใช้งาน
                        </option>

                    </select>

                </div>

            </div>

        </div>


        {{-- Form Actions --}}
        <div class="ldx-form-actions ldx-form-actions-between">

            <a
                href="{{ route('admin.service-categories.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="ldx-button ldx-button-primary"
            >
                Save Category
            </button>

        </div>

    </form>

</div>

@endsection

