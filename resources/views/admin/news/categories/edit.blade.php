
@extends('layouts.admin.app')

@section('title', 'Edit Timeline')

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
            Edit Timeline
        </h1>

        <p class="ldx-page-description">
            แก้ไขเหตุการณ์สำคัญของบริษัท
        </p>

    </div>


    <form
        method="POST"
        action="{{ route('admin.about.timeline.update', $timeline) }}"
        class="ldx-form"
    >

        @csrf
        @method('PUT')


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
                        value="{{ old('year', $timeline->year) }}"
                        required
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
                        value="{{ old('title', $timeline->title) }}"
                        required
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
                        class="ldx-textarea"
                    >{{ old('description', $timeline->description) }}</textarea>

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
                        value="{{ old('sort_order', $timeline->sort_order) }}"
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
                            {{ old('is_active', $timeline->is_active) ? 'checked' : '' }}
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
                Update Timeline
            </button>

        </div>

    </form>

</div>

@endsection