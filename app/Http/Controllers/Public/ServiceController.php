<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display public services.
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = ServiceCategory::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Services
        |--------------------------------------------------------------------------
        */

        $query = Service::query()
            ->with([
                'category',
                'images',
            ])
            ->where('is_active', true);


        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        $selectedCategory = $request->query('category');

        if ($selectedCategory) {
            $query->whereHas('category', function ($categoryQuery) use ($selectedCategory) {
                $categoryQuery
                    ->where('slug', $selectedCategory)
                    ->where('is_active', true);
            });
        }


        /*
        |--------------------------------------------------------------------------
        | Services Result
        |--------------------------------------------------------------------------
        */

        $services = $query
    ->latest('publish_date')
    ->get();


        /*
        |--------------------------------------------------------------------------
        | Current Category
        |--------------------------------------------------------------------------
        */

        $currentCategory = null;

        if ($selectedCategory) {
            $currentCategory = $categories
                ->firstWhere('slug', $selectedCategory);
        }


        return view('public.services', compact(
            'services',
            'categories',
            'currentCategory',
            'selectedCategory'
        ));
    }
    /**
 * Display a single public service.
 */
public function show(string $slug)
{
    $service = Service::query()
        ->with([
            'category',
            'images',
        ])
        ->where('slug', $slug)
        ->where('is_active', true)
        ->firstOrFail();

    return view('public.service-detail', compact('service'));
}
}
