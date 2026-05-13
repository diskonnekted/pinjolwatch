<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjolNews extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'source',
        'image_url',
        'description',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
