<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['admin_id', 'is_active'];
    public array $translatedAttributes = ['title', 'content', 'brief'];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function image(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public static function getLastInsertedId(): bool|string
    {
        $lastInsertedId = DB::getPdo()->lastInsertId();
        return (int)$lastInsertedId + 1;
    }
}
