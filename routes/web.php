<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;



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


Route::get('/',[ArticleController::class,"index"]);

Route::get('/articles',[ArticleController::class,"index"]);
Route::get("/articles/detail/{id}",[ArticleController::class,"detail"]);
Route::get("/articles/delete/{id}",[ArticleController::class,"delete"]);

Route::get("/articles/create",[ArticleController::class,"create"]);
Route::post("/articles/create",[ArticleController::class,"addPost"]);


// edit

Route::get("/articles/edit/{id}",[ArticleController::class,"edit"]);
Route::post("/articles/edit/{id}",[ArticleController::class,"edit"]);

// editcomment

Route::get("/articles/detail/comments/edit/{id}",[CommentController::class,"commentEdit"]);
Route::post("/articles/detail/comments/edit/{id}",[CommentController::class,"commentEdit"]);

// comment

Route::get("/articles/comment/create",[CommentController::class,"create"]);
Route::get("/articles/comment/delete/{id}",[CommentController::class,"delete"]);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
