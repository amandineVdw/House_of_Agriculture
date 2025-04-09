<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::middleware(['auth'])->group(function () {
    Route::resource('courses', CourseController::class);
});

Route::get('/', function () {
    return view('welcome');
});