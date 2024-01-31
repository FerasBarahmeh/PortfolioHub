<?php

use App\Http\Controllers\Admin\AppSettingsController;
use App\Http\Controllers\Admin\DraftsController;
use App\Http\Controllers\Admin\EducationsController;
use App\Http\Controllers\Admin\ExperiencesController;
use App\Http\Controllers\Admin\FieldController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\Admin\SocialAccountController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\TemporaryFileController;
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
         * Temp Files
         */
        Route::post('/tmp-upload', [TemporaryFileController::class, 'upload'])
            ->name('tmp.upload');
        Route::delete('/tmp-delete/{folder}', [TemporaryFileController::class, 'delete'])
            ->name('tmp.delete');

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
            });

            /**
             * Education
             */
            Route::prefix('educations')->group(function () {
                Route::post('/store', [EducationsController::class, 'store'])
                    ->name('education.store');

                Route::put('/update/{id}', [EducationsController::class, 'update'])
                    ->name('education.update');

                Route::delete('/destroy', [EducationsController::class, 'destroy'])
                    ->name('education.destroy');
            });

            /**
             * Experience
             */
            Route::prefix('experience')->group(function () {
                Route::post('/store', [ExperiencesController::class, 'store'])
                    ->name('experience.store');

                Route::put('/update/{id}', [ExperiencesController::class, 'update'])
                    ->name('experience.update');

                Route::delete('/destroy', [ExperiencesController::class, 'destroy'])
                    ->name('experience.destroy');

            });

            /**
             * Social Accounts
             */
            Route::prefix('social-accounts')->group(function () {
                Route::post('/store', [SocialAccountController::class, 'store'])
                    ->name('social.account.store');

                Route::delete('/destroy/{id}', [SocialAccountController::class, 'destroy'])
                    ->name('social.account.destroy');
            });


            /**
             * services
             */
            Route::prefix('services')->group(function () {
                Route::post('/store', [ServicesController::class, 'store'])
                    ->name('service.store');

                Route::put('/update{id}', [ServicesController::class, 'update'])
                    ->name('service.update');

                Route::delete('/destroy', [ServicesController::class, 'destroy'])
                    ->name('service.destroy');
            });


            /**
             * Skills
             */
            Route::prefix('skills')->group(function () {
                Route::post('/store', [SkillsController::class, 'store'])
                    ->name('skill.store');

                Route::put('/update/{id}', [SkillsController::class, 'update'])
                    ->name('skill.update');

                Route::delete('/destroy', [SkillsController::class, 'destroy'])
                    ->name('skill.destroy');
            });

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
                Route::get('', [AppSettingsController::class, 'index'])
                    ->name('app.settings.index');
                Route::post('/add-domain-social-media', [AppSettingsController::class, 'addDomainSocialMedia'])
                    ->name('app.settings.add-domain');
                Route::post('/store-layout-picture', [AppSettingsController::class, 'storeLayoutPicture'])
                    ->name('app.settings.store-layout');

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

            /**
             * Flied
             */
            Route::prefix('fields')->group(function () {
                Route::get('', [FieldController::class, 'index'])
                    ->name('fields.index');

                Route::post('store', [FieldController::class, 'store'])
                    ->name('fields.store');

                Route::put('update{id}', [FieldController::class, 'update'])
                    ->name('fields.update');

                Route::delete('delete{id}', [FieldController::class, 'destroy'])
                    ->name('fields.delete');
            });


        });

        require __DIR__ . '/auth.php';
    });
