@extends('layouts.admin.app')

@section('title', 'Company Timeline')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-white">
                Company Timeline
            </h1>

            <p class="mt-1 text-sm text-gray-400">
                จัดการประวัติและเหตุการณ์สำคัญของบริษัท
            </p>
        </div>

        <a
            href="{{ route('admin.about.timeline.create') }}"
            class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500"
        >
            + Add Timeline
        </a>

    </div>

    @if(session('success'))
        <div class="rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative space-y-6">

        <div class="absolute left-6 top-0 bottom-0 hidden w-px bg-gray-800 md:block"></div>

        @forelse($timelines as $timeline)

            <div class="relative rounded-2xl border border-gray-800 bg-gray-950 p-6 md:ml-14">

                <div class="absolute -left-[2.65rem] top-7 hidden h-5 w-5 rounded-full border-4 border-gray-950 bg-indigo-500 md:block"></div>

                <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">

                    <div>

                        <div class="flex flex-wrap items-center gap-3">

                            <span class="rounded-lg bg-indigo-500/10 px-3 py-1 text-sm font-bold text-indigo-400">
                                {{ $timeline->year }}
                            </span>

                            @if($timeline->is_active)
                                <span class="rounded-full bg-green-500/10 px-3 py-1 text-xs text-green-400">
                                    Active
                                </span>
                            @endif

                        </div>

                        <h2 class="mt-4 text-xl font-bold text-white">
                            {{ $timeline->title }}
                        </h2>

                        @if($timeline->description)
                            <p class="mt-2 max-w-3xl text-sm leading-6 text-gray-400">
                                {{ $timeline->description }}
                            </p>
                        @endif

                    </div>

                    <div class="flex gap-2">

                        <a
                            href="{{ route('admin.about.timeline.edit', $timeline) }}"
                            class="rounded-lg bg-gray-800 px-4 py-2 text-xs text-gray-300 hover:bg-gray-700"
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

                            <button class="rounded-lg bg-red-500/10 px-4 py-2 text-xs text-red-400 hover:bg-red-500/20">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="rounded-2xl border border-dashed border-gray-800 py-16 text-center">

                <div class="text-4xl">🕐</div>

                <p class="mt-3 font-semibold text-gray-300">
                    ยังไม่มี Timeline
                </p>

                <p class="mt-1 text-sm text-gray-500">
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