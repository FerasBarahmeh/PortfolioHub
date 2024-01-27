<?php

namespace App\Providers;

use App\Interfaces\Repositories\Admin\DBAppSettingsInterface;
use App\Interfaces\Repositories\Admin\DBDraftsInterface;
use App\Interfaces\Repositories\Admin\DBFieldInterface;
use App\Interfaces\Repositories\Admin\DBPostsInterface;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use App\Interfaces\Repositories\Admin\DBProjectsInterface;
use App\Interfaces\Repositories\Admin\DBServicesInterface;
use App\Interfaces\Repositories\Admin\DBSettingsInterface;
use App\Interfaces\Repositories\Admin\DBSkillsInterface;
use App\Interfaces\Repositories\Admin\DBSocialAccountInterface;
use App\Interfaces\Repositories\Admin\ServicesRepository;
use App\Interfaces\Repositories\Guest\DBWelcomeInterface;
use App\Repositories\Admin\AppSettingsRepository;
use App\Repositories\Admin\DraftsRepository;
use App\Repositories\Admin\FieldRepository;
use App\Repositories\Admin\PostRepository;
use App\Repositories\Admin\ProfileRepository;
use App\Repositories\Admin\ProjectsRepository;
use App\Repositories\Admin\SettingsRepository;
use App\Repositories\Admin\SkillsRepository;
use App\Repositories\Admin\SocialAccountRepository;
use App\Repositories\Guest\WelcomeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DBProfileInterface::class, ProfileRepository::class);
        $this->app->bind(DBSettingsInterface::class, SettingsRepository::class);
        $this->app->bind(DBAppSettingsInterface::class, AppSettingsRepository::class);
        $this->app->bind(DBProjectsInterface::class, ProjectsRepository::class);
        $this->app->bind(DBWelcomeInterface::class, WelcomeRepository::class);
        $this->app->bind(DBDraftsInterface::class, DraftsRepository::class);
        $this->app->bind(DBPostsInterface::class, PostRepository::class);
        $this->app->bind(DBFieldInterface::class, FieldRepository::class);
        $this->app->bind(DBSocialAccountInterface::class, SocialAccountRepository::class);
        $this->app->bind(DBServicesInterface::class, ServicesRepository::class);
        $this->app->bind(DBSkillsInterface::class, SkillsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
