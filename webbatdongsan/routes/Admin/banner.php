<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Banner\BannerController;
Route::prefix('banner')->name('banner.')->middleware('admincheck:8')->group(function(){
    Route::get('/',[BannerController::class,'list'])->name('list');
    Route::get('/add',[BannerController::class,'add'])->name('add');
    Route::post('/add',[BannerController::class,'post_add'])->name('add');
    Route::get('/block/{id}',[BannerController::class,'block'])->name('block');
    Route::get('/unblock/{id}',[BannerController::class,'unblock'])->name('unblock');
    Route::get('/delete/{id}',[BannerController::class,'delete'])->name('delete');
    Route::get('/edit/{id}',[BannerController::class,'edit'])->name('edit');
    Route::post('/edit/{id}',[BannerController::class,'post_edit'])->name('edit');
});
