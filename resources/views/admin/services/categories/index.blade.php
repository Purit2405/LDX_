
@extends('layouts.admin.app')

@section('title', 'Service Categories')

@section('page-title', 'Service Categories')

@section('content')

<div class="ldx-page">

    {{-- Header --}}
    <div class="ldx-page-header">

        <div>
            <h1 class="ldx-page-title">
                Service Categories
            </h1>

            <p class="ldx-page-description">
                จัดการหมวดหมู่ของบริการ
            </p>
        </div>

        <div class="ldx-form-actions">

            <a
                href="{{ route('admin.services.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Services
            </a>

            <a
                href="{{ route('admin.service-categories.create') }}"
                class="ldx-button ldx-button-primary"
            >
                + Add Category
            </a>

        </div>

    </div>


    {{-- Messages --}}
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


    {{-- Search --}}
    <div class="ldx-card">

        <div class="ldx-card-body">

            <form
                method="GET"
                action="{{ route('admin.service-categories.index') }}"
                class="ldx-filter-form"
            >

                <div class="ldx-form-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="ค้นหาหมวดหมู่..."
                        class="ldx-input"
                    >

                </div>


                <div class="ldx-form-group">

                    <select
                        name="status"
                        class="ldx-select"
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

                </div>


                <div class="ldx-filter-actions">

                    <button
                        type="submit"
                        class="ldx-button ldx-button-primary"
                    >
                        Search
                    </button>

                    <a
                        href="{{ route('admin.service-categories.index') }}"
                        class="ldx-button ldx-button-secondary"
                    >
                        Reset
                    </a>

                </div>

            </form>

        </div>

    </div>


    {{-- Table --}}
    <div class="ldx-card ldx-table-card">

        <div class="ldx-table-wrapper">

            <table class="ldx-table">

                <thead class="ldx-table-head">

                    <tr>

                        <th class="ldx-table-th">
                            Category
                        </th>

                        <th class="ldx-table-th">
                            Services
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

                    @forelse($categories as $category)

                        <tr class="ldx-table-row">

                            {{-- Category --}}
                            <td class="ldx-table-td">

                                <div class="ldx-table-primary">
                                    {{ $category->name }}
                                </div>

                                <div class="ldx-table-secondary">
                                    {{ $category->slug }}
                                </div>

                                @if($category->description)

                                    <div class="ldx-table-description">
                                        {{ $category->description }}
                                    </div>

                                @endif

                            </td>


                            {{-- Services --}}
                            <td class="ldx-table-td">

                                <span class="ldx-table-value">
                                    {{ $category->services_count }}
                                </span>

                            </td>


                            {{-- Status --}}
                            <td class="ldx-table-td">

                                @if($category->is_active)

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
                                        href="{{ route('admin.service-categories.edit', $category) }}"
                                        class="ldx-button ldx-button-secondary ldx-button-sm"
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
                                colspan="4"
                                class="ldx-table-empty"
                            >
                                ยังไม่มีหมวดหมู่
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($categories->hasPages())

            <div class="ldx-pagination">

                {{ $categories->links() }}

            </div>

        @endif

    </div>

</div>

@endsection

