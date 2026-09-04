
@extends('layouts.admin.app')

@section('title', 'SEO Settings')

@section('content')

<div class="ldx-page">

    {{-- Header --}}
    <div class="ldx-page-header">
        <h1 class="ldx-page-title">
            SEO Settings
        </h1>

        <p class="ldx-page-description">
            จัดการข้อมูล SEO สำหรับเว็บไซต์ LD Elevator
        </p>
    </div>


    {{-- Success --}}
    @if(session('success'))
        <div class="ldx-alert ldx-alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- Validation Error --}}
    @if($errors->any())
        <div class="ldx-alert ldx-alert-danger">

            <div class="ldx-alert-title">
                กรุณาตรวจสอบข้อมูล
            </div>

            <ul class="ldx-alert-list">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif


    <form
        action="{{ route('admin.seo.update') }}"
        method="POST"
        enctype="multipart/form-data"
        class="ldx-form"
    >

        @csrf
        @method('PUT')


        {{-- ========================================================= --}}
        {{-- GENERAL SEO --}}
        {{-- ========================================================= --}}

        <div class="ldx-card ldx-seo-section">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    General SEO
                </h2>

                <p class="ldx-card-description">
                    ข้อมูลพื้นฐานที่ใช้สำหรับ Search Engine
                </p>

            </div>


            <div class="ldx-card-body ldx-form-stack">

                {{-- Meta Title --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Meta Title
                    </label>

                    <input
                        type="text"
                        name="meta_title"
                        value="{{ old('meta_title', $seo->meta_title ?? '') }}"
                        maxlength="255"
                        placeholder="LD Elevator | บริษัท ลิฟต์และระบบลิฟต์"
                        class="ldx-input"
                    >

                    <p class="ldx-help-text">
                        แนะนำประมาณ 50–60 ตัวอักษร
                    </p>

                </div>


                {{-- Meta Description --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Meta Description
                    </label>

                    <textarea
                        name="meta_description"
                        rows="4"
                        maxlength="1000"
                        placeholder="LD Elevator ให้บริการออกแบบ ติดตั้ง และบำรุงรักษาลิฟต์..."
                        class="ldx-textarea"
                    >{{ old('meta_description', $seo->meta_description ?? '') }}</textarea>

                    <p class="ldx-help-text">
                        คำอธิบายเว็บไซต์สำหรับ Search Engine
                    </p>

                </div>


                {{-- Meta Keywords --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Meta Keywords
                    </label>

                    <textarea
                        name="meta_keywords"
                        rows="3"
                        placeholder="ลิฟต์, elevator, ลิฟต์โดยสาร, ลิฟต์บ้าน, ติดตั้งลิฟต์"
                        class="ldx-textarea"
                    >{{ old('meta_keywords', $seo->meta_keywords ?? '') }}</textarea>

                    <p class="ldx-help-text">
                        คั่นแต่ละ Keyword ด้วยเครื่องหมาย ,
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- OPEN GRAPH --}}
        {{-- ========================================================= --}}

        <div class="ldx-card ldx-seo-section">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Open Graph
                </h2>

                <p class="ldx-card-description">
                    ข้อมูลที่ใช้เมื่อแชร์เว็บไซต์ผ่าน Facebook, LINE และ Social Media
                </p>

            </div>


            <div class="ldx-card-body ldx-form-stack">

                {{-- OG Title --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        OG Title
                    </label>

                    <input
                        type="text"
                        name="og_title"
                        value="{{ old('og_title', $seo->og_title ?? '') }}"
                        maxlength="255"
                        placeholder="LD Elevator | Elevator Solutions"
                        class="ldx-input"
                    >

                </div>


                {{-- OG Description --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        OG Description
                    </label>

                    <textarea
                        name="og_description"
                        rows="4"
                        maxlength="1000"
                        placeholder="รายละเอียดเว็บไซต์สำหรับ Social Media"
                        class="ldx-textarea"
                    >{{ old('og_description', $seo->og_description ?? '') }}</textarea>

                </div>


                {{-- OG Image --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        OG Image
                    </label>

                    <input
                        type="file"
                        name="og_image"
                        accept="image/jpeg,image/png,image/webp,image/avif"
                        class="ldx-file-input"
                    >

                    <p class="ldx-help-text">
                        แนะนำขนาด 1200 × 630 px
                    </p>


                    @if(!empty($seo?->og_image))

                        <div class="ldx-image-preview">

                            <p class="ldx-image-preview-label">
                                รูปปัจจุบัน
                            </p>

                            <img
                                src="{{ asset('storage/' . $seo->og_image) }}"
                                alt="OG Image"
                                class="ldx-preview-image"
                            >

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- SEARCH ENGINE VERIFICATION --}}
        {{-- ========================================================= --}}

        <div class="ldx-card ldx-seo-section">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Search Engine Verification
                </h2>

                <p class="ldx-card-description">
                    สำหรับยืนยันเว็บไซต์กับ Search Engine
                </p>

            </div>


            <div class="ldx-card-body ldx-form-stack">

                {{-- Google --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Google Site Verification
                    </label>

                    <textarea
                        name="google_site_verification"
                        rows="3"
                        placeholder="ใส่ค่า verification ที่ได้รับจาก Google Search Console"
                        class="ldx-textarea"
                    >{{ old('google_site_verification', $seo->google_site_verification ?? '') }}</textarea>

                </div>


                {{-- Bing --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Bing Site Verification
                    </label>

                    <textarea
                        name="bing_site_verification"
                        rows="3"
                        placeholder="ใส่ค่า verification จาก Bing Webmaster Tools"
                        class="ldx-textarea"
                    >{{ old('bing_site_verification', $seo->bing_site_verification ?? '') }}</textarea>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ANALYTICS --}}
        {{-- ========================================================= --}}

        <div class="ldx-card ldx-seo-section">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Analytics
                </h2>

                <p class="ldx-card-description">
                    เชื่อมต่อระบบวิเคราะห์ผู้เข้าชมเว็บไซต์
                </p>

            </div>


            <div class="ldx-card-body ldx-form-stack">

                {{-- Google Analytics --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Google Analytics ID
                    </label>

                    <input
                        type="text"
                        name="google_analytics_id"
                        value="{{ old('google_analytics_id', $seo->google_analytics_id ?? '') }}"
                        placeholder="G-XXXXXXXXXX"
                        class="ldx-input"
                    >

                    <p class="ldx-help-text">
                        ตัวอย่าง: G-XXXXXXXXXX
                    </p>

                </div>


                {{-- GTM --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Google Tag Manager ID
                    </label>

                    <input
                        type="text"
                        name="google_tag_manager_id"
                        value="{{ old('google_tag_manager_id', $seo->google_tag_manager_id ?? '') }}"
                        placeholder="GTM-XXXXXXX"
                        class="ldx-input"
                    >

                    <p class="ldx-help-text">
                        ตัวอย่าง: GTM-XXXXXXX
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ADVANCED SEO --}}
        {{-- ========================================================= --}}

        <div class="ldx-card ldx-seo-section">

            <div class="ldx-card-header">

                <h2 class="ldx-card-title">
                    Advanced SEO
                </h2>

                <p class="ldx-card-description">
                    การตั้งค่าเพิ่มเติมสำหรับ Search Engine
                </p>

            </div>


            <div class="ldx-card-body ldx-form-stack">

                {{-- Canonical --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Canonical URL
                    </label>

                    <input
                        type="url"
                        name="canonical_url"
                        value="{{ old('canonical_url', $seo->canonical_url ?? '') }}"
                        placeholder="https://www.ldelevator.com"
                        class="ldx-input"
                    >

                </div>


                {{-- Robots --}}
                <div class="ldx-form-group">

                    <label class="ldx-label">
                        Robots
                    </label>

                    <select
                        name="robots"
                        class="ldx-select"
                    >

                        @php
                            $robots = old('robots', $seo->robots ?? 'index, follow');
                        @endphp

                        <option
                            value="index, follow"
                            @selected($robots == 'index, follow')
                        >
                            index, follow
                        </option>

                        <option
                            value="noindex, follow"
                            @selected($robots == 'noindex, follow')
                        >
                            noindex, follow
                        </option>

                        <option
                            value="index, nofollow"
                            @selected($robots == 'index, nofollow')
                        >
                            index, nofollow
                        </option>

                        <option
                            value="noindex, nofollow"
                            @selected($robots == 'noindex, nofollow')
                        >
                            noindex, nofollow
                        </option>

                    </select>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- SAVE --}}
        {{-- ========================================================= --}}

        <div class="ldx-form-actions ldx-form-actions-end">

            <button
                type="submit"
                class="ldx-button ldx-button-primary"
            >
                Save SEO Settings
            </button>

        </div>

    </form>

</div>

@endsection

