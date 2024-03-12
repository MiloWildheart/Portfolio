<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'School', 'image', 'start_date', 'end_date'];

    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}
