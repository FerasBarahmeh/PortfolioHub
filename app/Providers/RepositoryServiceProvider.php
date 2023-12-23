<?php

namespace App\Providers;

use App\Interfaces\Repositories\Admin\DBAppSettingsInterface;
use App\Interfaces\Repositories\Admin\DBInfoSupplementaryInterface;
use App\Interfaces\Repositories\Admin\DBProfileInterface;
use App\Interfaces\Repositories\Admin\DBSettingsInterface;
use App\Repositories\Admin\AppSettingsRepository;
use App\Repositories\Admin\InfoSupplementaryRepository;
use App\Repositories\Admin\ProfileRepository;
use App\Repositories\Admin\SettingsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DBProfileInterface::class, ProfileRepository::class);
        $this->app->bind(DBInfoSupplementaryInterface::class, InfoSupplementaryRepository::class);
        $this->app->bind(DBSettingsInterface::class, SettingsRepository::class);
        $this->app->bind(DBAppSettingsInterface::class, AppSettingsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
