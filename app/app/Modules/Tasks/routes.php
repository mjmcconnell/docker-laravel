<?php
/*
|-----------------------------------------------------------------------------
| Tasks Module Routes
|-----------------------------------------------------------------------------
*/

// Web views
Route::group(
    [
        'prefix' => 'tasks',
        'namespace' => 'App\Modules\Tasks\Controllers',
        'middleware' => ['web'],
    ],
    function () {
        Route::get('/', 'TemplateController@list');
        Route::get('/{id}', 'TemplateController@detail');
    }
);

// API endpoints
Route::group(
    [
        'prefix' => 'api/tasks',
        'namespace' => 'App\Modules\Tasks\Controllers',
        'middleware' => ['api'],
    ],
    function () {
        Route::post('/', 'ApiController@post');
        Route::put('/{id}', 'ApiController@post');
        Route::delete('/{id}/delete', 'ApiController@delete');
    }
);
