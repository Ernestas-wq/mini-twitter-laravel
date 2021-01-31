<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TweetsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});
Route::view('home', 'home')->middleware('auth');

// Tweet routes

Route::get('/t/create', [TweetsController::class, 'create'])->name('tweet.create');
Route::post('/t', [TweetsController::class, 'store'])->name('tweet.store');
Route::get('/t/{tweet}', [TweetsController::class, 'show'])->name('tweet.show');
Route::get('/t/{tweet}/edit', [TweetsController::class, 'edit'])->name('tweet.edit');
Route::patch('/t/{tweet}', [TweetsController::class, 'update'])->name('tweet.update');
Route::delete('/t/{tweet}',[TweetsController::class, 'destroy'])->name('tweet.destroy');

// Comment routes
Route::post('/t/{tweet}/comment',[CommentsController::class, 'store'])->name('comment.store');
Route::get('/t/{tweet}/{comment}/edit', [CommentsController::class, 'edit'])->name('comment.edit');
Route::patch('/t/{tweet}/{comment}', [CommentsController::class, 'update'])->name('comment.update');


// Profile Routes
Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'update'])->name('profile.update');