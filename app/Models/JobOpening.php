<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'department',
        'location',
        'employment_type',
        'experience',
        'overview',
        'description',
        'icon_type',
        'badge_text',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope for active job openings.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered openings.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
    }

    /**
     * Applications associated with this opening.
     */
    public function applications()
    {
        return $this->hasMany(Enquiry::class, 'requirement', 'title');
    }

    /**
     * Auto-generate unique slug.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug)) {
                $baseSlug = Str::slug($model->title);
                $slug = $baseSlug;
                $count = 1;
                while (static::where('slug', $slug)->where('id', '!=', $model->id ?? 0)->exists()) {
                    $slug = "{$baseSlug}-{$count}";
                    $count++;
                }
                $model->slug = $slug;
            }
        });
    }
}

