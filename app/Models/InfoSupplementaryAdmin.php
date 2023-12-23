<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoSupplementaryAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'job_title',
        'phone',
        'BOD',
        'location',
        'about',
    ];

    public $timestamps = false;

    public function admin(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
