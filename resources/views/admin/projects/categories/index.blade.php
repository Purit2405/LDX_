
@extends('layouts.admin.app')

@section('title', 'Project Categories')

@section('page-title', 'Project Categories')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header ldx-page-header-actions">

        <div>

            <h1 class="ldx-page-title">
                Project Categories
            </h1>

            <p class="ldx-page-description">
                จัดการหมวดหมู่ของ Projects
            </p>

        </div>


        <div class="ldx-actions">

            <a
                href="{{ route('admin.projects.index') }}"
                class="ldx-button ldx-button-secondary"
            >
                Projects
            </a>

            <a
                href="{{ route('admin.project-categories.create') }}"
                class="ldx-button ldx-button-primary"
            >
                + Add Category
            </a>

        </div>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error --}}
    @if(session('error'))

        <div class="ldx-alert ldx-alert-danger">
            {{ session('error') }}
        </div>

    @endif


    {{-- Table --}}
    <div class="ldx-table-wrapper">

        <div class="ldx-table-scroll">

            <table class="ldx-table">

                <thead>

                    <tr>

                        <th>
                            Name
                        </th>

                        <th>
                            Slug
                        </th>

                        <th>
                            Projects
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

                    @forelse($categories as $category)

                        <tr>

                            {{-- Name --}}
                            <td>

                                <div class="ldx-table-content">

                                    <p class="ldx-table-title">
                                        {{ $category->name }}
                                    </p>

                                    @if($category->description)

                                        <p class="ldx-table-description">
                                            {{ $category->description }}
                                        </p>

                                    @endif

                                </div>

                            </td>


                            {{-- Slug --}}
                            <td>

                                <span class="ldx-table-value">
                                    {{ $category->slug }}
                                </span>

                            </td>


                            {{-- Projects --}}
                            <td>

                                <span class="ldx-table-value">
                                    {{ $category->projects()->count() }}
                                </span>

                            </td>


                            {{-- Status --}}
                            <td>

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
                            <td>

                                <div class="ldx-actions ldx-actions-end">

                                    <a
                                        href="{{ route(
                                            'admin.project-categories.edit',
                                            $category
                                        ) }}"
                                        class="ldx-button ldx-button-secondary ldx-button-sm"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route(
                                            'admin.project-categories.destroy',
                                            $category
                                        ) }}"
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
                                colspan="5"
                                class="ldx-table-empty"
                            >

                                <div class="ldx-empty">

                                    <p class="ldx-empty-title">
                                        ยังไม่มีหมวดหมู่
                                    </p>

                                    <p class="ldx-empty-description">
                                        เพิ่ม Project Category เพื่อเริ่มจัดกลุ่ม Projects
                                    </p>

                                </div>

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

