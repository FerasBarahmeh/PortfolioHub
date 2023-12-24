<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialMediaAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'username_account',
        'active',
        'domain_id',
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function domain(): belongsTo
    {
        return $this->belongsTo(DomainsSocialMedia::class, 'domain_id');
    }
}
