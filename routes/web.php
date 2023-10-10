<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\OrderManagementController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('admin', [AdminDashboardController::class, 'admin_login'])->name('admin.login');

Route::get('/admin-logout', [AdminDashboardController::class, 'admin_logout'])->name("admin.logout");
Route::post('admin-auth', [AdminDashboardController::class, 'admin_auth'])->name('admin.auth');
Route::group(['middleware' =>  ['preventBackHistory', 'admin_middleware'], 'prefix' => 'admin'], function () {

    Route::get('dashboard', [AdminDashboardController::class, 'admin_dashboard'])->name('admin.dashboard');


    // Order management
    Route::group(['prefix' => 'orders'], function () {
        Route::resource('orderManagement', OrderManagementController::class);
        Route::post('order-status/{id}', [OrderManagementController::class, 'order_status'])->name('order.status');
        Route::get('invoice/{id}', [OrderManagementController::class, 'invoice_index'])->name('invoice.index');
    });

    Route::get('order_invoice', [OrderManagementController::class, 'orderinvoice'])->name('order_invoice');
    Route::post('send-invoice', [OrderManagementController::class, 'send_invoice'])->name('send_invoice');

    // product management
    Route::resource('product', ProductController::class);
    Route::get('product-status/{id}', [ProductController::class, 'status'])->name('product-status');
    Route::post('product/{id}', [ProductController::class, 'updateproductdata'])->name('update-product');
    Route::get('remove-image', [ProductController::class, 'remove_image'])->name('remove_image');

    // User Management
    Route::get('user-index', [UserController::class, 'index'])->name('user-index');
    Route::get('user-create', [UserController::class, 'create'])->name('user-create');
    Route::post('user-store', [UserController::class, 'store'])->name('user-store');
    Route::get('user-edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::post('user-update/{id}', [UserController::class, 'update'])->name('user-update');
    Route::get('user-delete', [UserController::class, 'delete'])->name('user-delete');
    Route::get('user-status/{id}', [UserController::class, 'status'])->name('user-status');
    Route::get('user-view/{id}', [UserController::class, 'show'])->name('user-view');
});
