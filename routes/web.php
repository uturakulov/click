<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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
    return redirect('/admin-login');
});

Route::get('admin-login', [AuthController::class, 'login'])->name('login');
Route::post('admin-signin', [AuthController::class, 'signin'])->name('signin');
Route::get('admin-logout', [AuthController::class, 'logout'])->name('logout');
Route::get('admin-home', AdminController::class)->name('admin-home');

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::get('products/delete/{product}', [ProductController::class, 'destroy'])->name('admin-delete');
Route::get('categories/delete/{category}', [CategoryController::class, 'destroy'])->name('admin-delete-category');
Route::get('products-archive', [ProductController::class, 'archive'])->name('admin-archive');
Route::get('change-password', [AuthController::class, 'changePass'])->name('change-view');
Route::post('change-store', [AuthController::class, 'storePass'])->name('change-store');
