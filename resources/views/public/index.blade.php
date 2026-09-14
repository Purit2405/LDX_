@extends('layouts.public.app')

@section('title', 'LDX Elevator | โซลูชันระบบลิฟต์')

@section('description', 'LDX Elevator ให้บริการติดตั้ง ปรับปรุง บำรุงรักษา และซ่อมแซมระบบลิฟต์อย่างมืออาชีพ สำหรับอาคารและธุรกิจสมัยใหม่')

@section('content')


{{-- ======================================================================
     HERO
     ====================================================================== --}}
<section class="ldx-home-hero">

    <div class="ldx-home-hero-background">
        <div class="ldx-home-hero-grid"></div>
        <div class="ldx-home-hero-glow"></div>
    </div>


    <div class="ldx-public-container">

        <div class="ldx-home-hero-layout">


            {{-- ==========================================================
                 HERO CONTENT
                 ========================================================== --}}
            <div class="ldx-home-hero-content">

                <div class="ldx-home-eyebrow">

                    <span class="ldx-home-eyebrow-line"></span>

                    <span>
                        โซลูชันระบบลิฟต์
                    </span>

                </div>


                <h1>
                    ขับเคลื่อนผู้คน
                    <br>

                    <span>
                        ยกระดับ
                    </span>

                    ทุกความเป็นไปได้
                </h1>


                <p>
                    โซลูชันระบบลิฟต์ที่เชื่อถือได้ ออกแบบมาเพื่อ
                    อาคารสมัยใหม่ ธุรกิจ และชุมชน
                </p>


                <div class="ldx-home-hero-actions">

                    <a href="{{ url('/services') }}"
                       class="ldx-home-button ldx-home-button-primary">

                        <span>
                            ดูบริการ
                        </span>

                        <span>
                            →
                        </span>

                    </a>


                    <a href="{{ url('/contact') }}"
                       class="ldx-home-button ldx-home-button-outline">

                        <span>
                            ติดต่อเรา
                        </span>

                        <span>
                            ↗
                        </span>

                    </a>

                </div>

            </div>


            {{-- ==========================================================
                 HERO VISUAL
                 ========================================================== --}}
            <div class="ldx-home-hero-visual">

                <div class="ldx-home-building">

                    <div class="ldx-home-building-top">

                        <span></span>
                        <span></span>
                        <span></span>

                    </div>


                    <div class="ldx-home-building-shaft">

                        <div class="ldx-home-elevator">

                            <div class="ldx-home-elevator-door left"></div>
                            <div class="ldx-home-elevator-door right"></div>

                            <div class="ldx-home-elevator-light"></div>

                        </div>

                    </div>


                    <div class="ldx-home-building-floor floor-1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="ldx-home-building-floor floor-2">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="ldx-home-building-floor floor-3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="ldx-home-building-floor floor-4">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                </div>


                <div class="ldx-home-experience-badge">

                    <strong>
                        20+
                    </strong>

                    <span>
                        ประสบการณ์
                        <br>
                        หลายปี
                    </span>

                </div>

            </div>

        </div>

    </div>


    <div class="ldx-home-hero-bottom">

        <div class="ldx-public-container">

            <div class="ldx-home-hero-bottom-inner">

                <div class="ldx-home-hero-index">

                    <span>
                        01
                    </span>

                    <span class="line"></span>

                    <span>
                        LDX ELEVATOR
                    </span>

                </div>

                <span class="ldx-home-scroll">
                    เลื่อนเพื่อสำรวจ ↓
                </span>

            </div>

        </div>

    </div>

</section>



{{-- ======================================================================
     ABOUT
     ====================================================================== --}}
