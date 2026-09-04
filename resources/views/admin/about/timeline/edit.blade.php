
@extends('layouts.admin.app')

@section('title', 'Edit Timeline')

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
            Edit Timeline
        </h1>

    </div>


    <form
        method="POST"
        action="{{ route('admin.about.timeline.update', $timeline) }}"
        class="ldx-form"
    >

        @csrf
        @method('PUT')

        <div class="ldx-card">

            <div class="ldx-card-body ldx-form-stack">

                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Year <span class="ldx-required">*</span>
                    </label>

                    <input
                        type="number"
                        name="year"
                        value="{{ old('year', $timeline->year) }}"
                        required
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
                        value="{{ old('title', $timeline->title) }}"
                        required
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
                        class="ldx-textarea"
                    >{{ old('description', $timeline->description) }}</textarea>

                </div>


                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Sort Order
                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        value="{{ old('sort_order', $timeline->sort_order) }}"
                        class="ldx-input"
                    >

                </div>


                <label class="ldx-checkbox">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ old('is_active', $timeline->is_active) ? 'checked' : '' }}
                    >

                    <span>
                        Active
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
                Update Timeline
            </button>

        </div>

    </form>

</div>

@endsection

