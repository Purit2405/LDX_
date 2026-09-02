<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceImage;
use Illuminate\Support\Facades\Storage;

class ServiceImageController extends Controller
{
    /**
     * Delete Service Image
     */
    public function destroy(ServiceImage $serviceImage)
    {
        // ลบไฟล์รูปจาก storage
        if ($serviceImage->path) {

            Storage::disk('public')
                ->delete($serviceImage->path);
        }

        // ลบข้อมูลรูปจาก database
        $serviceImage->delete();

        return redirect()
            ->route(
                'admin.services.edit',
                $serviceImage->service_id
            )
            ->with(
                'success',
                'ลบรูปภาพเรียบร้อยแล้ว'
            );
    }
}