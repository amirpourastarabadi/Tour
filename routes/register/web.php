<?php

use Illuminate\Support\Facades\Route;

Route::post('/tourAdmin', 'TourAdminController@store')->name('tourAdmin');

Route::post('/passenger', 'PassengerController@store')->name('passenger');
