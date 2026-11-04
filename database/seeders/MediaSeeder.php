<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first();
        $adminId = $admin ? $admin->id : 1;

        $assetDir = public_path('assets/images');
        $targetDir = storage_path('app/public/media');

        if (!File::isDirectory($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }

        if (!File::isDirectory($assetDir)) {
            return;
        }

        // 1. Ensure assets from public/assets/images are mirrored to storage/app/public/media
        if (File::isDirectory($assetDir)) {
            foreach (File::files($assetDir) as $file) {
                $filename = $file->getFilename();
                $ext = strtolower($file->getExtension());
                if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'])) {
                    continue;
                }
                $dest = $targetDir . DIRECTORY_SEPARATOR . $filename;
                if (!File::exists($dest)) {
                    File::copy($file->getPathname(), $dest);
                }
            }
        }

        // 2. Scan canonical storage/app/public/media and register any files into Media database
        if (File::isDirectory($targetDir)) {
            foreach (File::files($targetDir) as $file) {
                try {
                    $pathname = $file->getPathname();
                    if (!@file_exists($pathname)) {
                        continue;
                    }
                    $filename = $file->getFilename();
                    $ext = strtolower($file->getExtension());
                    $mime = @mime_content_type($pathname) ?: 'application/octet-stream';
                    $size = @filesize($pathname) ?: 0;
                } catch (\Throwable $e) {
                    continue;
                }

                $fileType = 'document';
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'])) {
                    $fileType = 'image';
                } elseif (in_array($ext, ['mp4', 'webm', 'ogg', 'mov', 'avi'])) {
                    $fileType = 'video';
                }

                Media::firstOrCreate(
                    ['filename' => $filename],
                    [
                        'user_id' => $adminId,
                        'original_name' => $filename,
                        'mime_type' => $mime,
                        'file_type' => $fileType,
                        'file_size' => $size,
                        'path' => 'media/' . $filename,
                    ]
                );
            }
        }
    }
}
