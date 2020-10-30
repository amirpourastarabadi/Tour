<?php

use Illuminate\Support\Facades\Route;

Route::post('tourAdmin', 'TourAdminController@store')->name('tourAdmin');
Route::get('tourAdmin/completion', 'TourAdminController@registerCompletion')->name('tourAdmin.completion');
Route::post('tourAdmin/{tourAdmin}/update', 'TourAdminController@update')->name('tourAdmin.update');

Route::post('passenger', 'PassengerController@store')->name('passenger');
