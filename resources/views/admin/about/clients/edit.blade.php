@extends('layouts.admin.app')

@section('title', 'Edit Client')

@section('content')

<div class="mx-auto max-w-3xl space-y-6">

    <div>
        <a href="{{ route('admin.about.clients.index') }}"
           class="text-sm text-gray-500 hover:text-indigo-400">
            ← Back to Clients
        </a>

        <h1 class="mt-3 text-2xl font-bold text-white">
            Edit Client
        </h1>
    </div>

    <form
        method="POST"
        action="{{ route('admin.about.clients.update', $client) }}"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <div class="space-y-6 rounded-2xl border border-gray-800 bg-gray-950 p-6">

            <div>
                <label class="mb-2 block text-sm text-gray-300">
                    Client Name *
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $client->name) }}"
                    required
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-white outline-none focus:border-indigo-500"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm text-gray-300">
                    Website
                </label>

                <input
                    type="url"
                    name="website"
                    value="{{ old('website', $client->website) }}"
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-white outline-none focus:border-indigo-500"
                >
            </div>

            @if($client->logo)

                <div>

                    <p class="mb-2 text-sm text-gray-400">
                        Current Logo
                    </p>

                    <div class="flex h-32 w-64 items-center justify-center rounded-xl bg-white p-5">

                        <img
                            src="{{ Storage::url($client->logo) }}"
                            class="max-h-full max-w-full object-contain"
                        >

                    </div>

                </div>

            @endif

            <div>

                <label class="mb-2 block text-sm text-gray-300">
                    Replace Logo
                </label>

                <input
                    type="file"
                    name="logo"
                    accept="image/*"
                    class="block w-full rounded-xl border border-gray-800 bg-gray-900 text-sm text-gray-400 file:mr-4 file:border-0 file:bg-indigo-600 file:px-4 file:py-3 file:text-white"
                >

            </div>

            <div>

                <label class="mb-2 block text-sm text-gray-300">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-white outline-none focus:border-indigo-500"
                >{{ old('description', $client->description) }}</textarea>

            </div>

            <label class="flex items-center gap-3 text-sm text-gray-300">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $client->is_active) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-gray-700 bg-gray-900 text-indigo-600"
                >

                Active

            </label>

        </div>

        <div class="mt-6 flex justify-end gap-3">

            <a href="{{ route('admin.about.clients.index') }}"
               class="rounded-xl bg-gray-800 px-5 py-3 text-sm text-gray-300">
                Cancel
            </a>

            <button
                class="rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white hover:bg-indigo-500">
                Update Client
            </button>

        </div>

    </form>

</div>

@endsection