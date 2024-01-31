<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TemporaryFile extends Model
{
    use HasFactory;
    protected $fillable = ['folder', 'file'];

    public static function truncate(): void
    {
        DB::table('temporary_files')->truncate();
    }
}
