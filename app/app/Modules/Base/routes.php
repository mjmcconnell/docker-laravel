<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Display All Tasks
 */
Route::get('/', function () {
    return view('Base::landing');
});