<section class="ldx-home-about">

    <div class="ldx-public-container">

        <div class="ldx-home-section-label">

            <span>01</span>

            <span class="line"></span>

            <span>
                เกี่ยวกับ LDX
            </span>

        </div>


        <div class="ldx-home-about-grid">

            <div class="ldx-home-about-heading">

                <h2>
                    วิศวกรรมที่ขับเคลื่อน
                    <span>
                        อย่างมั่นใจ
                    </span>
                </h2>

            </div>


            <div class="ldx-home-about-content">

                <p class="lead">
                    LDX Elevator ให้บริการโซลูชันระบบลิฟต์
                    ที่ไว้วางใจได้ โดยให้ความสำคัญกับ
                    ความปลอดภัย คุณภาพ และประสิทธิภาพในระยะยาว
                </p>

                <p>
                    ตั้งแต่การติดตั้งลิฟต์ใหม่ การปรับปรุงระบบ
                    การบำรุงรักษา ไปจนถึงการซ่อมแซม
                    ทีมงานของเรานำเสนอโซลูชันที่เหมาะกับ
                    ความต้องการของแต่ละอาคาร
                </p>


                <a href="{{ url('/about') }}"
                   class="ldx-home-text-link">

                    <span>
                        รู้จัก LDX เพิ่มเติม
                    </span>

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>


        <div class="ldx-home-statistics">

            <div class="ldx-home-stat">

                <strong>
                    20+
                </strong>

                <span>
                    ประสบการณ์
                    <br>
                    ปี
                </span>

            </div>


            <div class="ldx-home-stat">

                <strong>
                    500+
                </strong>

                <span>
                    โครงการ
                    <br>
                    แล้วเสร็จ
                </span>

            </div>


            <div class="ldx-home-stat">

                <strong>
                    24/7
                </strong>

                <span>
                    บริการและ
                    <br>
                    การดูแล
                </span>

            </div>


            <div class="ldx-home-stat">

                <strong>
                    100%
                </strong>

                <span>
                    ความปลอดภัย
                    <br>
                    ใส่ใจทุกขั้นตอน
                </span>

            </div>

        </div>

    </div>

</section>



{{-- ======================================================================
     SERVICES
     ====================================================================== --}}
