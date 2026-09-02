<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    /**
     * Display categories.
     */
    public function index(Request $request)
    {
        $query = NewsCategory::withCount('news');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        // Status Filter
        if ($request->filled('is_active')) {
            $query->where(
                'is_active',
                $request->is_active
            );
        }

        // Pagination
        $categories = $query
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.news.categories.index',
            compact('categories')
        );
    }


    /**
     * Show create form.
     */
    public function create()
    {
        return view(
            'admin.news.categories.create'
        );
    }


    /**
     * Store category.
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
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        $slug = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);

        $slug = $this->uniqueSlug($slug);

        /*
        |--------------------------------------------------------------------------
        | Create
        |--------------------------------------------------------------------------
        */

        NewsCategory::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.news-categories.index')
            ->with(
                'success',
                'สร้างหมวดหมู่ News สำเร็จ'
            );
    }


    /**
     * Show edit form.
     */
    public function edit(NewsCategory $newsCategory)
    {
        return view(
            'admin.news.categories.edit',
            compact('newsCategory')
        );
    }


    /**
     * Update category.
     */
    public function update(
        Request $request,
        NewsCategory $newsCategory
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
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        $slug = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);

        $slug = $this->uniqueSlug(
            $slug,
            $newsCategory->id
        );

        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $newsCategory->update([
            'name' => $validated['name'],
            'slug' => $slug,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.news-categories.index')
            ->with(
                'success',
                'แก้ไขหมวดหมู่ News สำเร็จ'
            );
    }


    /**
     * Delete category.
     */
    public function destroy(
        NewsCategory $newsCategory
    ) {
        /*
        |--------------------------------------------------------------------------
        | Prevent Delete When News Exists
        |--------------------------------------------------------------------------
        */

        if ($newsCategory->news()->exists()) {
            return back()->with(
                'error',
                'ไม่สามารถลบหมวดหมู่นี้ได้ เพราะมี News อยู่ในหมวดหมู่นี้'
            );
        }

        $newsCategory->delete();

        return redirect()
            ->route('admin.news-categories.index')
            ->with(
                'success',
                'ลบหมวดหมู่ News สำเร็จ'
            );
    }


    /**
     * Toggle Active / Hidden.
     */
    public function toggle(
        NewsCategory $newsCategory
    ) {
        $newsCategory->update([
            'is_active' => !$newsCategory->is_active,
        ]);

        return back()->with(
            'success',
            $newsCategory->is_active
                ? 'เปิดใช้งานหมวดหมู่แล้ว'
                : 'ซ่อนหมวดหมู่แล้ว'
        );
    }


    /**
     * Generate unique slug.
     */
    private function uniqueSlug(
        string $slug,
        ?int $ignoreId = null
    ): string {
        if ($slug === '') {
            $slug = 'news-category';
        }

        $original = $slug;
        $counter = 1;

        while (
            NewsCategory::where('slug', $slug)
                ->when(
                    $ignoreId,
                    fn ($query) =>
                        $query->where(
                            'id',
                            '!=',
                            $ignoreId
                        )
                )
                ->exists()
        ) {
            $slug = $original . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
