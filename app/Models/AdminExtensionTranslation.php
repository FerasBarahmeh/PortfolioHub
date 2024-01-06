<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminExtensionTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'about',
        'job_title',
    ];

    public $timestamps = false;
}
