@extends('layouts.admin.app')

@section('title', 'Certificates')

@section('content')

<div class="space-y-6">


{{-- Header --}}
<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>
        <h1 class="text-2xl font-bold text-white">
            Certificates
        </h1>

        <p class="mt-1 text-sm text-gray-400">
            จัดการใบรับรองและมาตรฐานของบริษัท
        </p>
    </div>

    <a
        href="{{ route('admin.about.certificates.create') }}"
        class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-500"
    >
        + Add Certificate
    </a>

</div>


{{-- Success Alert --}}
@if(session('success'))

    <div class="rounded-xl border border-green-500/20 bg-green-500/10 px-4 py-3 text-sm text-green-400">
        {{ session('success') }}
    </div>

@endif


{{-- Error Alert --}}
@if(session('error'))

    <div class="rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3 text-sm text-red-400">
        {{ session('error') }}
    </div>

@endif


{{-- Validation Errors --}}
@if($errors->any())

    <div class="rounded-xl border border-red-500/20 bg-red-500/10 px-4 py-3">

        <p class="mb-2 text-sm font-semibold text-red-400">
            เกิดข้อผิดพลาด
        </p>

        <ul class="list-inside list-disc space-y-1 text-xs text-red-300">

            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>

    </div>

@endif


{{-- Table --}}
<div class="overflow-hidden rounded-2xl border border-gray-800 bg-gray-950">

    <div class="overflow-x-auto">

        <table class="min-w-full text-sm">

            <thead class="border-b border-gray-800 bg-gray-900/70">

                <tr class="text-left text-xs uppercase tracking-wider text-gray-500">

                    <th class="px-6 py-4">
                        Certificate
                    </th>

                    <th class="px-6 py-4">
                        Organization
                    </th>

                    <th class="px-6 py-4">
                        Issued Date
                    </th>

                    <th class="px-6 py-4">
                        Status
                    </th>

                    <th class="px-6 py-4 text-right">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-gray-800">

                @forelse($certificates as $certificate)

                    <tr class="transition hover:bg-gray-900/50">


                        {{-- Certificate --}}
                        <td class="px-6 py-4">

                            <div class="flex items-center gap-4">

                                @if($certificate->image)

                                    <img
                                        src="{{ Storage::url($certificate->image) }}"
                                        class="h-14 w-14 rounded-lg border border-gray-800 bg-gray-900 object-cover"
                                        alt="{{ $certificate->name }}"
                                    >

                                @else

                                    <div class="flex h-14 w-14 items-center justify-center rounded-lg bg-gray-900 text-xl text-gray-600">
                                        📜
                                    </div>

                                @endif


                                <div class="min-w-0">

                                    <p class="truncate font-semibold text-gray-200">
                                        {{ $certificate->name }}
                                    </p>


                                    @if($certificate->certificate_number)

                                        <p class="mt-1 text-xs text-gray-500">
                                            {{ $certificate->certificate_number }}
                                        </p>

                                    @endif

                                </div>

                            </div>

                        </td>


                        {{-- Organization --}}
                        <td class="px-6 py-4 text-gray-400">

                            {{ $certificate->issuer ?: '-' }}

                        </td>


                        {{-- Issued Date --}}
                        <td class="px-6 py-4 text-gray-400">

                            @if($certificate->issued_date)

                                {{ $certificate->issued_date->format('d M Y') }}

                            @else

                                -

                            @endif

                        </td>


                        {{-- Status --}}
                        <td class="px-6 py-4">

                            @if($certificate->is_active)

                                <span class="inline-flex rounded-full bg-green-500/10 px-3 py-1 text-xs font-semibold text-green-400">
                                    Active
                                </span>

                            @else

                                <span class="inline-flex rounded-full bg-gray-800 px-3 py-1 text-xs font-semibold text-gray-500">
                                    Hidden
                                </span>

                            @endif

                        </td>


                        {{-- Actions --}}
                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-2">


                                {{-- Edit --}}
                                <a
                                    href="{{ route('admin.about.certificates.edit', $certificate) }}"
                                    class="rounded-lg bg-gray-800 px-3 py-2 text-xs font-medium text-gray-300 transition hover:bg-gray-700"
                                >
                                    Edit
                                </a>


                                {{-- Delete --}}
                                <form
                                    method="POST"
                                    action="{{ route('admin.about.certificates.destroy', $certificate) }}"
                                    onsubmit="return confirm('ลบ Certificate นี้หรือไม่?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded-lg bg-red-500/10 px-3 py-2 text-xs font-medium text-red-400 transition hover:bg-red-500/20"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="5" class="px-6 py-16 text-center">

                            <div class="text-4xl">
                                📜
                            </div>

                            <p class="mt-3 font-semibold text-gray-300">
                                ยังไม่มี Certificate
                            </p>

                            <p class="mt-1 text-sm text-gray-500">
                                เพิ่มใบรับรองหรือมาตรฐานของบริษัท
                            </p>

                            <a
                                href="{{ route('admin.about.certificates.create') }}"
                                class="mt-5 inline-flex rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-500"
                            >
                                + Add Certificate
                            </a>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}
    @if(method_exists($certificates, 'links'))

        <div class="border-t border-gray-800 px-6 py-4">
            {{ $certificates->links() }}
        </div>

    @endif

</div>


</div>

@endsection
