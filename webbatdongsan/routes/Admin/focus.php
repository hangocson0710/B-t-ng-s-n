<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Focus\FocusController;

Route::prefix('focus')->middleware('admincheck:7')->group(function (){
    Route::get('/', [FocusController::class,'list'])->name('focus.list');
    Route::get('/block-display/{id}',[FocusController::class,'block_display'])->name('focus.block_display');
    Route::get('/unblock-display/{id}',[FocusController::class,'unblock_display'])->name('focus.unblock_display');
    Route::get('/delete-item/{id}',[FocusController::class,'delete_item'])->name('focus.delete');
    Route::get('/restore-item/{id}',[FocusController::class,'restore_item'])->name('focus.restore');
    Route::get('/edit/{id}',[FocusController::class,'get_edit'])->name('focus.edit');
    Route::post('/edit/{id}',[FocusController::class,'post_edit'])->name('focus.edit');
    Route::get('/add',[FocusController::class,'add'])->name('focus.add');
    Route::post('/add',[FocusController::class,'post'])->name('focus.add');
});
