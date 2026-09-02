<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    /**
     * รายการคำขอใบเสนอราคา
     */
    public function index(Request $request)
    {
        $query = QuoteRequest::query();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere(
                        'installation_province',
                        'like',
                        "%{$search}%"
                    );
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('status') &&
            in_array(
                $request->status,
                [
                    'pending',
                    'contacted',
                    'quoted',
                    'completed',
                    'cancelled',
                ]
            )
        ) {
            $query->where('status', $request->status);
        }

        /*
        |--------------------------------------------------------------------------
        | Data
        |--------------------------------------------------------------------------
        */

        $quoteRequests = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view(
            'admin.quote-requests.index',
            compact('quoteRequests')
        );
    }

    /**
     * รายละเอียดคำขอ
     */
    public function show(QuoteRequest $quoteRequest)
    {
        return view(
            'admin.quote-requests.show',
            compact('quoteRequest')
        );
    }

    /**
     * เปลี่ยนสถานะ
     */
    public function updateStatus(
        Request $request,
        QuoteRequest $quoteRequest
    ) {
        $validated = $request->validate([
            'status' => [
                'required',
                'in:pending,contacted,quoted,completed,cancelled',
            ],
        ]);

        $quoteRequest->update([
            'status' => $validated['status'],
        ]);

        return back()->with(
            'success',
            'เปลี่ยนสถานะคำขอสำเร็จ'
        );
    }

    /**
     * ลบคำขอ
     */
    public function destroy(QuoteRequest $quoteRequest)
    {
        $quoteRequest->delete();

        return redirect()
            ->route('admin.quote-requests.index')
            ->with(
                'success',
                'ลบคำขอใบเสนอราคาสำเร็จ'
            );
    }
}