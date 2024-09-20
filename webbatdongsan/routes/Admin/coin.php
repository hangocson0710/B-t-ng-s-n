<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Coin\CoinController;
Route::prefix('coin')->name('coin.')->middleware('admincheck:3')->group(function(){
    Route::get('/',[CoinController::class,'request_list'])->name('request');
    Route::get('/history',[CoinController::class,'history_list'])->name('history');
    Route::get('/browse/{id}',[CoinController::class,'browse'])->name('browse');
    Route::get('/no-browse/{id}',[CoinController::class,'no_browse'])->name('no_browse');
});
