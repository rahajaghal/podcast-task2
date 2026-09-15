<?php

use App\Http\Controllers\Front\CategoriesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user/welcome', function () {
//     // return "welcome";
//     return view('front.pages.categories.index');
// })->middleware(['auth', 'verified']);

Route::get('/user/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/categories/index',
        [CategoriesController::class, 'index']
    );

    Route::post('/categories/select',
        [CategoriesController::class, 'selectUserContents']
    )->name('categories.select');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
