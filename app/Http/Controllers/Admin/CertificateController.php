<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    /**
     * Display certificates.
     */
    public function index()
    {
        $certificates = Certificate::orderBy('name')
            ->paginate(10);

        return view(
            'admin.about.certificates.index',
            compact('certificates')
        );
    }


    /**
     * Show create form.
     */
    public function create()
    {
        return view(
            'admin.about.certificates.create'
        );
    }


    /**
     * Store certificate.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'certificate_number' => [
                'nullable',
                'string',
                'max:255',
            ],

            'issuer' => [
                'nullable',
                'string',
                'max:255',
            ],

            'issued_date' => [
                'nullable',
                'date',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'required',
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
        | Upload Certificate Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('certificates', 'public');
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
        | Create Certificate
        |--------------------------------------------------------------------------
        */

        Certificate::create($validated);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.about.certificates.index')
            ->with(
                'success',
                'เพิ่ม Certificate สำเร็จ'
            );
    }


    /**
     * Show edit form.
     */
    public function edit(Certificate $certificate)
    {
        return view(
            'admin.about.certificates.edit',
            compact('certificate')
        );
    }


    /**
     * Update certificate.
     */
    public function update(
        Request $request,
        Certificate $certificate
    ) {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'certificate_number' => [
                'nullable',
                'string',
                'max:255',
            ],

            'issuer' => [
                'nullable',
                'string',
                'max:255',
            ],

            'issued_date' => [
                'nullable',
                'date',
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

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Replace Certificate Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $certificate->image &&
                Storage::disk('public')->exists(
                    $certificate->image
                )
            ) {
                Storage::disk('public')->delete(
                    $certificate->image
                );
            }


            // Upload new image
            $validated['image'] = $request
                ->file('image')
                ->store('certificates', 'public');
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
        | Update Certificate
        |--------------------------------------------------------------------------
        */

        $certificate->update($validated);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.about.certificates.index')
            ->with(
                'success',
                'แก้ไข Certificate สำเร็จ'
            );
    }


    /**
     * Delete certificate.
     */
    public function destroy(Certificate $certificate)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Certificate Image
        |--------------------------------------------------------------------------
        */

        if (
            $certificate->image &&
            Storage::disk('public')->exists(
                $certificate->image
            )
        ) {
            Storage::disk('public')->delete(
                $certificate->image
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Record
        |--------------------------------------------------------------------------
        */

        $certificate->delete();


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.about.certificates.index')
            ->with(
                'success',
                'ลบ Certificate สำเร็จ'
            );
    }


    /**
     * Toggle active status.
     */
    public function toggle(Certificate $certificate)
    {
        $certificate->update([
            'is_active' => !$certificate->is_active,
        ]);

        return back()->with(
            'success',
            'เปลี่ยนสถานะ Certificate สำเร็จ'
        );
    }
}