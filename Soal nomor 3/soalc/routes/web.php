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

Route::get('/',[
    'uses' => 'ProductController@index',
])->name('index');

Route::post('/',[
    'uses' => 'ProductController@store',
    'as'    => 'product.store'
]);

Route::post('/{id}',[
    'uses' => 'ProductController@update',
    'as'    => 'product.update'
]);

Route::get('/{id}',[
    'uses' => 'ProductController@destroy',
    'as'    => 'product.destroy'
]);
