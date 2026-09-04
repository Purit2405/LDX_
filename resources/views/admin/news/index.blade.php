
@extends('layouts.admin.app')

@section('title', 'News')

@section('page-title', 'News')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header ldx-page-header-actions">

        <div>

            <h1 class="ldx-page-title">
                News
            </h1>

            <p class="ldx-page-description">
                จัดการข่าวสารและบทความของเว็บไซต์
            </p>

        </div>


        <a
            href="{{ route('admin.news.create') }}"
            class="ldx-button ldx-button-primary"
        >
            + Create News
        </a>

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


    {{-- Search / Filter --}}
    <div class="ldx-card ldx-filter-card">

        <div class="ldx-card-body">

            <form
                method="GET"
                action="{{ route('admin.news.index') }}"
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
                        placeholder="ค้นหาชื่อ News หรือ Slug..."
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
                                @selected(request('category_id') == $category->id)
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Status --}}
                <div class="ldx-form-group">

                    <label
                        for="is_active"
                        class="ldx-label"
                    >
                        Status
                    </label>

                    <select
                        id="is_active"
                        name="is_active"
                        class="ldx-select"
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
                <div class="ldx-filter-actions">

                    <button
                        type="submit"
                        class="ldx-button ldx-button-primary"
                    >
                        Search
                    </button>

                    <a
                        href="{{ route('admin.news.index') }}"
                        class="ldx-button ldx-button-secondary"
                    >
                        Reset
                    </a>

                </div>

            </form>

        </div>

    </div>


    {{-- News Table --}}
    <div class="ldx-table-wrapper">

        <div class="ldx-table-scroll">

            <table class="ldx-table">

                <thead>

                    <tr>

                        <th>
                            News
                        </th>

                        <th>
                            Category
                        </th>

                        <th>
                            Published
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

                    @forelse($news as $item)

                        <tr>

                            {{-- News --}}
                            <td>

                                <div class="ldx-news-table-content">

                                    <div class="ldx-table-title">
                                        {{ $item->title }}
                                    </div>

                                    <div class="ldx-table-subtitle">
                                        /{{ $item->slug }}
                                    </div>

                                    @if($item->short_description)

                                        <div class="ldx-table-description">
                                            {{ $item->short_description }}
                                        </div>

                                    @endif

                                </div>

                            </td>


                            {{-- Category --}}
                            <td>

                                @if($item->category)

                                    <span class="ldx-badge ldx-badge-muted">
                                        {{ $item->category->name }}
                                    </span>

                                @else

                                    <span class="ldx-muted">
                                        No Category
                                    </span>

                                @endif

                            </td>


                            {{-- Published --}}
                            <td>

                                @if($item->published_at)

                                    <span class="ldx-table-date">
                                        {{ $item->published_at->format('d/m/Y H:i') }}
                                    </span>

                                @else

                                    <span class="ldx-muted">
                                        Not published
                                    </span>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td>

                                @if($item->is_active)

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
                                        href="{{ route('admin.news.edit', $item) }}"
                                        class="ldx-button ldx-button-secondary ldx-button-sm"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.news.toggle', $item) }}"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="ldx-button ldx-button-secondary ldx-button-sm"
                                        >
                                            {{ $item->is_active ? 'Hide' : 'Activate' }}
                                        </button>

                                    </form>


                                    <form
                                        method="POST"
                                        action="{{ route('admin.news.destroy', $item) }}"
                                        onsubmit="return confirm('ยืนยันลบ News นี้? ข้อมูลและรูปภาพทั้งหมดจะถูกลบถาวร')"
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
                                        ไม่พบ News
                                    </p>

                                    <p class="ldx-empty-description">
                                        ลองเปลี่ยนคำค้นหาหรือสร้าง News ใหม่
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($news->hasPages())

            <div class="ldx-pagination">
                {{ $news->links() }}
            </div>

        @endif

    </div>

</div>

@endsection

