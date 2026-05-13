<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupaten';

    protected $fillable = ['province_id', 'kode_bps', 'nama', 'provinsi', 'geojson', 'latitude', 'longitude'];

    protected $casts = [
        'geojson' => 'array',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
