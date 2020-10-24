<?php

use Illuminate\Support\Facades\Route;

Route::resource('admin', 'AdminController');
Route::resource('profile', 'SuperAdminController');

Route::get('/keyGenerate/{admin}', 'AdminController@keyGenerate')->name('admin.keyGenerate');
Route::get('/keyGenerate/{profile}', 'SuperAdminController@keyGenerate')->name('profile.keyGenerate');
