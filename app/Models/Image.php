<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'url',
        'nameFile',
        'imageable_id',
        'imageable_type',
        'disk',
    ];

    /**
     * Get the parent imageable model (user or post).
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    public static function getByNameAttribute($name)
    {
        return Image::where('nameFile', '=', $name)->get()->first();
    }
}
