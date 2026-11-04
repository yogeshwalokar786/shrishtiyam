<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'author_name',
        'author_role',
        'read_time',
        'is_featured',
        'is_published',
        'published_at',
        'views_count',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views_count' => 'integer',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $baseSlug = Str::slug($blog->title);
                $slug = $baseSlug;
                $counter = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = "{$baseSlug}-{$counter}";
                    $counter++;
                }
                $blog->slug = $slug;
            }

            if (empty($blog->published_at) && $blog->is_published) {
                $blog->published_at = now();
            }
        });

        static::saving(function ($blog) {
            // Automatically calculate read time if empty or if content changed
            if (empty($blog->read_time) || $blog->isDirty('content')) {
                $blog->read_time = static::calculateReadTime($blog->content);
            }

            // Default meta_title to article title if empty
            if (empty($blog->meta_title) && !empty($blog->title)) {
                $blog->meta_title = $blog->title;
            }
        });
    }

    /**
     * Calculate estimated reading time based on content word count (~200 words per minute).
     */
    public static function calculateReadTime(?string $content): string
    {
        if (empty($content)) {
            return '1 Min Read';
        }

        $cleanText = trim(strip_tags(html_entity_decode($content, ENT_QUOTES, 'UTF-8')));
        $words = str_word_count($cleanText);
        if ($words <= 0) {
            $words = count(preg_split('/\s+/u', $cleanText, -1, PREG_SPLIT_NO_EMPTY));
        }

        $minutes = max(1, (int) ceil($words / 200));
        return "{$minutes} Min Read";
    }

    /**
     * Parent category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /**
     * Scope for published blogs.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                     ->orderBy('published_at', 'desc')
                     ->orderBy('id', 'desc');
    }

    /**
     * Scope for featured blogs.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Dynamic URL attribute.
     */
    public function getUrlAttribute(): string
    {
        return route('blog.show', $this->slug);
    }

    /**
     * Get image URL with safe fallback.
     */
    public function getImageUrlAttribute(): string
    {
        $defaultFallback = function() {
            $first = Media::where('file_type', 'image')->first();
            return $first ? $first->url : asset('assets/images/blog-rpet-bottles.jpg');
        };

        if (empty($this->image)) {
            return $defaultFallback();
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        if (Str::startsWith($this->image, ['/storage/', 'storage/'])) {
            return asset(ltrim($this->image, '/'));
        }

        if (Str::startsWith($this->image, ['/media/', 'media/'])) {
            return asset('storage/' . ltrim($this->image, '/'));
        }

        if (Str::startsWith($this->image, ['/assets/', 'assets/'])) {
            $clean = ltrim($this->image, '/');
            if (file_exists(public_path($clean))) {
                return asset($clean);
            }
            return $defaultFallback();
        }

        if (Str::startsWith($this->image, ['/uploads/', 'uploads/'])) {
            return asset(ltrim($this->image, '/'));
        }

        if (file_exists(storage_path('app/public/media/' . $this->image))) {
            return asset('storage/media/' . $this->image);
        }

        if (file_exists(public_path('assets/images/' . $this->image))) {
            return asset('assets/images/' . $this->image);
        }

        return $defaultFallback();
    }

    /**
     * Formatted publication date.
     */
    public function getFormattedDateAttribute(): string
    {
        $date = $this->published_at ?? $this->created_at ?? now();
        return $date->format('M d, Y');
    }
}
