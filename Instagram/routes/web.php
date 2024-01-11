<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//index section
Route::get('/home/{id}', [ProfileController::class, 'index'])->name('home');
Route::get('/home/edit/{id}', [ProfileController::class, 'edit'])->name('edit');
Route::put('/home/edit/{id}', [ProfileController::class, 'update'])->name('edit');

// post section
Route::get('/post/create/{id}', [PostController::class, 'create'])->name('create');
Route::post('/post/create/{id}', [PostController::class, 'store'])->name('store');
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('show');
