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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('product/{product}', ['as' => 'product.show', 'uses' => 'ProductController@show']);
Route::get('product/{product}/amount', 'ProductController@uploadAmount');
Route::post('feedback', 'HomeController@feedback');
Route::group(['prefix' => 'admin', 'middleware' => 'check.role'], function () {
    Route::resource('user', 'UserController');
    Route::resource('order', 'OrderController', ['except' => ['create', 'store']]);
    Route::resource('category', 'CategoryController');
    Route::delete('product/{product}/pav', 'ProductAttributeValueController@destroy');
    Route::delete('product/{product}/image', 'ProductController@image_destroy');
    Route::get('product/upload/{startFrom}', 'ProductController@upload');
    Route::delete('product/manufacturer/{product}', 'ManufacturerController@destroy');
    Route::get('product/search', 'ProductController@search');
    Route::post('product/manufacturer', 'ManufacturerController@store');
    Route::resource('product_attributes', 'ProductAttributeController');
    Route::resource('product', 'ProductController', ['except' => 'show']);
    Route::post('product/{product}/upload/images', ['as'=>'product.upload.images','uses'=>'ProductController@uploadImages']);
    Route::post('product/{product}/destroy/image', ['as'=>'product.destroy.image','uses'=>'ProductController@destroyImage']);
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);
});

Route::resource('order', 'OrderController', ['only' => ['create', 'store']]);

Route::post('location/regions', ['as' => 'location.regions', 'uses' => 'LocationController@getRegionsList']);
Route::post('location/cities', ['as' => 'location.cities', 'uses' => 'LocationController@getCitiesList']);

Route::get('basket', ['as' => 'basket', 'uses' => 'BasketController@index']);
Route::group(['prefix' => 'catalog'], function () {
    Route::get('category/{category}', ['as' => 'category', 'uses' => 'CatalogController@index']);
});
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index', 'middleware' => 'admin']);