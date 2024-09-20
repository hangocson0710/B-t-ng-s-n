<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\Homecontroller;
use App\Http\Controllers\Home\Authcontroller;
use App\Http\Controllers\Home\Classified\ClassifiedController;
use App\Http\Controllers\Home\Account\AccountController;
use App\Http\Controllers\Home\Project\ProjectController;
use App\Http\Controllers\Home\Comment\CommentController;
use App\Http\Controllers\Home\Coin\CoinController;
use App\Http\Controllers\Home\News\NewsController;
use App\Http\Controllers\ParamController;




Route::get('/api/districts/{id}', [ParamController::class, 'get_district']);
Route::get('/api/wards/{id}', [ParamController::class, 'get_ward']);



Route::get('/', [Homecontroller::class, 'home'])->name('trang-chu');

Route::middleware('userchecklogin')->group(function () {
    Route::get('/dang-ki', [Authcontroller::class, 'register'])->name('dang-ki');
    Route::post('/dang-ki', [Authcontroller::class, 'post_register'])->name('dang-ki');
    Route::get('/dang-nhap', [Authcontroller::class, 'login'])->name('dang-nhap');
    Route::post('/dang-nhap', [Authcontroller::class, 'post_login'])->name('dang-nhap');
});

Route::get('/dang-xuat', [Authcontroller::class, 'logout'])->name('dang-xuat');

Route::get('dang-tin', [ClassifiedController::class, 'dang_tin_rao'])->name('dang-tin')->middleware(['usercheck', 'forbidden']);
Route::post('dang-tin', [ClassifiedController::class, 'post_dang_tin'])->middleware(['usercheck', 'forbidden'])->name('dang-tin');

Route::get('dang-du-an', [ProjectController::class, 'dang_du_an'])->middleware(['usercheck', 'forbidden'])->name('dang-du-an');
Route::post('dang-du-an', [ProjectController::class, 'post_dang_du_an'])->middleware(['usercheck', 'forbidden'])->name('dang-du-an');

Route::get('nang-cap-tai-khoan', [AccountController::class, 'upgrate_account'])->middleware('usercheck')->name('nang-cap-tai-khoan');
Route::post('xac-nhan-nang-cap-tai-khoan', [AccountController::class, 'confirm_upgrate'])->middleware('usercheck')->name('xac-nhan-nang-cap-tai-khoan');
Route::get('nap-coin',[CoinController::class,'nap_coin'])->middleware('usercheck')->name('nap-coin');
Route::post('nap-coin',[CoinController::class,'post_nap'])->middleware('usercheck')->name('nap-coin');

Route::post('them-binh-luan-tin-rao/{classified_id}', [CommentController::class, 'post_comment'])->middleware(['usercheck', 'block'])->name('them-binh-luan-tin-rao');
Route::get('dang-ki-nhan-tin/{classified_id}', [ClassifiedController::class, 'sign_up_classified'])->middleware('usercheck')->name('dang-ki-nhan-tin');
Route::get('xoa-binh-luan-tin-rao/{comment_id}', [ClassifiedController::class, 'delete_comment'])->middleware('usercheck')->name('xoa-binh-luan-tin-rao');

Route::get('cap-nhat-thong-tin', [AccountController::class, 'info'])->middleware('usercheck')->name('cap-nhat-thong-tin');
Route::post('cap-nhat-thong-tin', [AccountController::class, 'post_update'])->middleware('usercheck')->name('cap-nhat-thong-tin');
Route::get('tin-rao-da-dang', [AccountController::class, 'list_classified'])->middleware('usercheck')->name('tin-rao-da-dang');
Route::get('danh-sach-khach-hang', [AccountController::class, 'list_customer'])->middleware('usercheck')->name('danh-sach-khach-hang');
Route::get('edit/{id}',[AccountController::class,'edit'])->name('edit');
Route::post('edit/{id}',[AccountController::class,'post_edit1'])->name('edit');
Route::get('/delete/{id}',[AccountController::class,'delete'])->name('delete');
Route::get('/restore/{id}',[AccountController::class,'restore'])->name('restore');

Route::get('danh-sach-yeu-thich', [ClassifiedController::class, 'danhSachYeuThich'])->name('danh-sach-yeu-thich');
Route::post('them-yeu-thich/{classified_id}', [ClassifiedController::class, 'themYeuThich'])->name('them-yeu-thich');
Route::post('xoa-yeu-thich/{classified_id}', [ClassifiedController::class, 'xoaYeuThich'])->name('xoa-yeu-thich');

# get - đổi mật khẩu
Route::get('doi-mat-khau', [AccountController::class, 'get_change_password'])->middleware('usercheck')->name('doi-mat-khau');
Route::post('doi-mat-khau', [AccountController::class, 'post_change_password'])->middleware('usercheck')->name('doi-mat-khau');

# get - danh sách tin tức
Route::get('tin-tuc/{news_url}.html', [NewsController::class, 'news_detail'])->name('chi-tiet-tin-tuc');
Route::get('tin-tuc/{group_url}', [NewsController::class, 'list_group'])->name('danh-sach-tin-tuc');

# get - danh sách dự án
Route::get('du-an/{group_url}', [ProjectController::class, 'list'])->name('danh-sach-du-an');
Route::get('du-an/chi-tiet/{project_url}', [ProjectController::class, 'project_detail'])->name('chi-tiet-du-an');
Route::post('/autocomplete-ajax-project', [ProjectController::class, 'autocomplete_ajax_project'])->name('autocomplete_ajax_project');

# get - danh sách tin rao
Route::get('{classified_url}.html', [Homecontroller::class, 'classified_detail'])->name('chi-tiet-tin');
Route::get('{group_url}', [Homecontroller::class, 'classified_list'])->name('danh-sach-tin');

Route::post('/autocomplete-ajax', [HomeController::class, 'autocomplete_ajax'])->name('autocomplete_ajax');

Route::post('/gui-lien-he', [ClassifiedController::class, 'guiLienHe'])->name('gui-lien-he');
