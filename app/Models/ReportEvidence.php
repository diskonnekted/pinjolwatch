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
    ];

    protected $hidden = [
        'encrypted_path',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
