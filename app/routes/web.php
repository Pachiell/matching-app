<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PasswordChangeController;
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
Route::post('send_mail',[PasswordChangeController::class,'SendMail'])->name('send.mail');
Route::get('/change_password_form',[PasswordChangeController::class,'updatePasswordForm'])->name('change.password'); 
Route::post('/change_password_form',[PasswordChangeController::class,'updatePassword'])->name('update.password'); 


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout',[DisplayController::class,'logout'])->name('logout');
    Route::get('/', [DisplayController::class, 'index']);
    Route::get('/profile_form',[DisplayController::class,'profileForm'])->name('profile_form');
    Route::get('/edit_profile_form',[DisplayController::class,'profileEditForm'])->name('edit_profile_form');
    Route::post('/edit_profile_form/{user}',[RegistrationController::class,'editProfile'])->name('edit_profile');
    Route::get('/MyPosts', [DisplayController::class, 'Userpost'])->name('Myposts');

    Route::get('Bookmarks', [DisplayController::class, 'bookmark'])->name('Bookmarks');
    Route::get('/creare_service_form', [DisplayController::class, 'create_service_form'])->name('create_service_form');
    Route::post('/creare_service_form',[RegistrationController::class,'CreateService'])->name('create.service');
    Route::get('/request.service_form', [DisplayController::class, 'request_service_form'])->name('request_service_form');

    Route::group(['middleware' => 'can:view,service'],function(){
        Route::get('/edit_service/{service}',[Registrationcontroller::class,'editServiceForm'])->name('edit_service_form');
        Route::post('/edit_service/{service}',[Registrationcontroller::class,'editService'])->name('edit.service');
        Route::get('/delete_service/{service}',[Registrationcontroller::class,'deleteServiceForm'])->name('delete_service_form');
        Route::post('/delete_service/{service}',[Registrationcontroller::class,'deleteService'])->name('delete.service');
    });
});
