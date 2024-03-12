<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelevantKnowledge extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'proficiency'];

    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}
