<?php

use Illuminate\Support\Facades\Route;

Route::resource('', 'AdminController');
Route::resource('profile', 'ProfileController');
Route::resource('passengers', 'PassengerController');
Route::resource('tourAdmins', 'TourAdminController');
//
Route::get('/passengerResetPassword/{passenger}', 'PassengerController@keyGenerate')->name('passengers.keyGenerate');
//Route::get('/tourAdminResetPassword/{tourAdmin}', 'TourAdminController@keyGenerate')->name('tourAmin.keyGenerate');
Route::get('/adminResetPassword/{profile}', 'AdminController@keyGenerate')->name('profile.keyGenerate');
