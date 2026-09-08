<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display public projects.
     */
    public function index(Request $request)
    {
        $categories = ProjectCategory::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $query = Project::query()
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

        $projects = $query
            ->latest('project_date')
            ->get();

        $currentCategory = null;

        if ($selectedCategory) {
            $currentCategory = $categories
                ->firstWhere('slug', $selectedCategory);
        }

        return view('public.projects', compact(
            'projects',
            'categories',
            'currentCategory',
            'selectedCategory'
        ));
    }


    /**
     * Display a single public project.
     */
    public function show(string $slug)
    {
        $project = Project::query()
            ->with([
                'category',
                'images',
            ])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('public.project-detail', compact('project'));
    }
}