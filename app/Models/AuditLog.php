<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'route_name',
        'http_method',
        'url',
        'ip_masked',
        'payload_summary',
    ];

    protected $casts = [
        'payload_summary' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
