<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutTimeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutTimelineController extends Controller
{
    /**
     * Display timeline list.
     */
    public function index()
    {
        $timelines = AboutTimeline::orderBy('sort_order')
            ->orderBy('year')
            ->paginate(10);

        return view(
            'admin.about.timeline.index',
            compact('timelines')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.about.timeline.create');
    }

    /**
     * Store timeline.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => [
                'required',
                'string',
                'max:50',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:5120',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('about/timeline', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] = $request->boolean('is_active');

        /*
        |--------------------------------------------------------------------------
        | Sort Order
        |--------------------------------------------------------------------------
        */

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        /*
        |--------------------------------------------------------------------------
        | Create
        |--------------------------------------------------------------------------
        */

        AboutTimeline::create($validated);

        return redirect()
            ->route('admin.about-timeline.index')
            ->with(
                'success',
                'เพิ่ม Timeline สำเร็จ'
            );
    }

    /**
     * Show edit form.
     */
    public function edit(AboutTimeline $aboutTimeline)
    {
        return view(
            'admin.about.timeline.edit',
            compact('aboutTimeline')
        );
    }

    /**
     * Update timeline.
     */
    public function update(
        Request $request,
        AboutTimeline $aboutTimeline
    ) {
        $validated = $request->validate([
            'year' => [
                'required',
                'string',
                'max:50',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:5120',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Replace Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            if (
                $aboutTimeline->image &&
                Storage::disk('public')->exists(
                    $aboutTimeline->image
                )
            ) {
                Storage::disk('public')->delete(
                    $aboutTimeline->image
                );
            }

            $validated['image'] = $request
                ->file('image')
                ->store('about/timeline', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $validated['is_active'] = $request->boolean('is_active');

        /*
        |--------------------------------------------------------------------------
        | Sort Order
        |--------------------------------------------------------------------------
        */

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;

        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $aboutTimeline->update($validated);

        return redirect()
            ->route('admin.about-timeline.index')
            ->with(
                'success',
                'แก้ไข Timeline สำเร็จ'
            );
    }

    /**
     * Delete timeline.
     */
    public function destroy(AboutTimeline $aboutTimeline)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Image
        |--------------------------------------------------------------------------
        */

        if (
            $aboutTimeline->image &&
            Storage::disk('public')->exists(
                $aboutTimeline->image
            )
        ) {
            Storage::disk('public')->delete(
                $aboutTimeline->image
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Record
        |--------------------------------------------------------------------------
        */

        $aboutTimeline->delete();

        return redirect()
            ->route('admin.about-timeline.index')
            ->with(
                'success',
                'ลบ Timeline สำเร็จ'
            );
    }

    /**
     * Toggle active status.
     */
    public function toggle(AboutTimeline $aboutTimeline)
    {
        $aboutTimeline->update([
            'is_active' => !$aboutTimeline->is_active,
        ]);

        return back()->with(
            'success',
            'เปลี่ยนสถานะ Timeline สำเร็จ'
        );
    }
}