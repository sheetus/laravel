<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
  use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
Route::middleware('auth')->group(function() {
  Route::get('/posts',[PostController::class,'index'])->name(name:"posts.index");
});
Route::group([`middleware`=>['auth']],function(){
  Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts',[PostController::class,'index'])->name(name:"posts.index");;// where index is an action method inside PostController Class
Route::get('/posts/create', [PostController::class,'create'])->name(name:"posts.create"); //where show is an action method inside PostController Class /{ make what is inside dynamic }
// ->name(name:'posts.show) is a shortcut for the url '/posts/{post}' it is used when i have a dynamic url that will cause problem if i made a change into it.

Route::post("/posts",[PostController::class,'store'])->name(name:"posts.store");

Route::get("/posts/delete/{post}",[PostController::class,'delete'])->name(name:"posts.delete");
Route::put("/posts",[PostController::class,'update'])->name(name:"posts.update");
Route::get('/posts/{post}', [PostController::class,'show'])->name(name:"posts.show");
Route::get("/posts/edit/{post}",[PostController::class,'edit'])->name(name:"posts.edit");
Route::post("/posts/comment/{post}",[CommentController::class,'store'])->name(name:"comments.store");
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
