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
        'middleware' => ['web', 'api'],
    ],
    function () {
        Route::post('/', 'ApiController@add');
        Route::put('/{id}', 'ApiController@update');
        Route::delete('/{id}/delete', 'ApiController@delete');
    }
);
