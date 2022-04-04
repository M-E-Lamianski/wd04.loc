<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

Route::post('auth', [\App\Http\Controllers\AuthController::class, 'auth']);

Route::get('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('fullName', [\App\Http\Controllers\MyController::class, 'myPage']);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard']);
Route::get('admin/articles', [\App\Http\Controllers\Admin\ArticleController::class, 'index']);
Route::get('admin/articles/create', [\App\Http\Controllers\Admin\ArticleController::class, 'create']);
Route::post('admin/articles/store', [\App\Http\Controllers\Admin\ArticleController::class, 'store'])
    ->name('admin.store_article');
Route::get('admin/articles/{id}/edit', [\App\Http\Controllers\Admin\ArticleController::class, 'edit'])
    ->name('admin.edit_article');
Route::put('admin/articles/{id}/update', [\App\Http\Controllers\Admin\ArticleController::class, 'update'])
    ->name('admin.update_article');
Route::delete('admin/articles/{id}/delete', [\App\Http\Controllers\Admin\ArticleController::class, 'delete'])
    ->name('admin.delete_article');
