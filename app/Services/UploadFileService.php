<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class UploadFileService implements UploadFileServiceInterface
{
    function uploadFile($data)
    {
        $uploadedFile = $data;
        $filename = time().$uploadedFile->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'uploads/',
            $uploadedFile,
            $filename
        );
        return $filename;
    }
}

