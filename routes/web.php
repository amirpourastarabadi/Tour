<?php

use App\Models\Tour;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $test_item = Tour::first();
    return view('welcome', compact('test_item'));
})->name('index');

Auth::routes();

