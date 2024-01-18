<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['admin_id', 'is_done'];
    public array $translatedAttributes = ['title', 'content'];
}
