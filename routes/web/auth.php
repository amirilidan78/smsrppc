<?php

use App\Http\Controllers\Auth\LoginController;

Route::get('/login' , [LoginController::class ,'showLogin'])->name('login');;
Route::post('/login' , [LoginController::class ,'login']);
Route::get('/logout' , [LoginController::class ,'logout'])->name('logout');
