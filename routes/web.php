<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\news\CategoriesController;
use App\Http\Controllers\menu\MenuController;
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

Route::get('/', [HomeController::class, 'show'])->name('main');

Route::get('/404', function () {
   return view('404');
})->name('404');

Route::get('/admin', [AdminController::class, 'show'])->name('admin');
Route::get('/auth', [AuthController::class, 'getAuth'])->name('auth');

Route::prefix('categories')
       ->group( function () {
           Route::get('/', [CategoriesController::class, 'getAllCategories'])->name('cat_all');
           Route::get('/news/{id}', [CategoriesController::class, 'getNewsByCategory'])->name('cat_news');
           Route::get('/{category_id}/news/{id}', [CategoriesController::class, 'getSingleNews'])->name('cat_single_news');
           Route::get('/add', [CategoriesController::class, 'addNews'])->name('cat_add_news');
       });

/*
Route::fallback(function () {
   return view('/404');
});
*/

