<?php

use App\Http\Controllers\Admin\AppSettingsController;
use App\Http\Controllers\Admin\InfoSupplementaryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->prefix(LaravelLocalization::setLocale())
    ->group(function () {

        Route::get('/', function () {
            return view('welcome');
        });


        Route::get('/dashboard', function () {
            return view('admin.dashboard', [
                'domains' => \App\Models\DomainsSocialMedia::all(),
            ]);
        })->middleware(['auth', 'verified'])->name('dashboard');


        Route::middleware('auth')->group(function () {
            /**
             * Profile Routes
             */
            Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');


            /**
             * Supplementary Information
             */
            Route::get('/supplementary-info-profile', [InfoSupplementaryController::class, 'edit'])->name('supplementary.edit');
            Route::patch('/supplementary-info-profile', [InfoSupplementaryController::class, 'update'])->name('supplementary.update');


            /**
             * Settings
             */
            Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
            Route::patch('/settings/update-main-info', [SettingsController::class, 'updateMainInfo'])->name('settings.update.main.info');
            Route::patch('/settings/update-supplementary-info', [SettingsController::class, 'updateSupplementaryInfo'])->name('settings.update.supplementary.info');
            Route::delete('/settings/destroy', [SettingsController::class, 'destroy'])->name('settings.destroy');

            /**
             * app settings
             */
            Route::get('/app-settings', [AppSettingsController::class, 'index'])->name('app.settings.index');
            Route::post('/app-settings/add-domain-social-media', [AppSettingsController::class, 'addDomainSocialMedia'])->name('app.settings.add-domain');


        });

        require __DIR__ . '/auth.php';
    });
