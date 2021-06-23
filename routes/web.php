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

require __DIR__.'/auth.php';

// Front routes
$groupFront = ['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'];
Route::group($groupFront, function ()
{
    Route::resource('posts', PostController::class)->names('posts');
});

// Admin routes
$groupAdmin = ['namespace' => 'App\Http\Controllers\Blog\Admin', 'prefix' => 'admin/blog'];
Route::group($groupAdmin, function ()
{
    $methods = ['index', 'create', 'store', 'edit', 'update'];
    Route::resource('categories', CategoryController::class)->only($methods)->names('blog.admin.categories');
});
