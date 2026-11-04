<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Policy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_description',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope a query to only include published policies.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('sort_order', 'asc')->orderBy('title', 'asc');
    }

    /**
     * Get the public URL to this policy page.
     */
    public function getUrlAttribute(): string
    {
        return url('/policy/' . $this->slug);
    }

    /**
     * Boot model events for automatic slug generation if needed.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($policy) {
            if (empty($policy->slug)) {
                $policy->slug = Str::slug($policy->title);
            } else {
                $policy->slug = Str::slug($policy->slug);
            }
        });
    }
}
