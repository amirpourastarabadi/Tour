<?php

use Illuminate\Support\Facades\Route;

Route::resource('tourAdmin', 'TourAdminController');
Route::resource('profile', 'ProfileController');
Route::get('reservation/phoneVerification', 'ReservationController@phoneVerification')->name('reservation.phoneVerification');
Route::get('reservation/check', 'ReservationController@check')->name('reservation.check');
Route::resource('reservation', 'ReservationController')->except('create');
Route::get('reservation/{tour}/create', 'ReservationController@create')->name('reservation.create');
Route::post('reservation/{tour}', 'ReservationController@store')->name('reservation.store');
Route::get('resetPassword', 'ProfileController@restPassword')->name('resetPassword');

