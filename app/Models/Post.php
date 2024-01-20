<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Translatable;
    protected $fillable = ['admin_id', 'is_active'];
    public array $translatedAttributes = ['title', 'content', 'brief'];
}
