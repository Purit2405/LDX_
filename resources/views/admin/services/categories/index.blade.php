blade
@extends('layouts.admin.app')

@section('title', 'Service Categories')
@section('page-title', 'Service Categories')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <h1 class="text-2xl font-bold text-gray-900">
                Service Categories
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                จัดการหมวดหมู่ของบริการ
            </p>

        </div>


        <div class="flex gap-3">

            <a
                href="{{ route('admin.services.index') }}"
                class="rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Services
            </a>

            <a
                href="{{ route('admin.service-categories.create') }}"
                class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
            >
                + Add Category
            </a>

        </div>

    </div>


    {{-- Messages --}}
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


    {{-- Search --}}
    <div class="rounded-xl bg-white p-5 shadow-sm">

        <form
            method="GET"
            action="{{ route('admin.service-categories.index') }}"
            class="grid gap-4 md:grid-cols-[1fr_200px_auto]"
        >

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="ค้นหาหมวดหมู่..."
                class="rounded-lg border-gray-300 px-4 py-2.5 text-sm"
            >


            <select
                name="status"
                class="rounded-lg border-gray-300 px-4 py-2.5 text-sm"
            >

                <option value="">
                    All
                </option>

                <option
                    value="active"
                    @selected(request('status') === 'active')
                >
                    Active
                </option>

                <option
                    value="hidden"
                    @selected(request('status') === 'hidden')
                >
                    Hidden
                </option>

            </select>


            <div class="flex gap-2">

                <button
                    type="submit"
                    class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white"
                >
                    Search
                </button>

                <a
                    href="{{ route('admin.service-categories.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm"
                >
                    Reset
                </a>

            </div>

        </form>

    </div>


    {{-- Table --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Category
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Services
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($categories as $category)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-5">

                                <div class="font-semibold text-gray-900">
                                    {{ $category->name }}
                                </div>

                                <div class="mt-1 text-xs text-gray-400">
                                    {{ $category->slug }}
                                </div>

                                @if($category->description)

                                    <div class="mt-2 max-w-lg truncate text-sm text-gray-500">
                                        {{ $category->description }}
                                    </div>

                                @endif

                            </td>


                            <td class="px-6 py-5">

                                <span class="text-sm text-gray-600">
                                    {{ $category->services_count }}
                                </span>

                            </td>


                            <td class="px-6 py-5">

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


                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.service-categories.edit', $category) }}"
                                        class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-medium hover:bg-gray-50"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.service-categories.destroy', $category) }}"
                                        onsubmit="return confirm('ต้องการลบหมวดหมู่นี้หรือไม่?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-200 px-3 py-2 text-xs font-medium text-red-600 hover:bg-red-50"
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
                                colspan="4"
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

