@extends('layouts.admin.app')

@section('title', 'Edit News')
@section('page-title', 'Edit News')

@section('content')

<div class="mx-auto max-w-7xl space-y-6">

    {{-- Header --}}
    <div>
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <a href="{{ route('admin.news.index') }}" class="hover:text-gray-900 transition">News</a>
            <span>/</span>
            <span class="text-gray-900 font-medium">Edit</span>
        </div>
        <h1 class="mt-2 text-2xl font-bold text-gray-900">Edit News</h1>
        <p class="mt-1 text-sm text-gray-500">แก้ไขข้อมูลข่าวสาร: {{ $news->title }}</p>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700 shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-5 shadow-sm">
            <div class="font-semibold text-red-700">กรุณาตรวจสอบข้อมูล</div>
            <ul class="mt-2 list-inside list-disc text-sm text-red-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- Left Column: Main Content --}}
        <div class="lg:col-span-2 space-y-6">
            
            <form id="edit-news-form" method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Content Details --}}
                <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6 border-b pb-3">News Content</h2>
                    
                    <div class="space-y-5">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">News Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $news->title) }}" required maxlength="255" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 transition">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug', $news->slug) }}" maxlength="255" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-600 focus:border-blue-500 focus:ring-blue-500 transition">
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">Short Description</label>
                            <textarea name="short_description" rows="3" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 transition">{{ old('short_description', $news->short_description) }}</textarea>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">Full Content</label>
                            <textarea name="content" rows="12" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 transition">{{ old('content', $news->content) }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Media Section --}}
                <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900 mb-2 border-b pb-3">Media & Images</h2>
                    
                    <div class="mt-5 mb-8">
                        <label class="mb-2 block text-sm font-medium text-gray-700">Upload New Images</label>
                        <input type="file" name="images[]" multiple accept="image/jpeg,image/png,image/webp,image/avif" class="block w-full rounded-lg border border-dashed border-gray-300 bg-gray-50 p-4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p class="mt-2 text-xs text-gray-500">รองรับไฟล์ JPG, PNG, WEBP หรือ AVIF ขนาดไม่เกิน 5MB ต่อรูป</p>
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <label class="block text-sm font-medium text-gray-700">Current Images</label>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700">{{ $news->images->count() }} Files</span>
                    </div>

                    @if($news->images->count())
                        <div class="grid gap-4 sm:grid-cols-2">
                            @foreach($news->images as $image)
                                <div class="group relative overflow-hidden rounded-xl border border-gray-200">
                                    <img src="{{ Storage::url($image->path) }}" alt="{{ $image->alt ?: $news->title }}" class="h-40 w-full object-cover transition duration-300 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 transition duration-300 group-hover:opacity-100 flex items-center justify-center">
                                        <button type="button" onclick="document.getElementById('delete-img-{{ $image->id }}').submit();" class="rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white shadow-sm hover:bg-red-700">
                                            Delete Image
                                        </button>
                                    </div>
                                    <div class="bg-gray-50 p-3">
                                        <p class="truncate text-xs text-gray-600" title="{{ $image->alt ?: 'No alt text' }}">{{ $image->alt ?: 'No alt text' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="rounded-lg border border-dashed border-gray-300 bg-gray-50 py-8 text-center">
                            <p class="text-sm text-gray-500">ยังไม่มีรูปภาพประกอบ</p>
                        </div>
                    @endif
                </div>
            </form>

            {{-- Hidden Forms for Image Deletion --}}
            @foreach($news->images as $image)
                <form id="delete-img-{{ $image->id }}" method="POST" action="{{ route('admin.news-images.destroy', $image) }}" onsubmit="return confirm('ยืนยันลบเฉพาะรูปภาพนี้? ข่าวจะยังคงอยู่')">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        </div>

        {{-- Right Column: Settings & Actions --}}
        <div class="lg:col-span-1 space-y-6 relative">
            <div class="sticky top-6 space-y-6">
                
                {{-- Publish Settings --}}
                <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 border-b pb-3">Publish Settings</h2>
                    
                    <div class="space-y-5">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">Status</label>
                            <select form="edit-news-form" name="is_active" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="1" @selected(old('is_active', $news->is_active ? '1' : '0') === '1')>🟢 Active (แสดงบนเว็บไซต์)</option>
                                <option value="0" @selected(old('is_active', $news->is_active ? '1' : '0') === '0')>⚪ Hidden (ซ่อนจากเว็บไซต์)</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">Category <span class="text-red-500">*</span></label>
                            <select form="edit-news-form" name="category_id" required class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $news->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-700">Published Date</label>
                            <input form="edit-news-form" type="datetime-local" name="published_at" value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <button form="edit-news-form" type="submit" class="w-full rounded-lg bg-gray-900 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 transition">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.news.index') }}" class="w-full text-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>

                {{-- Danger Zone --}}
                <div class="rounded-xl border border-red-200 bg-red-50 p-6 shadow-sm">
                    <h2 class="text-sm font-semibold text-red-700 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        Danger Zone
                    </h2>
                    <p class="mt-2 text-xs text-red-600">การลบ News จะลบข้อมูลและรูปภาพทั้งหมดอย่างถาวร ไม่สามารถกู้คืนได้</p>
                    
                    <form method="POST" action="{{ route('admin.news.destroy', $news) }}" class="mt-4" onsubmit="return confirm('ยืนยันลบ News นี้? ข้อมูลและรูปภาพทั้งหมดจะถูกลบถาวร')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full rounded-lg border border-red-300 bg-white px-4 py-2.5 text-sm font-semibold text-red-600 hover:bg-red-600 hover:text-white transition">
                            Delete Entire News
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection