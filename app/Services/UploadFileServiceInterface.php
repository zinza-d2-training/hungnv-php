<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

interface UploadFileServiceInterface
{
    public function uploadFile(UploadedFile $file, string $path);
}
