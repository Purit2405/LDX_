@extends('layouts.admin.app')

@section('title', 'Add Client')

@section('content')

<div class="mx-auto max-w-3xl space-y-6">

    <div>
        <a href="{{ route('admin.about.clients.index') }}"
           class="text-sm text-gray-500 hover:text-indigo-400">
            ← Back to Clients
        </a>

        <h1 class="mt-3 text-2xl font-bold text-white">
            Add Client
        </h1>

        <p class="mt-1 text-sm text-gray-400">
            เพิ่มข้อมูลลูกค้าและ Logo
        </p>
    </div>

    <form
        method="POST"
        action="{{ route('admin.about.clients.store') }}"
        enctype="multipart/form-data"
    >

        @csrf

        <div class="space-y-6 rounded-2xl border border-gray-800 bg-gray-950 p-6">

            <div>
                <label class="mb-2 block text-sm text-gray-300">
                    Client Name *
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    placeholder="ABC Company Co., Ltd."
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
                    value="{{ old('website') }}"
                    placeholder="https://example.com"
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-white outline-none focus:border-indigo-500"
                >
            </div>

            <div>
                <label class="mb-2 block text-sm text-gray-300">
                    Client Logo *
                </label>

                <input
                    type="file"
                    name="logo"
                    accept="image/*"
                    required
                    class="block w-full rounded-xl border border-gray-800 bg-gray-900 text-sm text-gray-400 file:mr-4 file:border-0 file:bg-indigo-600 file:px-4 file:py-3 file:text-white"
                >

                <p class="mt-2 text-xs text-gray-500">
                    แนะนำ PNG / SVG / WebP พื้นหลังโปร่งใส
                </p>
            </div>

            <div>
                <label class="mb-2 block text-sm text-gray-300">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    placeholder="รายละเอียดลูกค้า..."
                    class="w-full rounded-xl border border-gray-800 bg-gray-900 px-4 py-3 text-white outline-none focus:border-indigo-500"
                >{{ old('description') }}</textarea>
            </div>

            <label class="flex items-center gap-3 text-sm text-gray-300">
                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    checked
                    class="h-4 w-4 rounded border-gray-700 bg-gray-900 text-indigo-600"
                >
                แสดง Client บนเว็บไซต์
            </label>

        </div>

        <div class="mt-6 flex justify-end gap-3">

            <a href="{{ route('admin.about.clients.index') }}"
               class="rounded-xl bg-gray-800 px-5 py-3 text-sm text-gray-300">
                Cancel
            </a>

            <button
                class="rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white hover:bg-indigo-500">
                Save Client
            </button>

        </div>

    </form>

</div>

@endsection