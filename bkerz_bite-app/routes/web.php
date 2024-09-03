<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProductController;



Route::get("/",[HomeController::class,"index"])->name("home");


Route::get("users/register",[UserController::class,"register"])->name("user.register");
Route::post("users/store",[UserController::class,"store"])->name("user.store");
Route::get('users/login',[UserController::class,"login"])->name("user.login");
Route::post("users/signin",[UserController::class,"signin"])->name("user.signin");
Route::get('users/logout',[UserController::class,"logout"])->name("user.logout");

Route::get("admin/",[AdminController::class,"index"])->name("admin");



Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/category/{id}', [ProductController::class, 'showCategory'])->name('category.show');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('admins',[AdminController::class,'index'])->name('admin');


