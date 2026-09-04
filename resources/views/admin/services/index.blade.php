
@extends('layouts.admin.app')

@section('title', 'Services')

@section('page-title', 'Services')

@section('content')

<div class="ldx-page">

    {{-- Header --}}
    <div class="ldx-page-header ldx-page-header-row">

        <div>

            <h1 class="ldx-page-title">
                Services
            </h1>

            <p class="ldx-page-description">
                จัดการบริการทั้งหมดของ LDX Elevator
            </p>

        </div>


        <div class="ldx-form-actions">

            <a
                href="{{ route('admin.service-categories.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Categories
            </a>

            <a
                href="{{ route('admin.services.create') }}"
                class="ldx-button ldx-button-primary"
            >
                + Add Service
            </a>

        </div>

    </div>


    {{-- Flash Messages --}}
    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="ldx-alert ldx-alert-danger">
            {{ session('error') }}
        </div>

    @endif


    {{-- Search & Filter --}}
    <div class="ldx-card">

        <div class="ldx-card-body">

            <form
                method="GET"
                action="{{ route('admin.services.index') }}"
                class="ldx-filter-form"
            >

                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Search
                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="ค้นหาชื่อบริการ หรือ Slug..."
                        class="ldx-input"
                    >

                </div>


                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="ldx-select"
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


                <div class="ldx-filter-actions">

                    <button
                        type="submit"
                        class="ldx-button ldx-button-primary"
                    >
                        Search
                    </button>

                    <a
                        href="{{ route('admin.services.index') }}"
                        class="ldx-button ldx-button-secondary"
                    >
                        Reset
                    </a>

                </div>

            </form>

        </div>

    </div>


    {{-- Services Table --}}
    <div class="ldx-card ldx-table-card">

        <div class="ldx-table-wrapper">

            <table class="ldx-table">

                <thead class="ldx-table-head">

                    <tr>

                        <th class="ldx-table-th">
                            Service
                        </th>

                        <th class="ldx-table-th">
                            Category
                        </th>

                        <th class="ldx-table-th">
                            Images
                        </th>

                        <th class="ldx-table-th">
                            Publish Date
                        </th>

                        <th class="ldx-table-th">
                            Status
                        </th>

                        <th class="ldx-table-th ldx-table-th-right">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="ldx-table-body">

                    @forelse($services as $service)

                        <tr class="ldx-table-row">

                            {{-- Service --}}
                            <td class="ldx-table-td">

                                <div class="ldx-table-primary">
                                    {{ $service->title }}
                                </div>

                                <div class="ldx-table-secondary">
                                    /{{ $service->slug }}
                                </div>

                                @if($service->short_description)

                                    <div class="ldx-table-description">
                                        {{ $service->short_description }}
                                    </div>

                                @endif

                            </td>


                            {{-- Category --}}
                            <td class="ldx-table-td">

                                @if($service->category)

                                    <span class="ldx-badge ldx-badge-muted">
                                        {{ $service->category->name }}
                                    </span>

                                @else

                                    <span class="ldx-table-secondary">
                                        No Category
                                    </span>

                                @endif

                            </td>


                            {{-- Images --}}
                            <td class="ldx-table-td">

                                <span class="ldx-table-value">

                                    {{ $service->images->count() }}

                                    {{ $service->images->count() === 1 ? 'image' : 'images' }}

                                </span>

                            </td>


                            {{-- Date --}}
                            <td class="ldx-table-td">

                                <span class="ldx-table-value">
                                    {{ $service->publish_date?->format('d/m/Y') ?? '-' }}
                                </span>

                            </td>


                            {{-- Status --}}
                            <td class="ldx-table-td">

                                @if($service->is_active)

                                    <span class="ldx-badge ldx-badge-success">
                                        Active
                                    </span>

                                @else

                                    <span class="ldx-badge ldx-badge-muted">
                                        Hidden
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td class="ldx-table-td ldx-table-td-right">

                                <div class="ldx-table-actions">

                                    <a
                                        href="{{ route('admin.services.show', $service) }}"
                                        class="ldx-button ldx-button-secondary ldx-button-sm"
                                    >
                                        View
                                    </a>


                                    <a
                                        href="{{ route('admin.services.edit', $service) }}"
                                        class="ldx-button ldx-button-secondary ldx-button-sm"
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
                                            class="ldx-button ldx-button-sm
                                            {{ $service->is_active
                                                ? 'ldx-button-warning'
                                                : 'ldx-button-success'
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
                                            class="ldx-button ldx-button-danger ldx-button-sm"
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
                                class="ldx-table-empty"
                            >

                                <div class="ldx-table-empty-title">
                                    No Services Found
                                </div>

                                <div class="ldx-table-empty-description">
                                    ยังไม่มีบริการในระบบ
                                </div>

                                <a
                                    href="{{ route('admin.services.create') }}"
                                    class="ldx-button ldx-button-primary"
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

            <div class="ldx-pagination">
                {{ $services->links() }}
            </div>

        @endif

    </div>

</div>

@endsection

