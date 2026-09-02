<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of clients.
     */
    public function index()
    {
        $clients = Client::orderBy('sort_order')
            ->orderBy('name')
            ->paginate(10);

        return view(
            'admin.about.clients.index',
            compact('clients')
        );
    }

    /**
     * Show the form for creating a new client.
     */
    public function create()
    {
        return view(
            'admin.about.clients.create'
        );
    }

    /**
     * Store a newly created client.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'logo' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:5120',
            ],

            'website' => 'nullable|url|max:255',

            'industry' => 'nullable|string|max:255',

            'description' => 'nullable|string',

            'sort_order' => 'nullable|integer',

            'is_active' => 'nullable|boolean',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request
                ->file('logo')
                ->store('clients', 'public');
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
        | Create Client
        |--------------------------------------------------------------------------
        */

        Client::create($validated);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.about.clients.index')
            ->with(
                'success',
                'เพิ่ม Client สำเร็จ'
            );
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(Client $client)
    {
        return view(
            'admin.about.clients.edit',
            compact('client')
        );
    }

    /**
     * Update the specified client.
     */
    public function update(
        Request $request,
        Client $client
    ) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,avif',
                'max:5120',
            ],

            'website' => 'nullable|url|max:255',

            'industry' => 'nullable|string|max:255',

            'description' => 'nullable|string',

            'sort_order' => 'nullable|integer',

            'is_active' => 'nullable|boolean',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Replace Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            // Delete old logo
            if (
                $client->logo &&
                Storage::disk('public')->exists($client->logo)
            ) {
                Storage::disk('public')
                    ->delete($client->logo);
            }

            // Upload new logo
            $validated['logo'] = $request
                ->file('logo')
                ->store('clients', 'public');
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
        | Update Client
        |--------------------------------------------------------------------------
        */

        $client->update($validated);

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.about.clients.index')
            ->with(
                'success',
                'แก้ไข Client สำเร็จ'
            );
    }

    /**
     * Remove the specified client.
     */
    public function destroy(Client $client)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Logo
        |--------------------------------------------------------------------------
        */

        if (
            $client->logo &&
            Storage::disk('public')->exists($client->logo)
        ) {
            Storage::disk('public')
                ->delete($client->logo);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Client
        |--------------------------------------------------------------------------
        */

        $client->delete();

        return redirect()
            ->route('admin.about.clients.index')
            ->with(
                'success',
                'ลบ Client สำเร็จ'
            );
    }

    /**
     * Toggle active status.
     */
    public function toggle(Client $client)
    {
        $client->update([
            'is_active' => !$client->is_active,
        ]);

        return back()->with(
            'success',
            'เปลี่ยนสถานะ Client สำเร็จ'
        );
    }
}