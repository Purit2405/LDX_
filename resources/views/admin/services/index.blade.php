@extends('layouts.admin.app')

@section('title', 'Services')
@section('page-title', 'Services')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Services
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                จัดการบริการทั้งหมดของ LDX Elevator
            </p>
        </div>

        <div class="flex gap-3">

            <a
                href="{{ route('admin.service-categories.index') }}"
                class="rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Categories
            </a>

            <a
                href="{{ route('admin.services.create') }}"
                class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
            >
                + Add Service
            </a>

        </div>

    </div>


    {{-- Flash Messages --}}
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


    {{-- Search & Filter --}}
    <div class="rounded-xl bg-white p-5 shadow-sm">

        <form
            method="GET"
            action="{{ route('admin.services.index') }}"
            class="grid gap-4 md:grid-cols-[1fr_220px_auto]"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Search
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="ค้นหาชื่อบริการ หรือ Slug..."
                    class="w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm focus:border-gray-900 focus:ring-gray-900"
                >

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full rounded-lg border-gray-300 px-4 py-2.5 text-sm"
                >

                    <option value="">
                        All Services
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

            </div>


            <div class="flex items-end gap-2">

                <button
                    type="submit"
                    class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800"
                >
                    Search
                </button>

                <a
                    href="{{ route('admin.services.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    Reset
                </a>

            </div>

        </form>

    </div>


    {{-- Services Table --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Service
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Category
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Images
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Publish Date
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

                    @forelse($services as $service)

                        <tr class="hover:bg-gray-50">

                            {{-- Service --}}
                            <td class="px-6 py-5">

                                <div class="font-semibold text-gray-900">
                                    {{ $service->title }}
                                </div>

                                <div class="mt-1 text-xs text-gray-400">
                                    /{{ $service->slug }}
                                </div>

                                @if($service->short_description)

                                    <div class="mt-2 max-w-md truncate text-sm text-gray-500">
                                        {{ $service->short_description }}
                                    </div>

                                @endif

                            </td>


                            {{-- Category --}}
                            <td class="px-6 py-5">

                                @if($service->category)

                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                                        {{ $service->category->name }}
                                    </span>

                                @else

                                    <span class="text-sm text-gray-400">
                                        No Category
                                    </span>

                                @endif

                            </td>


                            {{-- Images --}}
                            <td class="px-6 py-5">

                                <span class="text-sm text-gray-600">
                                    {{ $service->images->count() }}
                                    {{ $service->images->count() === 1 ? 'image' : 'images' }}
                                </span>

                            </td>


                            {{-- Date --}}
                            <td class="px-6 py-5">

                                <span class="text-sm text-gray-600">
                                    {{ $service->publish_date?->format('d/m/Y') ?? '-' }}
                                </span>

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-5">

                                @if($service->is_active)

                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                        Hidden
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.services.show', $service) }}"
                                        class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50"
                                    >
                                        View
                                    </a>


                                    <a
                                        href="{{ route('admin.services.edit', $service) }}"
                                        class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.services.toggle', $service) }}"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="rounded-lg border px-3 py-2 text-xs font-medium
                                            {{ $service->is_active
                                                ? 'border-yellow-300 text-yellow-700 hover:bg-yellow-50'
                                                : 'border-green-300 text-green-700 hover:bg-green-50'
                                            }}"
                                        >

                                            {{ $service->is_active ? 'Hide' : 'Show' }}

                                        </button>

                                    </form>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.services.destroy', $service) }}"
                                        onsubmit="return confirm('ต้องการลบบริการนี้หรือไม่? ข้อมูลและรูปภาพทั้งหมดจะถูกลบ')"
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
                                colspan="6"
                                class="px-6 py-16 text-center"
                            >

                                <div class="text-sm font-medium text-gray-900">
                                    No Services Found
                                </div>

                                <div class="mt-1 text-sm text-gray-500">
                                    ยังไม่มีบริการในระบบ
                                </div>

                                <a
                                    href="{{ route('admin.services.create') }}"
                                    class="mt-4 inline-block rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white"
                                >
                                    Add Service
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($services->hasPages())

            <div class="border-t border-gray-100 px-6 py-4">
                {{ $services->links() }}
            </div>

        @endif

    </div>

</div>

@endsection
