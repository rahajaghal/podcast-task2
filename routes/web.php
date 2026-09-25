<?php

use App\Http\Controllers\Front\CategoriesController;
use App\Http\Controllers\Front\ChannelController;
use App\Http\Controllers\Front\NotificationController;
use App\Http\Controllers\Front\PodcastController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return view('welcome');
//     return view('layouts.guest-website');
// });
Route::get('/', function () {
    // return view('welcome');
    // return view('layouts.guest-website');
    return redirect()->route('guest.index');
});

// Route::get('/user/welcome', function () {
//     // return "welcome";
//     return view('front.pages.categories.index');
// })->middleware(['auth', 'verified']);

Route::get('/user/dashboard', [PodcastController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

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

    // Route::get('/follow/{id}',[ChannelController::class,'toggleFollowChannel'])->name('channel.follow');
    Route::get('/channel/{id}', [ChannelController::class, 'show']) ->name('channel.show'); 
    // Route::post('/channel/{id}/follow', [ChannelController::class, 'follow']) ->name('channel.follow'); 
    // Route::delete('/channel/{id}/unfollow', [ChannelController::class, 'unfollow']) ->name('channel.unfollow');
    Route::post('/channel/{id}/toggle-follow', [ChannelController::class, 'toggleFollow'])
    ->name('channel.toggleFollow');
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
    // Route::get('/podcasts/index',[PodcastController::class,'index'])->name('podcasts.index');

    Route::get('/show/podcast/{id}',[PodcastController::class,'showPodcast'])->name('podcast.show');

    Route::post('/podcast/{id}/favorite',[PodcastController::class, 'favorite'])->name('podcast.favorite');
    Route::post('/podcast/{id}/rate',[PodcastController::class, 'rate'])->name('podcast.rate');

    Route::get('/show/user/favourites/podcasts',[PodcastController::class,'favouritePodcasts'])->name('podcasts.favourite');

    Route::get( '/notifications', [NotificationController::class, 'index'] )->name('notifications.index'); 
    Route::get( '/notifications/{id}', [NotificationController::class, 'show'] )->name('notifications.show'); 
    Route::post( '/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead'] )->name('notifications.markAllAsRead');
    
});

Route::get('/show/podcasts/based/tag/{tag_id}',[PodcastController::class, 'tagPodcasts'])->name('podcasts.tag');
Route::get('/guest/index',[PodcastController::class,'guestIndex'])->name('guest.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
