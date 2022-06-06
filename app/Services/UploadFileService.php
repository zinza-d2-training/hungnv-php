<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class UploadFileService implements UploadFileServiceInterface
{
    public function uploadFile(UploadedFile $file)
    {
        $filename = time() . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'uploads/',
            $file,
            $filename
        );
        return $filename;
    }
}

