<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BookStackController;

Route::middleware(['auth'])->group(function () {
    Route::resource('courses', CourseController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::middleware(['auth'])->prefix('bookstack')->name('bookstack.pages.')->group(function () {
    Route::get('/pages', [BookStackController::class, 'index'])->name('index');
    Route::get('/pages/create', [BookStackController::class, 'create'])->name('create');
    Route::post('/pages', [BookStackController::class, 'store'])->name('store');
});
