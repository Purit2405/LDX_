@extends('layouts.admin.app')

@section('title', 'Clients')

@section('content')

<div class="space-y-6">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-white">
                Clients
            </h1>

            <p class="mt-1 text-sm text-gray-400">
                จัดการข้อมูลและ Logo ของลูกค้าบริษัท
            </p>
        </div>

        <a href="{{ route('admin.about.clients.create') }}"
           class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500">
            + Add Client
        </a>

    </div>

    @if(session('success'))
        <div class="rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        @forelse($clients as $client)

            <div class="group rounded-2xl border border-gray-800 bg-gray-950 p-5 transition hover:border-indigo-500/40">

                <div class="flex h-32 items-center justify-center rounded-xl bg-white p-5">

                    @if($client->logo)
                        <img
                            src="{{ Storage::url($client->logo) }}"
                            class="max-h-full max-w-full object-contain"
                            alt="{{ $client->name }}"
                        >
                    @else
                        <span class="text-gray-400">
                            No Logo
                        </span>
                    @endif

                </div>

                <div class="mt-5">

                    <h3 class="font-semibold text-white">
                        {{ $client->name }}
                    </h3>

                    @if($client->website)
                        <p class="mt-1 truncate text-xs text-gray-500">
                            {{ $client->website }}
                        </p>
                    @endif

                    <div class="mt-4 flex items-center justify-between">

                        @if($client->is_active)
                            <span class="rounded-full bg-green-500/10 px-3 py-1 text-xs text-green-400">
                                Active
                            </span>
                        @else
                            <span class="rounded-full bg-gray-800 px-3 py-1 text-xs text-gray-500">
                                Hidden
                            </span>
                        @endif

                        <div class="flex gap-2">

                            <a href="{{ route('admin.about.clients.edit', $client) }}"
                               class="rounded-lg bg-gray-800 px-3 py-2 text-xs text-gray-300 hover:bg-gray-700">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('admin.about.clients.destroy', $client) }}"
                                  onsubmit="return confirm('ลบ Client นี้หรือไม่?')">

                                @csrf
                                @method('DELETE')

                                <button class="rounded-lg bg-red-500/10 px-3 py-2 text-xs text-red-400 hover:bg-red-500/20">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-span-full rounded-2xl border border-dashed border-gray-800 py-16 text-center">

                <div class="text-4xl">🏢</div>

                <p class="mt-3 font-semibold text-gray-300">
                    ยังไม่มี Client
                </p>

                <p class="mt-1 text-sm text-gray-500">
                    เพิ่ม Logo ลูกค้าของบริษัท
                </p>

            </div>

        @endforelse

    </div>

    @if(method_exists($clients, 'links'))
        {{ $clients->links() }}
    @endif

</div>

@endsection