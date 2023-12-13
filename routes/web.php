<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AlbumController;

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

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('my', [SiteController::class, 'index'])->name('my');

Route::get('files', [FileController::class, 'index'])->name('list');

Route::middleware(['isNotGuest'])->group(function () {

    Route::middleware(['isAdmin'])->group(function () {
        
        Route::get('admin', [AdminController::class, 'index'])->name('admin');

        Route::get('upload-file', [AdminController::class, 'upload'])->name('upload');
        Route::post('upload-file', [AdminController::class, 'uploadFile'])->name('upload-file');
        Route::get('delete-file/{id}', [AdminController::class, 'deleteFile'])->name('delete-file');
    
        Route::resource('author', AuthorController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('album', AlbumController::class);
    });

    Route::get('t', [AdminController::class, 'test']);
});

Route::get('sign-in', function(){
    return view('sign-in');
})->name('sign-in');

Route::get('sign-up', function(){
    return view('sign-up');
})->name('sign-up');

Route::post('sign-in', [UserController::class, 'login']);
Route::post('sign-up', [UserController::class, 'signup'])->name('sign-up');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('info', function () {
   return phpinfo(); 
});

Route::get('download/{hash}.mp3', [SiteController::class, 'download']);

Route::get('test', function () {
    dd(Auth::check());
    dd(Auth::user());
});
