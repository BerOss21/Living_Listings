<?php


use App\Http\Controllers\Listing\Realtor\RestoreController;
use App\Http\Controllers\Listing\Realtor\ResourceController;
use App\Http\Controllers\Listing\Image\UploadImageController;


Route::resource('listings',ResourceController::class)->withTrashed();
Route::put('listings/{listing}/restore',RestoreController::class)->name('listings.restore')->withTrashed();
Route::get('listings/{listing}/images/upload',[UploadImageController::class,'create'])->name('listings.images.upload');
Route::post('listings/{listing}/images/upload',[UploadImageController::class,'store']);
Route::delete('listings/images/{media}',[UploadImageController::class,'destroy'])->name('listings.images.destroy');