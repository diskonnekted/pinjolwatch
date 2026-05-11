<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreatType extends Model
{
    use HasFactory;
    
    protected $fillable = ['code', 'label'];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
