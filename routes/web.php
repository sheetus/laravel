<?php

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

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts',[PostController::class,'index'])->name(name:"posts.index");;// where index is an action method inside PostController Class
Route::get('/posts/create', [PostController::class,'create'])->name(name:"posts.create"); //where show is an action method inside PostController Class /{ make what is inside dynamic }
// ->name(name:'posts.show) is a shortcut for the url '/posts/{post}' it is used when i have a dynamic url that will cause problem if i made a change into it.
Route::get('/posts/{post}', [PostController::class,'show'])->name(name:"posts.show");
Route::post("/posts",[PostController::class,'store'])->name(name:"posts.store");

Route::delete("/posts",[PostController::class,'destroy'])->name(name:"posts.destroy");
Route::put("/posts",[PostController::class,'update'])->name(name:"posts.update");