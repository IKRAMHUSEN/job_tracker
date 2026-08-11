<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'company',
    'role',
    'applied_at',
    'status',
    'job_url',
    'salary_range',
    'notes',
])]
class Application extends Model
{
    protected function casts(): array
    {
        return [
            'applied_at' => 'date',
        ];
    }

    public function statusColor(): string
    {
        return match ($this->status) {
            'applied' => 'border border-blue-100 bg-blue-100 text-blue-800',
            'interview' => 'border border-yellow-100 bg-yellow-100 text-yellow-800',
            'offer' => 'border border-green-100 bg-green-100 text-green-800',
            'rejected' => 'border border-red-100 bg-red-100 text-red-800',
            default => '',
        };
    }
}
