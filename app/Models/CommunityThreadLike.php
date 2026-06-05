<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommunityThreadLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'community_thread_id',
        'user_id',
    ];

    public function thread(): BelongsTo
    {
        return $this->belongsTo(CommunityThread::class, 'community_thread_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
