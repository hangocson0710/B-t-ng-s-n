<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;

use App\Http\Controllers\Admin\System\SystemController;

use App\Http\Controllers\Admin\Forbidden\ForbiddenController;
use App\Http\Controllers\Admin\Analytics\AnalyticsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\User\UserController;

Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');


Route::get('admin/login', [AuthController::class, 'get_login'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'post_login'])->name('admin.login');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware('adminlogin')->group(function () {
    Route::get('/', function () {
        return redirect(\route('admin.analytics.list'));
    });
    require 'Admin/project.php';
    
    require 'Admin/focus.php';
    Route::prefix('system')->middleware('admincheck:1')->name('system.')->group(function () {
        Route::get('/', [SystemController::class, 'get_system'])->name('config');
        Route::post('/home', [SystemController::class, 'post_home'])->name('home');
        Route::post('/bank', [SystemController::class, 'post_bank'])->name('bank');
        Route::post('/info', [SystemController::class, 'post_about'])->name('info');
    });
    require 'Admin/coin.php';
    require 'Admin/classified.php';
    require 'Admin/staff.php';
    require 'Admin/banner.php';


    Route::prefix('user')->middleware('admincheck:6')->name('user.')->group(function () {
        Route::get('request', [UserController::class, 'list_request'])->name('request');
        Route::get('browse-business/{id}', [UserController::class, 'browse_business'])->name('browse');
        Route::get('no-browse-business/{id}', [UserController::class, 'no_browse_business'])->name('no_browse');
        # người dùng thường
        Route::get('list-user', [UserController::class, 'list_user'])->name('list_user');
        Route::get('list-business', [UserController::class, 'list_business'])->name('list_business');
        # block
        Route::get('block/{id}', [UserController::class, 'block'])->name('block');
        Route::get('forbidden/{id}', [UserController::class, 'forbidden'])->name('forbidden');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
    });

    Route::prefix('forbidden')->middleware('admincheck:10')->name('forbidden.')->group(function () {
        Route::get('', [ForbiddenController::class, 'list'])->name('list');
        # bỏ chặn
        Route::get('unblock/{id}', [ForbiddenController::class, 'unblock'])->name('unblock');
        # bỏ cấm
        Route::get('unforbidden/{id}', [ForbiddenController::class, 'unforbidden'])->name('unforbidden');
        # khôi phục
        Route::get('undelete/{id}', [ForbiddenController::class, 'undelete'])->name('undelete');
    });

    Route::prefix('analytics')->name('analytics.')->group(function () {
        Route::get('/', [AnalyticsController::class, 'list'])->name('list');
    });

});
