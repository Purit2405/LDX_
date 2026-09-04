
@extends('layouts.admin.app')

@section('title', 'Add Timeline')

@section('content')

<div class="ldx-page ldx-page-form">

    <div class="ldx-page-header">

        <a
            href="{{ route('admin.about.timeline.index') }}"
            class="ldx-page-back"
        >
            ← Back to Timeline
        </a>

        <h1 class="ldx-page-title">
            Add Timeline
        </h1>

        <p class="ldx-page-description">
            เพิ่มเหตุการณ์สำคัญของบริษัท
        </p>

    </div>


    <form
        method="POST"
        action="{{ route('admin.about.timeline.store') }}"
        class="ldx-form"
    >

        @csrf

        <div class="ldx-card">

            <div class="ldx-card-body">

                {{-- Year --}}
                <div class="ldx-form-group">

                    <label
                        for="year"
                        class="ldx-label"
                    >
                        Year
                        <span class="ldx-required">*</span>
                    </label>

                    <input
                        id="year"
                        type="number"
                        name="year"
                        value="{{ old('year') }}"
                        required
                        placeholder="2026"
                        class="ldx-input"
                    >

                    @error('year')
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
                        Title
                        <span class="ldx-required">*</span>
                    </label>

                    <input
                        id="title"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        placeholder="Company Founded"
                        class="ldx-input"
                    >

                    @error('title')
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
                        rows="6"
                        placeholder="รายละเอียดเหตุการณ์..."
                        class="ldx-textarea"
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <p class="ldx-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Sort Order --}}
                <div class="ldx-form-group">

                    <label
                        for="sort_order"
                        class="ldx-label"
                    >
                        Sort Order
                    </label>

                    <input
                        id="sort_order"
                        type="number"
                        name="sort_order"
                        value="{{ old('sort_order', 0) }}"
                        class="ldx-input"
                    >

                    @error('sort_order')
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
                            checked
                        >

                        <span>

                            <span class="ldx-checkbox-title">
                                Active Timeline
                            </span>

                            <span class="ldx-checkbox-description">
                                แสดง Timeline นี้บนเว็บไซต์
                            </span>

                        </span>

                    </label>

                </div>

            </div>

        </div>


        {{-- Actions --}}
        <div class="ldx-form-actions">

            <a
                href="{{ route('admin.about.timeline.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="ldx-button ldx-button-primary"
            >
                Save Timeline
            </button>

        </div>

    </form>

</div>

@endsection
