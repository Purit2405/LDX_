
@extends('layouts.admin.app')

@section('title', 'คำขอใบเสนอราคา')

@section('content')

<div class="ldx-page ldx-page-wide">

    {{-- Header --}}
    <div class="ldx-page-header">

        <div>
            <h1 class="ldx-page-title">
                คำขอใบเสนอราคา
            </h1>

            <p class="ldx-page-description">
                รายการคำขอใบเสนอราคาที่ลูกค้าส่งเข้ามา
            </p>
        </div>

    </div>


    {{-- Information --}}
    <div class="ldx-alert ldx-alert-info">

        <div class="ldx-alert-title">
            📋 ข้อมูลคำขอใบเสนอราคา
        </div>

        <div class="ldx-alert-description">
            ข้อมูลที่ลูกค้าส่งผ่านแบบฟอร์มขอใบเสนอราคา
            ใช้สำหรับติดต่อกลับ สอบถามรายละเอียดโครงการ
            และจัดเตรียมใบเสนอราคา
        </div>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Filter --}}
    <div class="ldx-filter-card">

        <form
            action="{{ route('admin.quote-requests.index') }}"
            method="GET"
            class="ldx-filter-form"
        >

            {{-- Search --}}
            <div class="ldx-filter-search">

                <label class="ldx-label">
                    ค้นหา
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="ชื่อ, อีเมล, เบอร์โทรศัพท์..."
                    class="ldx-input"
                >

            </div>


            {{-- Status --}}
            <div>

                <label class="ldx-label">
                    สถานะ
                </label>

                <select
                    name="status"
                    class="ldx-select"
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
            <div class="ldx-filter-actions">

                <button
                    type="submit"
                    class="ldx-button ldx-button-primary"
                >
                    ค้นหา
                </button>

                <a
                    href="{{ route('admin.quote-requests.index') }}"
                    class="ldx-button ldx-button-secondary"
                >
                    ล้าง
                </a>

            </div>

        </form>

    </div>


    {{-- Table --}}
    <div class="ldx-table-wrapper">

        <div class="ldx-table-scroll">

            <table class="ldx-table">

                <thead>

                    <tr>

                        <th>
                            ลูกค้า
                        </th>

                        <th>
                            ติดต่อ
                        </th>

                        <th>
                            โครงการ
                        </th>

                        <th>
                            สถานะ
                        </th>

                        <th>
                            วันที่ส่ง
                        </th>

                        <th class="ldx-table-actions">
                            จัดการ
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($quoteRequests as $quoteRequest)

                        <tr>

                            {{-- Customer --}}
                            <td>

                                <div class="ldx-table-title">
                                    {{ $quoteRequest->full_name }}
                                </div>

                                @if($quoteRequest->installation_province)

                                    <div class="ldx-table-subtitle">
                                        📍 {{ $quoteRequest->installation_province }}
                                    </div>

                                @endif

                            </td>


                            {{-- Contact --}}
                            <td>

                                <div class="ldx-table-value">
                                    {{ $quoteRequest->phone }}
                                </div>

                                @if($quoteRequest->email)

                                    <div class="ldx-table-subtitle">
                                        {{ $quoteRequest->email }}
                                    </div>

                                @endif

                            </td>


                            {{-- Project --}}
                            <td>

                                @if($quoteRequest->floor_count)

                                    <div class="ldx-table-value">
                                        {{ $quoteRequest->floor_count }} ชั้น
                                    </div>

                                @else

                                    <span class="ldx-muted">
                                        ไม่ระบุ
                                    </span>

                                @endif

                                @if($quoteRequest->contact_time)

                                    <div class="ldx-table-subtitle">
                                        {{ $quoteRequest->contact_time }}
                                    </div>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td>

                                <span class="ldx-badge {{ $quoteRequest->status_badge_class }}">
                                    {{ $quoteRequest->status_label }}
                                </span>

                            </td>


                            {{-- Date --}}
                            <td>

                                <div class="ldx-table-date">
                                    {{ $quoteRequest->created_at->format('d/m/Y') }}
                                </div>

                                <div class="ldx-table-subtitle">
                                    {{ $quoteRequest->created_at->format('H:i') }} น.
                                </div>

                            </td>


                            {{-- Actions --}}
                            <td>

                                <div class="ldx-actions ldx-actions-end">

                                    <a
                                        href="{{ route('admin.quote-requests.show', $quoteRequest) }}"
                                        class="ldx-button ldx-button-secondary ldx-button-sm"
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
                                            class="ldx-button ldx-button-danger ldx-button-sm"
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
                                class="ldx-table-empty"
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

            <div class="ldx-pagination">
                {{ $quoteRequests->links() }}
            </div>

        @endif

    </div>

</div>

@endsection

