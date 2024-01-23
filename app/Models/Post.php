<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['admin_id', 'is_active'];
    public array $translatedAttributes = ['title', 'content', 'brief'];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
