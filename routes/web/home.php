<?php

use App\Http\Controllers\Home\MainController;
use App\Http\Controllers\Home\SubmitController;
use App\Http\Controllers\Home\AuthorizingController;
use Illuminate\Support\Facades\Route;
use App\Notifications\SendSmsNotification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [MainController::class ,'index'])->name("home");
Route::post('/', [MainController::class ,'index_post']);
Route::get('/support', [MainController::class ,'support'])->name('support');
Route::get('/reset_user_id', [MainController::class ,'reset_user_id'])->name('reset_user_id');
Route::post('/reset_user_id', [MainController::class ,'reset_user_id_post']);

Route::get('/authorizing_partner', [AuthorizingController::class ,'index'])->name('authorizing_partner');
Route::post('/authorizing_partner', [AuthorizingController::class , 'index_post']);

Route::get('/submitting_partner_data', [SubmitController::class ,'index'])->name('submitting_partner_data');
Route::post('/submitting_partner_data', [SubmitController::class , 'index_post']);


Route::get('/flush', function (){
    \App\Http\Sessions\PartnerSessionHandler::flush();
    alert()->toast('شما از تکمیل اطلاعات سهام دار انصراف دادید' ,'success') ;
    return redirect()->route('home') ;
})->name('flush');
