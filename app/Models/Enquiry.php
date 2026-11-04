<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'subject',
        'requirement',
        'projected_volume',
        'message',
        'source',
        'status',
        'admin_notes',
        'ip_address',
    ];

    /**
     * Scope for new/unread enquiries.
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    /**
     * Scope for in-progress enquiries.
     */
    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }

    /**
     * Scope for resolved enquiries.
     */
    public function scopeResolved($query)
    {
        return $query->where('status', 'resolved');
    }

    /**
     * Format status with human readable label and badge color.
     */
    public function getStatusBadgeAttribute(): array
    {
        return match ($this->status) {
            'new' => ['label' => 'New', 'bg' => 'rgba(239, 68, 68, 0.1)', 'color' => '#ef4444', 'border' => 'rgba(239, 68, 68, 0.25)'],
            'in_progress' => ['label' => 'In Progress', 'bg' => 'rgba(245, 158, 11, 0.1)', 'color' => '#d97706', 'border' => 'rgba(245, 158, 11, 0.25)'],
            'resolved' => ['label' => 'Resolved', 'bg' => 'rgba(16, 185, 129, 0.1)', 'color' => '#059669', 'border' => 'rgba(16, 185, 129, 0.25)'],
            'archived' => ['label' => 'Archived', 'bg' => 'rgba(107, 114, 128, 0.1)', 'color' => '#6b7280', 'border' => 'rgba(107, 114, 128, 0.25)'],
            default => ['label' => ucfirst($this->status), 'bg' => 'rgba(107, 114, 128, 0.1)', 'color' => '#6b7280', 'border' => 'transparent'],
        };
    }
}
