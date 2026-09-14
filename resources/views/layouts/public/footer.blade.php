<footer class="ldx-public-footer">

{{-- ================================================================
     FOOTER CTA
     ================================================================ --}}
<section class="ldx-public-footer-cta">

    <div class="ldx-public-container">

        <div class="ldx-public-footer-cta-inner">

            <div>

                <span class="ldx-public-footer-eyebrow">
                    มาร่วมสร้างโครงการไปด้วยกัน
                </span>

                <h2>
                    ขับเคลื่อนโครงการของคุณ
                    <span>ให้ก้าวไปข้างหน้า</span>
                </h2>

            </div>

            <a href="{{ url('/contact') }}"
               class="ldx-public-footer-cta-button">

                <span>
                    เริ่มต้นพูดคุยกับเรา
                </span>

                <span>
                    ↗
                </span>

            </a>

        </div>

    </div>

</section>



{{-- ================================================================
     FOOTER MAIN
     ================================================================ --}}
<div class="ldx-public-footer-main">

    <div class="ldx-public-container">

        <div class="ldx-public-footer-grid">


            {{-- ====================================================
                 BRAND
                 ==================================================== --}}
            <div class="ldx-public-footer-brand">

                <a href="{{ url('/') }}"
                   class="ldx-public-footer-logo">

                    <span class="ldx-public-footer-mark">
                        LDX
                    </span>

                    <span>
                        ELEVATOR
                    </span>

                </a>

                <p>
                    โซลูชันระบบลิฟต์ที่เชื่อถือได้
                    ออกแบบมาเพื่ออาคาร ธุรกิจ
                    และชุมชนยุคใหม่
                </p>


                <div class="ldx-public-footer-social">

                    <a href="#"
                       aria-label="Facebook">
                        F
                    </a>

                    <a href="#"
                       aria-label="Instagram">
                        I
                    </a>

                    <a href="#"
                       aria-label="LinkedIn">
                        in
                    </a>

                </div>

            </div>



            {{-- ====================================================
                 QUICK LINKS
                 ==================================================== --}}
            <div class="ldx-public-footer-column">

                <span class="ldx-public-footer-column-title">
                    สำรวจเว็บไซต์
                </span>

                <a href="{{ url('/') }}">
                    หน้าแรก
                </a>

                <a href="{{ url('/about') }}">
                    เกี่ยวกับเรา
                </a>

                <a href="{{ url('/services') }}">
                    บริการ
                </a>

                <a href="{{ url('/projects') }}">
                    โครงการ
                </a>

                <a href="{{ url('/news') }}">
                    ข่าวสาร
                </a>

            </div>



            {{-- ====================================================
                 SERVICES
                 ==================================================== --}}
            <div class="ldx-public-footer-column">

                <span class="ldx-public-footer-column-title">
                    บริการ
                </span>

                <a href="{{ url('/services') }}">
                    ติดตั้งลิฟต์
                </a>

                <a href="{{ url('/services') }}">
                    ปรับปรุงและอัปเกรดระบบ
                </a>

                <a href="{{ url('/services') }}">
                    บำรุงรักษา
                </a>

                <a href="{{ url('/services') }}">
                    ซ่อมแซมและตรวจสอบ
                </a>

            </div>



            {{-- ====================================================
                 CONTACT
                 ==================================================== --}}
            <div class="ldx-public-footer-column">

                <span class="ldx-public-footer-column-title">
                    ติดต่อเรา
                </span>

                <div class="ldx-public-footer-address">

                    <p>
                        กรุงเทพมหานคร ประเทศไทย
                    </p>

                    <a href="tel:+66000000000"
                       class="ldx-public-footer-contact-link">
                        +66 00 000 0000
                    </a>

                    <a href="mailto:info@ldxelevator.com"
                       class="ldx-public-footer-contact-link">
                        info@ldxelevator.com
                    </a>

                </div>

            </div>

        </div>



        {{-- ========================================================
             FOOTER BOTTOM
             ======================================================== --}}
        <div class="ldx-public-footer-bottom">

            <span>
                © {{ date('Y') }} LDX Elevator.
                สงวนลิขสิทธิ์
            </span>

            <div>

                <a href="#">
                    นโยบายความเป็นส่วนตัว
                </a>

                <a href="#">
                    ข้อกำหนดการใช้งาน
                </a>

            </div>

        </div>

    </div>

</div>

</footer>
