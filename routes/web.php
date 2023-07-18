<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PropertyController;

Route::get('dashboard',[AdminController::class,'GetDashboard'])->name('dashboard');

Route::get('categories',[CategoryController::class,'GetCategories'])->name('get-categories');

Route::post('categories',[CategoryController::class,'CreateCategory'])->name('create-category');

Route::get('category/{category_id?}',[CategoryController::class,'GetCategory'])->name('get-category');

Route::post ('properties',[PropertyController::class,'CreateProperty'])->name('create-property');
