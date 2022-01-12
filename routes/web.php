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

Route::get('/info', function (){
    $news = `<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum fugiat natus nesciunt numquam odio placeat possimus provident reiciendis tempora veniam. Accusamus commodi consequatur cum debitis deserunt, expedita maxime natus nobis, nulla, quaerat suscipit tempora. Dolor ducimus exercitationem nihil officia quia?</p>
`;
    return view('info', ['news' => $news]);
});

Route::get('/about', fn() => 'This is about page');
