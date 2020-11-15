<?php
use Illuminate\Support\Facades\Route;

Route::resource('search', "InterfaceZoneController")->except('store');
Route::post('search/store/{tour}', "InterfaceZoneController@store")->name('search.store');
Route::post('search/verification', "InterfaceZoneController@verification")->name('search.verification');
