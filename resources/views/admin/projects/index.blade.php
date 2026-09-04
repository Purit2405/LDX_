
@extends('layouts.admin.app')

@section('title', 'Projects')

@section('page-title', 'Projects')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header ldx-page-header-actions">

        <div>

            <h1 class="ldx-page-title">
                Projects
            </h1>

            <p class="ldx-page-description">
                จัดการผลงานและโครงการของบริษัท
            </p>

        </div>


        <a
            href="{{ route('admin.projects.create') }}"
            class="ldx-button ldx-button-primary"
        >
            + Add Project
        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Filters --}}
    <div class="ldx-filter-card">

        <form
            method="GET"
            action="{{ route('admin.projects.index') }}"
            class="ldx-filter-form"
        >

            {{-- Search --}}
            <div class="ldx-filter-search">

                <label
                    for="search"
                    class="ldx-label"
                >
                    Search
                </label>

                <input
                    id="search"
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search project..."
                    class="ldx-input"
                >

            </div>


            {{-- Category --}}
            <div class="ldx-form-group">

                <label
                    for="category_id"
                    class="ldx-label"
                >
                    Category
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    class="ldx-select"
                >

                    <option value="">
                        All Categories
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(
                                request('category_id') == $category->id
                            )
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Status --}}
            <div class="ldx-form-group">

                <label
                    for="status"
                    class="ldx-label"
                >
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    class="ldx-select"
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
            <div class="ldx-filter-actions">

                <button
                    type="submit"
                    class="ldx-button ldx-button-primary"
                >
                    Filter
                </button>

                <a
                    href="{{ route('admin.projects.index') }}"
                    class="ldx-button ldx-button-secondary"
                >
                    Reset
                </a>

            </div>

        </form>

    </div>


    {{-- Projects Table --}}
    <div class="ldx-table-wrapper">

        @if($projects->count())

            <div class="ldx-table-scroll">

                <table class="ldx-table">

                    <thead>

                        <tr>

                            <th>
                                Project
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Client
                            </th>

                            <th>
                                Images
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="ldx-table-actions">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($projects as $project)

                            <tr>

                                {{-- Project --}}
                                <td>

                                    <div class="ldx-table-content">

                                        <div class="ldx-table-title">
                                            {{ $project->title }}
                                        </div>

                                        <div class="ldx-table-subtitle">
                                            /{{ $project->slug }}
                                        </div>

                                    </div>

                                </td>


                                {{-- Category --}}
                                <td>

                                    <span class="ldx-table-value">
                                        {{ $project->category?->name ?? '-' }}
                                    </span>

                                </td>


                                {{-- Client --}}
                                <td>

                                    <span class="ldx-table-value">
                                        {{ $project->client ?: '-' }}
                                    </span>

                                </td>


                                {{-- Images --}}
                                <td>

                                    <span class="ldx-table-value">
                                        {{ $project->images_count }}
                                    </span>

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($project->is_active)

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
                                <td>

                                    <div class="ldx-actions ldx-actions-end">

                                        <a
                                            href="{{ route(
                                                'admin.projects.edit',
                                                $project
                                            ) }}"
                                            class="ldx-button ldx-button-secondary ldx-button-sm"
                                        >
                                            Edit
                                        </a>


                                        <form
                                            method="POST"
                                            action="{{ route(
                                                'admin.projects.toggle',
                                                $project
                                            ) }}"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="ldx-button ldx-button-secondary ldx-button-sm"
                                            >
                                                {{ $project->is_active
                                                    ? 'Hide'
                                                    : 'Show'
                                                }}
                                            </button>

                                        </form>


                                        <form
                                            method="POST"
                                            action="{{ route(
                                                'admin.projects.destroy',
                                                $project
                                            ) }}"
                                            onsubmit="return confirm('ยืนยันลบ Project นี้? ข้อมูลและรูปภาพทั้งหมดจะถูกลบ')"
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

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            <div class="ldx-pagination">
                {{ $projects->links() }}
            </div>

        @else

            <div class="ldx-empty ldx-empty-full">

                <h3 class="ldx-empty-title">
                    No Projects
                </h3>

                <p class="ldx-empty-description">
                    ยังไม่มี Project ในระบบ
                </p>

                <a
                    href="{{ route('admin.projects.create') }}"
                    class="ldx-button ldx-button-primary"
                >
                    Add Project
                </a>

            </div>

        @endif

    </div>

</div>

@endsection

