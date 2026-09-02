<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * ============================================================
     * รายการ Services
     * ============================================================
     */
    public function index(Request $request)
    {
        $query = Service::with([
            'category',
            'images',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere(
                        'short_description',
                        'like',
                        "%{$search}%"
                    );
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($request->status === 'active') {
            $query->where('is_active', true);
        }

        if ($request->status === 'hidden') {
            $query->where('is_active', false);
        }

        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        |
        | ไม่มี sort_order แล้ว
        |
        */

        $services = $query
            ->orderByDesc('publish_date')
            ->orderBy('title')
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.services.index',
            compact('services')
        );
    }


    /**
     * ============================================================
     * หน้าเพิ่ม Service
     * ============================================================
     */
    public function create()
    {
        $categories = ServiceCategory::where(
            'is_active',
            true
        )
            ->orderBy('name')
            ->get();

        return view(
            'admin.services.create',
            compact('categories')
        );
    }


    /**
     * ============================================================
     * บันทึก Service
     * ============================================================
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | Category
            |--------------------------------------------------------------------------
            */

            'category_id' => [
                'required',
                'exists:service_categories,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:services,slug',
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'content' => [
                'nullable',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | Publish Date
            |--------------------------------------------------------------------------
            */

            'publish_date' => [
                'nullable',
                'date',
            ],

            /*
            |--------------------------------------------------------------------------
            | Images
            |--------------------------------------------------------------------------
            */

            'images' => [
                'nullable',
                'array',
                'max:20',
            ],

            'images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:5120',
            ],

            /*
            |--------------------------------------------------------------------------
            | Image Alt
            |--------------------------------------------------------------------------
            */

            'image_alt' => [
                'nullable',
                'array',
            ],

            'image_alt.*' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);


        /*
        |--------------------------------------------------------------------------
        | Active
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] = $request->boolean(
            'is_active'
        );


        /*
        |--------------------------------------------------------------------------
        | Publish Date
        |--------------------------------------------------------------------------
        */

        if (empty($validated['publish_date'])) {
            $validated['publish_date'] = now()->toDateString();
        }


        /*
        |--------------------------------------------------------------------------
        | Create Service
        |--------------------------------------------------------------------------
        */

        $service = Service::create($validated);


        /*
        |--------------------------------------------------------------------------
        | Upload Images
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('images')) {

            foreach (
                $request->file('images') as $index => $image
            ) {

                $path = $image->store(
                    'services/' . now()->format('Y/m'),
                    'public'
                );

                ServiceImage::create([
                    'service_id' => $service->id,

                    'path' => $path,

                    'alt' => $request->input(
                        "image_alt.{$index}"
                    ),
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.services.index')
            ->with(
                'success',
                'เพิ่มบริการเรียบร้อยแล้ว'
            );
    }


    /**
     * ============================================================
     * แสดงรายละเอียด Service
     * ============================================================
     */
    public function show(Service $service)
    {
        $service->load([
            'category',
            'images',
        ]);

        return view(
            'admin.services.show',
            compact('service')
        );
    }


    /**
     * ============================================================
     * หน้าแก้ไข Service
     * ============================================================
     */
    public function edit(Service $service)
    {
        $service->load([
            'category',
            'images',
        ]);

        $categories = ServiceCategory::orderBy('name')
            ->get();

        return view(
            'admin.services.edit',
            compact(
                'service',
                'categories'
            )
        );
    }


    /**
     * ============================================================
     * Update Service
     * ============================================================
     */
    public function update(
        Request $request,
        Service $service
    ) {

        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | Category
            |--------------------------------------------------------------------------
            */

            'category_id' => [
                'required',
                'exists:service_categories,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:services,slug,' . $service->id,
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'content' => [
                'nullable',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | Publish Date
            |--------------------------------------------------------------------------
            */

            'publish_date' => [
                'nullable',
                'date',
            ],

            /*
            |--------------------------------------------------------------------------
            | Images
            |--------------------------------------------------------------------------
            */

            'images' => [
                'nullable',
                'array',
                'max:20',
            ],

            'images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:5120',
            ],

            /*
            |--------------------------------------------------------------------------
            | Image Alt
            |--------------------------------------------------------------------------
            */

            'image_alt' => [
                'nullable',
                'array',
            ],

            'image_alt.*' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);


        /*
        |--------------------------------------------------------------------------
        | Active
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] = $request->boolean(
            'is_active'
        );


        /*
        |--------------------------------------------------------------------------
        | Publish Date
        |--------------------------------------------------------------------------
        */

        if (empty($validated['publish_date'])) {

            $validated['publish_date'] =
                $service->publish_date
                    ? $service->publish_date->format('Y-m-d')
                    : now()->toDateString();
        }


        /*
        |--------------------------------------------------------------------------
        | Update Service
        |--------------------------------------------------------------------------
        */

        $service->update($validated);


        /*
        |--------------------------------------------------------------------------
        | Add New Images
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('images')) {

            foreach (
                $request->file('images') as $index => $image
            ) {

                $path = $image->store(
                    'services/' . now()->format('Y/m'),
                    'public'
                );

                ServiceImage::create([
                    'service_id' => $service->id,

                    'path' => $path,

                    'alt' => $request->input(
                        "image_alt.{$index}"
                    ),
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'admin.services.edit',
                $service
            )
            ->with(
                'success',
                'แก้ไขบริการเรียบร้อยแล้ว'
            );
    }


    /**
     * ============================================================
     * ลบ Service ทั้งโพสต์
     * ============================================================
     *
     * การทำงาน:
     *
     * 1. โหลดรูปทั้งหมดของ Service
     * 2. ลบไฟล์รูปจาก storage
     * 3. ลบ Service
     * 4. service_images จะถูกลบด้วย foreign key cascade
     *
     */
    public function destroy(Service $service)
    {
        $service->load('images');

        /*
        |--------------------------------------------------------------------------
        | Delete Images From Storage
        |--------------------------------------------------------------------------
        */

        foreach ($service->images as $image) {

            if (!empty($image->path)) {

                Storage::disk('public')
                    ->delete($image->path);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Service
        |--------------------------------------------------------------------------
        */

        $service->delete();


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.services.index')
            ->with(
                'success',
                'ลบบริการและรูปภาพทั้งหมดเรียบร้อยแล้ว'
            );
    }


    /**
     * ============================================================
     * เปิด / ปิด Service
     * ============================================================
     */
    public function toggle(Service $service)
    {
        $service->update([
            'is_active' => !$service->is_active,
        ]);


        $message = $service->is_active
            ? 'เปิดการแสดงบริการแล้ว'
            : 'ปิดการแสดงบริการแล้ว';


        return redirect()
            ->back()
            ->with(
                'success',
                $message
            );
    }


    /**
     * ============================================================
     * ลบเฉพาะรูปภาพ
     * ============================================================
     *
     * สำคัญ:
     *
     * ฟังก์ชันนี้จะไม่ลบ Service
     * และไม่ลบรูปอื่น
     *
     * ลบเฉพาะ ServiceImage ที่ส่งเข้ามาเท่านั้น
     *
     */
    public function destroyImage(
        ServiceImage $serviceImage
    ) {

        /*
        |--------------------------------------------------------------------------
        | เก็บ Service ID เอาไว้ก่อนลบ
        |--------------------------------------------------------------------------
        */

        $serviceId = $serviceImage->service_id;


        /*
        |--------------------------------------------------------------------------
        | Delete File From Storage
        |--------------------------------------------------------------------------
        */

        if (!empty($serviceImage->path)) {

            Storage::disk('public')
                ->delete(
                    $serviceImage->path
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Image Database Record
        |--------------------------------------------------------------------------
        */

        $serviceImage->delete();


        /*
        |--------------------------------------------------------------------------
        | กลับไปหน้า Edit ของ Service เดิม
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'admin.services.edit',
                $serviceId
            )
            ->with(
                'success',
                'ลบรูปภาพเรียบร้อยแล้ว'
            );
    }
}
