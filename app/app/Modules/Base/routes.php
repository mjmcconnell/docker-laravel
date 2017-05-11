<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Display All Tasks
 */
Route::group(['middleware' => ['web']], function()
{
    Route::get('/', function () {
        return view('Base::landing');
    });
});
