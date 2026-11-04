<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_name',
        'author_title',
        'company',
        'author_avatar',
        'rating',
        'badge',
        'quote',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope a query to only include active testimonials.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->orderBy('sort_order', 'asc')
                     ->orderBy('id', 'asc');
    }

    /**
     * Formatted combined author role & company.
     */
    public function getAuthorRoleAttribute(): string
    {
        if (!empty($this->author_title) && !empty($this->company)) {
            return "{$this->author_title}, {$this->company}";
        }

        return $this->author_title ?: ($this->company ?: '');
    }

    /**
     * Get avatar URL with robust fallback.
     */
    public function getAvatarUrlAttribute(): string
    {
        if (!empty($this->author_avatar)) {
            return $this->author_avatar;
        }

        // Clean generated SVG/avatar fallback with author's name initials
        $encodedName = urlencode($this->author_name ?? 'Client');
        return "https://ui-avatars.com/api/?name={$encodedName}&background=059669&color=ffffff&bold=true&size=128";
    }
}
