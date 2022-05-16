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



Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard']);

    Route::get('articles', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('article.index');
    Route::get('articles/create', [App\Http\Controllers\Admin\ArticleController::class, 'create']);
    Route::post('articles/storage', [App\Http\Controllers\Admin\ArticleController::class, 'storage'])->name('storage_article');
    Route::get('articles/edit/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('edit_article');
    Route::put('articles/update/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('update_article');
    Route::delete('articles/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'delete'])->name('delete_article');

    Route::resource('country', \App\Http\Controllers\Admin\CountryController::class)->except(['show']);
});

//Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);


Route::get('converter', [App\Http\Controllers\Api\ConverterController::class, 'index']);
Route::post('converter/result', [App\Http\Controllers\Api\ConverterController::class, 'convert'])->name('converter.result');
