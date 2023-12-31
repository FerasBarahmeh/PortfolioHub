<?php

use App\Http\Controllers\Guests\WelcomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| guest routes
|--------------------------------------------------------------------------
| All guest routes
*/

Route::middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->prefix(LaravelLocalization::setLocale())
    ->group(function () {

        /**
         * Livewire
         */

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });

        /**
         * welcome
         */
        Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');


    });
