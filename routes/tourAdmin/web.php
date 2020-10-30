<?php

use Illuminate\Support\Facades\Route;

Route::resource('tourAdmin', 'TourAdminController');
Route::resource('profile', 'ProfileController');
Route::resource('reservation', 'ReservationController');
Route::get('resetPassword', 'ProfileController@restPassword')->name('resetPassword');
