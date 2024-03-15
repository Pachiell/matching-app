<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PasswordChangeController;
use App\Notifications\PasswordResetNotification;
use App\Http\Controllers\Auth\ForgotPasswordController\ForgotPasswordController;
use App\vendor\laravel\framework\src\Illuminate\Foundation\Auth\SendsPasswordResetEmails;
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

Route::get('/login',[DisplayController::class,'login'])->name('login');
Route::get('receive_destination',[PasswordChangeController::class,'Receive_destination'])->name('receive.destination');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout',[DisplayController::class,'logout'])->name('logout');
    Route::get('/', [DisplayController::class, 'index'])->name('home');
    Route::get('/profile_form',[DisplayController::class,'profileForm'])->name('profile_form');
    Route::get('/edit_profile_form',[DisplayController::class,'profileEditForm'])->name('edit_profile_form');
    Route::post('/edit_profile_form/{user}',[RegistrationController::class,'editProfile'])->name('edit_profile');
    Route::get('/delete_profile/{user}',[RegistrationController::class,'deleteProfile'])->name('delete_profile');
    //大カテゴリ
    Route::get('/MyPosts', [DisplayController::class, 'Userpost'])->name('Myposts');
    Route::get('/MyRequests',[DisplayController::class,'Userrequest'])->name('Myrequests');
    Route::get('Bookmarks', [DisplayController::class, 'bookmark'])->name('Bookmarks');
    Route::get('RequestList',[DisplayController::class,'RequestList'])->name('RequestList');
    //新規投稿・依頼
    Route::get('/creare_service_form', [DisplayController::class, 'create_service_form'])->name('create_service_form');
    Route::post('/creare_service_form',[RegistrationController::class,'CreateService'])->name('create.service');
    Route::get('/request.service_form/{service}', [DisplayController::class, 'request_service_form'])->name('request_service_form');
    Route::post('/request.service_form/{service}',[RegistrationController::class,'CreateRequest'])->name('create.request');
    //依頼承認
    Route::get('/judge_request_form/{service}',[RegistrationController::class,'JudgeRequestForm'])->name('judge_request_form');

    Route::group(['middleware' => 'can:view,service'],function(){
        Route::get('/edit_service/{service}',[Registrationcontroller::class,'editServiceForm'])->name('edit_service_form');
        Route::post('/edit_service/{service}',[Registrationcontroller::class,'editService'])->name('edit.service');
        Route::get('/delete_service/{service}',[Registrationcontroller::class,'deleteServiceForm'])->name('delete_service_form');
        Route::post('/delete_service/{service}',[Registrationcontroller::class,'deleteService'])->name('delete.service');
    });

    Route::group(['middleware' => 'can:view,request'],function(){
        Route::get('/edit_request/{request}',[Registrationcontroller::class,'editRequestForm'])->name('edit_request_form');
        Route::post('/edit_request/{request}',[Registrationcontroller::class,'editRequest'])->name('edit.request');
        Route::get('/delete_request/{request}',[Registrationcontroller::class,'deleteRequestForm'])->name('delete_request_form');
        Route::post('/delete_request/{request}',[Registrationcontroller::class,'deleteRequest'])->name('delete.request');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
