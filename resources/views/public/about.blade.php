@extends('layouts.public.app')

@section('title', 'About Us | LDX Elevator')

@section('content')

{{-- =========================================================
    ABOUT HERO
========================================================= --}}

<section class="ldx-about-hero">

    <div class="ldx-about-hero-grid"></div>
    <div class="ldx-about-hero-glow"></div>

    <div class="ldx-container">

        <div class="ldx-about-hero-content">

            <span class="ldx-section-eyebrow">
                ABOUT LDX ELEVATOR
            </span>

            <h1 class="ldx-about-hero-title">
                Moving People.
                <br>
                <span>Moving Business Forward.</span>
            </h1>

            <p class="ldx-about-hero-description">
                เราคือผู้เชี่ยวชาญด้านระบบลิฟต์และการขนส่งแนวดิ่ง
                ที่มุ่งมั่นส่งมอบคุณภาพ ความปลอดภัย และเทคโนโลยี
                ที่ตอบโจทย์การใช้งานของอาคารในทุกระดับ
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
    COMPANY INTRODUCTION
========================================================= --}}

<section class="ldx-about-intro">

    <div class="ldx-container">

        <div class="ldx-about-intro-grid">

            <div class="ldx-about-intro-label">

                <span class="ldx-section-eyebrow">
                    WHO WE ARE
                </span>

                <span class="ldx-about-intro-number">
                    01
                </span>

            </div>


            <div class="ldx-about-intro-content">

                <h2 class="ldx-about-section-title">
                    Building Better Vertical
                    <span>Mobility.</span>
                </h2>

                <p>
                    LDX Elevator มุ่งมั่นพัฒนาและให้บริการระบบลิฟต์
                    สำหรับอาคารสำนักงาน อาคารที่พักอาศัย อาคารพาณิชย์
                    โรงแรม และโครงการต่าง ๆ
                </p>

                <p>
                    เราให้ความสำคัญกับทุกขั้นตอน ตั้งแต่การให้คำปรึกษา
                    การออกแบบ การติดตั้ง การบำรุงรักษา ไปจนถึงการบริการหลังการขาย
                    เพื่อให้ระบบลิฟต์สามารถทำงานได้อย่างปลอดภัย มีประสิทธิภาพ
                    และเหมาะสมกับการใช้งานในระยะยาว
                </p>

                <p>
                    ด้วยทีมงานที่มีความรู้และประสบการณ์ด้านระบบลิฟต์
                    เราพร้อมทำงานร่วมกับเจ้าของโครงการ วิศวกร
                    ผู้รับเหมา และผู้ดูแลอาคาร เพื่อสร้างโซลูชันที่เหมาะสมที่สุด
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    COMPANY STATISTICS
========================================================= --}}

<section class="ldx-about-stats">

    <div class="ldx-container">

        <div class="ldx-about-stats-grid">

            <div class="ldx-about-stat">

                <strong>10+</strong>

                <span>
                    Years of Experience
                </span>

            </div>


            <div class="ldx-about-stat">

                <strong>100+</strong>

                <span>
                    Completed Projects
                </span>

            </div>


            <div class="ldx-about-stat">

                <strong>{{ $clients->count() }}+</strong>

                <span>
                    Trusted Clients
                </span>

            </div>


            <div class="ldx-about-stat">

                <strong>24/7</strong>

                <span>
                    Service Support
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    VISION & MISSION
========================================================= --}}

