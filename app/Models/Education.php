<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'admin_id',
        'organisation_url',
        'start_date',
        'finish_date',
    ];

    public array $translatedAttributes = [
        'name',
        'grade',
        'organisation_name',
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
