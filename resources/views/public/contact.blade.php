@extends('layouts.public.app')

@section('title', 'ติดต่อเรา | LDX Elevator')

@section(
    'description',
    'ติดต่อบริษัท แอลดีเอ็กซ์ เอลิเวเตอร์ จำกัด ผู้ให้บริการด้านระบบลิฟต์ นำเข้า จำหน่าย ติดตั้ง รื้อถอน และซ่อมบำรุงระบบลิฟต์ รวมถึงงานโครงสร้างลิฟต์และบันไดเลื่อน'
)

@section('content')

<div class="ldx-contact-page">

{{-- =========================================================
    HERO
========================================================== --}}

<section class="ldx-contact-hero">

    <div class="ldx-container">

        <div class="ldx-contact-hero-grid">

            {{-- =================================================
                HERO CONTENT
            ================================================== --}}

            <div class="ldx-contact-hero-content">

                <div class="ldx-public-eyebrow">
                    <span></span>
                    ติดต่อเรา
                </div>

                <h1 class="ldx-contact-title">

                    พูดคุยกับเรา

                    <br>

                    <span>
                        เราพร้อมให้บริการด้านระบบลิฟต์
                    </span>

                </h1>

                <p class="ldx-contact-description">

                    บริษัท แอลดีเอ็กซ์ เอลิเวเตอร์ จำกัด
                    ให้บริการด้านระบบลิฟต์และงานที่เกี่ยวข้อง
                    ตั้งแต่การนำเข้า จำหน่าย ติดตั้ง รื้อถอน
                    และซ่อมบำรุงระบบงานลิฟต์
                    รวมถึงงานโครงสร้างลิฟต์และบันไดเลื่อน
                    สำหรับอาคารและโครงการหลากหลายประเภท

                </p>


                <div class="ldx-contact-hero-actions">

                    {{-- =================================================
                        QUOTE BUTTON
                    ================================================== --}}

                    <a
                        href="{{ route('public.quote') }}"
                        class="ldx-contact-primary-button"
                    >

                        <span>
                            ขอใบเสนอราคา
                        </span>

                        <span>
                            →
                        </span>

                    </a>


                    {{-- =================================================
                        GOOGLE MAP BUTTON
                    ================================================== --}}

                    <a
                        href="https://www.google.com/maps/search/?api=1&query=19+ถนนสามัคคี+ตำบลท่าทราย+อำเภอเมืองนนทบุรี+จังหวัดนนทบุรี+11000"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="ldx-contact-secondary-button"
                    >

                        <span class="ldx-contact-secondary-icon">

                            <i class="fa-solid fa-location-dot"></i>

                        </span>

                        <span>

                            <small>
                                สำนักงานของเรา
                            </small>

                            <strong>
                                19 ถนนสามัคคี นนทบุรี
                            </strong>

                        </span>

                    </a>

                </div>

            </div>


            {{-- =================================================
                HERO SIDE
            ================================================== --}}

            <div class="ldx-contact-hero-side">

                <div class="ldx-contact-hero-side-label">
                    LDX ELEVATOR
                </div>

                <div class="ldx-contact-hero-side-line"></div>

                <p>

                    ให้บริการด้านระบบลิฟต์
                    ตั้งแต่การนำเข้า จำหน่าย
                    ติดตั้ง รื้อถอน
                    และซ่อมบำรุง

                    <br>

                    พร้อมงานโครงสร้างลิฟต์
                    และบันไดเลื่อน

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

                    ช่องทางการติดต่อ

                </div>

                <h2>
                    ติดต่อ LDX Elevator
                </h2>

            </div>

            <p>

                ติดต่อสำนักงานของเรา
                หรือส่งรายละเอียดโครงการ
                เพื่อสอบถามข้อมูล
                และขอใบเสนอราคา

            </p>

        </div>


        <div class="ldx-contact-grid">


            {{-- =================================================
                COMPANY
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-building"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        ↗
                    </span>

                </div>

                <div class="ldx-contact-card-label">
                    บริษัท
                </div>

                <h3>
                    LDX ELEVATOR CO., LTD.
                </h3>

                <p>
                    บริษัท แอลดีเอ็กซ์ เอลิเวเตอร์ จำกัด
                </p>

            </div>


            {{-- =================================================
                BUSINESS
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-elevator"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        ↗
                    </span>

                </div>

                <div class="ldx-contact-card-label">
                    ธุรกิจ
                </div>

                <h3>
                    ระบบลิฟต์และบันไดเลื่อน
                </h3>

                <p>

                    นำเข้า จำหน่าย ติดตั้ง
                    รื้อถอน และซ่อมบำรุง
                    ระบบงานลิฟต์

                </p>

            </div>


            {{-- =================================================
                BUSINESS REGISTRATION
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-file-lines"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        ↗
                    </span>

                </div>

                <div class="ldx-contact-card-label">
                    เลขทะเบียนนิติบุคคล
                </div>

                <h3>
                    0125566028241
                </h3>

                <p>
                    จดทะเบียนบริษัทเมื่อวันที่
                    9 สิงหาคม 2566
                </p>

            </div>


            {{-- =================================================
                OFFICE
            ================================================== --}}

            <a
                href="https://www.google.com/maps/search/?api=1&query=19+ถนนสามัคคี+ตำบลท่าทราย+อำเภอเมืองนนทบุรี+จังหวัดนนทบุรี+11000"
                target="_blank"
                rel="noopener noreferrer"
                class="ldx-contact-card"
            >

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-location-dot"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        ↗
                    </span>

                </div>

                <div class="ldx-contact-card-label">
                    สำนักงาน
                </div>

                <h3>
                    นนทบุรี
                </h3>

                <p>

                    19 ถนนสามัคคี
                    ตำบลท่าทราย
                    อำเภอเมืองนนทบุรี
                    จังหวัดนนทบุรี 11000

                </p>

            </a>


        </div>

    </div>

</section>


{{-- =========================================================
    COMPANY INFORMATION
========================================================== --}}

<section class="ldx-contact-location">

    <div class="ldx-container">

        <div class="ldx-contact-location-grid">


            {{-- =================================================
                LEFT : COMPANY INFORMATION
            ================================================== --}}

            <div class="ldx-contact-location-content">

                <div class="ldx-public-eyebrow">

                    <span></span>

                    ข้อมูลบริษัท

                </div>


                <h2>
                    บริษัท แอลดีเอ็กซ์ เอลิเวเตอร์ จำกัด
                </h2>


                <p class="ldx-contact-location-description">

                    LDX Elevator ดำเนินธุรกิจเกี่ยวกับระบบลิฟต์
                    และอุปกรณ์ที่เกี่ยวข้อง
                    โดยให้บริการตั้งแต่การนำเข้าและจำหน่าย
                    ไปจนถึงการติดตั้ง รื้อถอน และซ่อมบำรุง
                    รวมถึงงานโครงสร้างลิฟต์
                    และบันไดเลื่อน

                </p>


                {{-- =================================================
                    ADDRESS
                ================================================== --}}

                <div class="ldx-contact-address">

                    <div class="ldx-contact-address-icon">

                        <i class="fa-solid fa-location-dot"></i>

                    </div>


                    <div>

                        <div class="ldx-contact-address-label">
                            ที่อยู่สำนักงาน
                        </div>


                        <p>

                            บริษัท แอลดีเอ็กซ์ เอลิเวเตอร์ จำกัด

                            <br>

                            19 ถนนสามัคคี

                            <br>

                            ตำบลท่าทราย
                            อำเภอเมืองนนทบุรี

                            <br>

                            จังหวัดนนทบุรี 11000

                            <br>

                            ประเทศไทย

                        </p>

                    </div>

                </div>


                {{-- =================================================
                    COMPANY DETAILS
                ================================================== --}}

                <div class="ldx-contact-office-details">


                    {{-- BUSINESS TYPE --}}

                    <div class="ldx-contact-office-detail">

                        <span>

                            <i class="fa-solid fa-briefcase"></i>

                        </span>

                        <div>

                            <small>
                                ประเภทธุรกิจ
                            </small>

                            <strong>
                                ระบบลิฟต์และอุปกรณ์ที่เกี่ยวข้อง
                            </strong>

                        </div>

                    </div>


                    {{-- REGISTERED CAPITAL --}}

                    <div class="ldx-contact-office-detail">

                        <span>

                            <i class="fa-solid fa-coins"></i>

                        </span>

                        <div>

                            <small>
                                ทุนจดทะเบียน
                            </small>

                            <strong>
                                5,000,000 บาท
                            </strong>

                        </div>

                    </div>


                    {{-- REGISTRATION DATE --}}

                    <div class="ldx-contact-office-detail">

                        <span>

                            <i class="fa-solid fa-calendar-days"></i>

                        </span>

                        <div>

                            <small>
                                วันที่จดทะเบียน
                            </small>

                            <strong>
                                9 สิงหาคม 2566
                            </strong>

                        </div>

                    </div>


                    {{-- REGISTRATION NUMBER --}}

                    <div class="ldx-contact-office-detail">

                        <span>

                            <i class="fa-solid fa-id-card"></i>

                        </span>

                        <div>

                            <small>
                                เลขทะเบียนนิติบุคคล
                            </small>

                            <strong>
                                0125566028241
                            </strong>

                        </div>

                    </div>


                    {{-- COMPANY STATUS --}}

                    <div class="ldx-contact-office-detail">

                        <span>

                            <i class="fa-solid fa-circle-check"></i>

                        </span>

                        <div>

                            <small>
                                สถานะบริษัท
                            </small>

                            <strong>
                                ยังดำเนินกิจการอยู่
                            </strong>

                        </div>

                    </div>


                    {{-- LOCATION --}}

                    <div class="ldx-contact-office-detail">

                        <span>

                            <i class="fa-solid fa-map-location-dot"></i>

                        </span>

                        <div>

                            <small>
                                ที่ตั้งสำนักงาน
                            </small>

                            <strong>
                                อำเภอเมืองนนทบุรี จังหวัดนนทบุรี
                            </strong>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    GOOGLE MAPS BUTTON
                ================================================== --}}

                <a
                    href="https://www.google.com/maps/search/?api=1&query=19+ถนนสามัคคี+ตำบลท่าทราย+อำเภอเมืองนนทบุรี+จังหวัดนนทบุรี+11000"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="ldx-contact-map-button"
                >

                    <span>

                        <i class="fa-solid fa-map-location-dot"></i>

                        เปิดตำแหน่งสำนักงานใน Google Maps

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
                    src="https://www.google.com/maps?q=19%20ถนนสามัคคี%20ตำบลท่าทราย%20อำเภอเมืองนนทบุรี%20จังหวัดนนทบุรี%2011000&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="แผนที่สำนักงาน บริษัท แอลดีเอ็กซ์ เอลิเวเตอร์ จำกัด"
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
    BUSINESS OBJECTIVE
========================================================== --}}

<section class="ldx-contact-info-section">

    <div class="ldx-container">

        <div class="ldx-contact-section-heading">

            <div>

                <div class="ldx-public-eyebrow">

                    <span></span>

                    ขอบเขตการดำเนินงาน

                </div>

                <h2>
                    งานที่ LDX Elevator ให้บริการ
                </h2>

            </div>


            <p>

                ให้บริการเกี่ยวกับระบบลิฟต์
                โครงสร้างลิฟต์
                บันไดเลื่อน
                และอุปกรณ์ที่เกี่ยวข้อง

            </p>

        </div>


        <div class="ldx-contact-grid">


            {{-- =================================================
                SERVICE 01
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-boxes-stacked"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        01
                    </span>

                </div>


                <div class="ldx-contact-card-label">
                    SERVICE
                </div>


                <h3>
                    นำเข้าและจัดจำหน่าย
                </h3>


                <p>

                    นำเข้าและจำหน่าย
                    ระบบงานลิฟต์
                    วัสดุ อุปกรณ์
                    และสิ่งที่เกี่ยวข้อง

                </p>

            </div>


            {{-- =================================================
                SERVICE 02
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-screwdriver-wrench"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        02
                    </span>

                </div>


                <div class="ldx-contact-card-label">
                    SERVICE
                </div>


                <h3>
                    ติดตั้งระบบลิฟต์
                </h3>


                <p>

                    ให้บริการติดตั้ง
                    ระบบลิฟต์
                    สำหรับอาคาร
                    และโครงการต่าง ๆ

                </p>

            </div>


            {{-- =================================================
                SERVICE 03
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-truck-ramp-box"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        03
                    </span>

                </div>


                <div class="ldx-contact-card-label">
                    SERVICE
                </div>


                <h3>
                    รื้อถอนระบบลิฟต์
                </h3>


                <p>

                    ให้บริการรื้อถอน
                    ระบบลิฟต์
                    และงานที่เกี่ยวข้อง
                    ตามลักษณะโครงการ

                </p>

            </div>


            {{-- =================================================
                SERVICE 04
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-gears"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        04
                    </span>

                </div>


                <div class="ldx-contact-card-label">
                    SERVICE
                </div>


                <h3>
                    ซ่อมบำรุงระบบลิฟต์
                </h3>


                <p>

                    ดูแล ตรวจสอบ
                    และซ่อมบำรุง
                    ระบบงานลิฟต์
                    เพื่อให้พร้อมต่อการใช้งาน

                </p>

            </div>


            {{-- =================================================
                SERVICE 05
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-building"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        05
                    </span>

                </div>


                <div class="ldx-contact-card-label">
                    SERVICE
                </div>


                <h3>
                    งานโครงสร้างลิฟต์
                </h3>


                <p>

                    งานโครงสร้าง
                    ที่เกี่ยวข้องกับระบบลิฟต์
                    สำหรับอาคาร
                    และโครงการต่าง ๆ

                </p>

            </div>


            {{-- =================================================
                SERVICE 06
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-stairs"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        06
                    </span>

                </div>


                <div class="ldx-contact-card-label">
                    SERVICE
                </div>


                <h3>
                    ระบบบันไดเลื่อน
                </h3>


                <p>

                    งานระบบบันไดเลื่อน
                    และงานที่เกี่ยวข้อง
                    สำหรับโครงการต่าง ๆ

                </p>

            </div>


            {{-- =================================================
                SERVICE 07
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-helmet-safety"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        07
                    </span>

                </div>


                <div class="ldx-contact-card-label">
                    SERVICE
                </div>


                <h3>
                    งานระบบสำหรับโครงการ
                </h3>


                <p>

                    ให้คำปรึกษา
                    และดำเนินงาน
                    ที่เกี่ยวข้องกับระบบลิฟต์
                    ให้เหมาะสมกับโครงการ

                </p>

            </div>


            {{-- =================================================
                SERVICE 08
            ================================================== --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-compass-drafting"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        08
                    </span>

                </div>


                <div class="ldx-contact-card-label">
                    SERVICE
                </div>


                <h3>
                    งานออกแบบและวางระบบ
                </h3>


                <p>

                    วางแนวทาง
                    ด้านระบบและโครงสร้าง
                    ให้สอดคล้องกับ
                    ความต้องการของโครงการ

                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    COMPANY PROFILE
========================================================== --}}

<section class="ldx-contact-info-section">

    <div class="ldx-container">

        <div class="ldx-contact-section-heading">

            <div>

                <div class="ldx-public-eyebrow">

                    <span></span>

                    LDX ELEVATOR

                </div>

                <h2>
                    ข้อมูลสำคัญของบริษัท
                </h2>

            </div>


            <p>

                ข้อมูลพื้นฐานของ
                บริษัท แอลดีเอ็กซ์ เอลิเวเตอร์ จำกัด

            </p>

        </div>


        <div class="ldx-contact-grid">


            {{-- COMPANY NAME --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-building"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        01
                    </span>

                </div>

                <div class="ldx-contact-card-label">
                    COMPANY
                </div>

                <h3>
                    LDX ELEVATOR CO., LTD.
                </h3>

                <p>
                    บริษัท แอลดีเอ็กซ์ เอลิเวเตอร์ จำกัด
                </p>

            </div>


            {{-- REGISTRATION --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-id-card"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        02
                    </span>

                </div>

                <div class="ldx-contact-card-label">
                    REGISTRATION
                </div>

                <h3>
                    0125566028241
                </h3>

                <p>
                    เลขทะเบียนนิติบุคคล
                </p>

            </div>


            {{-- CAPITAL --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-coins"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        03
                    </span>

                </div>

                <div class="ldx-contact-card-label">
                    CAPITAL
                </div>

                <h3>
                    5,000,000 บาท
                </h3>

                <p>
                    ทุนจดทะเบียนบริษัท
                </p>

            </div>


            {{-- ESTABLISHED --}}

            <div class="ldx-contact-card">

                <div class="ldx-contact-card-top">

                    <div class="ldx-contact-icon">

                        <i class="fa-solid fa-calendar-days"></i>

                    </div>

                    <span class="ldx-contact-arrow">
                        04
                    </span>

                </div>

                <div class="ldx-contact-card-label">
                    ESTABLISHED
                </div>

                <h3>
                    9 สิงหาคม 2566
                </h3>

                <p>
                    วันที่จดทะเบียนบริษัท
                </p>

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
                    มีโครงการที่กำลังวางแผนอยู่หรือไม่?
                </h2>


                <p>

                    ติดต่อ LDX Elevator
                    เพื่อพูดคุยเกี่ยวกับระบบลิฟต์
                    งานโครงสร้าง
                    และโซลูชันที่เหมาะสมกับโครงการของคุณ

                </p>

            </div>


            {{-- =================================================
                QUOTE BUTTON
            ================================================== --}}

            <a
                href="{{ route('public.quote') }}"
                class="ldx-contact-final-button"
            >

                <span>
                    เริ่มพูดคุยกับเรา
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

