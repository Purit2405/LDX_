
@extends('layouts.admin.app')

@section('title', 'Edit Client')

@section('content')

<div class="ldx-page ldx-page-form">

    {{-- Header --}}
    <div class="ldx-page-header">

        <a
            href="{{ route('admin.about.clients.index') }}"
            class="ldx-page-back"
        >
            <span>←</span>
            <span>Back to Clients</span>
        </a>

        <h1 class="ldx-page-title">
            Edit Client
        </h1>

        <p class="ldx-page-description">
            แก้ไขข้อมูลลูกค้าและ Logo
        </p>

    </div>


    {{-- Form --}}
    <form
        method="POST"
        action="{{ route('admin.about.clients.update', $client) }}"
        enctype="multipart/form-data"
        class="ldx-form"
    >

        @csrf
        @method('PUT')


        {{-- Client Information --}}
        <div class="ldx-card">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Client Information
                </h2>

                <p class="ldx-card-description">
                    ข้อมูลพื้นฐานของลูกค้า
                </p>

            </div>


            <div class="ldx-card-body">

                {{-- Client Name --}}
                <div class="ldx-form-group">

                    <label
                        for="name"
                        class="ldx-label"
                    >
                        Client Name
                        <span class="ldx-required">*</span>
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name', $client->name) }}"
                        required
                        class="ldx-input"
                    >

                    @error('name')
                        <p class="ldx-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Website --}}
                <div class="ldx-form-group">

                    <label
                        for="website"
                        class="ldx-label"
                    >
                        Website
                    </label>

                    <input
                        id="website"
                        type="url"
                        name="website"
                        value="{{ old('website', $client->website) }}"
                        placeholder="https://example.com"
                        class="ldx-input"
                    >

                    @error('website')
                        <p class="ldx-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Current Logo --}}
                @if($client->logo)

                    <div class="ldx-form-group">

                        <p class="ldx-label">
                            Current Logo
                        </p>

                        <div class="ldx-logo-preview">

                            <img
                                src="{{ Storage::url($client->logo) }}"
                                alt="{{ $client->name }}"
                            >

                        </div>

                    </div>

                @endif


                {{-- Replace Logo --}}
                <div class="ldx-form-group">

                    <label
                        for="logo"
                        class="ldx-label"
                    >
                        Replace Logo
                    </label>

                    <input
                        id="logo"
                        type="file"
                        name="logo"
                        accept="image/*"
                        class="ldx-file-input"
                    >

                    <p class="ldx-help">
                        แนะนำ PNG / SVG / WebP พื้นหลังโปร่งใส
                    </p>

                    @error('logo')
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
                        rows="4"
                        placeholder="รายละเอียดลูกค้า..."
                        class="ldx-textarea"
                    >{{ old('description', $client->description) }}</textarea>

                    @error('description')
                        <p class="ldx-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Active --}}
                <div class="ldx-status-box">

                    <label class="ldx-checkbox">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', $client->is_active) ? 'checked' : '' }}
                        >

                        <span>

                            <span class="ldx-checkbox-title">
                                Active Client
                            </span>

                            <span class="ldx-checkbox-description">
                                แสดง Client นี้บนเว็บไซต์
                            </span>

                        </span>

                    </label>

                </div>

            </div>

        </div>


        {{-- Actions --}}
        <div class="ldx-form-actions">

            <a
                href="{{ route('admin.about.clients.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="ldx-button ldx-button-primary"
            >
                Update Client
            </button>

        </div>

    </form>

</div>

@endsection

