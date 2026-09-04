
@extends('layouts.admin.app')

@section('title', 'Add Timeline')

@section('content')

<div class="ldx-page ldx-page-narrow">

    <div class="ldx-page-header">

        <a
            href="{{ route('admin.about.timeline.index') }}"
            class="ldx-back-link"
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

            <div class="ldx-card-body ldx-form-stack">

                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Year <span class="ldx-required">*</span>
                    </label>

                    <input
                        type="number"
                        name="year"
                        value="{{ old('year') }}"
                        required
                        placeholder="2026"
                        class="ldx-input"
                    >

                </div>


                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Title <span class="ldx-required">*</span>
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        placeholder="Company Founded"
                        class="ldx-input"
                    >

                </div>


                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="6"
                        placeholder="รายละเอียดเหตุการณ์..."
                        class="ldx-textarea"
                    >{{ old('description') }}</textarea>

                </div>


                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Sort Order
                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        value="{{ old('sort_order', 0) }}"
                        class="ldx-input"
                    >

                </div>


                <label class="ldx-checkbox">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        checked
                    >

                    <span>
                        แสดง Timeline บนเว็บไซต์
                    </span>

                </label>

            </div>

        </div>


        <div class="ldx-form-actions ldx-form-actions-end">

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