<section class="ldx-home-services">

    <div class="ldx-public-container">

        <div class="ldx-home-section-header">

            <div class="ldx-home-section-label">

                <span>02</span>

                <span class="line"></span>

                <span>
                    บริการของเรา
                </span>

            </div>


            <div class="ldx-home-section-header-row">

                <h2>
                    โซลูชันที่สร้างขึ้น
                    <br>
                    <span>
                        เพื่อทุกการเดินทาง
                    </span>
                </h2>


                <a href="{{ url('/services') }}"
                   class="ldx-home-outline-link">

                    <span>
                        ดูบริการทั้งหมด
                    </span>

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>


        <div class="ldx-home-services-grid">


            {{-- SERVICE 01 --}}
            <a href="{{ url('/services') }}"
               class="ldx-home-service-card">

                <span class="ldx-home-service-number">
                    01
                </span>


                <div class="ldx-home-service-icon">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.4"
                         aria-hidden="true">

                        <rect x="5"
                              y="3"
                              width="14"
                              height="18"
                              rx="2"/>

                        <path d="M9 3v18"/>
                        <path d="M15 3v18"/>
                        <path d="M8 12h8"/>

                    </svg>

                </div>


                <div class="ldx-home-service-content">

                    <h3>
                        ติดตั้งลิฟต์
                    </h3>

                    <p>
                        โซลูชันติดตั้งลิฟต์แบบครบวงจร
                        ออกแบบให้เหมาะกับความต้องการของอาคาร
                    </p>

                </div>


                <span class="ldx-home-service-arrow">
                    ↗
                </span>

            </a>



            {{-- SERVICE 02 --}}
            <a href="{{ url('/services') }}"
               class="ldx-home-service-card">

                <span class="ldx-home-service-number">
                    02
                </span>


                <div class="ldx-home-service-icon">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.4"
                         aria-hidden="true">

                        <path d="M12 3v18"/>
                        <path d="M5 7h14"/>
                        <path d="M5 17h14"/>

                        <circle cx="12"
                                cy="12"
                                r="7"/>

                    </svg>

                </div>


                <div class="ldx-home-service-content">

                    <h3>
                        ปรับปรุงระบบลิฟต์
                    </h3>

                    <p>
                        ปรับปรุงระบบลิฟต์เดิมเพื่อเพิ่ม
                        ความปลอดภัย ประสิทธิภาพ และความคุ้มค่า
                    </p>

                </div>


                <span class="ldx-home-service-arrow">
                    ↗
                </span>

            </a>



            {{-- SERVICE 03 --}}
            <a href="{{ url('/services') }}"
               class="ldx-home-service-card">

                <span class="ldx-home-service-number">
                    03
                </span>


                <div class="ldx-home-service-icon">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.4"
                         aria-hidden="true">

                        <circle cx="12"
                                cy="12"
                                r="8"/>

                        <path d="M12 8v4l3 2"/>

                    </svg>

                </div>


                <div class="ldx-home-service-content">

                    <h3>
                        บำรุงรักษา
                    </h3>

                    <p>
                        โปรแกรมบำรุงรักษาเชิงป้องกัน
                        ที่ช่วยให้ระบบลิฟต์ทำงานได้อย่างน่าเชื่อถือ
                    </p>

                </div>


                <span class="ldx-home-service-arrow">
                    ↗
                </span>

            </a>



            {{-- SERVICE 04 --}}
            <a href="{{ url('/services') }}"
               class="ldx-home-service-card">

                <span class="ldx-home-service-number">
                    04
                </span>


                <div class="ldx-home-service-icon">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.4"
                         aria-hidden="true">

                        <path d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>

                        <path d="M9 12l2 2 4-4"/>

                    </svg>

                </div>


                <div class="ldx-home-service-content">

                    <h3>
                        ซ่อมแซมและตรวจสอบ
                    </h3>

                    <p>
                        บริการตรวจสอบและซ่อมแซมอย่างมืออาชีพ
                        เพื่อรักษาความปลอดภัยและประสิทธิภาพของระบบ
                    </p>

                </div>


                <span class="ldx-home-service-arrow">
                    ↗
                </span>

            </a>

        </div>

    </div>

</section>



{{-- ======================================================================
     PROJECTS
     ====================================================================== --}}
<section class="ldx-home-projects">

    <div class="ldx-public-container">

        <div class="ldx-home-section-header">

            <div class="ldx-home-section-label">

                <span>03</span>

                <span class="line"></span>

                <span>
                    โครงการเด่น
                </span>

            </div>


            <div class="ldx-home-section-header-row">

                <h2>
                    สร้างขึ้นเพื่อประสิทธิภาพ
                    <br>
                    <span>
                        ออกแบบเพื่อการใช้งานที่ยาวนาน
                    </span>
                </h2>


                <a href="{{ url('/projects') }}"
                   class="ldx-home-outline-link">

                    <span>
                        ดูโครงการ
                    </span>

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>


        <div class="ldx-home-projects-grid">


            {{-- PROJECT 01 --}}
            <a href="{{ url('/projects') }}"
               class="ldx-home-project-card ldx-home-project-large">

                <div class="ldx-home-project-image">

                    <div class="ldx-home-project-placeholder">

                        <span>
                            โครงการ 01
                        </span>

                        <strong>
                            อาคารพาณิชย์
                            <br>
                            สมัยใหม่
                        </strong>

                    </div>

                </div>


                <div class="ldx-home-project-info">

                    <div>

                        <span>
                            อาคารพาณิชย์
                        </span>

                        <h3>
                            ลิฟต์สำหรับอาคารพาณิชย์สมัยใหม่
                        </h3>

                    </div>

                    <span class="arrow">
                        ↗
                    </span>

                </div>

            </a>



            {{-- PROJECT 02 --}}
            <a href="{{ url('/projects') }}"
               class="ldx-home-project-card">

                <div class="ldx-home-project-image">

                    <div class="ldx-home-project-placeholder">

                        <span>
                            โครงการ 02
                        </span>

                        <strong>
                            อาคารพักอาศัย
                            <br>
                            อาคารสูง
                        </strong>

                    </div>

                </div>


                <div class="ldx-home-project-info">

                    <div>

                        <span>
                            ที่พักอาศัย
                        </span>

                        <h3>
                            ลิฟต์สำหรับอาคารพักอาศัยสูง
                        </h3>

                    </div>

                    <span class="arrow">
                        ↗
                    </span>

                </div>

            </a>



            {{-- PROJECT 03 --}}
            <a href="{{ url('/projects') }}"
               class="ldx-home-project-card">

                <div class="ldx-home-project-image">

                    <div class="ldx-home-project-placeholder">

                        <span>
                            โครงการ 03
                        </span>

                        <strong>
                            อาคารสำนักงาน
                            <br>
                            องค์กร
                        </strong>

                    </div>

                </div>


                <div class="ldx-home-project-info">

                    <div>

                        <span>
                            สำนักงาน
                        </span>

                        <h3>
                            ลิฟต์สำหรับอาคารสำนักงาน
                        </h3>

                    </div>

                    <span class="arrow">
                        ↗
                    </span>

                </div>

            </a>

        </div>

    </div>

