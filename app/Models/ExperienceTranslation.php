<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_organisation',
        'career_title',
        'job_description',
    ];

    public $timestamps = false;
}
