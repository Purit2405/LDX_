@extends('layouts.admin.app')

@section('title', 'รายละเอียดคำขอใบเสนอราคา')

@section('content')

<div class="mx-auto max-w-5xl space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

        <div>

            <h1 class="text-2xl font-semibold text-gray-900">
                รายละเอียดคำขอใบเสนอราคา
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                ข้อมูลที่ลูกค้าส่งเข้ามา
            </p>

        </div>


        <a
            href="{{ route('admin.quote-requests.index') }}"
            class="inline-flex w-fit rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
        >
            ← กลับ
        </a>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-800">
            {{ session('success') }}
        </div>

    @endif


    {{-- Status --}}
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <div>

                <h2 class="font-semibold text-gray-900">
                    สถานะคำขอ
                </h2>

                <div class="mt-2">

                    <span class="inline-flex rounded-full px-3 py-1 text-sm font-medium {{ $quoteRequest->status_badge_class }}">
                        {{ $quoteRequest->status_label }}
                    </span>

                </div>

            </div>


            {{-- Status Form --}}
            <form
                action="{{ route('admin.quote-requests.status', $quoteRequest) }}"
                method="POST"
                class="flex gap-2"
            >

                @csrf
                @method('PATCH')

                <select
                    name="status"
                    class="rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-red-500 focus:outline-none"
                >

                    <option
                        value="pending"
                        @selected($quoteRequest->status === 'pending')
                    >
                        รอติดต่อ
                    </option>

                    <option
                        value="contacted"
                        @selected($quoteRequest->status === 'contacted')
                    >
                        ติดต่อแล้ว
                    </option>

                    <option
                        value="quoted"
                        @selected($quoteRequest->status === 'quoted')
                    >
                        ส่งใบเสนอราคาแล้ว
                    </option>

                    <option
                        value="completed"
                        @selected($quoteRequest->status === 'completed')
                    >
                        ดำเนินการเสร็จสิ้น
                    </option>

                    <option
                        value="cancelled"
                        @selected($quoteRequest->status === 'cancelled')
                    >
                        ยกเลิก
                    </option>

                </select>


                <button
                    type="submit"
                    class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800"
                >
                    บันทึก
                </button>

            </form>

        </div>

    </div>


    {{-- Customer Information --}}
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

        <h2 class="mb-6 text-lg font-semibold text-gray-900">
            ข้อมูลลูกค้า
        </h2>


        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


            {{-- Name --}}
            <div>

                <div class="text-sm text-gray-500">
                    ชื่อ - นามสกุล
                </div>

                <div class="mt-1 font-medium text-gray-900">
                    {{ $quoteRequest->full_name }}
                </div>

            </div>


            {{-- Phone --}}
            <div>

                <div class="text-sm text-gray-500">
                    เบอร์โทรศัพท์
                </div>

                <div class="mt-1 font-medium text-gray-900">
                    {{ $quoteRequest->phone }}
                </div>

            </div>


            {{-- Email --}}
            <div>

                <div class="text-sm text-gray-500">
                    อีเมล
                </div>

                <div class="mt-1 font-medium text-gray-900">

                    @if($quoteRequest->email)

                        <a
                            href="mailto:{{ $quoteRequest->email }}"
                            class="text-red-600 hover:underline"
                        >
                            {{ $quoteRequest->email }}
                        </a>

                    @else

                        <span class="text-gray-400">
                            ไม่ระบุ
                        </span>

                    @endif

                </div>

            </div>


            {{-- Province --}}
            <div>

                <div class="text-sm text-gray-500">
                    จังหวัดสถานที่ติดตั้ง
                </div>

                <div class="mt-1 font-medium text-gray-900">

                    {{ $quoteRequest->installation_province ?: 'ไม่ระบุ' }}

                </div>

            </div>

        </div>

    </div>


    {{-- Project Information --}}
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

        <h2 class="mb-6 text-lg font-semibold text-gray-900">
            รายละเอียดโครงการ
        </h2>


        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


            {{-- Floor --}}
            <div>

                <div class="text-sm text-gray-500">
                    จำนวนชั้นที่ต้องการติดตั้ง
                </div>

                <div class="mt-1 font-medium text-gray-900">

                    @if($quoteRequest->floor_count)

                        {{ $quoteRequest->floor_count }} ชั้น

                    @else

                        <span class="text-gray-400">
                            ไม่ระบุ
                        </span>

                    @endif

                </div>

            </div>


            {{-- Contact Time --}}
            <div>

                <div class="text-sm text-gray-500">
                    ช่วงเวลาที่สะดวกให้ติดต่อกลับ
                </div>

                <div class="mt-1 font-medium text-gray-900">

                    {{ $quoteRequest->contact_time ?: 'ไม่ระบุ' }}

                </div>

            </div>

        </div>


        {{-- Details --}}
        <div class="mt-6">

            <div class="text-sm text-gray-500">
                รายละเอียดเพิ่มเติม
            </div>

            <div class="mt-2 whitespace-pre-line rounded-lg bg-gray-50 p-5 leading-7 text-gray-800">
                {{ $quoteRequest->details }}
            </div>

        </div>

    </div>


    {{-- Metadata --}}
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

        <h2 class="mb-5 text-lg font-semibold text-gray-900">
            ข้อมูลระบบ
        </h2>

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

            <div>

                <div class="text-sm text-gray-500">
                    วันที่ส่งคำขอ
                </div>

                <div class="mt-1 text-gray-900">
                    {{ $quoteRequest->created_at->format('d/m/Y H:i') }} น.
                </div>

            </div>


            <div>

                <div class="text-sm text-gray-500">
                    อัปเดตล่าสุด
                </div>

                <div class="mt-1 text-gray-900">
                    {{ $quoteRequest->updated_at->format('d/m/Y H:i') }} น.
                </div>

            </div>

        </div>

    </div>


    {{-- Delete --}}
    <div class="flex justify-end">

        <form
            action="{{ route('admin.quote-requests.destroy', $quoteRequest) }}"
            method="POST"
            onsubmit="return confirm('ยืนยันการลบคำขอใบเสนอราคานี้? ข้อมูลจะถูกลบถาวร');"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="rounded-lg bg-red-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-700"
            >
                ลบคำขอ
            </button>

        </form>

    </div>

</div>

@endsection