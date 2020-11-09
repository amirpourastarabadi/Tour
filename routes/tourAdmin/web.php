<?php

use Illuminate\Support\Facades\Route;

Route::resource('tourAdmin', 'TourAdminController');
Route::resource('profile', 'ProfileController');
Route::get('resetPassword', 'ProfileController@restPassword')->name('resetPassword');
Route::resource('tour', 'TourController');

