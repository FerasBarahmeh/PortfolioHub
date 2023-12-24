<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DomainsSocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'icon_name',
        'hex_color',
    ];

    public function accounts(): belongsTo
    {
        return $this->belongsTo(SocialMediaAccount::class, 'id');
    }
}
