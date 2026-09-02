<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use App\Models\Service;
use App\Models\Project;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Main Statistics
        |--------------------------------------------------------------------------
        */

        $servicesCount = Service::count();

        $projectsCount = Project::count();

        $newsCount = News::count();

        $quoteRequestsCount = QuoteRequest::count();


        /*
        |--------------------------------------------------------------------------
        | Quote Request Statistics
        |--------------------------------------------------------------------------
        */

        $pendingQuotes = QuoteRequest::where('status', 'pending')->count();

        $contactedQuotes = QuoteRequest::where('status', 'contacted')->count();

        $quotedQuotes = QuoteRequest::where('status', 'quoted')->count();

        $completedQuotes = QuoteRequest::where('status', 'completed')->count();

        $cancelledQuotes = QuoteRequest::where('status', 'cancelled')->count();


        /*
        |--------------------------------------------------------------------------
        | Recent Quote Requests
        |--------------------------------------------------------------------------
        */

        $recentQuoteRequests = QuoteRequest::latest()
            ->limit(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Recent News
        |--------------------------------------------------------------------------
        */

        $recentNews = News::latest()
            ->limit(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Return Dashboard
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', compact(
            'servicesCount',
            'projectsCount',
            'newsCount',
            'quoteRequestsCount',

            'pendingQuotes',
            'contactedQuotes',
            'quotedQuotes',
            'completedQuotes',
            'cancelledQuotes',

            'recentQuoteRequests',
            'recentNews'
        ));
    }
}
