<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $table = 'personal_info';
    protected $fillable = ['name', 'age', 'email', 'residence', 'Github', 'Linkedin', 'image', 'personal_story'];

    public function education()
    {
        return $this->hasMany(Education::class);
    }
    public function workExperience()
    {
        return $this->hasMany(WorkExperience::class);
    }
    public function relevantKnowledge()
    {
        return $this->hasMany(RelevantKnowledge::class);
    }
}
