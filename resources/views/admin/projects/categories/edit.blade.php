
@extends('layouts.admin.app')

@section('title', 'Edit Project Category')

@section('page-title', 'Edit Project Category')

@section('content')

<div class="ldx-page ldx-page-form">

    {{-- Header --}}
    <div class="ldx-page-header">

        <div class="ldx-breadcrumb">

            <a
                href="{{ route('admin.project-categories.index') }}"
                class="ldx-breadcrumb-link"
            >
                Project Categories
            </a>

            <span class="ldx-breadcrumb-separator">/</span>

            <span class="ldx-breadcrumb-current">
                Edit
            </span>

        </div>

        <h1 class="ldx-page-title">
            Edit Project Category
        </h1>

        <p class="ldx-page-description">
            แก้ไขข้อมูลหมวดหมู่ {{ $projectCategory->name }}
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
        action="{{ route(
            'admin.project-categories.update',
            $projectCategory
        ) }}"
        class="ldx-form"
    >

        @csrf
        @method('PUT')


        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Category Information
                </h2>

                <p class="ldx-card-description">
                    แก้ไขข้อมูลพื้นฐานของ Project Category
                </p>

            </div>


            <div class="ldx-card-body">

                {{-- Name --}}
                <div class="ldx-form-group">

                    <label
                        for="name"
                        class="ldx-label"
                    >
                        Category Name
                        <span class="ldx-required">*</span>
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old(
                            'name',
                            $projectCategory->name
                        ) }}"
                        required
                        maxlength="255"
                        class="ldx-input"
                    >

                    @error('name')

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
                        value="{{ old(
                            'slug',
                            $projectCategory->slug
                        ) }}"
                        maxlength="255"
                        class="ldx-input"
                    >

                    <p class="ldx-help">
                        ใช้สำหรับ URL ของหมวดหมู่
                    </p>

                    @error('slug')

                        <p class="ldx-error">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- Description --}}
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
                        rows="5"
                        class="ldx-textarea"
                    >{{ old(
                        'description',
                        $projectCategory->description
                    ) }}</textarea>

                    @error('description')

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
                            @selected(old(
                                'is_active',
                                $projectCategory->is_active
                                    ? '1'
                                    : '0'
                            ) === '1')
                        >
                            Active
                        </option>

                        <option
                            value="0"
                            @selected(old(
                                'is_active',
                                $projectCategory->is_active
                                    ? '1'
                                    : '0'
                            ) === '0')
                        >
                            Hidden
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


        {{-- Actions --}}
        <div class="ldx-form-actions ldx-form-actions-between">

            <a
                href="{{ route('admin.project-categories.index') }}"
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

