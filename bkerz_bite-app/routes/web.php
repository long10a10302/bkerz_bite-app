<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ProductController;


Route::get("/", [HomeController::class, "index"])->name("home");

/*menu*/

use App\Http\Controllers\MenuController;





Route::get("users/register", [UserController::class, "register"])->name("user.register");
Route::post("users/store", [UserController::class, "store"])->name("user.store");
Route::get('users/login', [UserController::class, "login"])->name("user.login");
Route::post("users/signin", [UserController::class, "signin"])->name("user.signin");
Route::get('users/logout', [UserController::class, "logout"])->name("user.logout");

Route::middleware(['admin'])->group(function () {

    Route::get("admin", [AdminController::class, "index"])->name("admin");
    Route::get('admin/cake', [AdminController::class, 'cake'])->name('admin.cake');
    Route::get('admin/category', [AdminController::class, 'category'])->name('admin.category');

    Route::get('admin/category/add', [AdminController::class, 'addCat'])->name('admin.category.add');
    Route::post('admin/category/create', [AdminController::class, 'createCat'])->name('admin.category.create');
    Route::get('admin/category/edit/{id}', [AdminController::class, 'editCat'])->name('admin.category.edit');
    Route::post('admin/category/update/{id}', [AdminController::class, 'updateCat'])->name('admin.category.update');
    Route::delete('/admin/category/delete/{id}', [AdminController::class, 'destroyCat'])->name('admin.category.delete');

    Route::get('admin/cake/add', [AdminController::class, 'addCake'])->name('admin.cake.add');
    Route::post('admin/cake/create', [AdminController::class, 'createCake'])->name('admin.cake.create');
    Route::get('admin/cake/edit/{id}', [AdminController::class, 'editCake'])->name('admin.cake.edit');
    Route::put('admin/cake/update/{id}', [AdminController::class, 'updateCake'])->name('admin.cake.update');
    Route::delete('/admin/cake/delete/{id}', [AdminController::class, 'destroyCake'])->name('admin.cake.delete');

    Route::get('admin/order', [AdminController::class, 'order'])->name('admin.order');
    Route::put('admin/order/update/{id}', [OrderController::class, 'updateOrder'])
        ->name('admin.order.updateOrder');

    Route::get('admins/review', [AdminController::class, 'review'])->name('admin.review');
});


Route::get('/{category_id}', [CategoryController::class, 'showCookiesMacarons'])->name("categorydetail");
Route::get('/{category_name}/products', [CategoryController::class, 'getProductsByCategory'])->name('products.index');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/category/overview', [CategoryController::class, 'overview'])->name('overview');



Route::middleware(['user'])->group(function () {
    Route::get('/cart/index', [CartController::class, 'index'])->name(name: 'cart');
    Route::get('/cart/addtocart/{id}', [CartController::class, 'addCart'])->name('cart.add');
    Route::post('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('cart/delete-cart/{id}', [CartController::class, 'destroyCart'])->name('cart.remove');

    Route::get('/order/checkout', [OrderController::class, 'index'])->name(name: 'check_out');
    Route::post('/order', [OrderController::class, 'createOrder'])->name(name: 'order');

    Route::get('/order/status', [OrderController::class, 'status'])->name(name: 'status');

    Route::post('/orders/cancel-all', [OrderController::class, 'cancelOrderDetailAll'])->name('orders.cancelAll');
    Route::delete('/orders/cancel/{id}', [OrderController::class, 'cancelOrderDetail'])->name('orders.cancel');
});
