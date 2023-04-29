<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Home;
use App\Http\Controllers\Review;
use App\Http\Controllers\TypeBlog;
use App\Http\Controllers\Setting;
use App\Http\Controllers\UserController;

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
    Route::get('/', function () {
        return view('home');
    })->name('index');
    Route::get('/home',[Home::class, 'index'])->name('home');
    Route::get('/post/{id}',[Home::class, 'show'])->name('post');
    Route::get('/tag/{id}',[Home::class, 'type'])->name('tag');
    Route::get('/user-review',[Home::class, 'review'])->name('review');
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
        Route::put('/update/{id}',[BlogController::class,'update'])->name('update');
        Route::get('/create',[BlogController::class,'create'])->name('create');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::delete('/delete/{id}',[BlogController::class, 'delete'])->name('delete');
    });

    Route::prefix('/type')->name('type.')->group(function () {
        Route::get('/', [TypeBlog::class, 'index'])->name('index');
        Route::get('/edit/{id}',[TypeBlog::class,'show'])->name('edit');
        Route::put('/update/{id}',[TypeBlog::class,'update'])->name('update');
        Route::get('/create',[TypeBlog::class,'create'])->name('create');
        Route::post('/store', [TypeBlog::class, 'store'])->name('store');
        Route::delete('/delete/{id}',[TypeBlog::class, 'delete'])->name('delete');
    });

    Route::prefix('/setting')->name('setting.')->group(function () {
        Route::get('/', [Setting::class, 'index'])->name('index');
        Route::get('/edit/{id}',[Setting::class,'show'])->name('edit');
        Route::put('/update/{id}',[Setting::class,'update'])->name('update');
        Route::get('/create',[Setting::class,'create'])->name('create');
        Route::post('/store', [Setting::class, 'store'])->name('store');
        Route::delete('/delete/{id}',[Setting::class, 'delete'])->name('delete');
    });

    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/edit/{id}',[UserController::class,'show'])->name('edit');
        Route::put('/update/{id}',[UserController::class,'update'])->name('update');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::delete('/delete/{id}',[UserController::class, 'delete'])->name('delete');
    });

    Route::prefix('/review')->name('review.')->group(function(){
       Route::get('/',[Review::class,'index'])->name('index'); 
       Route::get('/create',[Review::class,'create'])->name('create');
       Route::post('/store',[Review::class,'store'])->name('store');
    });

});
