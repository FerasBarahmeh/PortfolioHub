<?php

namespace App\Providers;

use App\Interfaces\Repositories\Admin\DBAppSettingsInterface;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use App\Interfaces\Repositories\Admin\DBProjectsInterface;
use App\Interfaces\Repositories\Admin\DBSettingsInterface;
use App\Interfaces\Repositories\Guest\DBWelcomeInterface;
use App\Repositories\Admin\AppSettingsRepository;
use App\Repositories\Admin\ProfileRepository;
use App\Repositories\Admin\ProjectsRepository;
use App\Repositories\Admin\SettingsRepository;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
