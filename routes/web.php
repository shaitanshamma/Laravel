<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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


/*news*/

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/news', [NewsController::class, 'news'])->name('news');

Route::get('/news/{id}', [NewsController::class, 'showNews'])->name('news.show')->where('id', '\d+');


/*admin*/

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::resource('/categories', AdminCategoriesController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::view('/', 'admin.index')->name('index');
});