</section>



{{-- ======================================================================
     WHY LDX
     ====================================================================== --}}
<section class="ldx-home-why">

    <div class="ldx-public-container">

        <div class="ldx-home-section-label">

            <span>04</span>

            <span class="line"></span>

            <span>
                ทำไมต้อง LDX
            </span>

        </div>


        <div class="ldx-home-why-grid">

            <div class="ldx-home-why-heading">

                <h2>
                    มากกว่าระบบลิฟต์
                    <span>
                        คือโซลูชันที่ครบวงจร
                    </span>
                </h2>

                <p>
                    เราผสานความเชี่ยวชาญด้านวิศวกรรม
                    คุณภาพงานติดตั้ง และบริการที่รวดเร็ว
                    เพื่อส่งมอบระบบลิฟต์ที่คุณไว้วางใจได้
                </p>

            </div>


            <div class="ldx-home-why-list">


                <div class="ldx-home-why-item">

                    <span class="number">
                        01
                    </span>

                    <div>

                        <h3>
                            ความปลอดภัยต้องมาก่อน
                        </h3>

                        <p>
                            ทุกโซลูชันได้รับการออกแบบโดยคำนึงถึง
                            ความปลอดภัย ความน่าเชื่อถือ
                            และมาตรฐานที่เกี่ยวข้อง
                        </p>

                    </div>

                </div>


                <div class="ldx-home-why-item">

                    <span class="number">
                        02
                    </span>

                    <div>

                        <h3>
                            วิศวกรรมคุณภาพ
                        </h3>

                        <p>
                            โซลูชันทางวิศวกรรมที่ใช้งานได้จริง
                            และออกแบบมาเพื่อประสิทธิภาพในระยะยาว
                        </p>

                    </div>

                </div>


                <div class="ldx-home-why-item">

                    <span class="number">
                        03
                    </span>

                    <div>

                        <h3>
                            บริการอย่างมืออาชีพ
                        </h3>

                        <p>
                            ทีมงานของเราให้บริการดูแลอย่างต่อเนื่อง
                            ตั้งแต่การติดตั้งจนถึงการบำรุงรักษา
                        </p>

                    </div>

                </div>


                <div class="ldx-home-why-item">

                    <span class="number">
                        04
                    </span>

                    <div>

                        <h3>
                            ใส่ใจลูกค้า
                        </h3>

                        <p>
                            ทุกโครงการได้รับการออกแบบให้เหมาะกับ
                            ความต้องการเฉพาะของลูกค้าและอาคารแต่ละแห่ง
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- ======================================================================
     NEWS
     ====================================================================== --}}
