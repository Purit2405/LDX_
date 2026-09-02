<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    /**
     * แสดงแบบฟอร์มขอใบเสนอราคา
     */
    public function create()
    {
        return view('quote.create');
    }

    /**
     * บันทึกคำขอใบเสนอราคา
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'full_name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'email' => [
                    'nullable',
                    'email',
                    'max:255',
                ],

                'phone' => [
                    'required',
                    'string',
                    'max:30',
                ],

                'floor_count' => [
                    'nullable',
                    'integer',
                    'min:1',
                    'max:200',
                ],

                'contact_time' => [
                    'nullable',
                    'string',
                    'max:100',
                ],

                'installation_province' => [
                    'nullable',
                    'string',
                    'max:100',
                ],

                'details' => [
                    'required',
                    'string',
                    'max:10000',
                ],
            ],
            [
                'full_name.required' => 'กรุณากรอกชื่อ - นามสกุล',

                'email.email' => 'กรุณากรอกอีเมลให้ถูกต้อง',

                'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',

                'floor_count.integer' => 'จำนวนชั้นต้องเป็นตัวเลข',
                'floor_count.min' => 'จำนวนชั้นต้องมากกว่า 0',

                'details.required' => 'กรุณาระบุรายละเอียดเพิ่มเติม',
                'details.max' => 'รายละเอียดเพิ่มเติมยาวเกินไป',
            ]
        );

        QuoteRequest::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
            'floor_count' => $validated['floor_count'] ?? null,
            'contact_time' => $validated['contact_time'] ?? null,
            'installation_province' => $validated['installation_province'] ?? null,
            'details' => $validated['details'],
            'status' => 'pending',
        ]);

        return redirect()
            ->route('quote.create')
            ->with(
                'success',
                'ส่งคำขอใบเสนอราคาสำเร็จ ทางบริษัทจะติดต่อกลับโดยเร็วที่สุด'
            );
    }
}