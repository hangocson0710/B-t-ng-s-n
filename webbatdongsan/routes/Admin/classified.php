<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Classified\ClassifiedController;
Route::prefix('classified')->name('classified.')->middleware('admincheck:4')->group(function(){
    Route::get('/',[ClassifiedController::class,'list'])->name('list');
    Route::get('/edit/{id}',[ClassifiedController::class,'edit'])->name('edit');
    Route::post('/edit/{id}',[ClassifiedController::class,'post_edit'])->name('edit');
    Route::get('/block/{id}',[ClassifiedController::class,'block_display'])->name('block');
    Route::get('/unblock/{id}',[ClassifiedController::class,'unblock_display'])->name('unblock');
    Route::get('/delete/{id}',[ClassifiedController::class,'delete'])->name('delete');
    Route::get('/restore/{id}',[ClassifiedController::class,'restore'])->name('restore');
    Route::get('/show/{id}', [ClassifiedController::class, 'show'])->name('show');

});
