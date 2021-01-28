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

Auth::routes(["register"=>false,"reset"=>false]);
Route::resource('categories','CategoryController');
Route::resource('tables','TableController');
Route::post('/serveur/{id}','ServantsController@update')->name('serveupdate');
Route::resource('serveurs','ServantsController');
Route::resource('menus','MenuController');
Route::post('meus/create/store','MenuController@store')->name('menus.store');
Route::post('menus','MenuController@trier')->name('menu.trie');

Route::get('payments','PayementController@index')->name('payement.index');
Route::resource('sales','salesController');

Route::get('/home', 'HomeController@index')->name('home');

