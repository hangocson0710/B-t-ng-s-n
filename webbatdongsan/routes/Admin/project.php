<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Project\ProjectController;
Route::prefix('project')->middleware('admincheck:2')->name('project.')->group(function (){
    Route::get('/',[ProjectController::class,'list'])->name('list');
    Route::get('/edit/{id}',[ProjectController::class,'get_edit'])->name('edit');
    Route::post('/edit/{id}',[ProjectController::class,'post_edit'])->name('edit');
    Route::get('/block-display/{id}',[ProjectController::class,'block_display'])->name('block_display');
    Route::get('/unblock-display/{id}',[ProjectController::class,'unblock_display'])->name('unblock_display');
    Route::get('/delete-item/{id}',[ProjectController::class,'delete_item'])->name('delete');
    Route::get('/restore-item/{id}',[ProjectController::class,'restore_item'])->name('restore');
    Route::get('/request',[ProjectController::class,'request_list'])->name('request');
    Route::get('browse/{id}',[ProjectController::class,'browse'])->name('browse');
    Route::get('no-browse/{id}',[ProjectController::class,'no_browse'])->name('no_browse');
    Route::get('/show/{id}', [ProjectController::class, 'show'])->name('show');

});
