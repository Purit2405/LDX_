<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of service categories.
     */
    public function index(Request $request)
    {
        $query = ServiceCategory::query();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere(
                        'description',
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
        */

        $categories = $query
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.services.categories.index',
            compact('categories')
        );
    }


    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view(
            'admin.services.categories.create'
        );
    }


    /**
     * Store a newly created category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:service_categories,slug',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);


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
        | Create
        |--------------------------------------------------------------------------
        */

        ServiceCategory::create($validated);


        return redirect()
            ->route('admin.service-categories.index')
            ->with(
                'success',
                'สร้างหมวดหมู่บริการเรียบร้อยแล้ว'
            );
    }


    /**
     * Show the form for editing the specified category.
     */
    public function edit(
        ServiceCategory $serviceCategory
    ) {
        return view(
            'admin.services.categories.edit',
            compact('serviceCategory')
        );
    }


    /**
     * Update the specified category.
     */
    public function update(
        Request $request,
        ServiceCategory $serviceCategory
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:service_categories,slug,' . $serviceCategory->id,
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);


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
        | Update
        |--------------------------------------------------------------------------
        */

        $serviceCategory->update($validated);


        return redirect()
            ->route('admin.service-categories.index')
            ->with(
                'success',
                'แก้ไขหมวดหมู่บริการเรียบร้อยแล้ว'
            );
    }


    /**
     * Remove the specified category.
     */
    public function destroy(
        ServiceCategory $serviceCategory
    ) {
        /*
        |--------------------------------------------------------------------------
        | Prevent deleting category if services are using it
        |--------------------------------------------------------------------------
        */

        if ($serviceCategory->services()->exists()) {

            return redirect()
                ->route('admin.service-categories.index')
                ->with(
                    'error',
                    'ไม่สามารถลบหมวดหมู่นี้ได้ เนื่องจากมีบริการใช้งานอยู่'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete
        |--------------------------------------------------------------------------
        */

        $serviceCategory->delete();


        return redirect()
            ->route('admin.service-categories.index')
            ->with(
                'success',
                'ลบหมวดหมู่บริการเรียบร้อยแล้ว'
            );
    }


    /**
     * Toggle category active status.
     */
    public function toggle(
        ServiceCategory $serviceCategory
    ) {
        $serviceCategory->update([
            'is_active' => !$serviceCategory->is_active,
        ]);


        $message = $serviceCategory->is_active
            ? 'เปิดการแสดงหมวดหมู่แล้ว'
            : 'ปิดการแสดงหมวดหมู่แล้ว';


        return redirect()
            ->back()
            ->with(
                'success',
                $message
            );
    }
}