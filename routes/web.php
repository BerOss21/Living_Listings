<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Listing\ShowController;
use App\Http\Controllers\Listing\IndexController;


Route::get('/',HomeController::class)->name('home');
Route::get('listings',IndexController::class)->name('listings.index');
Route::get('listings/{listing}',ShowController::class)->name('listings.show');


