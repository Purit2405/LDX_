@extends('layouts.admin.app')

@section('title', 'Project Categories')

@section('page-title', 'Project Categories')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-2xl font-bold text-gray-900">
                Project Categories
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                จัดการหมวดหมู่ของ Projects
            </p>

        </div>


        <div class="flex gap-2">

            <a
                href="{{ route('admin.projects.index') }}"
                class="rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Projects
            </a>

            <a
                href="{{ route('admin.project-categories.create') }}"
                class="rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
            >
                + Add Category
            </a>

        </div>

    </div>


    @if(session('success'))

        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ session('error') }}
        </div>

    @endif


    {{-- Table --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                            Name
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                            Slug
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                            Projects
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase text-gray-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase text-gray-500">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($categories as $category)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">

                                <p class="font-semibold text-gray-900">
                                    {{ $category->name }}
                                </p>

                                @if($category->description)

                                    <p class="mt-1 max-w-md truncate text-xs text-gray-500">
                                        {{ $category->description }}
                                    </p>

                                @endif

                            </td>


                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $category->slug }}
                            </td>


                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $category->projects()->count() }}
                            </td>


                            <td class="px-6 py-4">

                                @if($category->is_active)

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                        Hidden
                                    </span>

                                @endif

                            </td>


                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.project-categories.edit', $category) }}"
                                        class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.project-categories.destroy', $category) }}"
                                        onsubmit="return confirm('ต้องการลบหมวดหมู่นี้หรือไม่?')"
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

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-16 text-center text-sm text-gray-500"
                            >
                                ยังไม่มีหมวดหมู่
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($categories->hasPages())

            <div class="border-t border-gray-100 px-6 py-4">
                {{ $categories->links() }}
            </div>

        @endif

    </div>

</div>

@endsection