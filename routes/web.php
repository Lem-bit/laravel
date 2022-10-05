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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::name('home.')
    ->prefix('home')
    ->namespace('Home')
    ->group( function () {
        Route::get('/', [HomeController::class, 'index'])->name('main');
        Route::get('/save', [HomeController::class, 'save'])->name('save');
        Route::get('/load', [HomeController::class, 'load'])->name('load');
    });

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group( function () {
        Route::get('/', [AdminController::class, 'show'])->name('index');
        Route::match(['get', 'post'],'/create_news', [AdminController::class, 'createNews'])->name('create_news');
        Route::match(['get', 'post'], '/save_news', [AdminController::class, 'saveNews'])->name('save_news');
        Route::get('/news', [AdminController::class, 'getAllNews'])->name('news');
        Route::get('/saveall', [AdminController::class, 'saveAllNews'])->name('saveallnews');
        Route::get('/delete/{id}', [AdminController::class, 'deleteNews'])->name('deletenews');
        Route::get('/edit/{id}', [AdminController::class, 'editNews'])->name('editnews');
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
