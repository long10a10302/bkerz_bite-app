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

Route::middleware(['admin'])->group(function () {
    
Route::get("admin",[AdminController::class,"index"])->name("admin");
Route::get('admin/cake',[AdminController::class,'cake'])->name('admin.cake');
Route::get('admin/category',[AdminController::class,'category'])->name('admin.category');

Route::get('admin/category/add',[AdminController::class,'addCat'])->name('admin.category.add');
Route::post('admin/category/create',[AdminController::class,'createCat'])->name('admin.category.create');
Route::get('admin/category/edit/{id}',[AdminController::class,'editCat'])->name('admin.category.edit');
Route::put('admin/category/update/{id}',[AdminController::class,'updateCat'])->name('admin.category.update');
Route::delete('/admin/category/delete/{id}', [AdminController::class, 'destroyCat'])->name('admin.category.delete');

Route::get('admin/cake/add',[AdminController::class,'addCake'])->name('admin.cake.add');
Route::post('admin/cake/create',[AdminController::class,'createCake'])->name('admin.cake.create');
Route::get('admin/cake/edit/{id}',[AdminController::class,'editCake'])->name('admin.cake.edit');
Route::put('admin/cake/update/{id}',[AdminController::class,'updateCake'])->name('admin.cake.update');
Route::delete('/admin/cake/delete/{id}', [AdminController::class, 'destroyCake'])->name('admin.cake.delete');

});



Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/category/{id}', [ProductController::class, 'showCategory'])->name('category.show');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');




