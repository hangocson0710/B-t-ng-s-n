<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Staff\StaffController;

Route::prefix('staff')->middleware('admincheck:5')->name('staff.')->group(function() {
    Route::get('group-admin',[StaffController::class,'group_admin'])->name('group');
    Route::get('add-group',[StaffController::class,'add_group'])->name('add_group');
    Route::post('add-group', [StaffController::class, 'post_add'])->name('add_group'); // Sửa lại tên route
    Route::get('edit-group/{id}',[StaffController::class,'edit'])->name('edit_group');
    Route::post('edit-group/{id}',[StaffController::class,'post_edit'])->name('edit_group');
    Route::put('edit-group/{id}', [StaffController::class, 'post_edit'])->name('edit_group');
    Route::get('delete-group/{id}',[StaffController::class,'delete_group'])->name('delete_group');
    Route::get('admin',[StaffController::class,'list_staff'])->name('list');
    Route::get('add-staff',[StaffController::class,'add_staff'])->name('add_staff');
    Route::post('add-staff',[StaffController::class,'post_add_staff'])->name('add_staff');
    Route::get('edit-staff/{id}',[StaffController::class,'edit_staff'])->name('edit_staff');
    Route::post('edit-staff/{id}',[StaffController::class,'post_edit_staff'])->name('edit_staff');
    Route::put('edit-staff/{id}',[StaffController::class,'post_edit_staff'])->name('edit_staff'); // Thay đổi thành PUT
    Route::get('block/{id}',[StaffController::class,'block'])->name('block');
    Route::get('unblock/{id}',[StaffController::class,'unblock'])->name('unblock');
});
