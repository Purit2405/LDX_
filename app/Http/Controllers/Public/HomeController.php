<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\News;

class HomeController extends Controller
{
    /**
     * หน้าแรกเว็บไซต์
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | SERVICES
        |--------------------------------------------------------------------------
        */

        $services = Service::query()
            ->with([
                'category',
                'images',
            ])
            ->where('is_active', true)
            ->latest('publish_date')
            ->limit(4)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | PROJECTS
        |--------------------------------------------------------------------------
        */

        $projects = Project::query()
            ->with([
                'category',
                'images',
            ])
            ->where('is_active', true)
            ->latest('project_date')
            ->limit(3)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | NEWS
        |--------------------------------------------------------------------------
        */

        $news = News::query()
            ->with([
                'category',
                'images',
            ])
            ->where('is_active', true)
            ->latest('published_at')
            ->limit(3)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RETURN HOME
        |--------------------------------------------------------------------------
        */

        return view('public.index', compact(
            'services',
            'projects',
            'news'
        ));
    }
}