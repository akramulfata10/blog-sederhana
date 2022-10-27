<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Auth;
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
    return 'ini adalah front end web';
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('/posts', PostController::class)->except('show');
    Route::post('image-upload', [ImageUploadController::class, 'storeImage'])->name('image.upload');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/santri', \App\Http\Livewire\Admin\Santri\Index::class);
    Route::get('/category', \App\Http\Livewire\Admin\Category\Index::class);
    // Route::get('/santri', \App\Http\Livewire\santri\Index::class);
    // Route::get('/category', \App\Http\Livewire\category\Index::class);
});
