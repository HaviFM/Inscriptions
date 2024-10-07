<?php

use App\Http\Controllers\FormController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inscription', [FormController::class, 'create'])->name('form.create');
Route::post('/inscription', [FormController::class, 'store'])->name('form.store');
