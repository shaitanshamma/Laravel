<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\NewsSourceController as AdminNewsSourceController;
use \App\Http\Controllers\Admin\AuthorController as AdminAuthorsController;
use \App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Account\IndexController as AccountController;


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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');

    Route::group([
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware'=>['auth','is.admin']], function () {
        Route::resource('/categories', AdminCategoriesController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/sources', AdminNewsSourceController::class);
        Route::resource('/authors', AdminAuthorsController::class);
        Route::resource('/users',AdminUsersController::class );
        Route::view('/', 'admin.index')->name('index');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
