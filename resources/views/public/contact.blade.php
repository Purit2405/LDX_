@extends('layouts.public.app')

@section('title', 'Contact Us | LDX Elevator')

@section('content')

<div class="ldx-contact-page">

    {{-- =========================================================
        HERO
    ========================================================== --}}

    <section class="ldx-contact-hero">

        <div class="ldx-container">

            <div class="ldx-contact-hero-grid">

                <div class="ldx-contact-hero-content">

                    <div class="ldx-public-eyebrow">
                        <span></span>
                        CONTACT US
                    </div>

                    <h1 class="ldx-contact-title">
                        Let's Talk.
                        <br>
                        <span>We're Here to Help.</span>
                    </h1>

                    <p class="ldx-contact-description">
                        มีคำถามเกี่ยวกับลิฟต์ ระบบติดตั้ง
                        งานบำรุงรักษา หรือกำลังมองหาโซลูชัน
                        สำหรับโครงการของคุณ
                        ทีมงาน LDX Elevator พร้อมให้คำปรึกษา
                        และช่วยคุณหาทางออกที่เหมาะสม
                    </p>

                    <div class="ldx-contact-hero-actions">

                        {{-- REQUEST A QUOTE --}}
                        <a
                            href="{{ route('public.quote') }}"
                            class="ldx-contact-primary-button"
                        >
                            <span>REQUEST A QUOTE</span>
                            <span>→</span>
                        </a>

                        {{-- CALL US --}}
                        <a
                            href="tel:020000000"
                            class="ldx-contact-secondary-button"
                        >
                            <span class="ldx-contact-secondary-icon">
                                <i class="fa-solid fa-phone"></i>
                            </span>

                            <span>
                                <small>CALL US</small>
                                <strong>02-000-0000</strong>
                            </span>
                        </a>

                    </div>

                </div>


                <div class="ldx-contact-hero-side">

                    <div class="ldx-contact-hero-side-label">
                        GET IN TOUCH
                    </div>

                    <div class="ldx-contact-hero-side-line"></div>

                    <p>
                        เราพร้อมรับฟังความต้องการ
                        และช่วยคุณวางแผนโซลูชัน
                        ด้านลิฟต์ที่เหมาะสมกับโครงการ
                    </p>

                    <div class="ldx-contact-hero-side-number">
                        01
                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        CONTACT INFORMATION
    ========================================================== --}}

    <section class="ldx-contact-info-section">

        <div class="ldx-container">

            <div class="ldx-contact-section-heading">

                <div>

                    <div class="ldx-public-eyebrow">
                        <span></span>
                        CONTACT INFORMATION
                    </div>

                    <h2>
                        ติดต่อเรา
                    </h2>

                </div>

                <p>
                    เลือกช่องทางที่สะดวกสำหรับคุณ
                    ทีมงานของเราพร้อมให้บริการ
                </p>

            </div>


            <div class="ldx-contact-grid">

                {{-- =================================================
                    PHONE
                ================================================== --}}

                <a
                    href="tel:020000000"
                    class="ldx-contact-card"
                >

                    <div class="ldx-contact-card-top">

                        <div class="ldx-contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <span class="ldx-contact-arrow">
                            ↗
                        </span>

                    </div>

                    <div class="ldx-contact-card-label">
                        PHONE
                    </div>

                    <h3>
                        02-000-0000
                    </h3>

                    <p>
                        ฝ่ายขายและสอบถามข้อมูล
                    </p>

                </a>


                {{-- =================================================
                    EMAIL
                ================================================== --}}

                <a
                    href="mailto:info@ldxelevator.com"
                    class="ldx-contact-card"
                >

                    <div class="ldx-contact-card-top">

                        <div class="ldx-contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <span class="ldx-contact-arrow">
                            ↗
                        </span>

                    </div>

                    <div class="ldx-contact-card-label">
                        EMAIL
                    </div>

                    <h3>
                        info@ldxelevator.com
                    </h3>

                    <p>
                        ส่งรายละเอียดโครงการหรือสอบถามข้อมูล
                    </p>

                </a>


                {{-- =================================================
                    LINE
                ================================================== --}}

                <a
                    href="https://line.me/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="ldx-contact-card"
                >

                    <div class="ldx-contact-card-top">

                        <div class="ldx-contact-icon">
                            <i class="fa-brands fa-line"></i>
                        </div>

                        <span class="ldx-contact-arrow">
                            ↗
                        </span>

                    </div>

                    <div class="ldx-contact-card-label">
                        LINE OFFICIAL
                    </div>

                    <h3>
                        @ldxelevator
                    </h3>

                    <p>
                        แชทกับทีมงานโดยตรง
                    </p>

                </a>


                {{-- =================================================
                    FACEBOOK
                ================================================== --}}

                <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="ldx-contact-card"
                >

                    <div class="ldx-contact-card-top">

                        <div class="ldx-contact-icon">
                            <i class="fa-brands fa-facebook-f"></i>
                        </div>

                        <span class="ldx-contact-arrow">
                            ↗
                        </span>

                    </div>

                    <div class="ldx-contact-card-label">
                        FACEBOOK
                    </div>

                    <h3>
                        LDX Elevator
                    </h3>

                    <p>
                        ติดตามข่าวสารและผลงานของเรา
                    </p>

                </a>

            </div>

        </div>

    </section>


    {{-- =========================================================
        OFFICE + MAP
    ========================================================== --}}

    <section class="ldx-contact-location">

        <div class="ldx-container">

            <div class="ldx-contact-location-grid">

                {{-- =================================================
                    LEFT : OFFICE INFORMATION
                ================================================== --}}

                <div class="ldx-contact-location-content">

                    <div class="ldx-public-eyebrow">
                        <span></span>
                        VISIT OUR OFFICE
                    </div>

                    <h2>
                        สำนักงานของเรา
                    </h2>

                    <p class="ldx-contact-location-description">
                        สามารถติดต่อหรือเข้าพบทีมงานของเราได้
                        ตามที่อยู่ด้านล่าง
                    </p>


                    {{-- ADDRESS --}}

                    <div class="ldx-contact-address">

                        <div class="ldx-contact-address-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div>

                            <div class="ldx-contact-address-label">
                                ADDRESS
                            </div>

                            <p>
                                บริษัท LDX Elevator จำกัด
                                <br>
                                123 ถนนสุขุมวิท
                                <br>
                                กรุงเทพมหานคร 10110
                                <br>
                                ประเทศไทย
                            </p>

                        </div>

                    </div>


                    {{-- OFFICE DETAILS --}}

                    <div class="ldx-contact-office-details">

                        {{-- BUSINESS HOURS --}}

                        <div class="ldx-contact-office-detail">

                            <span>
                                <i class="fa-regular fa-clock"></i>
                            </span>

                            <div>

                                <small>
                                    BUSINESS HOURS
                                </small>

                                <strong>
                                    Mon — Fri / 09:00 — 18:00
                                </strong>

                            </div>

                        </div>


                        {{-- PHONE --}}

                        <div class="ldx-contact-office-detail">

                            <span>
                                <i class="fa-solid fa-phone"></i>
                            </span>

                            <div>

                                <small>
                                    PHONE
                                </small>

                                <strong>
                                    02-000-0000
                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- GOOGLE MAPS --}}

                    <a
                        href="https://maps.google.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="ldx-contact-map-button"
                    >

                        <span>
                            OPEN IN GOOGLE MAPS
                        </span>

                        <span>
                            ↗
                        </span>

                    </a>

                </div>


                {{-- =================================================
                    RIGHT : MAP
                ================================================== --}}

                <div class="ldx-contact-map">

                    <iframe
                        src="https://www.google.com/maps/embed?pb="
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    >
                    </iframe>

                    <div class="ldx-contact-map-overlay">

                        <span>
                            LDX
                        </span>

                        <small>
                            ELEVATOR
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
        FINAL CTA
    ========================================================== --}}

    <section class="ldx-contact-final">

        <div class="ldx-container">

            <div class="ldx-contact-final-inner">

                <div>

                    <div class="ldx-public-eyebrow">
                        <span></span>
                        LDX ELEVATOR
                    </div>

                    <h2>
                        Have a project in mind?
                    </h2>

                    <p>
                        ให้เราเป็นส่วนหนึ่งในการสร้าง
                        ระบบลิฟต์ที่เหมาะสมกับโครงการของคุณ
                    </p>

                </div>


                {{-- GO TO QUOTE PAGE --}}

                <a
                    href="{{ route('public.quote') }}"
                    class="ldx-contact-final-button"
                >

                    <span>
                        START A CONVERSATION
                    </span>

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>

    </section>

</div>

@endsection