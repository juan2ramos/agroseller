<?php


Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);



Route::get('productos', [
    'uses' => 'ProductController@productFront',
    'as' => 'product'
]);

Route::get('productos/{slug}', [
    'uses' => 'ProductController@productDetailFront',
    'as' => 'productDetail'
]);

