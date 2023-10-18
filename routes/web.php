<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\OrderManagementController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ParentCategoryController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Admin\AttributeValueControler;
use App\Http\Controllers\Admin\LengthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ReviewController;


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

// User routes

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('forgot-password', [WebsiteController::class, 'forgot_password'])->name('forgot.password');
Route::post('forget-password', [LoginController::class, 'forgot_password_email'])->name('forgot.password_email');
Route::get('update-password', [WebsiteController::class, 'update_password'])->name('update.password');
Route::post('verify-code', [LoginController::class, 'verify_code'])->name('verify.code');
Route::post('change-password', [LoginController::class, 'change_password'])->name('change.password');

// Pages routes
Route::get('who-we-are', function () {
    return view('who-we-are');
})->name('who-we-are');
Route::get('contact', function () {
    return view('contact');
})->name('contact');
Route::get('terms-and-conditions', function () {
    return view('terms-and-conditions');
})->name('terms-and-conditions');
Route::get('payment-terms', function () {
    return view('payment-terms');
})->name('payment-terms');
Route::get('delivery-policy', function () {
    return view('delivery-policy');
})->name('delivery-policy');
Route::get('faq', function () {
    return view('faq');
})->name('faq');

// Product routes
Route::get('product-details/{id}', [WebsiteController::class, 'productdetails'])->name('product.details');

// Category routes
Route::get('category/{id}', [WebsiteController::class, 'get_category_products'])->name('category');

//Filter routes
Route::get('search', [WebsiteController::class, 'search'])->name('search');
Route::get('filter', [WebsiteController::class, 'filter'])->name('filter');

// Cart routes
Route::post('add-to-cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('quantity-cart-item', [CartController::class, 'quantity_cart_item'])->name('quantity_cart_item');
Route::get('remove-quantity-cart-item', [CartController::class, 'remove_quantity_cart_item'])->name('remove_quantity_cart_item');
Route::get('remove-cart-item', [CartController::class, 'remove_cart_item'])->name('remove_cart_item');
Route::get('add-wishlist', [WebsiteController::class, 'add_wishlist'])->name('add_wishlist');
Route::get('remove-wishlist/{id}', [WebsiteController::class, 'remove_wishlist'])->name('remove_wishlist');
Route::get('wishlist', [WebsiteController::class, 'wishlist'])->name('wishlist');
Route::get('cart', [WebsiteController::class, 'add_cart'])->name('cart');
Route::post('shipping-cart', [WebsiteController::class, 'shippingcart'])->name('shipping-cart');
Route::post('cash_on_delivery', [WebsiteController::class, 'cash_on_delivery'])->name('cash_on_delivery');
Route::get('checkout', [WebsiteController::class, 'checkout'])->name('checkout');
Route::post('add-review', [WebsiteController::class, 'addreview'])->name('add.review');
Route::post('add-lead', [WebsiteController::class, 'addlead'])->name('add.lead');


// Admin routes
Route::get('admin', [AdminDashboardController::class, 'admin_login'])->name('admin.login');
Route::get('/admin-logout', [AdminDashboardController::class, 'admin_logout'])->name("admin.logout");
Route::post('admin-auth', [AdminDashboardController::class, 'admin_auth'])->name('admin.auth');

Route::group(['middleware' =>  ['preventBackHistory', 'admin_middleware'], 'prefix' => 'admin'], function () {

    Route::get('dashboard', [AdminDashboardController::class, 'admin_dashboard'])->name('admin.dashboard');

    // category routes
    Route::group(['prefix' => 'category'], function () {
        // Parent category routes
        Route::resource('parent-category', ParentCategoryController::class);
        Route::get('parent-category-status/{id}', [ParentCategoryController::class, 'status'])->name('parent-category-status');
    });

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

    // product attributes
    Route::resource('variants', VariantController::class);
    Route::get('variants-status/{id}', [VariantController::class, 'status'])->name('variants-status');
    Route::get('attribute-value/{id}', [AttributeValueControler::class, 'attributevalue'])->name('attribute-value');
    Route::resource('attribute-value', AttributeValueControler::class);
    Route::get('attribute-status/{id}', [AttributeValueControler::class, 'status'])->name('attribute-status');


    //Length Management
    Route::get('length', [LengthController::class, 'index'])->name('admin.length');
    Route::get('create-length', [LengthController::class, 'create'])->name('create.length');
    Route::post('create-length', [LengthController::class, 'store'])->name('store.length');
    Route::get('edit-length/{id}', [LengthController::class, 'edit'])->name('edit.length');
    Route::put('update-length/{id}', [LengthController::class, 'update'])->name('update.length');
    Route::delete('delete-length/{id}', [LengthController::class, 'destroy'])->name('delete.length');
    Route::get('length-status/{id}', [LengthController::class, 'status'])->name('length-status');
    Route::get('length-stock/{id}', [LengthController::class, 'stock_status'])->name('length-stock_status');

    // User Management
    Route::get('user-index', [UserController::class, 'index'])->name('user-index');
    Route::get('user-create', [UserController::class, 'create'])->name('user-create');
    Route::post('user-store', [UserController::class, 'store'])->name('user-store');
    Route::get('user-edit/{id}', [UserController::class, 'edit'])->name('user-edit');
    Route::post('user-update/{id}', [UserController::class, 'update'])->name('user-update');
    Route::get('user-delete', [UserController::class, 'delete'])->name('user-delete');
    Route::get('user-status/{id}', [UserController::class, 'status'])->name('user-status');
    Route::get('user-view/{id}', [UserController::class, 'show'])->name('user-view');

    // Review Routes
    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews');
    Route::get('reviews-detail/{id}', [ReviewController::class, 'details'])->name('reviews-detail');
    Route::get('reviews-status/{id}', [ReviewController::class, 'status'])->name('reviews-status');
    Route::post('review-toggle', [ReviewController::class, 'reviewtoggle'])->name('review-toggle');
    Route::post('review-delete/{id}', [ReviewController::class, 'deletereview'])->name('review-delete');

    // Lead Routes
    Route::get('leads', [WebsiteController::class, 'leads'])->name('leads');
});