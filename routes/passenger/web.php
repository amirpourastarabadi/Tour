<?php

use Illuminate\Support\Facades\Route;

Route::resource('profile', 'ProfileController')->only(['index', 'edit', 'update']);
Route::post('profile/{passenger}/resetPassword', 'ProfileController@resetPassword')->name('resetPassword');

Route::resource('reservation', 'ReservationController');
