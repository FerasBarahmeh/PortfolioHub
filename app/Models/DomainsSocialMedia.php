<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainsSocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'domain',
        'icon_name',
        'hex_color',
    ];
}
