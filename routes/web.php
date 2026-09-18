<?php

use App\Http\Controllers\Front\CategoriesController;
use App\Http\Controllers\Front\ChannelController;
use App\Http\Controllers\Front\PodcastController;
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
    // return view('dashboard');
    return view('front.pages.index');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/categories/index',
        [CategoriesController::class, 'index']
    );

    Route::post('/categories/select',
        [CategoriesController::class, 'selectUserContents']
    )->name('categories.select');

    Route::get('/channel/index',
    [ChannelController::class,'userChannel']
    )->name('channel.index');

    // Route::get('/channel',
    //     [ChannelController::class, 'index']
    // )->name('channel.index');

    Route::get('/channel/create',
        [ChannelController::class, 'create']
    )->name('channel.create');

    Route::post('/channel/store',
        [ChannelController::class, 'store']
    )->name('channel.store');

    Route::get('/podcast/create',[PodcastController::class,'create'])->name('podcasts.create');
    Route::post('/podcast/store',[PodcastController::class,'store'])->name('podcasts.store');
    Route::delete('/delete/podcast/{podcast_id}',[PodcastController::class,'delete'])->name('podcasts.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
