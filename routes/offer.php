<?php

use App\Http\Controllers\Offer\MakeOfferController;
use App\Http\Controllers\Offer\AcceptOfferController;
use App\Http\Controllers\Offer\IndexController;

Route::post('listings/{listing}/offers',MakeOfferController::class)->name('store');
Route::put('listings/{listing}/offers/{offer}',AcceptOfferController::class)->name('accept');
Route::get('listings/{listing}/offers',IndexController::class)->name('index');