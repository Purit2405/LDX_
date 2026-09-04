
@extends('layouts.admin.app')

@section('title', 'Edit Service Category')

@section('page-title', 'Edit Service Category')

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
            Edit Service Category
        </h1>

        <p class="ldx-page-description">
            แก้ไขข้อมูลหมวดหมู่บริการ
        </p>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>

    @endif


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
        action="{{ route('admin.service-categories.update', $serviceCategory) }}"
        class="ldx-form"
    >

        @csrf
        @method('PUT')


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
                        value="{{ old('name', $serviceCategory->name) }}"
                        required
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
                        value="{{ old('slug', $serviceCategory->slug) }}"
                        class="ldx-input"
                    >

                </div>


                {{-- Description --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="ldx-textarea"
                    >{{ old('description', $serviceCategory->description) }}</textarea>

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
                            @selected(old('is_active', $serviceCategory->is_active ? '1' : '0') === '1')
                        >
                            Active — ใช้งาน
                        </option>

                        <option
                            value="0"
                            @selected(old('is_active', $serviceCategory->is_active ? '1' : '0') === '0')
                        >
                            Hidden — ปิดการใช้งาน
                        </option>

                    </select>

                </div>

            </div>

        </div>


        {{-- Service Usage --}}
        <div class="ldx-info-box">

            <div class="ldx-info-box-title">
                Services in this category
            </div>

            <div class="ldx-info-box-description">

                หมวดหมู่นี้มี

                <strong class="ldx-info-box-value">
                    {{ $serviceCategory->services()->count() }}
                </strong>

                บริการ

            </div>

        </div>


        {{-- Buttons --}}
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
                Save Changes
            </button>

        </div>

    </form>

</div>

@endsection

