<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'user_id',
        'filename',
        'original_name',
        'mime_type',
        'file_type',
        'file_size',
        'path',
    ];

    /**
     * Relationship to the user who uploaded the file.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the public asset URL for the media item.
     */
    public function getUrlAttribute(): string
    {
        if (str_starts_with($this->path, 'assets/')) {
            return asset($this->path);
        }
        if (!Storage::disk('public')->exists($this->path) && file_exists(public_path('assets/images/' . $this->filename))) {
            return asset('assets/images/' . $this->filename);
        }
        return asset('storage/' . $this->path);
    }

    /**
     * Format the file size into a human-readable string.
     */
    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->file_size;
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 1) . ' KB';
        } else {
            return $bytes . ' B';
        }
    }

    /**
     * Check file types.
     */
    public function isImage(): bool
    {
        return $this->file_type === 'image';
    }

    public function isVideo(): bool
    {
        return $this->file_type === 'video';
    }

    public function isDocument(): bool
    {
        return $this->file_type === 'document';
    }
}
