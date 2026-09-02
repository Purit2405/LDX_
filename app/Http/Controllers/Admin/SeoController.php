<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeoController extends Controller
{
    public function index()
    {
        $seo = SeoSetting::first();

        return view('admin.seo.index', compact('seo'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'meta_keywords' => [
                'nullable',
                'string',
                'max:2000',
            ],

            'og_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'og_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'og_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:5120',
            ],

            'google_site_verification' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'bing_site_verification' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'google_analytics_id' => [
                'nullable',
                'string',
                'max:100',
            ],

            'google_tag_manager_id' => [
                'nullable',
                'string',
                'max:100',
            ],

            'canonical_url' => [
                'nullable',
                'url',
                'max:500',
            ],

            'robots' => [
                'required',
                'string',
                'max:100',
            ],
        ]);

        $seo = SeoSetting::first();

        if (!$seo) {
            $seo = new SeoSetting();
        }

        /*
        |--------------------------------------------------------------------------
        | OG Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('og_image')) {

            if (
                $seo->og_image &&
                Storage::disk('public')->exists($seo->og_image)
            ) {
                Storage::disk('public')->delete($seo->og_image);
            }

            $validated['og_image'] = $request
                ->file('og_image')
                ->store('seo', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Save
        |--------------------------------------------------------------------------
        */

        $seo->fill($validated);
        $seo->save();

        return redirect()
            ->route('admin.seo.index')
            ->with('success', 'บันทึกข้อมูล SEO สำเร็จ');
    }
}