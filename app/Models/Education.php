<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
        'grade',
        'organisation_url',
        'organisation_name',
        'start_date',
        'finish_date',
    ];
}
