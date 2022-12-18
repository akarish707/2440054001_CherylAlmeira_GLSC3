<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PictureController;




Route::get('/', [PictureController::class, 'home'])->name('home');
Route::post('/store', [PictureController::class, 'store'])->name('store');
Route::get('/destroy/{id}', [PictureController::class, 'destroy'])->name('delete');
