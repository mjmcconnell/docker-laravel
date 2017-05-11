<?php
/*
|-----------------------------------------------------------------------------
| Auth Module Routes
|-----------------------------------------------------------------------------
*/

Route::group(
    [
        'prefix' => 'auth',
        'namespace' => 'App\Modules\Auth\Controllers',
        'middleware' => ['web'],
    ],
    function () {
        Route::get('/login', 'AuthController@redirectToProvider');
        Route::get('/callback', 'AuthController@handleProviderCallback');
        Route::get('/logout', 'AuthController@logout');
    }
);
