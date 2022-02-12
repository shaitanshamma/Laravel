<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\UploadedFile;


class UploadService
{
    public function saveUploadedFile(UploadedFile $file): string
    {
        $link = $file->storeAs('news', $file->hashName(), 'public');

        if (!$link) {
            throw new \Exception('File not loaded');
        }
        return $link;
    }
}
