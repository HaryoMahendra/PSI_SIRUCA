<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\peminjamanController;
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

// Route::get('/', function () {
//     echo "Hello, World!";
// });

// Route::get('/login', [LoginController::class, 'index']) -> name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses']) -> name('login-proses');
// Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');

// Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
//     Route::get('/dashboard', [HomeController::class, 'dashboard']) -> name('dashboard');
//     Route::get('/user', [HomeController::class, 'index']) -> name('index');
//     Route::get('/create', [HomeController::class, 'create']) -> name('user.create');
//     Route::post('/store', [HomeController::class, 'store']) -> name('user.store');
//     Route::get('/{id}', [HomeController::class, 'show']) -> name('user.show');
//     Route::get('/edit/{id}', [HomeController::class, 'edit']) -> name('user.edit');
//     Route::put('/update/{id}', [HomeController::class, 'update']) -> name('user.update');
//     Route::delete('/delete/{id}', [HomeController::class, 'delete']) -> name('user.delete');
// });
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard']) -> name('dashboard');
        Route::get('/user', [HomeController::class, 'index']) -> name('index');
        Route::get('/create', [HomeController::class, 'create']) -> name('user.create');
        Route::post('/store', [HomeController::class, 'store']) -> name('user.store');
        Route::get('/{id}', [HomeController::class, 'show']) -> name('user.show');
        Route::get('/edit/{id}', [HomeController::class, 'edit']) -> name('user.edit');
        Route::put('/update/{id}', [HomeController::class, 'update']) -> name('user.update');
        Route::delete('/delete/{id}', [HomeController::class, 'delete']) -> name('user.delete');
    });

    Route::group(['prefix' => 'buku', 'as' => 'buku.'], function () {
        Route::get('/', [BukuController::class, 'index']) -> name('index');
        Route::get('/create', [BukuController::class, 'create']) -> name('create');
        Route::post('/store', [BukuController::class, 'store']) -> name('store');
        Route::get('/{id}', [BukuController::class, 'show']) -> name('show');
        Route::get('/edit/{id}', [BukuController::class, 'edit']) -> name('edit');
        Route::put('/update/{id}', [BukuController::class, 'update']) -> name('update');
        Route::delete('/delete/{id}', [BukuController::class, 'delete']) -> name('delete');
    });
    Route::group(['prefix' => 'peminjaman', 'as' => 'peminjaman.'], function () {
        Route::get('/', [peminjamanController::class, 'index']) -> name('index');
        Route::get('/create', [peminjamanController::class, 'create']) -> name('create');
        Route::post('/store', [peminjamanController::class, 'store']) -> name('store');
        Route::get('/{id}', [peminjamanController::class, 'show']) -> name('show');
        Route::get('/edit/{id}', [peminjamanController::class, 'edit']) -> name('edit');
        Route::put('/update/{id}', [peminjamanController::class, 'update']) -> name('update');
        Route::delete('/delete/{id}', [peminjamanController::class, 'delete']) -> name('delete');
    });
});
