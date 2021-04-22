<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de la prueba Tessi
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => 'auth'], function () {
    // Home
    Route::get('/home', [
        'as' => 'tessi.web.home',
        'uses' => 'HomeController'
    ]);

    // Rutas de categorías
    Route::group(['prefix' => 'category'], function () {
        // Home
        Route::get('/list', [
            'as' => 'tessi.web.category.list',
            'uses' => 'CategoryHomeController'
        ]);
    });

    // Rutas de articulos
    Route::group(['prefix' => 'items'], function () {
        // Home
        Route::get('/list', [
            'as' => 'tessi.web.items.list',
            'uses' => 'ItemHomeController'
        ]);
    });
});


Auth::routes();
