<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportEvidence extends Model
{
    use HasFactory;
    
    protected $table = 'report_evidence';

    protected $fillable = [
        'report_id',
        'original_name',
        'encrypted_path',
        'mime_type',
        'file_size',
        'is_client_encrypted',
        'encryption_metadata',
    ];

    protected $casts = [
        'is_client_encrypted' => 'boolean',
        'encryption_metadata' => 'array',
    ];

    protected $hidden = [
        'encrypted_path',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
