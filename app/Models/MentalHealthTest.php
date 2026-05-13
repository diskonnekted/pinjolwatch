<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentalHealthTest extends Model
{
    protected $fillable = [
        'user_id',
        'test_type',
        'total_score',
        'result_level',
        'responses',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'responses' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
