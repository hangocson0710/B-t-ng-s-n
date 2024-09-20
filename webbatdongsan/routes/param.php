<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParamController;
Route::prefix('param')->name('param.')->group(function (){
        Route::get('/district/{id}',[ParamController::class,'get_district'])->name('district');
        Route::get('/ward/{id}',[ParamController::class,'get_ward'])->name('ward');
});
