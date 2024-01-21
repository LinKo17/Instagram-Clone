<?php

use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionController;

Auth::routes();
Auth::routes(['verify' => true]);

//index section
Route::get('/home/{id}', [ProfileController::class, 'index'])->name('home');
Route::get('/home/edit/{id}', [ProfileController::class, 'edit'])->name('edit');
Route::put('/home/edit/{id}', [ProfileController::class, 'update'])->name('edit');
Route::post("/home/profile", [ProfileController::class,'userProfile'])->name("userProfile");

// post section
Route::get('/',[PostController::class,'index'])->name("index")->middleware("verified");
Route::get('/post/create/{id}', [PostController::class, 'create'])->name('create');
Route::post('/post/create/{id}', [PostController::class, 'store'])->name('store');
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('show');
Route::get("/post/{id}",[PostController::class,'delete'])->name('delete');
Route::get("/post/edit/{id}",[PostController::class,'edit'])->name('edit');
Route::post("/post/update/{id}",[PostController::class,'update'])->name('update');

//follow section
Route::post("/follow/following",[FollowController::class, 'follow'])->name("follow");
Route::post("/follow/unfollowing",[FollowController::class, 'unfollow'])->name("unfollow");


//comment section
Route::get("/comment/{id}",[ReactionController::class,'comment'])->name("comment");
Route::post("/comment/{id}",[ReactionController::class,'content'])->name("content");
Route::get("/comment/delete/{id}",[ReactionController::class,'delete'])->name("delete");

Route::post("/reaction/liking",[ReactionController::class,'like'])->name("like");
Route::post("/reaction/unliking",[ReactionController::class,'unlike'])->name("unlike");
