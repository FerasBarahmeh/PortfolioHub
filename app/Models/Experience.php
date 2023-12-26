<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
       'admin_id',
       'name_organisation',
       'organisation_url',
       'join_date',
       'leave_date',
       'career_title',
       'job_description',
    ];
}
