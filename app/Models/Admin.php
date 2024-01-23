<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\TypeSkill;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * The column he translated
     *
     * @var array|string[]
     */
    public array $translatedAttributes = [
        'name',
    ];

    public function extensions(): HasOne
    {
        return $this->hasOne(AdminExtension::class);
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(SocialMediaAccount::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
    public function softSkills(): HasMany
    {
        return $this->hasMany(Skill::class, 'admin_id')
            ->where('type_skill', '=', TypeSkill::Soft->value);
    }

    public function technicalSkills(): HasMany
    {
        return $this->hasMany(Skill::class, 'admin_id')
            ->where('type_skill', '=', TypeSkill::Technical->value);
    }
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function drafts(): HasMany
    {
        return $this->hasMany(Draft::class);
    }

    public function getCountCompleteDraftsAttribute(): Attribute
    {
        return Attribute::make(
            get: (fn() => $this->hasMany(Draft::class, 'id')
                ->where('is_done', '=', false)
                ->count())
        );

    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
