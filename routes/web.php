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

Route::get('/', function () {
    return view('welcome');
});

 Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth'])->name('dashboard');

 Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin');

 require __DIR__.'/auth.php';

//Digging-deeper
Route::prefix('digging-deeper')->group(function () {
    Route::get('collections', 'DiggingDeeperController@collections')->name('digging-deeper.collections');
});

// Front routes
$groupFront = ['namespace' => 'Blog', 'prefix' => 'blog'];
Route::group($groupFront, function ()
{
    Route::resource('posts', PostController::class)->names('posts')->only(['index', 'show']);
});

// Admin routes
$groupAdmin = ['namespace' => 'Blog\Admin', 'prefix' => 'admin/blog'];
Route::group($groupAdmin, function ()
{
    Route::resource('categories', CategoryController::class)
        ->except(['show', 'delete'])
        ->names('blog.admin.categories');
    Route::resource('posts', PostController::class)
        ->except(['show'])
        ->names('blog.admin.posts');
    });
