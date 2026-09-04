
@extends('layouts.admin.app')

@section('title', 'Company Timeline')

@section('content')

<div class="ldx-page">

    <div class="ldx-page-header ldx-page-header-with-actions">

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
            + Add Timeline
        </a>

    </div>


    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="ldx-timeline">

        <div class="ldx-timeline-line"></div>


        @forelse($timelines as $timeline)

            <div class="ldx-timeline-item">

                <div class="ldx-timeline-dot"></div>


                <div class="ldx-timeline-card">

                    <div class="ldx-timeline-content">

                        <div>

                            <div class="ldx-timeline-meta">

                                <span class="ldx-badge ldx-badge-primary">
                                    {{ $timeline->year }}
                                </span>

                                @if($timeline->is_active)

                                    <span class="ldx-badge ldx-badge-success">
                                        Active
                                    </span>

                                @endif

                            </div>


                            <h2 class="ldx-timeline-title">
                                {{ $timeline->title }}
                            </h2>


                            @if($timeline->description)

                                <p class="ldx-timeline-description">
                                    {{ $timeline->description }}
                                </p>

                            @endif

                        </div>


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

            <div class="ldx-empty-state">

                <div class="ldx-empty-state-icon">
                    🕐
                </div>

                <p class="ldx-empty-state-title">
                    ยังไม่มี Timeline
                </p>

                <p class="ldx-empty-state-description">
                    เพิ่มประวัติหรือเหตุการณ์สำคัญของบริษัท
                </p>

            </div>

        @endforelse

    </div>


    @if(method_exists($timelines, 'links'))

        {{ $timelines->links() }}

    @endif

</div>

@endsection

