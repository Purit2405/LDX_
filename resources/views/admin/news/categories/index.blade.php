@extends('layouts.admin.app')

@section('title', 'News Categories')
@section('page-title', 'News Categories')

@section('content')

<div class="mx-auto max-w-7xl space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                News Categories
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                จัดการหมวดหมู่ข่าวสาร
            </p>
        </div>

        <a
            href="{{ route('admin.news-categories.create') }}"
            class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
        >
            + Add Category
        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error --}}
    @if(session('error'))

        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ session('error') }}
        </div>

    @endif


    {{-- Filter --}}
    <div class="rounded-xl bg-white p-6 shadow-sm">

        <form
            method="GET"
            action="{{ route('admin.news-categories.index') }}"
            class="grid gap-4 md:grid-cols-3"
        >

            {{-- Search --}}
            <div class="md:col-span-2">

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Search
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="ค้นหาชื่อหมวดหมู่ หรือ Slug..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-gray-500 focus:outline-none"
                >

            </div>


            {{-- Status --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Status
                </label>

                <select
                    name="is_active"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                >

                    <option value="">
                        All Status
                    </option>

                    <option
                        value="1"
                        @selected(request('is_active') === '1')
                    >
                        Active
                    </option>

                    <option
                        value="0"
                        @selected(request('is_active') === '0')
                    >
                        Hidden
                    </option>

                </select>

            </div>


            {{-- Buttons --}}
            <div class="flex gap-2 md:col-span-3">

                <button
                    type="submit"
                    class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
                >
                    Search
                </button>

                <a
                    href="{{ route('admin.news-categories.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    Reset
                </a>

            </div>

        </form>

    </div>


    {{-- Table --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="border-b border-gray-200 bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            #
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Name
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            Slug
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            News
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

                    @forelse($categories as $category)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4 text-gray-500">
                                {{ $categories->firstItem() + $loop->index }}
                            </td>


                            <td class="px-6 py-4">

                                <div class="font-semibold text-gray-900">
                                    {{ $category->name }}
                                </div>

                            </td>


                            <td class="px-6 py-4">

                                <span class="rounded bg-gray-100 px-2 py-1 text-xs text-gray-600">
                                    {{ $category->slug }}
                                </span>

                            </td>


                            <td class="px-6 py-4">

                                <span class="font-medium text-gray-700">
                                    {{ $category->news_count }}
                                </span>

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

                                <div class="flex items-center justify-end gap-2">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('admin.news-categories.edit', $category) }}"
                                        class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50"
                                    >
                                        Edit
                                    </a>


                                    {{-- Toggle --}}
                                    <form
                                        method="POST"
                                        action="{{ route('admin.news-categories.toggle', $category) }}"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="rounded-lg bg-gray-100 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-200"
                                        >
                                            {{ $category->is_active ? 'Hide' : 'Activate' }}
                                        </button>

                                    </form>


                                    {{-- Delete --}}
                                    <form
                                        method="POST"
                                        action="{{ route('admin.news-categories.destroy', $category) }}"
                                        onsubmit="return confirm('ยืนยันการลบหมวดหมู่นี้?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg bg-red-50 px-3 py-2 text-xs font-medium text-red-600 hover:bg-red-100"
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
                                colspan="6"
                                class="px-6 py-12 text-center"
                            >

                                <div class="text-gray-500">
                                    ไม่พบหมวดหมู่ News
                                </div>

                                <a
                                    href="{{ route('admin.news-categories.create') }}"
                                    class="mt-3 inline-block text-sm font-medium text-gray-900 hover:underline"
                                >
                                    + เพิ่มหมวดหมู่แรก
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($categories->hasPages())

            <div class="border-t border-gray-200 px-6 py-4">
                {{ $categories->links() }}
            </div>

        @endif

    </div>

</div>

@endsection