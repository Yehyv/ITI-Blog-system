<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\commentsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [BlogPostController::class, 'home'])->name('home');
Route::get('/redirect', [BlogPostController::class, 'redirect'])->name('redirect');
Route::get('/blog', [BlogPostController::class, 'index'])->name('index');
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('showPost');
Route::get('/create', [BlogPostController::class, 'createPost'])->name('createPost');
Route::post('/blog/create', [BlogPostController::class, 'store'])->name('storePost'); //saves the created post to the databse
Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit'])->name('editPost'); //shows edit post form
Route::put('/blog/{blogPost}/edit', [BlogPostController::class, 'update'])->name('updatePost'); //commits edited post to the database 
Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy'])->name('deletePost'); //deletes post from the database


Route::put('/blog', [commentsController::class, 'store'])->name('storeComment'); //saves the created post to the databse
Route::delete('/deleteblog/{comments}', [commentsController::class, 'destroy'])->name('deleteComment');
Route::put('/blogEdit/{comments}', [commentsController::class, 'update'])->name('updateComment');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
