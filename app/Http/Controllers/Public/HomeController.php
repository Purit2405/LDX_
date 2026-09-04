<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\News;
use App\Models\Project;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Public Homepage
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | About Us
        |--------------------------------------------------------------------------
        | เอาข้อมูล About Us ที่เปิดใช้งาน
        | ถ้าไม่มีข้อมูล จะได้ null และ Blade จะใช้ข้อมูล fallback
        |--------------------------------------------------------------------------
        */
        $about = AboutUs::where('is_active', true)->first();

        /*
        |--------------------------------------------------------------------------
        | Services
        |--------------------------------------------------------------------------
        | แสดงเฉพาะ Service ที่เปิดใช้งาน
        | โหลด Category และ Images มาพร้อมกัน
        |--------------------------------------------------------------------------
        */
        $services = Service::where('is_active', true)
            ->with([
                'category',
                'images' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order');
                },
            ])
            ->orderByDesc('publish_date')
            ->take(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Projects
        |--------------------------------------------------------------------------
        | แสดงเฉพาะ Project ที่เปิดใช้งาน
        | โหลด Category และ Images
        |--------------------------------------------------------------------------
        */
        $projects = Project::where('is_active', true)
            ->with([
                'category',
                'images',
            ])
            ->orderByDesc('project_date')
            ->take(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Certificates
        |--------------------------------------------------------------------------
        */
        $certificates = Certificate::where('is_active', true)
            ->orderByDesc('issued_date')
            ->take(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Clients
        |--------------------------------------------------------------------------
        */
        $clients = Client::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | News
        |--------------------------------------------------------------------------
        | เอาข่าวที่เปิดใช้งาน
        | เรียงจากข่าวล่าสุด
        |--------------------------------------------------------------------------
        */
        $news = News::where('is_active', true)
            ->with([
                'category',
                'images',
            ])
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | ส่งข้อมูลไป Home View
        |--------------------------------------------------------------------------
        */
        return view('home.index', compact(
            'about',
            'services',
            'projects',
            'certificates',
            'clients',
            'news'
        ));
    }
}