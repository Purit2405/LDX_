@extends('layouts.public.app')

@section('title', 'Request a Quotation | LDX Elevator')

@section('content')

<div class="ldx-quote-page">

    {{-- =========================================================
        HERO
    ========================================================== --}}

    <section class="ldx-quote-hero">

        <div class="ldx-container">

            <div class="ldx-quote-hero-grid">

                <div class="ldx-quote-hero-content">

                    <div class="ldx-public-eyebrow">
                        <span></span>
                        REQUEST A QUOTATION
                    </div>

                    <h1 class="ldx-quote-hero-title">
                        Let's Build the
                        <strong>Right Vertical Solution.</strong>
                    </h1>

                    <p class="ldx-quote-hero-description">
                        บอกความต้องการเกี่ยวกับโครงการของคุณ
                        แล้วทีมงาน LDX Elevator จะประเมินข้อมูล
                        และติดต่อกลับเพื่อให้คำแนะนำและจัดทำใบเสนอราคา
                        ที่เหมาะสมกับโครงการของคุณ
                    </p>

                    <div class="ldx-quote-hero-meta">

                        <div class="ldx-quote-hero-meta-item">
                            <span class="ldx-quote-meta-number">01</span>
                            <span>Submit your requirements</span>
                        </div>

                        <div class="ldx-quote-hero-meta-item">
                            <span class="ldx-quote-meta-number">02</span>
                            <span>Our team reviews your project</span>
                        </div>

                        <div class="ldx-quote-hero-meta-item">
                            <span class="ldx-quote-meta-number">03</span>
                            <span>Receive a tailored consultation</span>
                        </div>

                    </div>

                </div>


                <div class="ldx-quote-hero-side">

                    <div class="ldx-quote-hero-card">

                        <div class="ldx-quote-hero-card-top">

                            <span class="ldx-quote-card-label">
                                LDX ELEVATOR
                            </span>

                            <span class="ldx-quote-card-status">
                                <span></span>
                                AVAILABLE
                            </span>

                        </div>

                        <div class="ldx-quote-hero-card-line"></div>

                        <div class="ldx-quote-hero-card-main">

                            <span class="ldx-quote-card-small">
                                PROJECT CONSULTATION
                            </span>

                            <strong>
                                Start with
                                your requirements.
                            </strong>

                            <p>
                                ทุกโครงการมีเงื่อนไขที่แตกต่างกัน
                                เราจึงเริ่มต้นจากการเข้าใจอาคาร
                                ความต้องการ และการใช้งานของคุณ
                            </p>

                        </div>

                        <div class="ldx-quote-hero-card-footer">

                            <span>LDX / QUOTE</span>

                            <span>01 — 03</span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        SUCCESS MESSAGE
    ========================================================== --}}

    @if(session('success'))

        <section class="ldx-container ldx-quote-message-wrapper">

            <div class="ldx-quote-success">

                <div class="ldx-quote-success-icon">
                    ✓
                </div>

                <div>
                    <strong>
                        ส่งคำขอใบเสนอราคาสำเร็จ
                    </strong>

                    <p>
                        {{ session('success') }}
                    </p>
                </div>

            </div>

        </section>

    @endif


    {{-- =========================================================
        FORM SECTION
    ========================================================== --}}

    <section class="ldx-quote-form-section">

        <div class="ldx-container">

            <div class="ldx-quote-layout">

                {{-- =================================================
                    FORM
                ================================================== --}}

                <div class="ldx-quote-form-column">

                    <div class="ldx-quote-section-heading">

                        <div class="ldx-public-eyebrow">
                            <span></span>
                            PROJECT INFORMATION
                        </div>

                        <h2>
                            Tell us about
                            <strong>your project.</strong>
                        </h2>

                        <p>
                            ข้อมูลที่ละเอียดจะช่วยให้ทีมงานสามารถ
                            ประเมินความต้องการเบื้องต้นของคุณได้แม่นยำยิ่งขึ้น
                        </p>

                    </div>


                    @if($errors->any())

                        <div class="ldx-quote-error">

                            <div class="ldx-quote-error-title">
                                PLEASE CHECK YOUR INFORMATION
                            </div>

                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>

                    @endif


                    <form
                        method="POST"
                        action="{{ route('public.quote.store') }}"
                        class="ldx-quote-form"
                    >

                        @csrf


                        {{-- =================================================
                            SECTION 01
                        ================================================== --}}

                        <div class="ldx-quote-form-section-block">

                            <div class="ldx-quote-form-section-header">

                                <div class="ldx-quote-form-number">
                                    01
                                </div>

                                <div>
                                    <span>
                                        CONTACT INFORMATION
                                    </span>

                                    <h3>
                                        How can we reach you?
                                    </h3>
                                </div>

                            </div>


                            <div class="ldx-quote-form-grid">

                                <div class="ldx-quote-field ldx-quote-field-full">

                                    <label for="full_name">
                                        Full Name
                                        <span>*</span>
                                    </label>

                                    <input
                                        type="text"
                                        id="full_name"
                                        name="full_name"
                                        value="{{ old('full_name') }}"
                                        placeholder="ชื่อ - นามสกุล"
                                        maxlength="255"
                                        required
                                    >

                                    @error('full_name')
                                        <small>{{ $message }}</small>
                                    @enderror

                                </div>


                                <div class="ldx-quote-field">

                                    <label for="phone">
                                        Phone Number
                                        <span>*</span>
                                    </label>

                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        placeholder="08X-XXX-XXXX"
                                        maxlength="30"
                                        required
                                    >

                                    @error('phone')
                                        <small>{{ $message }}</small>
                                    @enderror

                                </div>


                                <div class="ldx-quote-field">

                                    <label for="email">
                                        Email Address
                                    </label>

                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="your@email.com"
                                        maxlength="255"
                                    >

                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            SECTION 02
                        ================================================== --}}

                        <div class="ldx-quote-form-section-block">

                            <div class="ldx-quote-form-section-header">

                                <div class="ldx-quote-form-number">
                                    02
                                </div>

                                <div>
                                    <span>
                                        BUILDING INFORMATION
                                    </span>

                                    <h3>
                                        Tell us about the building.
                                    </h3>
                                </div>

                            </div>


                            <div class="ldx-quote-form-grid">

                                <div class="ldx-quote-field">

                                    <label for="floor_count">
                                        Number of Floors
                                    </label>

                                    <div class="ldx-quote-input-suffix">

                                        <input
                                            type="number"
                                            id="floor_count"
                                            name="floor_count"
                                            value="{{ old('floor_count') }}"
                                            placeholder="เช่น 8"
                                            min="1"
                                            max="200"
                                        >

                                        <span>
                                            FLOORS
                                        </span>

                                    </div>

                                    @error('floor_count')
                                        <small>{{ $message }}</small>
                                    @enderror

                                </div>


                                <div class="ldx-quote-field">

                                    <label for="installation_province">
                                        Installation Location
                                    </label>

                                    <input
                                        type="text"
                                        id="installation_province"
                                        name="installation_province"
                                        value="{{ old('installation_province') }}"
                                        placeholder="จังหวัดที่ติดตั้ง"
                                        maxlength="100"
                                    >

                                    @error('installation_province')
                                        <small>{{ $message }}</small>
                                    @enderror

                                </div>


                                <div class="ldx-quote-field ldx-quote-field-full">

                                    <label for="contact_time">
                                        Preferred Contact Time
                                    </label>

                                    <select
                                        id="contact_time"
                                        name="contact_time"
                                    >

                                        <option value="">
                                            เลือกช่วงเวลาที่สะดวก
                                        </option>

                                        <option
                                            value="09:00 - 12:00"
                                            @selected(old('contact_time') === '09:00 - 12:00')
                                        >
                                            09:00 - 12:00
                                        </option>

                                        <option
                                            value="13:00 - 16:00"
                                            @selected(old('contact_time') === '13:00 - 16:00')
                                        >
                                            13:00 - 16:00
                                        </option>

                                        <option
                                            value="16:00 - 18:00"
                                            @selected(old('contact_time') === '16:00 - 18:00')
                                        >
                                            16:00 - 18:00
                                        </option>

                                    </select>

                                    @error('contact_time')
                                        <small>{{ $message }}</small>
                                    @enderror

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            SECTION 03
                        ================================================== --}}

                        <div class="ldx-quote-form-section-block">

                            <div class="ldx-quote-form-section-header">

                                <div class="ldx-quote-form-number">
                                    03
                                </div>

                                <div>
                                    <span>
                                        PROJECT REQUIREMENTS
                                    </span>

                                    <h3>
                                        What are you looking for?
                                    </h3>
                                </div>

                            </div>


                            <div class="ldx-quote-field">

                                <label for="details">
                                    Project Details
                                    <span>*</span>
                                </label>

                                <textarea
                                    id="details"
                                    name="details"
                                    rows="8"
                                    maxlength="10000"
                                    placeholder="กรุณาระบุรายละเอียดโครงการ เช่น ประเภทอาคาร ลักษณะการใช้งาน จำนวนผู้โดยสารโดยประมาณ ความต้องการพิเศษ หรือข้อมูลอื่น ๆ ที่ต้องการแจ้งให้ทีมงานทราบ"
                                    required
                                >{{ old('details') }}</textarea>

                                <div class="ldx-quote-textarea-footer">

                                    <span>
                                        กรุณาระบุข้อมูลให้ละเอียดที่สุด
                                    </span>

                                    <span id="ldxQuoteCounter">
                                        0 / 10000
                                    </span>

                                </div>

                                @error('details')
                                    <small>{{ $message }}</small>
                                @enderror

                            </div>

                        </div>


                        {{-- =================================================
                            PRIVACY
                        ================================================== --}}

                        <div class="ldx-quote-privacy">

                            <div class="ldx-quote-privacy-icon">
                                ✓
                            </div>

                            <p>
                                ข้อมูลของคุณจะถูกใช้เพื่อการติดต่อกลับ
                                และประเมินความต้องการของโครงการเท่านั้น
                                LDX Elevator จะไม่เผยแพร่ข้อมูลของคุณ
                                ต่อบุคคลภายนอกโดยไม่ได้รับอนุญาต
                            </p>

                        </div>


                        {{-- =================================================
                            SUBMIT
                        ================================================== --}}

                        <div class="ldx-quote-submit-area">

                            <button
                                type="submit"
                                class="ldx-quote-submit"
                            >

                                <span>
                                    REQUEST A QUOTE
                                </span>

                                <span class="ldx-quote-submit-arrow">
                                    →
                                </span>

                            </button>

                            <p>
                                Our team will review your information
                                and contact you as soon as possible.
                            </p>

                        </div>

                    </form>

                </div>


                {{-- =================================================
                    SIDEBAR
                ================================================== --}}

                <aside class="ldx-quote-sidebar">

                    {{-- Project Summary --}}

                    <div class="ldx-quote-sidebar-card">

                        <div class="ldx-quote-sidebar-card-header">

                            <span>
                                YOUR REQUEST
                            </span>

                            <span>
                                LDX / 01
                            </span>

                        </div>


                        <div class="ldx-quote-sidebar-line"></div>


                        <div class="ldx-quote-sidebar-content">

                            <div class="ldx-quote-sidebar-item">

                                <span>
                                    RESPONSE
                                </span>

                                <strong>
                                    ASAP
                                </strong>

                            </div>

                            <div class="ldx-quote-sidebar-item">

                                <span>
                                    CONSULTATION
                                </span>

                                <strong>
                                    FREE
                                </strong>

                            </div>

                            <div class="ldx-quote-sidebar-item">

                                <span>
                                    SERVICE AREA
                                </span>

                                <strong>
                                    THAILAND
                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- Why LDX --}}

                    <div class="ldx-quote-why">

                        <div class="ldx-public-eyebrow">
                            <span></span>
                            WHY LDX
                        </div>

                        <h3>
                            More than
                            <strong>an elevator.</strong>
                        </h3>


                        <div class="ldx-quote-benefit">

                            <div class="ldx-quote-benefit-number">
                                01
                            </div>

                            <div>
                                <strong>
                                    Professional Consultation
                                </strong>

                                <p>
                                    ให้คำแนะนำโดยพิจารณาจาก
                                    ลักษณะอาคารและการใช้งานจริง
                                </p>
                            </div>

                        </div>


                        <div class="ldx-quote-benefit">

                            <div class="ldx-quote-benefit-number">
                                02
                            </div>

                            <div>
                                <strong>
                                    Tailored Solutions
                                </strong>

                                <p>
                                    เลือกแนวทางที่เหมาะสมกับ
                                    ความต้องการของแต่ละโครงการ
                                </p>
                            </div>

                        </div>


                        <div class="ldx-quote-benefit">

                            <div class="ldx-quote-benefit-number">
                                03
                            </div>

                            <div>
                                <strong>
                                    Long-term Support
                                </strong>

                                <p>
                                    ดูแลตั้งแต่การให้คำปรึกษา
                                    ไปจนถึงบริการหลังการขาย
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Direct Contact --}}

                    <div class="ldx-quote-direct-contact">

                        <span class="ldx-quote-direct-label">
                            NEED TO TALK FIRST?
                        </span>

                        <h3>
                            Prefer a direct conversation?
                        </h3>

                        <p>
                            หากต้องการสอบถามข้อมูลก่อน
                            สามารถติดต่อทีมงาน LDX Elevator
                            ได้โดยตรง
                        </p>

                        <a
                            href="{{ route('public.contact') }}"
                            class="ldx-quote-contact-link"
                        >
                            CONTACT US
                            <span>→</span>
                        </a>

                    </div>

                </aside>

            </div>

        </div>

    </section>


    {{-- =========================================================
        PROCESS
    ========================================================== --}}

    <section class="ldx-quote-process-section">

        <div class="ldx-container">

            <div class="ldx-quote-process-heading">

                <div class="ldx-public-eyebrow">
                    <span></span>
                    HOW IT WORKS
                </div>

                <h2>
                    From request
                    <strong>to solution.</strong>
                </h2>

            </div>


            <div class="ldx-quote-process">

                <div class="ldx-quote-process-item">

                    <span class="ldx-quote-process-number">
                        01
                    </span>

                    <h3>
                        Submit
                    </h3>

                    <p>
                        ส่งรายละเอียดโครงการ
                        ผ่านแบบฟอร์มด้านบน
                    </p>

                </div>


                <div class="ldx-quote-process-line"></div>


                <div class="ldx-quote-process-item">

                    <span class="ldx-quote-process-number">
                        02
                    </span>

                    <h3>
                        Review
                    </h3>

                    <p>
                        ทีมงานตรวจสอบข้อมูล
                        และความต้องการของโครงการ
                    </p>

                </div>


                <div class="ldx-quote-process-line"></div>


                <div class="ldx-quote-process-item">

                    <span class="ldx-quote-process-number">
                        03
                    </span>

                    <h3>
                        Consult
                    </h3>

                    <p>
                        พูดคุยรายละเอียด
                        และแนวทางที่เหมาะสม
                    </p>

                </div>


                <div class="ldx-quote-process-line"></div>


                <div class="ldx-quote-process-item">

                    <span class="ldx-quote-process-number">
                        04
                    </span>

                    <h3>
                        Solution
                    </h3>

                    <p>
                        เดินหน้าสู่โซลูชัน
                        ที่เหมาะสมกับโครงการ
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        FINAL CTA
    ========================================================== --}}

    <section class="ldx-quote-final">

        <div class="ldx-container">

            <div class="ldx-quote-final-inner">

                <div>

                    <div class="ldx-public-eyebrow">
                        <span></span>
                        LDX ELEVATOR
                    </div>

                    <h2>
                        Have a project
                        <strong>in mind?</strong>
                    </h2>

                </div>

                <a
                    href="{{ route('public.contact') }}"
                    class="ldx-quote-final-button"
                >
                    TALK TO OUR TEAM
                    <span>→</span>
                </a>

            </div>

        </div>

    </section>

</div>


@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const textarea = document.getElementById('details');
    const counter = document.getElementById('ldxQuoteCounter');

    if (!textarea || !counter) {
        return;
    }

    function updateCounter() {
        counter.textContent =
            textarea.value.length + ' / 10000';
    }

    textarea.addEventListener('input', updateCounter);

    updateCounter();

});
</script>

@endpush

@endsection