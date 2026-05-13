<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecoveryStage extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'order',
        'icon',
        'tasks',
    ];

    protected $casts = [
        'tasks' => 'array',
    ];
}
