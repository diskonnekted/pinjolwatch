<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommunityThreadReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'community_thread_id',
        'user_id',
        'content',
        'is_anonymous',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
    ];

    public function thread(): BelongsTo
    {
        return $this->belongsTo(CommunityThread::class, 'community_thread_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getAuthorNameAttribute()
    {
        return $this->is_anonymous ? 'Anonim' : ($this->user->nickname ?? $this->user->name);
    }

    public function getAuthorAvatarAttribute()
    {
        if ($this->is_anonymous) {
            return asset('avatars/default.png');
        }
        return $this->user->avatar_url ?? asset('avatars/default.png');
    }
}
