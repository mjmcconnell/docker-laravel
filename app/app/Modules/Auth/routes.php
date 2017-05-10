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
        Route::get('/login', 'LoginController@redirectToProvider');
        Route::get('/login/callback', 'LoginController@handleProviderCallback');
    }
);
