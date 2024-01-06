<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminExtension extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'admin_id',
        'job_title',
        'phone',
        'BOD',
        'location',
        'about',
    ];
    /**
     * The column he translated
     *
     * @var array|string[]
     */
    public array $translatedAttributes = [
        'location',
        'about',
        'job_title',
    ];

    public $timestamps = false;

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
