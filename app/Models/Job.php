<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
        'salary_min',
        'salary_max',
        'employment_type',
        'status',
        'employer_id',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')->whereNotNull('approved_at');
    }

    public function scopeApproved($query)
    {
        return $query->whereNotNull('approved_at');
    }

    public function getSalaryRangeAttribute()
    {
        if ($this->salary_min && $this->salary_max) {
            return '₱' . number_format($this->salary_min) . ' - ₱' . number_format($this->salary_max);
        }
        return $this->salary_min ? '₱' . number_format($this->salary_min) . '+' : 'Salary Negotiable';
    }

    public function getEmploymentTypeBadgeAttribute()
    {
        $badges = [
            'full_time' => 'bg-primary',
            'part_time' => 'bg-info',
            'contract' => 'bg-warning',
            'freelance' => 'bg-success',
        ];
        return $badges[$this->employment_type] ?? 'bg-secondary';
    }
}

