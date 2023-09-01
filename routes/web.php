<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/profile', function () {
    return view('profile.profile');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [PostController::class, 'custom']);
Route::get('/posts', [PostController::class, 'filter'])->name('post.filter');
Route::get('post', [PostController::class, 'index']);
Route::get('post/create', [PostController::class, 'create']);
Route::get('post/{id}', [PostController::class, 'show']);
Route::post('post', [PostController::class, 'store'])->name('post.store');
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('post/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

