<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\TagsController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard/index', [DashboardController::class,'index'])->name('dashboard.index');
Route::group([
'prefix'=> '/admin/dashboard',
// 'as'=>'dashboard.',  
'middleware'=>['auth:admin'] 
],function(){
    Route::get("/index",[DashboardController::class,"index"])->name('dashboard.index');

    Route::get('/categories/index',[CategoriesController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[CategoriesController::class,'create'])->name('categories.create');
    Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');
    Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
    Route::put('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
    Route::delete('/categories/destroy/{id}',[CategoriesController::class,'destroy'])->name('categories.destroy');

    Route::get('/tags/index',[TagsController::class,'index'])->name('tags.index');
    Route::get('/tags/create',[TagsController::class,'create'])->name('tags.create');
    Route::post('/tags/store',[TagsController::class,'store'])->name('tags.store');
    Route::get('/tags/edit/{id}',[TagsController::class,'edit'])->name('tags.edit');
    Route::put('/tags/update/{id}',[TagsController::class,'update'])->name('tags.update');
    Route::delete('/tags/destroy/{id}',[TagsController::class,'destroy'])->name('tags.destroy');
});
// Route::get("/dashboard/index",[DashboardController::class,"index"])->name('dashboard.index');

// Route::get('/dashboard/categories/index',[CategoriesController::class,'index'])->name('categories.index');
// Route::get('/dashboard/categories/create',[CategoriesController::class,'create'])->name('categories.create');
// Route::post('/dashboard/categories/store',[CategoriesController::class,'store'])->name('categories.store');
// Route::get('/dashboard/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
// Route::put('/dashboard/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
// Route::delete('/dashboard/categories/destroy/{id}',[CategoriesController::class,'destroy'])->name('categories.destroy');

// Route::get('/dashboard/tags/index',[TagsController::class,'index'])->name('tags.index');
// Route::get('/dashboard/tags/create',[TagsController::class,'create'])->name('tags.create');
// Route::post('/dashboard/tags/store',[TagsController::class,'store'])->name('tags.store');
// Route::get('/dashboard/tags/edit/{id}',[TagsController::class,'edit'])->name('tags.edit');
// Route::put('/dashboard/tags/update/{id}',[TagsController::class,'update'])->name('tags.update');
// Route::delete('/dashboard/tags/destroy/{id}',[TagsController::class,'destroy'])->name('tags.destroy');


