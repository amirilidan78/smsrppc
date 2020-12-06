<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\ResetController;
use \App\Http\Controllers\Admin\PartnerController;
use \App\Http\Controllers\Admin\UpdatedPartnerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserPermissionController;

// default /127.0.0.1/admin/...

Route::get('/', DashboardController::class)->name('dashboard');

Route::resource('users' , UserController::class ) ;
Route::get('users/{user}/permissions' , [ UserPermissionController::class , 'get'] )->name('users.permissions') ;
Route::post('users/{user}/permissions' , [ UserPermissionController::class , 'post'] ) ;

Route::resource('partners' , PartnerController::class ) ;
Route::resource('updatedPartners' , UpdatedPartnerController::class ) ;
Route::post('updatedPartners/excel' , [ UpdatedPartnerController::class , 'excelExport'] )->name('updatedPartners.excel') ;
Route::resource('resets' , ResetController::class ) ;
Route::resource('jobs' , JobController::class ) ;




//Route::get('/generateFile', function (){
//    return \Illuminate\Support\Facades\URL::temporarySignedRoute('download.file' ,now()->addSeconds(30)) ;
//})->name('generateFile');
//
//Route::get('/getFile', function (){
//    return \Illuminate\Support\Facades\URL::temporarySignedRoute('download.file' ,now()->addSeconds(30)) ;
//})->name('getFile')->middleware('signed');


