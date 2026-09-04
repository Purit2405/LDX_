
@extends('layouts.admin.app')

@section('title', 'Company Timeline')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header ldx-page-header-actions">

        <div>

            <h1 class="ldx-page-title">
                Company Timeline
            </h1>

            <p class="ldx-page-description">
                จัดการประวัติและเหตุการณ์สำคัญของบริษัท
            </p>

        </div>


        <a
            href="{{ route('admin.about.timeline.create') }}"
            class="ldx-button ldx-button-primary"
        >
            <span>+</span>
            <span>Add Timeline</span>
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


    {{-- Timeline --}}
    <div class="ldx-timeline">

        @forelse($timelines as $timeline)

            <div class="ldx-timeline-item">

                <div class="ldx-timeline-dot"></div>


                <div class="ldx-timeline-card">

                    <div class="ldx-timeline-content">

                        {{-- Meta --}}
                        <div class="ldx-timeline-meta">

                            <span class="ldx-timeline-year">
                                {{ $timeline->year }}
                            </span>


                            @if($timeline->is_active)

                                <span class="ldx-badge ldx-badge-success">
                                    Active
                                </span>

                            @else

                                <span class="ldx-badge ldx-badge-muted">
                                    Hidden
                                </span>

                            @endif

                        </div>


                        {{-- Title --}}
                        <h2 class="ldx-timeline-title">
                            {{ $timeline->title }}
                        </h2>


                        {{-- Description --}}
                        @if($timeline->description)

                            <p class="ldx-timeline-description">
                                {{ $timeline->description }}
                            </p>

                        @endif


                        {{-- Sort Order --}}
                        <div class="ldx-timeline-order">
                            Sort Order: {{ $timeline->sort_order }}
                        </div>


                        {{-- Actions --}}
                        <div class="ldx-timeline-actions">

                            <a
                                href="{{ route('admin.about.timeline.edit', $timeline) }}"
                                class="ldx-button ldx-button-secondary ldx-button-sm"
                            >
                                Edit
                            </a>


                            <form
                                method="POST"
                                action="{{ route('admin.about.timeline.destroy', $timeline) }}"
                                onsubmit="return confirm('ลบ Timeline นี้หรือไม่?')"
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

                    </div>

                </div>

            </div>

        @empty

            <div class="ldx-empty ldx-empty-full">

                <div class="ldx-empty-icon">
                    🕐
                </div>

                <p class="ldx-empty-title">
                    ยังไม่มี Timeline
                </p>

                <p class="ldx-empty-description">
                    เพิ่มประวัติหรือเหตุการณ์สำคัญของบริษัท
                </p>

                <a
                    href="{{ route('admin.about.timeline.create') }}"
                    class="ldx-button ldx-button-primary"
                >
                    + Add Timeline
                </a>

            </div>

        @endforelse

    </div>


    {{-- Pagination --}}
    @if(method_exists($timelines, 'links'))

        <div class="ldx-pagination">
            {{ $timelines->links() }}
        </div>

    @endif

</div>

@endsection