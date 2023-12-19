<?php

use App\Http\Controllers\Notification\MarkAsReadController;
use App\Http\Controllers\Notification\MarkAsUnreadController;
use App\Http\Controllers\Notification\IndexController;


Route::get('notifications',IndexController::class)->name('index');
Route::put('notifications/{notification}/read',MarkAsReadController::class)->name('read');
Route::put('notifications/{notification}/unread',MarkAsUnreadController::class)->name('unread');