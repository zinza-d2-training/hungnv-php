<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class UploadFileService implements UploadFileServiceInterface
{
    public function uploadFile(UploadedFile $file, $path)
    {
        $filename = time() . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs(
            'uploads/'.$path.'/',
            $file,
            $filename
        );
        return $filename;
    }
}

