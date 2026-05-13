<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRecoveryProgress extends Model
{
    protected $table = 'user_recovery_progress';

    protected $fillable = [
        'user_id',
        'recovery_stage_id',
        'completed_tasks',
        'completed_at',
        'mood_rating',
        'user_notes',
    ];

    protected $casts = [
        'completed_tasks' => 'array',
        'completed_at' => 'datetime',
    ];
}
