<?php

use Illuminate\Support\Facades\Route;

Route::resource('', 'AdminController');
Route::resource('profile', 'ProfileController');
Route::resource('passengers', 'PassengerController');
Route::resource('tourAdmins', 'TourAdminController');
//
//Route::get('/keyGenerate/{passenger}', 'PassengerController@keyGenerate')->name('passenger.keyGenerate');
//Route::get('/keyGenerate/{tourAdmin}', 'TourAdminController@keyGenerate')->name('tourAmin.keyGenerate');
Route::get('/keyGenerate/{profile}', 'AdminController@keyGenerate')->name('profile.keyGenerate');
