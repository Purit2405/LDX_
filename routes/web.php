<?php

use Illuminate\Support\Facades\Route;


// ============================================================
// PUBLIC CONTROLLERS
// ============================================================

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ServiceController as PublicServiceController;
use App\Http\Controllers\Public\ProjectController as PublicProjectController;
use App\Http\Controllers\Public\NewsController as PublicNewsController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\QuoteRequestController;


// ============================================================
// ADMIN CONTROLLERS
// ============================================================

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SeoController;

use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;

use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;

use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\AboutTimelineController;

use App\Http\Controllers\Admin\QuoteRequestController as AdminQuoteRequestController;


// ============================================================
// PUBLIC ROUTES
// ============================================================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// ============================================================
// ABOUT
// ============================================================

Route::get('/about', [AboutController::class, 'index'])
    ->name('public.about');


// ============================================================
// SERVICES
// ============================================================

Route::get('/services', [PublicServiceController::class, 'index'])
    ->name('public.services');

Route::get('/services/{slug}', [PublicServiceController::class, 'show'])
    ->name('public.services.show');


// ============================================================
// PROJECTS
// ============================================================

Route::get('/projects', [PublicProjectController::class, 'index'])
    ->name('public.projects');

Route::get('/projects/{slug}', [PublicProjectController::class, 'show'])
    ->name('public.projects.show');


// ============================================================
// NEWS
// ============================================================

Route::get('/news', [PublicNewsController::class, 'index'])
    ->name('public.news');

Route::get('/news/{slug}', [PublicNewsController::class, 'show'])
    ->name('public.news.show');


// ============================================================
// CONTACT
// ============================================================

Route::get('/contact', [ContactController::class, 'index'])
    ->name('public.contact');


// ============================================================
// QUOTATION
// ============================================================

Route::get('/quote', [QuoteRequestController::class, 'create'])
    ->name('public.quote');

Route::post('/quote', [QuoteRequestController::class, 'store'])
    ->name('public.quote.store');


// ============================================================
// ADMIN AUTHENTICATION
// ============================================================

// ------------------------------------------------------------
// Login Page
// ------------------------------------------------------------

Route::get('/admin/login', [
    AuthController::class,
    'showLogin'
])->name('admin.login');


// ------------------------------------------------------------
// Login Submit
// ------------------------------------------------------------

Route::post('/admin/login', [
    AuthController::class,
    'login'
])->name('admin.login.submit');


// ------------------------------------------------------------
// Logout
// ------------------------------------------------------------

Route::post('/admin/logout', [
    AuthController::class,
    'logout'
])->name('admin.logout');


