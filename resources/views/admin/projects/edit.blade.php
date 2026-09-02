@extends('layouts.admin.app')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('content')

<div class="mx-auto max-w-6xl space-y-6 pb-12">

    {{-- Breadcrumb & Header --}}
    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs font-medium text-gray-500">
                <a href="{{ route('admin.projects.index') }}" class="hover:text-indigo-600 transition-colors">
                    Projects
                </a>
                <span>/</span>
                <span class="text-gray-400">Edit Project</span>
            </div>
            <h1 class="mt-1 text-2xl font-bold tracking-tight text-gray-900">
                Edit Project: <span class="text-indigo-600">{{ $project->title }}</span>
            </h1>
            <p class="text-xs text-gray-500">
                แก้ไขข้อมูล รายละเอียด และรูปภาพของโครงการ
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.projects.index') }}" class="rounded-xl border border-gray-300 bg-white px-4 py-2 text-xs font-semibold text-gray-700 shadow-sm hover:bg-gray-50 transition">
                Back to List
            </a>
        </div>
    </div>

    {{-- Alerts Section --}}
    @if(session('success'))
        <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 shadow-sm">
            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="flex items-center gap-3 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800 shadow-sm">
            <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="rounded-xl border border-rose-200 bg-rose-50 p-5 shadow-sm">
            <div class="flex items-center gap-2 font-semibold text-rose-800 text-sm">
                <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>กรุณาตรวจสอบความถูกต้องของข้อมูล</span>
            </div>
            <ul class="mt-2 list-inside list-disc text-xs text-rose-700 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Update Form --}}
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Main Layout Grid --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- Left Column: Basic Info & Content (2 Columns width) --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Basic Information Card --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <h2 class="text-base font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Project Details
                    </h2>

                    <div class="mt-5 space-y-4">
                        {{-- Title --}}
                        <div>
                            <label class="mb-1.5 block text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Project Name <span class="text-rose-500">*</span>
                            </label>
                            <input
                                type="text"
                                name="title"
                                value="{{ old('title', $project->title) }}"
                                required
                                class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition outline-none"
                                placeholder="ระบุชื่อโครงการ..."
                            >
                        </div>

                        {{-- Slug --}}
                        <div>
                            <label class="mb-1.5 block text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Slug (URL)
                            </label>
                            <input
                                type="text"
                                name="slug"
                                value="{{ old('slug', $project->slug) }}"
                                class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition outline-none"
                                placeholder="project-url-slug"
                            >
                            <p class="mt-1 text-[11px] text-gray-400">
                                * หากเว้นว่าง ระบบจะสร้าง URL ให้อัตโนมัติจากชื่อโปรเจกต์
                            </p>
                        </div>

                        {{-- Short Description --}}
                        <div>
                            <label class="mb-1.5 block text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Short Description
                            </label>
                            <textarea
                                name="short_description"
                                rows="3"
                                maxlength="500"
                                class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition outline-none"
                                placeholder="สรุปเนื้อหาย่อสั้นๆ (สูงสุด 500 ตัวอักษร)..."
                            >{{ old('short_description', $project->short_description) }}</textarea>
                        </div>

                        {{-- Content --}}
                        <div>
                            <label class="mb-1.5 block text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Detailed Content
                            </label>
                            <textarea
                                name="content"
                                rows="10"
                                class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition outline-none font-mono text-xs"
                                placeholder="รายละเอียดแบบเต็มของโครงการ..."
                            >{{ old('content', $project->content) }}</textarea>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Right Column: Metadata & Settings (1 Column width) --}}
            <div class="space-y-6">

                {{-- Settings & Status Card --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <h2 class="text-base font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                        Project Settings
                    </h2>

                    <div class="mt-5 space-y-4">
                        {{-- Category --}}
                        <div>
                            <label class="mb-1.5 block text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Category <span class="text-rose-500">*</span>
                            </label>
                            <select
                                name="category_id"
                                required
                                class="w-full rounded-xl border border-gray-300 px-3.5 py-2.5 text-sm bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition outline-none"
                            >
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $project->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Status --}}
                        <div>
                            <label class="mb-1.5 block text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Status
                            </label>
                            <select
                                name="is_active"
                                class="w-full rounded-xl border border-gray-300 px-3.5 py-2.5 text-sm bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition outline-none"
                            >
                                <option value="1" @selected(old('is_active', $project->is_active ? '1' : '0') === '1')>
                                    🟢 Active — แสดงบนเว็บ
                                </option>
                                <option value="0" @selected(old('is_active', $project->is_active ? '1' : '0') === '0')>
                                    🔴 Hidden — ซ่อนจากเว็บ
                                </option>
                            </select>
                        </div>

                        {{-- Project Date --}}
                        <div>
                            <label class="mb-1.5 block text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Project Date
                            </label>
                            <input
                                type="date"
                                name="project_date"
                                value="{{ old('project_date', $project->project_date ? $project->project_date->format('Y-m-d') : '') }}"
                                class="w-full rounded-xl border border-gray-300 px-3.5 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition outline-none"
                            >
                        </div>

                        {{-- Client --}}
                        <div>
                            <label class="mb-1.5 block text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Client
                            </label>
                            <input
                                type="text"
                                name="client"
                                value="{{ old('client', $project->client) }}"
                                class="w-full rounded-xl border border-gray-300 px-3.5 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition outline-none"
                                placeholder="ชื่อลูกค้าผู้ว่าจ้าง..."
                            >
                        </div>

                        {{-- Location --}}
                        <div>
                            <label class="mb-1.5 block text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Location
                            </label>
                            <input
                                type="text"
                                name="location"
                                value="{{ old('location', $project->location) }}"
                                class="w-full rounded-xl border border-gray-300 px-3.5 py-2.5 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition outline-none"
                                placeholder="สถานที่ติดตั้ง..."
                            >
                        </div>
                    </div>
                </div>

                {{-- Action Submit Box --}}
                <div class="rounded-2xl border border-indigo-100 bg-indigo-50/50 p-5 flex flex-col gap-3">
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-600/20 hover:bg-indigo-700 transition"
                    >
                        Save Changes
                    </button>
                    <a
                        href="{{ route('admin.projects.index') }}"
                        class="w-full rounded-xl border border-gray-300 bg-white px-5 py-2.5 text-center text-xs font-semibold text-gray-700 hover:bg-gray-50 transition"
                    >
                        Cancel
                    </a>
                </div>

            </div>

        </div>
    </form>

    {{-- Media Management Section (Full Width Below) --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm space-y-6">
        <div class="flex items-center justify-between border-b border-gray-100 pb-4">
            <div>
                <h2 class="text-base font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Project Images Management
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">จัดการรูปภาพที่มีอยู่ หรืออัปโหลดภาพเพิ่มเติมเข้าสู่โปรเจกต์</p>
            </div>
            <span class="rounded-full bg-indigo-50 text-indigo-600 border border-indigo-100 px-3 py-1 text-xs font-bold">
                {{ $project->images->count() }} Images
            </span>
        </div>

        {{-- Current Gallery Grid --}}
        @if($project->images->count())
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
                @foreach($project->images as $image)
                    <div class="group relative overflow-hidden rounded-xl border border-gray-200 bg-gray-50 transition hover:shadow-md">
                        <img
                            src="{{ Storage::url($image->path) }}"
                            alt="{{ $image->alt ?: $project->title }}"
                            class="h-36 w-full object-cover transition duration-300 group-hover:scale-105"
                        >
                        <div class="p-3 bg-white flex flex-col justify-between">
                            <p class="truncate text-xs font-medium text-gray-700" title="{{ $image->alt ?: 'No alt text' }}">
                                {{ $image->alt ?: 'No alt text' }}
                            </p>
                            <form
                                method="POST"
                                action="{{ route('admin.project-images.destroy', $image) }}"
                                class="mt-2"
                                onsubmit="return confirm('ยืนยันลบรูปภาพนี้? (ข้อมูล Project จะยังคงอยู่)')"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="w-full rounded-lg bg-rose-50 px-2.5 py-1.5 text-center text-[11px] font-semibold text-rose-600 hover:bg-rose-100 transition"
                                >
                                    Delete Image
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="rounded-xl border border-dashed border-gray-300 p-8 text-center bg-gray-50/50">
                <p class="text-xs text-gray-500 font-medium">ยังไม่มีรูปภาพประกอบในโครงการนี้</p>
            </div>
        @endif

        {{-- Upload New Images Box --}}
        <div class="rounded-xl border border-dashed border-indigo-200 bg-indigo-50/30 p-5">
            <h3 class="text-xs font-bold text-gray-800 uppercase tracking-wider mb-2">Upload More Images</h3>
            <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" id="upload-more-form">
                {{-- Note: หากรูปอัปโหลดรวมอยู่ใน Form หลักด้านบน สามารถข้ามส่วน Form ซ้อนนี้ได้ แต่ถ้าแยกฟอร์มให้กดปุ่ม Save ด้านบนสุด --}}
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <input
                        type="file"
                        name="images[]"
                        multiple
                        accept="image/jpeg,image/png,image/webp,image/avif"
                        class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer border border-gray-300 rounded-xl bg-white p-2"
                    >
                </div>
                <p class="mt-2 text-[11px] text-gray-400">
                    รองรับไฟล์: JPG, PNG, WEBP หรือ AVIF (ขนาดไม่เกิน 5MB ต่อรูป สามารถเลือกหลายรูปพร้อมกันได้)
                </p>
            </form>
        </div>
    </div>

    {{-- Danger Zone --}}
    <div class="rounded-2xl border border-rose-200 bg-rose-50/50 p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-base font-bold text-rose-800">Danger Zone</h2>
                <p class="text-xs text-rose-600 mt-0.5">
                    การลบโครงการจะทำการลบข้อมูลทั้งหมดและลบไฟล์ภาพที่เกี่ยวข้องออกจากระบบอย่างถาวร ไม่สามารถกู้คืนได้
                </p>
            </div>
            <form
                method="POST"
                action="{{ route('admin.projects.destroy', $project) }}"
                onsubmit="return confirm('⚠️ ยืนยันลบ Project นี้อย่างถาวร? ข้อมูลและรูปภาพทั้งหมดจะหายไป')"
            >
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="rounded-xl bg-rose-600 px-4 py-2.5 text-xs font-bold text-white shadow-sm hover:bg-rose-700 transition"
                >
                    Delete Project
                </button>
            </form>
        </div>
    </div>

</div>

@endsection