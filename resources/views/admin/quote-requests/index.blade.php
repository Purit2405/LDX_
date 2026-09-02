@extends('layouts.admin.app')

@section('title', 'คำขอใบเสนอราคา')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div>

        <h1 class="text-2xl font-semibold text-gray-900">
            คำขอใบเสนอราคา
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            รายการคำขอใบเสนอราคาที่ลูกค้าส่งเข้ามา
        </p>

    </div>


    {{-- Information --}}
    <div class="rounded-xl border border-blue-200 bg-blue-50 p-5">

        <h3 class="font-semibold text-blue-900">
            📋 ข้อมูลคำขอใบเสนอราคา
        </h3>

        <p class="mt-2 text-sm leading-6 text-blue-800">
            ข้อมูลที่ลูกค้าส่งผ่านแบบฟอร์มขอใบเสนอราคา
            ใช้สำหรับติดต่อกลับ สอบถามรายละเอียดโครงการ
            และจัดเตรียมใบเสนอราคา
        </p>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-800">
            {{ session('success') }}
        </div>

    @endif


    {{-- Filter --}}
    <div class="rounded-xl border border-gray-200 bg-white p-5">

        <form
            action="{{ route('admin.quote-requests.index') }}"
            method="GET"
            class="grid grid-cols-1 gap-4 md:grid-cols-3"
        >

            {{-- Search --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    ค้นหา
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="ชื่อ, อีเมล, เบอร์โทรศัพท์..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                >

            </div>


            {{-- Status --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    สถานะ
                </label>

                <select
                    name="status"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                >

                    <option value="">
                        ทั้งหมด
                    </option>

                    <option
                        value="pending"
                        @selected(request('status') === 'pending')
                    >
                        รอติดต่อ
                    </option>

                    <option
                        value="contacted"
                        @selected(request('status') === 'contacted')
                    >
                        ติดต่อแล้ว
                    </option>

                    <option
                        value="quoted"
                        @selected(request('status') === 'quoted')
                    >
                        ส่งใบเสนอราคาแล้ว
                    </option>

                    <option
                        value="completed"
                        @selected(request('status') === 'completed')
                    >
                        ดำเนินการเสร็จสิ้น
                    </option>

                    <option
                        value="cancelled"
                        @selected(request('status') === 'cancelled')
                    >
                        ยกเลิก
                    </option>

                </select>

            </div>


            {{-- Buttons --}}
            <div class="flex items-end gap-2">

                <button
                    type="submit"
                    class="rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-800"
                >
                    ค้นหา
                </button>

                <a
                    href="{{ route('admin.quote-requests.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    ล้าง
                </a>

            </div>

        </form>

    </div>


    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1000px] text-left text-sm">

                <thead class="border-b border-gray-200 bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            ลูกค้า
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            ติดต่อ
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            โครงการ
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            สถานะ
                        </th>

                        <th class="px-6 py-4 font-semibold text-gray-700">
                            วันที่ส่ง
                        </th>

                        <th class="px-6 py-4 text-right font-semibold text-gray-700">
                            จัดการ
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($quoteRequests as $quoteRequest)

                        <tr class="hover:bg-gray-50">

                            {{-- Customer --}}
                            <td class="px-6 py-4">

                                <div class="font-medium text-gray-900">
                                    {{ $quoteRequest->full_name }}
                                </div>

                                @if($quoteRequest->installation_province)

                                    <div class="mt-1 text-xs text-gray-500">
                                        📍 {{ $quoteRequest->installation_province }}
                                    </div>

                                @endif

                            </td>


                            {{-- Contact --}}
                            <td class="px-6 py-4">

                                <div class="text-gray-700">
                                    {{ $quoteRequest->phone }}
                                </div>

                                @if($quoteRequest->email)

                                    <div class="mt-1 text-xs text-gray-500">
                                        {{ $quoteRequest->email }}
                                    </div>

                                @endif

                            </td>


                            {{-- Project --}}
                            <td class="px-6 py-4">

                                @if($quoteRequest->floor_count)

                                    <div>
                                        {{ $quoteRequest->floor_count }} ชั้น
                                    </div>

                                @else

                                    <span class="text-gray-400">
                                        ไม่ระบุ
                                    </span>

                                @endif

                                @if($quoteRequest->contact_time)

                                    <div class="mt-1 text-xs text-gray-500">
                                        {{ $quoteRequest->contact_time }}
                                    </div>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-4">

                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $quoteRequest->status_badge_class }}">
                                    {{ $quoteRequest->status_label }}
                                </span>

                            </td>


                            {{-- Date --}}
                            <td class="px-6 py-4 text-gray-500">

                                {{ $quoteRequest->created_at->format('d/m/Y') }}

                                <div class="text-xs">
                                    {{ $quoteRequest->created_at->format('H:i') }} น.
                                </div>

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.quote-requests.show', $quoteRequest) }}"
                                        class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50"
                                    >
                                        ดูรายละเอียด
                                    </a>


                                    <form
                                        action="{{ route('admin.quote-requests.destroy', $quoteRequest) }}"
                                        method="POST"
                                        onsubmit="return confirm('คุณต้องการลบคำขอนี้ใช่หรือไม่?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-lg border border-red-200 px-3 py-2 text-xs font-medium text-red-600 hover:bg-red-50"
                                        >
                                            ลบ
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-12 text-center text-gray-500"
                            >
                                ยังไม่มีคำขอใบเสนอราคา
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($quoteRequests->hasPages())

            <div class="border-t border-gray-200 px-6 py-4">

                {{ $quoteRequests->links() }}

            </div>

        @endif

    </div>

</div>

@endsection