<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalPinjol extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'app_name',
        'license_number',
        'license_date',
        'business_type',
        'website',
        'os',
        'address',
        'phone',
        'collection_patterns',
        'notable_cases',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
