<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\news\CategoriesController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('main');

Route::view('/404', '404')->name('404');

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group( function () {
        Route::get('/', [AdminController::class, 'show'])->name('index');
        Route::get('/addnews', [AdminController::class, 'addNews'])->name('addnews');
    });

Route::name('categories.')
       ->prefix('categories')
       ->namespace('Categories')
       ->group( function () {
           Route::get('/', [CategoriesController::class, 'getAllCategories'])->name('all');
           Route::get('/{slug}', [CategoriesController::class, 'getNewsInCategory'])->name('item');
           Route::get('/{slug}/{id}', [CategoriesController::class, 'getNewsByCategory'])->name('show');
       });

/*
Route::fallback(function () {
   return view('/404');
});
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
