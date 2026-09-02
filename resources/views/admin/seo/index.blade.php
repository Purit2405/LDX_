@extends('layouts.admin.app')

@section('title', 'SEO Settings')

@section('content')

<div class="mx-auto max-w-7xl">

    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-2">
        <h1 class="text-2xl font-semibold text-white">
            SEO Settings
        </h1>

        <p class="text-sm text-gray-400">
            จัดการข้อมูล SEO สำหรับเว็บไซต์ LD Elevator
        </p>
    </div>


    {{-- Success --}}
    @if(session('success'))

        <div class="mb-6 rounded-lg border border-green-500/30 bg-green-500/10 px-4 py-3 text-sm text-green-400">
            {{ session('success') }}
        </div>

    @endif


    {{-- Validation Error --}}
    @if($errors->any())

        <div class="mb-6 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-400">

            <div class="mb-2 font-semibold">
                กรุณาตรวจสอบข้อมูล
            </div>

            <ul class="list-disc space-y-1 pl-5">

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
    >

        @csrf
        @method('PUT')


        {{-- ========================================================= --}}
        {{-- GENERAL SEO --}}
        {{-- ========================================================= --}}

        <div class="mb-6 rounded-xl border border-gray-800 bg-[#111317]">

            <div class="border-b border-gray-800 px-6 py-5">

                <h2 class="text-lg font-semibold text-white">
                    General SEO
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    ข้อมูลพื้นฐานที่ใช้สำหรับ Search Engine
                </p>

            </div>


            <div class="space-y-6 p-6">

                {{-- Meta Title --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        Meta Title
                    </label>

                    <input
                        type="text"
                        name="meta_title"
                        value="{{ old('meta_title', $seo->meta_title ?? '') }}"
                        maxlength="255"
                        placeholder="LD Elevator | บริษัท ลิฟต์และระบบลิฟต์"
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        แนะนำประมาณ 50–60 ตัวอักษร
                    </p>

                </div>


                {{-- Meta Description --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        Meta Description
                    </label>

                    <textarea
                        name="meta_description"
                        rows="4"
                        maxlength="1000"
                        placeholder="LD Elevator ให้บริการออกแบบ ติดตั้ง และบำรุงรักษาลิฟต์..."
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >{{ old('meta_description', $seo->meta_description ?? '') }}</textarea>

                    <p class="mt-2 text-xs text-gray-500">
                        คำอธิบายเว็บไซต์สำหรับ Search Engine
                    </p>

                </div>


                {{-- Meta Keywords --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        Meta Keywords
                    </label>

                    <textarea
                        name="meta_keywords"
                        rows="3"
                        placeholder="ลิฟต์, elevator, ลิฟต์โดยสาร, ลิฟต์บ้าน, ติดตั้งลิฟต์"
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >{{ old('meta_keywords', $seo->meta_keywords ?? '') }}</textarea>

                    <p class="mt-2 text-xs text-gray-500">
                        คั่นแต่ละ Keyword ด้วยเครื่องหมาย ,
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- OPEN GRAPH --}}
        {{-- ========================================================= --}}

        <div class="mb-6 rounded-xl border border-gray-800 bg-[#111317]">

            <div class="border-b border-gray-800 px-6 py-5">

                <h2 class="text-lg font-semibold text-white">
                    Open Graph
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    ข้อมูลที่ใช้เมื่อแชร์เว็บไซต์ผ่าน Facebook, LINE และ Social Media
                </p>

            </div>


            <div class="space-y-6 p-6">

                {{-- OG Title --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        OG Title
                    </label>

                    <input
                        type="text"
                        name="og_title"
                        value="{{ old('og_title', $seo->og_title ?? '') }}"
                        maxlength="255"
                        placeholder="LD Elevator | Elevator Solutions"
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >

                </div>


                {{-- OG Description --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        OG Description
                    </label>

                    <textarea
                        name="og_description"
                        rows="4"
                        maxlength="1000"
                        placeholder="รายละเอียดเว็บไซต์สำหรับ Social Media"
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >{{ old('og_description', $seo->og_description ?? '') }}</textarea>

                </div>


                {{-- OG Image --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        OG Image
                    </label>

                    <input
                        type="file"
                        name="og_image"
                        accept="image/jpeg,image/png,image/webp,image/avif"
                        class="block w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-gray-300 file:mr-4 file:rounded-md file:border-0 file:bg-[#f2a93b] file:px-4 file:py-2 file:text-sm file:font-medium file:text-black"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        แนะนำขนาด 1200 × 630 px
                    </p>


                    @if(!empty($seo?->og_image))

                        <div class="mt-4">

                            <p class="mb-2 text-xs text-gray-400">
                                รูปปัจจุบัน
                            </p>

                            <img
                                src="{{ asset('storage/' . $seo->og_image) }}"
                                alt="OG Image"
                                class="max-h-64 rounded-lg border border-gray-700"
                            >

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- SEARCH ENGINE VERIFICATION --}}
        {{-- ========================================================= --}}

        <div class="mb-6 rounded-xl border border-gray-800 bg-[#111317]">

            <div class="border-b border-gray-800 px-6 py-5">

                <h2 class="text-lg font-semibold text-white">
                    Search Engine Verification
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    สำหรับยืนยันเว็บไซต์กับ Search Engine
                </p>

            </div>


            <div class="space-y-6 p-6">

                {{-- Google --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        Google Site Verification
                    </label>

                    <textarea
                        name="google_site_verification"
                        rows="3"
                        placeholder="ใส่ค่า verification ที่ได้รับจาก Google Search Console"
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >{{ old('google_site_verification', $seo->google_site_verification ?? '') }}</textarea>

                </div>


                {{-- Bing --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        Bing Site Verification
                    </label>

                    <textarea
                        name="bing_site_verification"
                        rows="3"
                        placeholder="ใส่ค่า verification จาก Bing Webmaster Tools"
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >{{ old('bing_site_verification', $seo->bing_site_verification ?? '') }}</textarea>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ANALYTICS --}}
        {{-- ========================================================= --}}

        <div class="mb-6 rounded-xl border border-gray-800 bg-[#111317]">

            <div class="border-b border-gray-800 px-6 py-5">

                <h2 class="text-lg font-semibold text-white">
                    Analytics
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    เชื่อมต่อระบบวิเคราะห์ผู้เข้าชมเว็บไซต์
                </p>

            </div>


            <div class="space-y-6 p-6">

                {{-- Google Analytics --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        Google Analytics ID
                    </label>

                    <input
                        type="text"
                        name="google_analytics_id"
                        value="{{ old('google_analytics_id', $seo->google_analytics_id ?? '') }}"
                        placeholder="G-XXXXXXXXXX"
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        ตัวอย่าง: G-XXXXXXXXXX
                    </p>

                </div>


                {{-- GTM --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        Google Tag Manager ID
                    </label>

                    <input
                        type="text"
                        name="google_tag_manager_id"
                        value="{{ old('google_tag_manager_id', $seo->google_tag_manager_id ?? '') }}"
                        placeholder="GTM-XXXXXXX"
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >

                    <p class="mt-2 text-xs text-gray-500">
                        ตัวอย่าง: GTM-XXXXXXX
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ADVANCED SEO --}}
        {{-- ========================================================= --}}

        <div class="mb-6 rounded-xl border border-gray-800 bg-[#111317]">

            <div class="border-b border-gray-800 px-6 py-5">

                <h2 class="text-lg font-semibold text-white">
                    Advanced SEO
                </h2>

                <p class="mt-1 text-sm text-gray-400">
                    การตั้งค่าเพิ่มเติมสำหรับ Search Engine
                </p>

            </div>


            <div class="space-y-6 p-6">

                {{-- Canonical --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        Canonical URL
                    </label>

                    <input
                        type="url"
                        name="canonical_url"
                        value="{{ old('canonical_url', $seo->canonical_url ?? '') }}"
                        placeholder="https://www.ldelevator.com"
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >

                </div>


                {{-- Robots --}}
                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-300">
                        Robots
                    </label>

                    <select
                        name="robots"
                        class="w-full rounded-lg border border-gray-700 bg-[#181a1f] px-4 py-3 text-sm text-white outline-none transition focus:border-[#f2a93b]"
                    >

                        @php
                            $robots = old('robots', $seo->robots ?? 'index, follow');
                        @endphp

                        <option value="index, follow"
                            @selected($robots === 'index, follow')>
                            index, follow
                        </option>

                        <option value="noindex, follow"
                            @selected($robots === 'noindex, follow')>
                            noindex, follow
                        </option>

                        <option value="index, nofollow"
                            @selected($robots === 'index, nofollow')>
                            index, nofollow
                        </option>

                        <option value="noindex, nofollow"
                            @selected($robots === 'noindex, nofollow')>
                            noindex, nofollow
                        </option>

                    </select>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- SAVE --}}
        {{-- ========================================================= --}}

        <div class="flex justify-end">

            <button
                type="submit"
                class="rounded-lg bg-[#f2a93b] px-6 py-3 text-sm font-semibold text-black transition hover:bg-[#ffc15c]"
            >
                Save SEO Settings
            </button>

        </div>

    </form>

</div>

@endsection