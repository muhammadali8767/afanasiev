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
    Route::resource('catrgories', CategoryController::class)->only($methods)->names('blog.admin.categories');
});
