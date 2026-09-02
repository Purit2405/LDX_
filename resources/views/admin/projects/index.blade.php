@extends('layouts.admin.app')

@section('title', 'Projects')
@section('page-title', 'Projects')

@section('content')

<div class="mx-auto max-w-7xl space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Projects
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                จัดการผลงานและโครงการของบริษัท
            </p>
        </div>

        <a
            href="{{ route('admin.projects.create') }}"
            class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
        >
            + Add Project
        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- Filters --}}
    <div class="rounded-xl bg-white p-5 shadow-sm">

        <form
            method="GET"
            action="{{ route('admin.projects.index') }}"
            class="grid gap-4 md:grid-cols-4"
        >

            {{-- Search --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Search
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search project..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-gray-900 focus:outline-none"
                >

            </div>


            {{-- Category --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Category
                </label>

                <select
                    name="category_id"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm"
                >

                    <option value="">
                        All Categories
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(request('category_id') == $category->id)
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Status --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm"
                >

                    <option value="">
                        All Status
                    </option>

                    <option
                        value="1"
                        @selected(request('status') === '1')
                    >
                        Active
                    </option>

                    <option
                        value="0"
                        @selected(request('status') === '0')
                    >
                        Hidden
                    </option>

                </select>

            </div>


            {{-- Buttons --}}
            <div class="flex items-end gap-2">

                <button
                    type="submit"
                    class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
                >
                    Filter
                </button>

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    Reset
                </a>

            </div>

        </form>

    </div>


    {{-- Projects --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-sm">

        @if($projects->count())

            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm">

                    <thead class="border-b border-gray-200 bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 font-semibold text-gray-700">
                                Project
                            </th>

                            <th class="px-6 py-4 font-semibold text-gray-700">
                                Category
                            </th>

                            <th class="px-6 py-4 font-semibold text-gray-700">
                                Client
                            </th>

                            <th class="px-6 py-4 font-semibold text-gray-700">
                                Images
                            </th>

                            <th class="px-6 py-4 font-semibold text-gray-700">
                                Status
                            </th>

                            <th class="px-6 py-4 text-right font-semibold text-gray-700">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @foreach($projects as $project)

                            <tr class="hover:bg-gray-50">

                                {{-- Project --}}
                                <td class="px-6 py-4">

                                    <div class="font-semibold text-gray-900">
                                        {{ $project->title }}
                                    </div>

                                    <div class="mt-1 text-xs text-gray-500">
                                        /{{ $project->slug }}
                                    </div>

                                </td>


                                {{-- Category --}}
                                <td class="px-6 py-4 text-gray-600">

                                    {{ $project->category?->name ?? '-' }}

                                </td>


                                {{-- Client --}}
                                <td class="px-6 py-4 text-gray-600">

                                    {{ $project->client ?: '-' }}

                                </td>


                                {{-- Images --}}
                                <td class="px-6 py-4 text-gray-600">

                                    {{ $project->images_count }}

                                </td>


                                {{-- Status --}}
                                <td class="px-6 py-4">

                                    @if($project->is_active)

                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Active
                                        </span>

                                    @else

                                        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                            Hidden
                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="px-6 py-4">

                                    <div class="flex justify-end gap-2">

                                        <a
                                            href="{{ route('admin.projects.edit', $project) }}"
                                            class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-100"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            method="POST"
                                            action="{{ route('admin.projects.toggle', $project) }}"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-100"
                                            >
                                                {{ $project->is_active ? 'Hide' : 'Show' }}
                                            </button>

                                        </form>


                                        <form
                                            method="POST"
                                            action="{{ route('admin.projects.destroy', $project) }}"
                                            onsubmit="return confirm('ยืนยันลบ Project นี้? ข้อมูลและรูปภาพทั้งหมดจะถูกลบ')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-100"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            <div class="border-t border-gray-200 px-6 py-4">

                {{ $projects->links() }}

            </div>

        @else

            <div class="px-6 py-16 text-center">

                <h3 class="text-lg font-semibold text-gray-900">
                    No Projects
                </h3>

                <p class="mt-2 text-sm text-gray-500">
                    ยังไม่มี Project ในระบบ
                </p>

                <a
                    href="{{ route('admin.projects.create') }}"
                    class="mt-5 inline-flex rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
                >
                    Add Project
                </a>

            </div>

        @endif

    </div>

</div>

@endsection

