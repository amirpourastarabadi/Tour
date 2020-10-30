<?php

use Illuminate\Support\Facades\Route;

Route::resource('tourAdmin', 'TourAdminController');
Route::resource('profile', 'ProfileController');
Route::resource('reservation', 'ReservationController')->except('create');
Route::get('reservation/{tour}/create', 'ReservationController@create')->name('reservation.create');
Route::get('reservation/phoneVerification', 'ReservationController@phoneVerification')->name('reservation.phoneVerification');
Route::get('resetPassword', 'ProfileController@restPassword')->name('resetPassword');
