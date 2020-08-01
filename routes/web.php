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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('projects','Backend\ProjectController')->middleware('auth')->except('show');
Route::resource('items','Backend\ItemController')->middleware('auth')->except('show');

Route::get('indexId/{project}','Backend\ItemController@indexId')->middleware('auth')->name('items.indexId');
Route::get('indexCall','Backend\ItemController@indexCall')->middleware('auth')->name('items.indexCall');
Route::get('createItem/{project}','Backend\ItemController@createItem')->middleware('auth')->name('items.createItem');

Route::get('exportarItemPdf','Backend\ItemController@exportarItemPdf')->middleware('auth')->name('items.exportarItemPdf');
Route::get('exportarIdPdf/{project}','Backend\ItemController@exportarIdPdf')->middleware('auth')->name('items.exportarIdPdf');
Route::get('exportarPdf','Backend\ProjectController@exportarPdf')->middleware('auth')->name('projects.exportarPdf');