<section class="ldx-about-vision">

    <div class="ldx-container">

        <div class="ldx-about-vision-header">

            <span class="ldx-section-eyebrow">
                OUR DIRECTION
            </span>

            <h2 class="ldx-about-section-title">
                Driven by
                <span>Purpose.</span>
            </h2>

        </div>


        <div class="ldx-about-vision-grid">

            <article class="ldx-about-direction-card">

                <span class="ldx-about-card-number">
                    01
                </span>

                <h3>
                    Vision
                </h3>

                <p>
                    เป็นบริษัทชั้นนำด้านระบบลิฟต์และการขนส่งแนวดิ่ง
                    ที่ได้รับความไว้วางใจในด้านคุณภาพ ความปลอดภัย
                    และการบริการอย่างมืออาชีพ
                </p>

            </article>


            <article class="ldx-about-direction-card">

                <span class="ldx-about-card-number">
                    02
                </span>

                <h3>
                    Mission
                </h3>

                <p>
                    ส่งมอบโซลูชันระบบลิฟต์ที่มีคุณภาพ
                    ปลอดภัย และเหมาะสมกับความต้องการของลูกค้า
                    พร้อมพัฒนาการบริการอย่างต่อเนื่อง
                </p>

            </article>

        </div>

    </div>

</section>


{{-- =========================================================
    CORE VALUES
========================================================= --}}

<section class="ldx-about-values">

    <div class="ldx-container">

        <div class="ldx-about-values-header">

            <div>

                <span class="ldx-section-eyebrow">
                    CORE VALUES
                </span>

                <h2 class="ldx-about-section-title">
                    What We
                    <span>Stand For.</span>
                </h2>

            </div>

        </div>


        <div class="ldx-about-values-grid">

            <article class="ldx-about-value">

                <span class="ldx-about-value-number">
                    01
                </span>

                <div class="ldx-about-value-icon">
                    ✓
                </div>

                <h3>
                    Quality
                </h3>

                <p>
                    เราให้ความสำคัญกับคุณภาพในทุกขั้นตอน
                    ตั้งแต่การเลือกอุปกรณ์จนถึงการติดตั้งและบริการ
                </p>

            </article>


            <article class="ldx-about-value">

                <span class="ldx-about-value-number">
                    02
                </span>

                <div class="ldx-about-value-icon">
                    ◇
                </div>

                <h3>
                    Safety
                </h3>

                <p>
                    ความปลอดภัยของผู้ใช้งานคือหัวใจสำคัญ
                    ของการออกแบบและให้บริการของเรา
                </p>

            </article>


            <article class="ldx-about-value">

                <span class="ldx-about-value-number">
                    03
                </span>

                <div class="ldx-about-value-icon">
                    +
                </div>

                <h3>
                    Innovation
                </h3>

                <p>
                    เราพัฒนาและนำเทคโนโลยีใหม่ ๆ
                    มาใช้เพื่อเพิ่มประสิทธิภาพของระบบ
                </p>

            </article>


            <article class="ldx-about-value">

                <span class="ldx-about-value-number">
                    04
                </span>

                <div class="ldx-about-value-icon">
                    ↗
                </div>

                <h3>
                    Customer Focus
                </h3>

                <p>
                    เราเข้าใจความต้องการของลูกค้า
                    และมุ่งสร้างความสัมพันธ์ในระยะยาว
                </p>

            </article>

        </div>

    </div>

</section>


{{-- =========================================================
    TIMELINE
========================================================= --}}

@if($timelines->count())

<section class="ldx-about-timeline">

    <div class="ldx-container">

        <div class="ldx-about-timeline-header">

            <span class="ldx-section-eyebrow">
                OUR JOURNEY
            </span>

            <h2 class="ldx-about-section-title">
                Company
                <span>Timeline.</span>
            </h2>

            <p>
                เส้นทางการเติบโตและเหตุการณ์สำคัญของ LDX Elevator
            </p>

        </div>


        <div class="ldx-timeline">

            @foreach($timelines as $timeline)

                <article class="ldx-timeline-item">

                    <div class="ldx-timeline-year">
                        {{ $timeline->year }}
                    </div>

                    <div class="ldx-timeline-line">
                        <span></span>
                    </div>

                    <div class="ldx-timeline-content">

                        <h3>
                            {{ $timeline->title }}
                        </h3>

                        @if($timeline->description)
                            <p>
                                {{ $timeline->description }}
                            </p>
                        @endif

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>

@endif


{{-- =========================================================
    CLIENTS
========================================================= --}}

