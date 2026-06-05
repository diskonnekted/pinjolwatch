<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommunityThread extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'is_anonymous',
        'likes_count',
        'replies_count',
        'media_path',
        'media_type',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(CommunityThreadReply::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(CommunityThreadLike::class);
    }

    public function getAuthorNameAttribute()
    {
        return $this->is_anonymous ? 'Anonim' : ($this->user->nickname ?? $this->user->name);
    }

    public function getAuthorAvatarAttribute()
    {
        if ($this->is_anonymous) {
            return asset('avatars/default.png'); // Fallback avatar for anonymous
        }
        return $this->user->avatar_url ?? asset('avatars/default.png');
    }
}
