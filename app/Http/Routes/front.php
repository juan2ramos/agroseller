<?php

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home'
]);

Route::get('producto/{id}', [
    'uses' => 'ProductController@productDetailFront',
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

Route::get('finalizar-compra', [
    'uses' => 'ProductController@checkout',
    'as' => 'checkout'
]);

Route::get('preguntas-frecuentes', [
    'uses' => 'HomeController@indexFaqs',
    'as' => 'faqs'
]);

//**************** Formulario de contacto ******************//
Route::get('contacto', [
    'uses' => 'HomeController@indexContact',
    'as' => 'contactForm'
]);

Route::post('contacto', [
    'uses' => 'HomeController@postContact',
    'as' => 'contactForm'
]);

Route::post('questions/new', [
    'uses' => 'ProductController@addQuestion',
    'as' => 'addQuestion'
]);