@if($clients->count())

<section class="ldx-about-clients">

    <div class="ldx-container">

        <div class="ldx-about-clients-header">

            <span class="ldx-section-eyebrow">
                TRUSTED BY
            </span>

            <h2 class="ldx-about-section-title">
                Our
                <span>Clients.</span>
            </h2>

            <p>
                ความไว้วางใจจากลูกค้าและพันธมิตรของเรา
            </p>

        </div>


        <div class="ldx-about-clients-grid">

            @foreach($clients as $client)

                <article class="ldx-client-card">

                    <div class="ldx-client-logo">

                        @if($client->logo)

                            <img
                                src="{{ asset('storage/' . $client->logo) }}"
                                alt="{{ $client->name }}"
                                loading="lazy"
                            >

                        @else

                            <span>
                                {{ $client->name }}
                            </span>

                        @endif

                    </div>


                    <div class="ldx-client-info">

                        <h3>
                            {{ $client->name }}
                        </h3>

                        @if($client->description)

                            <p>
                                {{ $client->description }}
                            </p>

                        @endif

                        @if($client->website)

                            <a
                                href="{{ $client->website }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Visit Website →
                            </a>

                        @endif

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>

@endif


{{-- =========================================================
    CERTIFICATES
========================================================= --}}

@if($certificates->count())

<section class="ldx-about-certificates">

    <div class="ldx-container">

        <div class="ldx-about-certificates-grid">

            <div class="ldx-about-certificates-intro">

                <span class="ldx-section-eyebrow">
                    QUALITY & STANDARDS
                </span>

                <h2 class="ldx-about-section-title">
                    Certified for
                    <span>Confidence.</span>
                </h2>

                <p>
                    เราให้ความสำคัญกับมาตรฐานและคุณภาพ
                    เพื่อสร้างความมั่นใจให้กับลูกค้าและผู้ใช้งาน
                </p>

            </div>


            <div class="ldx-certificate-list">

                @foreach($certificates as $certificate)

                    <article class="ldx-certificate-card">

                        @if($certificate->image)

                            <div class="ldx-certificate-image">

                                <img
                                    src="{{ asset('storage/' . $certificate->image) }}"
                                    alt="{{ $certificate->name }}"
                                    loading="lazy"
                                >

                            </div>

                        @endif


                        <div class="ldx-certificate-content">

                            <h3>
                                {{ $certificate->name }}
                            </h3>

                            @if($certificate->certificate_number)

                                <span>
                                    {{ $certificate->certificate_number }}
                                </span>

                            @endif

                            @if($certificate->issuer)

                                <small>
                                    Issued by {{ $certificate->issuer }}
                                </small>

                            @endif

                            @if($certificate->issued_date)

                                <small>
                                    Issued
                                    {{ \Carbon\Carbon::parse($certificate->issued_date)->format('F Y') }}
                                </small>

                            @endif

                        </div>

                    </article>

                @endforeach

            </div>

        </div>

    </div>

</section>

@endif


{{-- =========================================================
    CTA
========================================================= --}}

<section class="ldx-about-cta">

    <div class="ldx-container">

        <div class="ldx-about-cta-inner">

            <div>

                <span class="ldx-section-eyebrow">
                    LET'S WORK TOGETHER
                </span>

                <h2>
                    Looking for the right
                    <span>elevator solution?</span>
                </h2>

                <p>
                    พูดคุยกับทีมงานของเราเพื่อค้นหาโซลูชัน
                    ที่เหมาะสมกับโครงการของคุณ
                </p>

            </div>


            <div class="ldx-about-cta-actions">

                <a
                    href="{{ url('/contact') }}"
                    class="ldx-public-button ldx-public-button-primary"
                >
                    Contact Us
                </a>

                <a
                    href="{{ url('/services') }}"
                    class="ldx-public-button ldx-public-button-outline"
                >
                    Explore Services
                </a>

            </div>

        </div>

    </div>

</section>

@endsection