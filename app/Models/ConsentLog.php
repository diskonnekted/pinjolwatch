<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'scope',
        'is_active',
        'granted_at',
        'withdrawn_at',
        'ip_masked',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'granted_at' => 'datetime',
        'withdrawn_at' => 'datetime',
    ];
}
