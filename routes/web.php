<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
   return view('welcome');
});

Route::get('/posts',[PostController::class,'index'])->name(name:'posts.index');

Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');

Route::post('/posts',[PostController::class,'store'])->name('posts.store');

Route::get('/posts/{posts}/edit',[PostController::class,'edit'])->name('posts.edit');

Route::get('/posts/{posts}',[PostController::class,'show'])->name('posts.show');

Route::put('/posts/{posts}',[PostController::class,'update'])->name('posts.update');

Route::delete('/posts/{posts}',[PostController::class,'destroy'])->name('posts.destroy');

//1- عرف راوت جديد لكي يستطيع المستخدم الوصول اليه من المتصفح
//2-عرف كونترولر الذي ينشئ الview 
//new comment//new 2
//new4
