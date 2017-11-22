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
Route::get('product/{product}', ['as' => 'product.show', 'uses' => 'Frontend\ProductController@show']);
Route::get('product/{product}/amount', 'Frontend\ProductController@uploadAmount');
Route::post('feedback', 'Frontend\HomeController@feedback');
Route::group(['prefix' => 'admin', 'middleware' => 'check.role'], function () {
    Route::resource('user', 'Backend\UserController');
    Route::resource('order', 'Backend\OrderController', ['except' => ['create', 'store']]);
    Route::resource('category', 'Backend\CategoryController');
    Route::delete('product/{product}/pav', 'Backend\ProductAttributeValueController@destroy');
    Route::delete('product/{product}/image', 'Backend\ProductController@image_destroy');
    Route::delete('product/manufacturer/{product}', 'Backend\ManufacturerController@destroy');
    Route::get('product/search', 'Backend\ProductController@search');
    Route::post('product/manufacturer', 'Backend\ManufacturerController@store');
    Route::resource('product_attributes', 'Backend\ProductAttributeController');
    Route::resource('product', 'Backend\ProductController', ['except' => 'show']);
    Route::post('product/{product}/upload/images', ['as'=>'product.upload.images','uses'=>'Backend\ProductController@uploadImages']);
    Route::post('product/{product}/destroy/image', ['as'=>'product.destroy.image','uses'=>'Backend\ProductController@destroyImage']);
    Route::get('/', ['as' => 'admin', 'uses' => 'Backend\AdminController@index']);
});

Route::resource('order', 'Frontend\OrderController', ['only' => ['create', 'store']]);

Route::post('location/regions', ['as' => 'location.regions', 'uses' => 'LocationController@getRegionsList']);
Route::post('location/cities', ['as' => 'location.cities', 'uses' => 'LocationController@getCitiesList']);

Route::get('basket', ['as' => 'basket', 'uses' => 'Frontend\BasketController@index']);
Route::group(['prefix' => 'catalog'], function () {
    Route::get('{category}', ['as' => 'category', 'uses' => 'Frontend\CatalogController@index']);
});
Route::get('/', ['as' => 'home', 'uses' => 'Frontend\HomeController@index', 'middleware' => 'admin']);