// ============================================================
// ADMIN PANEL
// ============================================================

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        // ========================================================
        // DASHBOARD
        // ========================================================

        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('dashboard');


        // ========================================================
        // SEO
        // ========================================================

        Route::get('/seo', [
            SeoController::class,
            'index'
        ])->name('seo.index');

        Route::put('/seo', [
            SeoController::class,
            'update'
        ])->name('seo.update');


        // ========================================================
        // QUOTE REQUESTS
        // ========================================================

        Route::get(
            '/quote-requests',
            [AdminQuoteRequestController::class, 'index']
        )->name('quote-requests.index');

        Route::get(
            '/quote-requests/{quoteRequest}',
            [AdminQuoteRequestController::class, 'show']
        )->name('quote-requests.show');

        Route::patch(
            '/quote-requests/{quoteRequest}/status',
            [AdminQuoteRequestController::class, 'updateStatus']
        )->name('quote-requests.status');

        Route::delete(
            '/quote-requests/{quoteRequest}',
            [AdminQuoteRequestController::class, 'destroy']
        )->name('quote-requests.destroy');


        // ========================================================
        // SERVICES
        // ========================================================

        Route::resource(
            'service-categories',
            ServiceCategoryController::class
        )->except([
            'show',
        ]);

        Route::resource(
            'services',
            ServiceController::class
        );

        Route::patch(
            '/services/{service}/toggle',
            [ServiceController::class, 'toggle']
        )->name('services.toggle');

        Route::delete(
            '/service-images/{serviceImage}',
            [ServiceController::class, 'destroyImage']
        )->name('service-images.destroy');


        // ========================================================
        // PROJECTS
        // ========================================================

        Route::resource(
            'project-categories',
            ProjectCategoryController::class
        )->except([
            'show',
        ]);

        Route::resource(
            'projects',
            ProjectController::class
        );

        Route::patch(
            '/projects/{project}/toggle',
            [ProjectController::class, 'toggle']
        )->name('projects.toggle');

        Route::delete(
            '/project-images/{projectImage}',
            [ProjectController::class, 'destroyImage']
        )->name('project-images.destroy');


        // ========================================================
        // NEWS
        // ========================================================

        Route::resource(
            'news-categories',
            NewsCategoryController::class
        )->except([
            'show',
        ]);

        Route::patch(
            '/news-categories/{news_category}/toggle',
            [NewsCategoryController::class, 'toggle']
        )->name('news-categories.toggle');

        Route::resource(
            'news',
            NewsController::class
        )->except([
            'show',
        ]);

        Route::patch(
            '/news/{news}/toggle',
            [NewsController::class, 'toggle']
        )->name('news.toggle');

        Route::delete(
            '/news-images/{newsImage}',
            [NewsController::class, 'destroyImage']
        )->name('news-images.destroy');


        // ========================================================
        // ABOUT US
        // ========================================================

        Route::prefix('about')
            ->name('about.')
            ->group(function () {


                // ====================================================
                // COMPANY PROFILE
                // ====================================================

                Route::get(
                    '/',
                    [AboutUsController::class, 'index']
                )->name('index');

                Route::put(
                    '/',
                    [AboutUsController::class, 'update']
                )->name('update');


                // ====================================================
                // COMPANY TIMELINE
                // ====================================================

                Route::get(
                    '/timeline',
                    [AboutTimelineController::class, 'index']
                )->name('timeline.index');

                Route::get(
                    '/timeline/create',
                    [AboutTimelineController::class, 'create']
                )->name('timeline.create');

                Route::post(
                    '/timeline',
                    [AboutTimelineController::class, 'store']
                )->name('timeline.store');

                Route::get(
                    '/timeline/{about_timeline}/edit',
                    [AboutTimelineController::class, 'edit']
                )->name('timeline.edit');

                Route::put(
                    '/timeline/{about_timeline}',
                    [AboutTimelineController::class, 'update']
                )->name('timeline.update');

                Route::delete(
                    '/timeline/{about_timeline}',
                    [AboutTimelineController::class, 'destroy']
                )->name('timeline.destroy');

                Route::patch(
                    '/timeline/{about_timeline}/toggle',
                    [AboutTimelineController::class, 'toggle']
                )->name('timeline.toggle');


                // ====================================================
                // CERTIFICATES
                // ====================================================

                Route::get(
                    '/certificates',
                    [CertificateController::class, 'index']
                )->name('certificates.index');

                Route::get(
                    '/certificates/create',
                    [CertificateController::class, 'create']
                )->name('certificates.create');

                Route::post(
                    '/certificates',
                    [CertificateController::class, 'store']
                )->name('certificates.store');

                Route::get(
                    '/certificates/{certificate}/edit',
                    [CertificateController::class, 'edit']
                )->name('certificates.edit');

                Route::put(
                    '/certificates/{certificate}',
                    [CertificateController::class, 'update']
                )->name('certificates.update');

                Route::delete(
                    '/certificates/{certificate}',
                    [CertificateController::class, 'destroy']
                )->name('certificates.destroy');

                Route::patch(
                    '/certificates/{certificate}/toggle',
                    [CertificateController::class, 'toggle']
                )->name('certificates.toggle');


                // ====================================================
                // CLIENTS
                // ====================================================

                Route::get(
                    '/clients',
                    [ClientController::class, 'index']
                )->name('clients.index');

                Route::get(
                    '/clients/create',
                    [ClientController::class, 'create']
                )->name('clients.create');

                Route::post(
                    '/clients',
                    [ClientController::class, 'store']
                )->name('clients.store');

                Route::get(
                    '/clients/{client}/edit',
                    [ClientController::class, 'edit']
                )->name('clients.edit');

                Route::put(
                    '/clients/{client}',
                    [ClientController::class, 'update']
                )->name('clients.update');

                Route::delete(
                    '/clients/{client}',
                    [ClientController::class, 'destroy']
                )->name('clients.destroy');

                Route::patch(
                    '/clients/{client}/toggle',
                    [ClientController::class, 'toggle']
                )->name('clients.toggle');

            });

    });