<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::with('category');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where(
                'category_id',
                $request->category_id
            );
        }

        if ($request->filled('is_active')) {
            $query->where(
                'is_active',
                $request->is_active
            );
        }

        $news = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = NewsCategory::orderBy('name')->get();

        return view(
            'admin.news.index',
            compact('news', 'categories')
        );
    }


    public function create()
    {
        $categories = NewsCategory::orderBy('name')->get();

        return view(
            'admin.news.create',
            compact('categories')
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news,slug',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',

            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp,avif|max:5120',
        ]);

        $slug = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $slug = $this->uniqueSlug($slug);

        $news = News::create([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'short_description' => $validated['short_description'] ?? null,
            'content' => $validated['content'] ?? null,
            'published_at' => $validated['published_at'] ?? null,
            'is_active' => $request->boolean('is_active'),
        ]);

        $this->uploadImages($request, $news);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'สร้าง News สำเร็จ');
    }


    public function edit(News $news)
    {
        $news->load('images');

        $categories = NewsCategory::orderBy('name')->get();

        return view(
            'admin.news.edit',
            compact('news', 'categories')
        );
    }


    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news,slug,' . $news->id,
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',

            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp,avif|max:5120',
        ]);

        if (!empty($validated['slug'])) {
            $slug = Str::slug($validated['slug']);
        } else {
            $slug = Str::slug($validated['title']);
        }

        $slug = $this->uniqueSlug(
            $slug,
            $news->id
        );

        $news->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'short_description' => $validated['short_description'] ?? null,
            'content' => $validated['content'] ?? null,
            'published_at' => $validated['published_at'] ?? null,
            'is_active' => $request->boolean('is_active'),
        ]);

        $this->uploadImages($request, $news);

        return redirect()
            ->route('admin.news.edit', $news)
            ->with('success', 'แก้ไข News สำเร็จ');
    }


    public function destroy(News $news)
    {
        foreach ($news->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'ลบ News สำเร็จ');
    }


    public function toggle(News $news)
    {
        $news->update([
            'is_active' => !$news->is_active,
        ]);

        return back()->with(
            'success',
            $news->is_active
                ? 'เปิด News แล้ว'
                : 'ซ่อน News แล้ว'
        );
    }


    public function destroyImage(NewsImage $newsImage)
    {
        Storage::disk('public')->delete(
            $newsImage->path
        );

        $newsImage->delete();

        return back()->with(
            'success',
            'ลบรูปภาพสำเร็จ'
        );
    }


    private function uploadImages(
        Request $request,
        News $news
    ): void {
        if (!$request->hasFile('images')) {
            return;
        }

        foreach ($request->file('images') as $file) {
            $path = $file->store(
                'news',
                'public'
            );

            $news->images()->create([
                'path' => $path,
                'alt' => $news->title,
            ]);
        }
    }


    private function uniqueSlug(
        string $slug,
        ?int $ignoreId = null
    ): string {
        if ($slug === '') {
            $slug = 'news';
        }

        $original = $slug;
        $counter = 1;

        while (
            News::where('slug', $slug)
                ->when(
                    $ignoreId,
                    fn ($q) => $q->where(
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