<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Home;
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


Route::prefix('/')->name('home.')->group(function () {
    Route::get('/',[Home::class, 'index'])->name('home');
    Route::get('/post',[Home::class, 'show'])->name('post');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('/blog')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/edit/{id}',[BlogController::class,'show'])->name('edit');
        Route::get('/create',[BlogController::class,'create'])->name('create');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
    });

});
