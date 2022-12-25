<?php

use Illuminate\Support\Facades\Route;


Route::namespace('DD4You\Dpanel\Http\Controllers')->group(function () {

    Route::controller(AuthController::class)->group(function () {

        Route::match(['GET', 'POST'], '/login', 'login')->name('login');

        Route::match(['GET', 'POST'], '/forgot', 'forgot')->name('forgot');

        Route::match(['GET', 'POST'], '/reset', 'reset')->name('reset');
    });

    Route::get('/', function () {
        return redirect()->route(config('dpanel.prefix') . '.login');
    });
});
