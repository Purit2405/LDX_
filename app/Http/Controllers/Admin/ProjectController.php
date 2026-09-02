<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Index
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Project::with('category')
            ->withCount('images')
            ->latest();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('client', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category_id')) {

            $query->where(
                'category_id',
                $request->category_id
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'is_active',
                $request->status
            );
        }

        $projects = $query
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = ProjectCategory::orderBy('name')
            ->get();

        return view(
            'admin.projects.index',
            compact(
                'projects',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categories = ProjectCategory::orderBy('name')
            ->get();

        return view(
            'admin.projects.create',
            compact('categories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'category_id' => [
                'required',
                'exists:project_categories,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:projects,slug',
            ],

            'client' => [
                'nullable',
                'string',
                'max:255',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
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

            'project_date' => [
                'nullable',
                'date',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],

            'images' => [
                'nullable',
                'array',
            ],

            'images.*' => [
                'image',
                'mimes:jpeg,jpg,png,webp,avif',
                'max:5120',
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $slug = $validated['slug'] ?? null;

        if (empty($slug)) {

            $slug = Str::slug(
                $validated['title']
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Prevent Empty / Duplicate Slug
        |--------------------------------------------------------------------------
        */

        if (empty($slug)) {

            return back()
                ->withInput()
                ->withErrors([
                    'slug' => 'ไม่สามารถสร้าง Slug จากชื่อ Project ได้',
                ]);
        }

        $originalSlug = $slug;
        $counter = 1;

        while (
            Project::where('slug', $slug)->exists()
        ) {

            $slug = $originalSlug . '-' . $counter;

            $counter++;
        }

        /*
        |--------------------------------------------------------------------------
        | Create Project
        |--------------------------------------------------------------------------
        */

        $project = Project::create([

            'category_id' => $validated['category_id'],

            'title' => $validated['title'],

            'slug' => $slug,

            'client' => $validated['client'] ?? null,

            'location' => $validated['location'] ?? null,

            'short_description' =>
                $validated['short_description'] ?? null,

            'content' =>
                $validated['content'] ?? null,

            'project_date' =>
                $validated['project_date'] ?? null,

            'is_active' =>
                $validated['is_active'] ?? true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Images
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store(
                    'projects',
                    'public'
                );

                ProjectImage::create([

                    'project_id' => $project->id,

                    'path' => $path,

                    'alt' => $project->title,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'เพิ่ม Project เรียบร้อยแล้ว'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit(Project $project)
    {
        $project->load('images');

        $categories = ProjectCategory::orderBy('name')
            ->get();

        return view(
            'admin.projects.edit',
            compact(
                'project',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Project $project
    ) {

        $validated = $request->validate([

            'category_id' => [
                'required',
                'exists:project_categories,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:projects,slug,' . $project->id,
            ],

            'client' => [
                'nullable',
                'string',
                'max:255',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
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

            'project_date' => [
                'nullable',
                'date',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],

            'images' => [
                'nullable',
                'array',
            ],

            'images.*' => [
                'image',
                'mimes:jpeg,jpg,png,webp,avif',
                'max:5120',
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $slug = $validated['slug'] ?? null;

        if (empty($slug)) {

            $slug = Str::slug(
                $validated['title']
            );
        }

        if (empty($slug)) {

            return back()
                ->withInput()
                ->withErrors([
                    'slug' => 'ไม่สามารถสร้าง Slug จากชื่อ Project ได้',
                ]);
        }

        $originalSlug = $slug;
        $counter = 1;

        while (
            Project::where('slug', $slug)
                ->where('id', '!=', $project->id)
                ->exists()
        ) {

            $slug = $originalSlug . '-' . $counter;

            $counter++;
        }

        /*
        |--------------------------------------------------------------------------
        | Update Project
        |--------------------------------------------------------------------------
        */

        $project->update([

            'category_id' =>
                $validated['category_id'],

            'title' =>
                $validated['title'],

            'slug' =>
                $slug,

            'client' =>
                $validated['client'] ?? null,

            'location' =>
                $validated['location'] ?? null,

            'short_description' =>
                $validated['short_description'] ?? null,

            'content' =>
                $validated['content'] ?? null,

            'project_date' =>
                $validated['project_date'] ?? null,

            'is_active' =>
                $validated['is_active'] ?? true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Add New Images
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store(
                    'projects',
                    'public'
                );

                ProjectImage::create([

                    'project_id' =>
                        $project->id,

                    'path' =>
                        $path,

                    'alt' =>
                        $project->title,
                ]);
            }
        }

        return redirect()
            ->route(
                'admin.projects.edit',
                $project
            )
            ->with(
                'success',
                'แก้ไข Project เรียบร้อยแล้ว'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Destroy Project
    |--------------------------------------------------------------------------
    */

    public function destroy(Project $project)
    {
        $project->load('images');

        /*
        |--------------------------------------------------------------------------
        | Delete Images From Storage
        |--------------------------------------------------------------------------
        */

        foreach ($project->images as $image) {

            if (
                $image->path &&
                Storage::disk('public')->exists(
                    $image->path
                )
            ) {

                Storage::disk('public')->delete(
                    $image->path
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Image Records
        |--------------------------------------------------------------------------
        */

        $project->images()->delete();

        /*
        |--------------------------------------------------------------------------
        | Delete Project
        |--------------------------------------------------------------------------
        */

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with(
                'success',
                'ลบ Project เรียบร้อยแล้ว'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Toggle Active
    |--------------------------------------------------------------------------
    */

    public function toggle(Project $project)
    {
        $project->update([

            'is_active' =>
                !$project->is_active,
        ]);

        return back()
            ->with(
                'success',
                $project->is_active
                    ? 'เปิด Project แล้ว'
                    : 'ซ่อน Project แล้ว'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Destroy Image
    |--------------------------------------------------------------------------
    */

    public function destroyImage(
        ProjectImage $projectImage
    ) {

        /*
        |--------------------------------------------------------------------------
        | Delete File
        |--------------------------------------------------------------------------
        */

        if (
            $projectImage->path &&
            Storage::disk('public')->exists(
                $projectImage->path
            )
        ) {

            Storage::disk('public')->delete(
                $projectImage->path
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Image Record ONLY
        |--------------------------------------------------------------------------
        */

        $project = $projectImage->project;

        $projectImage->delete();

        return redirect()
            ->route(
                'admin.projects.edit',
                $project
            )
            ->with(
                'success',
                'ลบรูปภาพเรียบร้อยแล้ว'
            );
    }
}