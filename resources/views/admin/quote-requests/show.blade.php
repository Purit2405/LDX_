
@extends('layouts.admin.app')

@section('title', 'รายละเอียดคำขอใบเสนอราคา')

@section('content')

<div class="ldx-page ldx-page-form">

    {{-- Header --}}
    <div class="ldx-page-header">

        <div>

            <h1 class="ldx-page-title">
                รายละเอียดคำขอใบเสนอราคา
            </h1>

            <p class="ldx-page-description">
                ข้อมูลที่ลูกค้าส่งเข้ามา
            </p>

        </div>


        <div class="ldx-page-header-actions">

            <a
                href="{{ route('admin.quote-requests.index') }}"
                class="ldx-page-back"
            >
                ← กลับ
            </a>

        </div>

    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Status --}}
    <div class="ldx-card">

        <div class="ldx-card-header">

            <div>

                <h2 class="ldx-card-title">
                    สถานะคำขอ
                </h2>

            </div>


            {{-- Status Form --}}
            <form
                action="{{ route('admin.quote-requests.status', $quoteRequest) }}"
                method="POST"
                class="ldx-actions"
            >

                @csrf
                @method('PATCH')

                <select
                    name="status"
                    class="ldx-select"
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
                    class="ldx-button ldx-button-primary"
                >
                    บันทึก
                </button>

            </form>

        </div>


        <div class="ldx-card-body">

            <span class="ldx-badge {{ $quoteRequest->status_badge_class }}">
                {{ $quoteRequest->status_label }}
            </span>

        </div>

    </div>


    {{-- Customer Information --}}
    <div class="ldx-card">

        <div class="ldx-card-header">

            <div>

                <h2 class="ldx-card-title">
                    ข้อมูลลูกค้า
                </h2>

            </div>

        </div>


        <div class="ldx-card-body">

            <div class="ldx-info-grid">

                {{-- Name --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        ชื่อ - นามสกุล
                    </div>

                    <div class="ldx-info-value">
                        {{ $quoteRequest->full_name }}
                    </div>

                </div>


                {{-- Phone --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        เบอร์โทรศัพท์
                    </div>

                    <div class="ldx-info-value">
                        {{ $quoteRequest->phone }}
                    </div>

                </div>


                {{-- Email --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        อีเมล
                    </div>

                    <div class="ldx-info-value">

                        @if($quoteRequest->email)

                            <a
                                href="mailto:{{ $quoteRequest->email }}"
                                class="ldx-link"
                            >
                                {{ $quoteRequest->email }}
                            </a>

                        @else

                            <span class="ldx-muted">
                                ไม่ระบุ
                            </span>

                        @endif

                    </div>

                </div>


                {{-- Province --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        จังหวัดสถานที่ติดตั้ง
                    </div>

                    <div class="ldx-info-value">
                        {{ $quoteRequest->installation_province ?: 'ไม่ระบุ' }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Project Information --}}
    <div class="ldx-card">

        <div class="ldx-card-header">

            <div>

                <h2 class="ldx-card-title">
                    รายละเอียดโครงการ
                </h2>

            </div>

        </div>


        <div class="ldx-card-body">

            <div class="ldx-info-grid">

                {{-- Floor --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        จำนวนชั้นที่ต้องการติดตั้ง
                    </div>

                    <div class="ldx-info-value">

                        @if($quoteRequest->floor_count)

                            {{ $quoteRequest->floor_count }} ชั้น

                        @else

                            <span class="ldx-muted">
                                ไม่ระบุ
                            </span>

                        @endif

                    </div>

                </div>


                {{-- Contact Time --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        ช่วงเวลาที่สะดวกให้ติดต่อกลับ
                    </div>

                    <div class="ldx-info-value">
                        {{ $quoteRequest->contact_time ?: 'ไม่ระบุ' }}
                    </div>

                </div>

            </div>


            {{-- Details --}}
            <div class="ldx-info-break">

                <div class="ldx-info-label">
                    รายละเอียดเพิ่มเติม
                </div>

                <div class="ldx-content-text">
                    {{ $quoteRequest->details }}
                </div>

            </div>

        </div>

    </div>


    {{-- Metadata --}}
    <div class="ldx-card">

        <div class="ldx-card-header">

            <div>

                <h2 class="ldx-card-title">
                    ข้อมูลระบบ
                </h2>

            </div>

        </div>


        <div class="ldx-card-body">

            <div class="ldx-info-grid">

                {{-- Created --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        วันที่ส่งคำขอ
                    </div>

                    <div class="ldx-info-value">
                        {{ $quoteRequest->created_at->format('d/m/Y H:i') }} น.
                    </div>

                </div>


                {{-- Updated --}}
                <div class="ldx-info-item">

                    <div class="ldx-info-label">
                        อัปเดตล่าสุด
                    </div>

                    <div class="ldx-info-value">
                        {{ $quoteRequest->updated_at->format('d/m/Y H:i') }} น.
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Delete --}}
    <div class="ldx-danger-zone">

        <div>

            <h3 class="ldx-danger-title">
                ลบคำขอใบเสนอราคา
            </h3>

            <p class="ldx-danger-description">
                การลบคำขอนี้จะไม่สามารถกู้คืนข้อมูลได้
            </p>

        </div>


        <form
            action="{{ route('admin.quote-requests.destroy', $quoteRequest) }}"
            method="POST"
            onsubmit="return confirm('ยืนยันการลบคำขอใบเสนอราคานี้? ข้อมูลจะถูกลบถาวร');"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="ldx-button ldx-button-danger"
            >
                ลบคำขอ
            </button>

        </form>

    </div>

</div>

@endsection

