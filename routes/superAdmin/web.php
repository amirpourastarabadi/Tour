<?php

use Illuminate\Support\Facades\Route;

Route::resource('admin', 'AdminController');
Route::resource('profile', 'SuperAdminController');
