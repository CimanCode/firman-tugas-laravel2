<?php

use App\Http\Controllers\postcontroller;
use App\Http\Controllers\productcontroller;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('product')->group( function() {
    Route::get('/list',[productcontroller::class,'index'])->name('product.list');
    Route::get('/lite',[productcontroller::class,'lite'])->name('product.lite');
    Route::get('/store',[productcontroller::class,'store'])->name('product.store');
    Route::get("/detail/{id}",[productcontroller::class,'detail'])->name('product.detail');
    Route::post('/create',[productcontroller::class,'create'])->name('product.create');
    Route::put("/update/{id}",[productcontroller::class,'update'])->name('product.update');
    Route::get("/delete/{id}",[productcontroller::class,'delete'])->name('product.delete');
    Route::get("/info/{id}",[productcontroller::class,'info'])->name('product.info');
});

// Route::get('/', function() {
//     return view('home');
// });

Route::get('/', [postcontroller::class, 'blog'])->name('post.blog');

Route::prefix('post')->group( function () {
    Route::get('/list', [postcontroller::class, 'index'])->name('post.list');
    Route::get('/blog', [postcontroller::class, 'blog'])->name('post.blog');
    Route::get('/updated/{id}', [postcontroller::class, 'updated'])->name('post.updated');
    Route::get('/detail/{id}', [postcontroller::class, 'detail'])->name('post.detail');
    Route::get('/store', [postcontroller::class, 'store'])->name('post.store');
    Route::post('/create', [postcontroller::class, 'create'])->name('post.create');
    Route::put('/update/{id}', [postcontroller::class, 'update'])->name('post.update');
    Route::get('/delete/{id}', [postcontroller::class, 'deleted'])->name('post.delete');
});
