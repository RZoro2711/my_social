<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ContentController::class, 'index'])->name('home');
Route::get('/home', [ContentController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login_validate'])->name('login_validate');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'register_post'])->name('register_post');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/edit/profile', [ProfileController::class, 'edit'])->name('profile_edit');
Route::post('/edit/profile', [ProfileController::class, 'update'])->name('profile_update');

Route::get('/content/add', [ContentController::class, 'content'])->name('content');
Route::post('/content/add', [ContentController::class, 'add'])->name('content_add');

Route::get('/content/edit/{id}', [ContentController::class, 'edit'])->name('content_edit');
Route::post('/content/update', [ContentController::class, 'update'])->name('content_update');
Route::get('/content/delete/{id}', [ContentController::class, 'delete']);
Route::get('/content/detail/{id}', [ContentController::class, 'detail'])->name('detail');

Route::post('/comment', [CommentController::class, 'add'])->name('comment');
Route::get('/comment/delete/{id}', [CommentController::class, 'delete']);

