<?php

use App\Http\Controllers\Admin\AdminExtensionsController;
use App\Http\Controllers\Admin\AppSettingsController;
use App\Http\Controllers\Admin\DraftsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\CKEditorController;
use App\Models\DomainsSocialMedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
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

        Route::post('/upload-ckeditor', [CKEditorController::class, 'store'])->name('ckeditor.upload');
        Route::delete('/delete-image', [CKEditorController::class, 'delete'])->name('ckeditor.delete');
        /**
         * Livewire
         */

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });


        Route::get('/dashboard', function () {
            return view('admin.dashboard', [
                'domains' => DomainsSocialMedia::all(),
                'accounts' => Auth::user()->accounts,
                'admin' => Auth::user(),
            ]);
        })->middleware(['auth', 'verified'])->name('dashboard');


        Route::middleware('auth')->group(function () {
            /**
             * Profile Routes
             */
            Route::prefix('/profile')->group(function () {
                Route::get('', [ProfileController::class, 'index'])
                    ->name('profile.index');

                Route::put('/change-social-account', [ProfileController::class, 'changeSocialAccount'])
                    ->name('profile.change.social.account');

                Route::put('/change-service', [ProfileController::class, 'changeService'])
                    ->name('profile.change.service');
                Route::delete('delete-service', [ProfileController::class, 'deleteService'])
                    ->name('profile.delete.service');

                Route::post('/add-skill', [ProfileController::class, 'addSkill'])
                    ->name('profile.add.skill');

                Route::delete('/delete-skill', [ProfileController::class, 'deleteSkill'])
                    ->name('profile.delete.skill');

                Route::post('/add-experience', [ProfileController::class, 'addExperience'])
                    ->name('profile.add.experience');

                Route::delete('/delete-experience', [ProfileController::class, 'deleteExperience'])
                    ->name('profile.delete.experience');


                Route::post('/add-education', [ProfileController::class, 'addEducation'])
                    ->name('profile.add.education');


                Route::delete('/delete-education', [ProfileController::class, 'deleteEducation'])
                    ->name('profile.delete.education');

            });

            /**
             * Supplementary Information
             */
            Route::get('/supplementary-info-profile', [AdminExtensionsController::class, 'edit'])->name('supplementary.edit');
            Route::patch('/supplementary-info-profile', [AdminExtensionsController::class, 'update'])->name('supplementary.update');


            /**
             * Settings
             */
            Route::prefix('/settings')->group(function () {
                Route::get('', [SettingsController::class, 'index'])->name('settings.index');
                Route::patch('/update-main-info', [SettingsController::class, 'updateMainInfo'])->name('settings.update.main.info');
                Route::patch('/update-supplementary-info', [SettingsController::class, 'updateSupplementaryInfo'])->name('settings.update.supplementary.info');
                Route::delete('/destroy', [SettingsController::class, 'destroy'])->name('settings.destroy');
            });


            /**
             * app settings
             */
            Route::prefix('/app-settings')->group(function () {
                Route::get('', [AppSettingsController::class, 'index'])->name('app.settings.index');
                Route::post('/add-domain-social-media', [AppSettingsController::class, 'addDomainSocialMedia'])->name('app.settings.add-domain');

            });

            /**
             * Projects
             */
            Route::prefix('/projects')->group(function () {
                Route::get('', [ProjectsController::class, 'index'])->name('projects.index');
                Route::post('/store', [ProjectsController::class, 'store'])->name('projects.store');
                Route::delete('/destroy', [ProjectsController::class, 'destroy'])->name('projects.destroy');
            });

            /**
             * Drafts
             */
            Route::resource('drafts', DraftsController::class);

            /**
             * Posts
             */
            Route::resource('posts', PostController::class);

        });

        require __DIR__ . '/auth.php';
    });
