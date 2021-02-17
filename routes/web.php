<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});


Route::post('image', ImageController::class)->name('image');