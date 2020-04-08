<?php

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

Route::resource('products', 'ProductsController');

Route::post('/create', 'ProductsController@store');

Route::post('/update', 'ProductsController@update');

Route::post('/delete', 'ProductsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('lang/{lang}', function ($locale) {

    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
