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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('product/{id}', ['as' => 'product.show', 'uses' => 'ProductController@show']);
Route::get('product/{id}/amount', 'ProductController@uploadAmount');
Route::post('feedback', 'HomeController@feedback');
Route::group(['prefix' => 'admin', 'middleware' => 'check.role'], function () {
    Route::resource('user', 'UserController');
    Route::put('header', ['as' => 'header.update', 'uses' => 'HeaderController@update']);
    Route::get('header', ['as' => 'header.edit', 'uses' => 'HeaderController@edit']);
    Route::delete('afisha', 'AfishaController@destroy');
    Route::get('afisha/edit', ['as' => 'afisha.edit', 'uses' => 'AfishaController@edit']);
    Route::put('afisha', ['as' => 'afisha.update', 'uses' => 'AfishaController@update']);
    Route::resource('order', 'OrderController', ['except' => ['create', 'store']]);
    Route::resource('category', 'CategoryController');
    Route::delete('product/{id}/pav', 'ProductAttributeValueController@destroy');
    Route::delete('product/{id}/image', 'ProductController@image_destroy');
    Route::get('product/upload/{startFrom}', 'ProductController@upload');
    Route::delete('product/manufacturer/{id}', 'ManufacturerController@destroy');
    Route::get('product/search', 'ProductController@search');
    Route::post('product/manufacturer', 'ManufacturerController@store');
    Route::resource('product_attributes', 'ProductAttributeController');
    Route::resource('product', 'ProductController', ['except' => 'show']);
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);
});

Route::resource('order', 'OrderController', ['only' => ['create', 'store']]);

Route::get('user/regions/{id}', 'UserController@uploadRegions');
Route::get('user/cities/{id}', 'UserController@uploadCities');

Route::get('basket', ['as' => 'basket', 'uses' => 'BasketController@index']);
Route::group(['prefix' => 'catalog'], function () {
    Route::get('category/{id}', ['as' => 'category', 'uses' => 'CatalogController@index']);
});
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index', 'middleware' => 'admin']);