<section class="ldx-home-news">

    <div class="ldx-public-container">

        <div class="ldx-home-section-header">

            <div class="ldx-home-section-label">

                <span>05</span>

                <span class="line"></span>

                <span>
                    ข่าวสารล่าสุด
                </span>

            </div>


            <div class="ldx-home-section-header-row">

                <h2>
                    เรื่องราวและข้อมูลจาก
                    <br>
                    <span>
                        LDX Elevator
                    </span>
                </h2>


                <a href="{{ url('/news') }}"
                   class="ldx-home-outline-link">

                    <span>
                        ดูข่าวทั้งหมด
                    </span>

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>


        <div class="ldx-home-news-grid">


            {{-- ข่าวสาร 01 --}}
            <a href="{{ url('/news') }}"
               class="ldx-home-news-card">

                <div class="ldx-home-news-image">

                    <div class="ldx-home-news-placeholder">
                        ข่าวสาร
                    </div>

                </div>


                <div class="ldx-home-news-content">

                    <div class="ldx-home-news-meta">

                        <span>
                            บริษัท
                        </span>

                        <span>
                            01 SEP 2026
                        </span>

                    </div>

                    <h3>
                        ยกระดับระบบขนส่งแนวดิ่ง
                        ให้ดียิ่งขึ้น
                    </h3>

                    <span class="ldx-home-news-link">
                        อ่านบทความ →
                    </span>

                </div>

            </a>



            {{-- ข่าวสาร 02 --}}
            <a href="{{ url('/news') }}"
               class="ldx-home-news-card">

                <div class="ldx-home-news-image">

                    <div class="ldx-home-news-placeholder">
                        ข่าวสาร
                    </div>

                </div>


                <div class="ldx-home-news-content">

                    <div class="ldx-home-news-meta">

                        <span>
                            เทคโนโลยี
                        </span>

                        <span>
                            25 AUG 2026
                        </span>

                    </div>

                    <h3>
                        ทำไมการปรับปรุงระบบลิฟต์
                        จึงสำคัญสำหรับอาคารเดิม
                    </h3>

                    <span class="ldx-home-news-link">
                        อ่านบทความ →
                    </span>

                </div>

            </a>



            {{-- ข่าวสาร 03 --}}
            <a href="{{ url('/news') }}"
               class="ldx-home-news-card">

                <div class="ldx-home-news-image">

                    <div class="ldx-home-news-placeholder">
                        ข่าวสาร
                    </div>

                </div>


                <div class="ldx-home-news-content">

                    <div class="ldx-home-news-meta">

                        <span>
                            การบำรุงรักษา
                        </span>

                        <span>
                            18 AUG 2026
                        </span>

                    </div>

                    <h3>
                        ขั้นตอนง่าย ๆ เพื่อเพิ่ม
                        ความน่าเชื่อถือของระบบลิฟต์
                    </h3>

                    <span class="ldx-home-news-link">
                        อ่านบทความ →
                    </span>

                </div>

            </a>

        </div>

    </div>

</section>



{{-- ======================================================================
     CTA
     ====================================================================== --}}
<section class="ldx-home-cta">

    <div class="ldx-home-cta-grid"></div>


    <div class="ldx-public-container">

        <div class="ldx-home-cta-content">

            <div class="ldx-home-eyebrow">

                <span class="ldx-home-eyebrow-line"></span>

                <span>
                    เริ่มต้นโครงการของคุณ
                </span>

            </div>


            <h2>
                พร้อมขับเคลื่อน
                <br>

                <span>
                    โครงการของคุณไปข้างหน้าหรือยัง?
                </span>
            </h2>


            <p>
                พูดคุยกับทีมงานของเราเกี่ยวกับ
                ความต้องการด้านลิฟต์ และค้นหาโซลูชัน
                ที่เหมาะสมสำหรับอาคารของคุณ
            </p>


            <a href="{{ url('/contact') }}"
               class="ldx-home-button ldx-home-button-primary">

                <span>
                    ติดต่อ LDX Elevator
                </span>

                <span>
                    →
                </span>

            </a>

        </div>

    </div>

</section>


@endsection