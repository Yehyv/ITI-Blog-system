<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
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
Route::get('/blog', [BlogPostController::class, 'index'])->name('index');
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('showPost');
Route::get('/blog/create',[BlogPostController::class,'create'])->name('createPost');
Route::post('/blog/create', [BlogPostController::class, 'store'])->name('storePost'); //saves the created post to the databse
Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit'])->name('editPost'); //shows edit post form
Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update'])->name('updatePost'); //commits edited post to the database 
Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy'])->name('deletePost'); //deletes post from the database
