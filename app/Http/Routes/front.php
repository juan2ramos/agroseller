<?php

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);
Route::get('producto', [
    'uses' => 'HomeController@productDetail',
    'as' => 'productDetail'
]);

Route::get('precios', [
    'uses' => 'HomeController@pricing',
    'as' => 'pricing'
]);

Route::get('productos', [
    'uses' => 'ProductController@productFront',
    'as' => 'product'
]);

/*Route::get('productos/{slug}', [
    'uses' => 'ProductController@productDetailFront',
    'as' => 'productDetail'
]);*/

