<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\AboutTimeline;
use App\Models\Client;
use App\Models\Certificate;

class AboutController extends Controller
{
    public function index()
    {
        $timelines = AboutTimeline::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('year')
            ->get();

        $clients = Client::query()
            ->where('is_active', true)
            ->latest()
            ->get();

        $certificates = Certificate::query()
            ->where('is_active', true)
            ->latest()
            ->get();

        return view('public.about', compact(
            'timelines',
            'clients',
            'certificates'
        ));
    }
}