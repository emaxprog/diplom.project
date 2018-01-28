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
Route::get('product/{product}', 'Frontend\ProductController@show')->name('product.show');
Route::post('product/{product}/review', 'Frontend\ProductController@review')->name('product.review');
Route::get('cart/{product}/qty', 'Frontend\CartController@qty')->name('cart.qty');
Route::post('feedback', 'Frontend\HomeController@feedback')->name('feedback');
Route::group(['prefix' => 'admin', 'middleware' => 'check.role'], function () {
    Route::get('product/search', 'Backend\ProductController@search');

    Route::resource('user', 'Backend\UserController');
    Route::resource('order', 'Backend\OrderController', ['except' => ['create', 'store']]);
    Route::resource('category', 'Backend\CategoryController');
    Route::delete('product/{product}/pav', 'Backend\ProductAttributeValueController@destroy')->name('pav.destroy');
    Route::delete('product/manufacturer/{product}', 'Backend\ManufacturerController@destroy')->name('manufacturer.destroy');
    Route::post('product/manufacturer', 'Backend\ManufacturerController@store')->name('manufacturer.store');
    Route::resource('product_attributes', 'Backend\ProductAttributeController');
    Route::resource('product', 'Backend\ProductController', ['except' => 'show']);
    Route::post('product/{product}/upload/images', 'Backend\ProductController@uploadImages')->name('product.upload.images');
    Route::post('product/{product}/destroy/image', 'Backend\ProductController@destroyImage')->name('product.destroy.image');

    Route::resource('afisha', 'Backend\AfishaController', ['except' => ['create', 'show', 'destroy']]);
    Route::post('afisha/{afisha}/upload/images', 'Backend\AfishaController@uploadImages')->name('afisha.upload.images');
    Route::post('afisha/{afisha}/destroy/image', 'Backend\AfishaController@destroyImage')->name('afisha.destroy.image');


    Route::get('/', 'Backend\AdminController@index')->name('admin');
});

Route::resource('order', 'Frontend\OrderController', ['only' => ['create', 'store']]);

Route::post('location/regions', 'LocationController@getRegionsList')->name('location.regions');
Route::post('location/cities', 'LocationController@getCitiesList')->name('location.cities');

Route::get('cart', 'Frontend\CartController@index')->name('cart.index');
Route::post('cart', 'Frontend\CartController@add')->name('cart.add');
Route::delete('cart/{id}', 'Frontend\CartController@delete')->name('cart.delete');
Route::delete('cart', 'Frontend\CartController@destroy')->name('cart.destroy');
Route::get('cart/count', 'Frontend\CartController@count')->name('cart.count');
Route::get('cart/total', 'Frontend\CartController@total')->name('cart.total');

Route::group(['prefix' => 'catalog'], function () {
    Route::get('/', ['as' => 'catalog', 'uses' => function () {
        return redirect()->route('category', ['category' => \App\Models\Category::find(1)]);
    }]);
    Route::get('{category}', 'Frontend\CatalogController@index')->name('category');
});
Route::get('/', 'Frontend\HomeController@index')->name('home')->middleware('admin');