<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    /**
     * รายการหมวดหมู่ Project
     */
    public function index()
    {
        $categories = ProjectCategory::orderBy('name')
            ->paginate(10);

        return view(
            'admin.projects.categories.index',
            compact('categories')
        );
    }

    /**
     * หน้าเพิ่มหมวดหมู่
     */
    public function create()
    {
        return view(
            'admin.projects.categories.create'
        );
    }

    /**
     * บันทึกหมวดหมู่
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
                'unique:project_categories,slug',
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

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);

        $validated['is_active'] =
            $request->boolean('is_active');

        ProjectCategory::create($validated);

        return redirect()
            ->route('admin.project-categories.index')
            ->with(
                'success',
                'สร้างหมวดหมู่ Project เรียบร้อยแล้ว'
            );
    }

    /**
     * หน้าแก้ไข
     */
    public function edit(ProjectCategory $projectCategory)
    {
        return view(
            'admin.projects.categories.edit',
            compact('projectCategory')
        );
    }

    /**
     * Update
     */
    public function update(
        Request $request,
        ProjectCategory $projectCategory
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
                'unique:project_categories,slug,' .
                    $projectCategory->id,
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

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);

        $validated['is_active'] =
            $request->boolean('is_active');

        $projectCategory->update($validated);

        return redirect()
            ->route('admin.project-categories.index')
            ->with(
                'success',
                'แก้ไขหมวดหมู่ Project เรียบร้อยแล้ว'
            );
    }

    /**
     * Delete
     */
    public function destroy(
        ProjectCategory $projectCategory
    ) {
        if ($projectCategory->projects()->exists()) {

            return redirect()
                ->route('admin.project-categories.index')
                ->with(
                    'error',
                    'ไม่สามารถลบหมวดหมู่นี้ได้ เนื่องจากมี Project ใช้งานอยู่'
                );
        }

        $projectCategory->delete();

        return redirect()
            ->route('admin.project-categories.index')
            ->with(
                'success',
                'ลบหมวดหมู่ Project เรียบร้อยแล้ว'
            );
    }
    
}
