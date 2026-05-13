<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatSession extends Model
{
    use HasUuids;

    protected $fillable = [
        'requester_id',
        'responder_id',
        'status',
        'expires_at',
        'is_encrypted',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_encrypted' => 'boolean',
    ];

    public function requester(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function responder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responder_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
