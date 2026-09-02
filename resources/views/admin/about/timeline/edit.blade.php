@extends('layouts.admin.app')

@section('title', 'Edit Timeline')

@section('content')

<div class="mx-auto max-w-3xl space-y-6">

    <div>

        <a
            href="{{ route('admin.about.timeline.index') }}"
            class="text-sm text-gray-500 hover:text-indigo-400"
        >
            ← Back to Timeline
        </a>

        <h1 class="mt-3 text-2xl font-bold text-white">
            Edit Timeline
        </h1>

    </div>

    <form
        method="POST"
        action="{{ route('admin.about.timeline.update', $timeline) }}"
    >

        @csrf
        @method('PUT')

        <div class="space-y-6 rounded-2xl border border-gray-800 bg-gray-950 p-6">

            <div>

                <label class="mb-2 block text-sm text-gray-300">
                    Year *
                </label>

                <input
                    type="number"
                    name="year"
                    value="{{ old('year', $timeline->year) }}"
                    required
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-white outline-none focus:border-indigo-500"
                >

            </div>

            <div>

                <label class="mb-2 block text-sm text-gray-300">
                    Title *
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $timeline->title) }}"
                    required
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-white outline-none focus:border-indigo-500"
                >

            </div>

            <div>

                <label class="mb-2 block text-sm text-gray-300">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="6"
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-white outline-none focus:border-indigo-500"
                >{{ old('description', $timeline->description) }}</textarea>

            </div>

            <div>

                <label class="mb-2 block text-sm text-gray-300">
                    Sort Order
                </label>

                <input
                    type="number"
                    name="sort_order"
                    value="{{ old('sort_order', $timeline->sort_order) }}"
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-white outline-none focus:border-indigo-500"
                >

            </div>

            <label class="flex items-center gap-3 text-sm text-gray-300">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $timeline->is_active) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-gray-700 bg-gray-900 text-indigo-600"
                >

                Active

            </label>

        </div>

        <div class="mt-6 flex justify-end gap-3">

            <a
                href="{{ route('admin.about.timeline.index') }}"
                class="rounded-xl bg-gray-800 px-5 py-3 text-sm text-gray-300"
            >
                Cancel
            </a>

            <button
                class="rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white hover:bg-indigo-500"
            >
                Update Timeline
            </button>

        </div>

    </form>

</div>

@endsection