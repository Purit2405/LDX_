@extends('layouts.admin.app')

@section('title', 'News')

@section('page-title', 'News')

@section('content')

<div class="mx-auto max-w-7xl space-y-6">


{{-- Header --}}
<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>
        <h1 class="text-2xl font-bold text-gray-900">
            News
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            จัดการข่าวสารและบทความของเว็บไซต์
        </p>
    </div>

    <a
        href="{{ route('admin.news.create') }}"
        class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
    >
        + Create News
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


{{-- Search / Filter --}}
<div class="rounded-xl bg-white p-5 shadow-sm">

    <form
        method="GET"
        action="{{ route('admin.news.index') }}"
        class="grid gap-4 md:grid-cols-4"
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
                placeholder="ค้นหาชื่อ News หรือ Slug..."
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-gray-500 focus:outline-none"
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
                name="is_active"
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm"
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
        <div class="flex gap-2 md:col-span-4">

            <button
                type="submit"
                class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
            >
                Search
            </button>

            <a
                href="{{ route('admin.news.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Reset
            </a>

        </div>

    </form>

</div>


{{-- News Table --}}
<div class="overflow-hidden rounded-xl bg-white shadow-sm">

    <div class="overflow-x-auto">

        <table class="w-full text-left text-sm">

            <thead class="border-b bg-gray-50 text-xs uppercase text-gray-500">

                <tr>

                    <th class="px-6 py-4">
                        News
                    </th>

                    <th class="px-6 py-4">
                        Category
                    </th>

                    <th class="px-6 py-4">
                        Published
                    </th>

                    <th class="px-6 py-4">
                        Status
                    </th>

                    <th class="px-6 py-4 text-right">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-gray-100">

                @forelse($news as $item)

                    <tr class="hover:bg-gray-50">

                        {{-- News --}}
                        <td class="px-6 py-5">

                            <div class="max-w-md">

                                <div class="font-semibold text-gray-900">
                                    {{ $item->title }}
                                </div>

                                <div class="mt-1 truncate text-xs text-gray-500">
                                    /{{ $item->slug }}
                                </div>

                                @if($item->short_description)

                                    <div class="mt-2 line-clamp-2 text-xs text-gray-500">
                                        {{ $item->short_description }}
                                    </div>

                                @endif

                            </div>

                        </td>


                        {{-- Category --}}
                        <td class="px-6 py-5">

                            @if($item->category)

                                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                                    {{ $item->category->name }}
                                </span>

                            @else

                                <span class="text-xs text-gray-400">
                                    No Category
                                </span>

                            @endif

                        </td>


                        {{-- Published --}}
                        <td class="px-6 py-5 text-gray-600">

                            @if($item->published_at)

                                {{ $item->published_at->format('d/m/Y H:i') }}

                            @else

                                <span class="text-gray-400">
                                    Not published
                                </span>

                            @endif

                        </td>


                        {{-- Status --}}
                        <td class="px-6 py-5">

                            @if($item->is_active)

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
                        <td class="px-6 py-5">

                            <div class="flex justify-end gap-2">

                                {{-- Edit --}}
                                <a
                                    href="{{ route('admin.news.edit', $item) }}"
                                    class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50"
                                >
                                    Edit
                                </a>


                                {{-- Toggle --}}
                                <form
                                    method="POST"
                                    action="{{ route('admin.news.toggle', $item) }}"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50"
                                    >
                                        {{ $item->is_active ? 'Hide' : 'Activate' }}
                                    </button>

                                </form>


                                {{-- Delete --}}
                                <form
                                    method="POST"
                                    action="{{ route('admin.news.destroy', $item) }}"
                                    onsubmit="return confirm('ยืนยันลบ News นี้? ข้อมูลและรูปภาพทั้งหมดจะถูกลบถาวร')"
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
                            class="px-6 py-16 text-center"
                        >

                            <div class="text-sm font-medium text-gray-500">
                                ไม่พบ News
                            </div>

                            <div class="mt-1 text-xs text-gray-400">
                                ลองเปลี่ยนคำค้นหาหรือสร้าง News ใหม่
                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}
    @if($news->hasPages())

        <div class="border-t border-gray-100 px-6 py-4">
            {{ $news->links() }}
        </div>

    @endif

</div>


</div>

@endsection
