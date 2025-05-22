<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadsImages
{
    /**
     * Upload image to storage/app/public/admin/{folder}
     */
public function uploadImage($file, $folder)
{
    $extension = $file->getClientOriginalExtension();
    $filename = Str::uuid() . '.' . $extension; // generates a unique name
    $filePath = "admin/{$folder}/" . $filename;

    Storage::disk('public')->putFileAs("admin/{$folder}", $file, $filename);

    return $filePath;
}


    /**
     * Update image: delete old and upload new to storage/app/public/admin/{folder}
     */
 public function updateImage(?string $oldPath, UploadedFile $newFile, string $folder): string
{
    // Normalize old path: make sure it has 'admin/' prefix or not
    if ($oldPath) {
        // If old path does NOT start with 'admin/', prepend it
        if (!str_starts_with($oldPath, "admin/")) {
            $oldPath = "admin/" . $oldPath;
        }

        if (Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }
    }

    $extension = $newFile->getClientOriginalExtension();
    $filename = Str::uuid() . '.' . $extension;
    $filePath = "admin/{$folder}/" . $filename;

    Storage::disk('public')->putFileAs("admin/{$folder}", $newFile, $filename);

    return $filePath;
}


    /**
     * Delete image from storage/app/public
     */
    public function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
