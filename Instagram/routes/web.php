<?php

use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

Auth::routes();
Auth::routes(['verify' => true]);

//index section
Route::get('/home/{id}', [ProfileController::class, 'index'])->name('home');
Route::get('/home/edit/{id}', [ProfileController::class, 'edit'])->name('edit');
Route::put('/home/edit/{id}', [ProfileController::class, 'update'])->name('edit');

// post section
Route::get('/',[PostController::class,'index'])->name("index")->middleware("verified");
Route::get('/post/create/{id}', [PostController::class, 'create'])->name('create');
Route::post('/post/create/{id}', [PostController::class, 'store'])->name('store');
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('show');

//follow section
Route::post("/follow/following",[FollowController::class, 'follow'])->name("follow");
Route::post("/follow/unfollowing",[FollowController::class, 'unfollow'])->name("unfollow");
