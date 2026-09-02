<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display Company Profile.
     */
    public function index()
    {
        $about = AboutUs::first();

        return view(
            'admin.about.index',
            compact('about')
        );
    }

    /**
     * Update Company Profile.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'tagline' => [
                'nullable',
                'string',
                'max:255',
            ],

            'short_description' => [
                'nullable',
                'string',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'vision' => [
                'nullable',
                'string',
            ],

            'mission' => [
                'nullable',
                'string',
            ],

            'hero_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:5120',
            ],

            'company_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:5120',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Get Existing About Us
        |--------------------------------------------------------------------------
        */

        $about = AboutUs::first();

        if (!$about) {
            $about = new AboutUs();
        }

        /*
        |--------------------------------------------------------------------------
        | Hero Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('hero_image')) {

            // Delete old image
            if (
                $about->hero_image &&
                Storage::disk('public')->exists($about->hero_image)
            ) {
                Storage::disk('public')
                    ->delete($about->hero_image);
            }

            // Upload new image
            $validated['hero_image'] = $request
                ->file('hero_image')
                ->store('about', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Company Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('company_image')) {

            // Delete old image
            if (
                $about->company_image &&
                Storage::disk('public')->exists($about->company_image)
            ) {
                Storage::disk('public')
                    ->delete($about->company_image);
            }

            // Upload new image
            $validated['company_image'] = $request
                ->file('company_image')
                ->store('about', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Active Status
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] =
            $request->boolean('is_active');

        /*
        |--------------------------------------------------------------------------
        | Save
        |--------------------------------------------------------------------------
        */

        $about->fill($validated);
        $about->save();

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.about.index')
            ->with(
                'success',
                'บันทึกข้อมูล About Us สำเร็จ'
            );
    }
}
