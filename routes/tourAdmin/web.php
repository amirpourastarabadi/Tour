<?php

use Illuminate\Support\Facades\Route;

Route::resource('tourAdmin', 'TourAdminController');
Route::resource('profile', 'ProfileController');
Route::resource('tour', 'TourController');

Route::get('resetPassword', 'ProfileController@restPassword')->name('resetPassword');
Route::delete('reservation/{tour}/{passenger}/{count}', 'ReservationController@destroy')->name('reservation.destroy');
Route::get('reservation/{tour}/{passenger}/{count}', 'ReservationController@edit')->name('reservation.edit');
Route::put('reservation/{tour}/{passenger}', 'ReservationController@update')->name('reservation.update');
Route::get('reservation/cancel', 'ReservationController@cancel')->name('reservation.cancel');
Route::get('reservation/confirm/{count}', 'ReservationController@confirm')->name('reservation.confirm');
Route::resource('reservation', 'ReservationController')->only(['index', 'show']);
Route::get('reservation/{tour}/create', 'ReservationController@step1')->name('reservation.create');
Route::post('reservation/personalInformation', 'ReservationController@step2')->name('reservation.step2');
Route::post('reservation/{id}', 'ReservationController@store')->name('reservation.store');
