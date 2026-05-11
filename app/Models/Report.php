<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ticket_id',
        'kabupaten_id',
        'threat_type_id',
        'pinjol_count',
        'legal_pinjol_id',
        'app_name',
        'involved_apps',
        'chronology',
        'contact_phone_number',
        'identity_disclosure',
        'communication_tone',
        'dc_actions',
        'reporter_whatsapp',
        'whatsapp_consent',
        'is_anonymous',
        'consent_scope',
        'status',
        'ip_hash',
        'verification_checklist',
    ];

    protected $hidden = [
        'ip_hash',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'whatsapp_consent' => 'boolean',
        'dc_actions' => 'array',
        'involved_apps' => 'array',
        'verification_checklist' => 'array',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function threatType()
    {
        return $this->belongsTo(ThreatType::class);
    }

    public function legalPinjol()
    {
        return $this->belongsTo(LegalPinjol::class);
    }

    public function evidence()
    {
        return $this->hasMany(ReportEvidence::class);
    }
}
