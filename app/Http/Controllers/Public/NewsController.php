<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $categories = NewsCategory::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $query = News::query()
            ->with([
                'category',
                'images',
            ])
            ->where('is_active', true);

        $selectedCategory = $request->query('category');

        if ($selectedCategory) {
            $query->whereHas('category', function ($categoryQuery) use ($selectedCategory) {
                $categoryQuery
                    ->where('slug', $selectedCategory)
                    ->where('is_active', true);
            });
        }

        $news = $query
            ->orderByDesc('published_at')
            ->get();

        $currentCategory = null;

        if ($selectedCategory) {
            $currentCategory = $categories
                ->firstWhere('slug', $selectedCategory);
        }

        return view('public.news', compact(
            'news',
            'categories',
            'currentCategory',
            'selectedCategory'
        ));
    }

    public function show(string $slug)
    {
        $article = News::query()
            ->with([
                'category',
                'images',
            ])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedNews = News::query()
            ->with([
                'category',
                'images',
            ])
            ->where('is_active', true)
            ->where('id', '!=', $article->id)
            ->where('category_id', $article->category_id)
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        return view('public.news-detail', compact(
            'article',
            'relatedNews'
        ));
    }
}