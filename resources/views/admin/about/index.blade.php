@extends('layouts.admin.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-white">
            About Us
        </h1>

        <p class="mt-1 text-sm text-gray-400">
            Manage company information
        </p>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('admin.about.update') }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf
        @method('PUT')

        <div class="rounded-2xl border border-gray-800 bg-gray-900 p-6">

            <h2 class="mb-6 text-lg font-semibold text-white">
                Company Information
            </h2>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm text-gray-300">
                        Company Name
                    </label>

                    <input
                        type="text"
                        name="company_name"
                        value="{{ old('company_name', $about?->company_name) }}"
                        class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-white"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm text-gray-300">
                        Tagline
                    </label>

                    <input
                        type="text"
                        name="tagline"
                        value="{{ old('tagline', $about?->tagline) }}"
                        class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-white"
                    >
                </div>

            </div>

            <div class="mt-6">
                <label class="mb-2 block text-sm text-gray-300">
                    Short Description
                </label>

                <textarea
                    name="short_description"
                    rows="3"
                    class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-white"
                >{{ old('short_description', $about?->short_description) }}</textarea>
            </div>

            <div class="mt-6">
                <label class="mb-2 block text-sm text-gray-300">
                    Company Description
                </label>

                <textarea
                    name="description"
                    rows="7"
                    class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-white"
                >{{ old('description', $about?->description) }}</textarea>
            </div>

        </div>


        <div class="rounded-2xl border border-gray-800 bg-gray-900 p-6">

            <h2 class="mb-6 text-lg font-semibold text-white">
                Vision & Mission
            </h2>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm text-gray-300">
                        Vision
                    </label>

                    <textarea
                        name="vision"
                        rows="6"
                        class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-white"
                    >{{ old('vision', $about?->vision) }}</textarea>
                </div>

                <div>
                    <label class="mb-2 block text-sm text-gray-300">
                        Mission
                    </label>

                    <textarea
                        name="mission"
                        rows="6"
                        class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-white"
                    >{{ old('mission', $about?->mission) }}</textarea>
                </div>

            </div>

        </div>


        <div class="rounded-2xl border border-gray-800 bg-gray-900 p-6">

            <h2 class="mb-6 text-lg font-semibold text-white">
                Images
            </h2>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                <div>
                    <label class="mb-2 block text-sm text-gray-300">
                        Hero Image
                    </label>

                    <input
                        type="file"
                        name="hero_image"
                        accept="image/*"
                        class="w-full rounded-xl border border-gray-700 bg-gray-950 p-3 text-gray-300"
                    >

                    @if($about?->hero_image)
                        <img
                            src="{{ asset('storage/'.$about->hero_image) }}"
                            class="mt-4 h-40 w-full rounded-xl object-cover"
                        >
                    @endif
                </div>

                <div>
                    <label class="mb-2 block text-sm text-gray-300">
                        Company Image
                    </label>

                    <input
                        type="file"
                        name="company_image"
                        accept="image/*"
                        class="w-full rounded-xl border border-gray-700 bg-gray-950 p-3 text-gray-300"
                    >

                    @if($about?->company_image)
                        <img
                            src="{{ asset('storage/'.$about->company_image) }}"
                            class="mt-4 h-40 w-full rounded-xl object-cover"
                        >
                    @endif
                </div>

            </div>

        </div>


        <div class="rounded-2xl border border-gray-800 bg-gray-900 p-6">

            <label class="flex items-center gap-3 text-sm text-gray-300">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ $about?->is_active ?? true ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-gray-700"
                >

                Show About Us on website

            </label>

        </div>


        <div class="flex justify-end">

            <button
                type="submit"
                class="rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white hover:bg-indigo-500"
            >
                Save Changes
            </button>

        </div>

    </form>

</div>

@endsection