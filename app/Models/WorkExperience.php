<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = ['workplace', 'job_type', 'start_date', 'end_date', 'duties'];

    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}
