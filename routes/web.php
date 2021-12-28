<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('auth.view-login');
});

Route::get('dang-nhap', [AuthController::class, 'viewLogin'])->name('auth.view-login')->middleware('checkLogout');
Route::post('login', [AuthController::class, 'login'])->name('auth.login')->middleware('checkLogout');
Route::get('dang-ky', [AuthController::class, 'viewRegister'])->name('auth.view-register')->middleware('checkLogout');
Route::post('register', [AuthController::class, 'register'])->name('auth.register')->middleware('checkLogout');
Route::get('dang-xuat', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('trang-chu', function () {
    return view('home');
})->name('home')->middleware('checkLogin');
Route::get('doi-mat-khau', [AuthController::class, 'viewChangePassword'])->name('auth.view-changePassword');
Route::post('change-password', [AuthController::class, 'changePassword'])->name('auth.changePassword');
Route::get('quen-mat-khau', [AuthController::class, 'viewForgotPassword'])->name('auth.view-forgotPassword');
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])->name('auth.forgotPassword');
Route::get('reset-password/{token}', [AuthController::class, 'viewResetPassword'])->name('auth.view-resetPassword');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('auth.resetPassword');
