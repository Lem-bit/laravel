<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\news\CategoriesController;
use App\Http\Controllers\menu\MenuController;

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
    return view('index');
})->name('main');

Route::get('/menu', [MenuController::class, '__invoke'])->name('main_menu');
Route::get('/auth', [AuthController::class, '__invoke'])->name('auth');
Route::get('/news', [CategoriesController::class, '__invoke'])->name('categories');
Route::get('/categories/{id}', [CategoriesController::class, 'getNewsByCategory'])->name('news');
Route::get('/news/{category_id}/{id}', [CategoriesController::class, 'getSingleNews'])->name('single_news');
