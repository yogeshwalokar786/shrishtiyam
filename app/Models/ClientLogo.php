<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_path',
        'website_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope a query to only include active client logos in sort order.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->orderBy('sort_order', 'asc')
                     ->orderBy('id', 'asc');
    }

    /**
     * Get the accessible logo URL with fallback.
     */
    public function getLogoUrlAttribute(): string
    {
        if (!empty($this->logo_path)) {
            return $this->logo_path;
        }

        $encodedName = urlencode($this->name ?? 'Client');
        return "https://ui-avatars.com/api/?name={$encodedName}&background=059669&color=ffffff&bold=true&size=128";
    }
}
