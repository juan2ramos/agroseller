<?php

Route::group(['namespace' => 'admin'], function () {
    Route::get('productos', [
        'uses' => 'ProductController@index',
        'as' => 'products',
        'middleware' => 'VerifyProvider',
    ]);
    Route::post('productos', [
        'uses' => 'ProductController@newProduct',
        'as' => 'newProduct',
    ]);
    Route::post('subcategoriesQuery', [
        'uses' => 'CategoryController@subcategoriesQuery',
        'as' => 'subcategoriesQuery',
    ]);
    Route::post('featuresQuery', [
        'uses' => 'CategoryController@featuresQuery',
        'as' => 'featuresQuery',
    ]);
});

Route::get('proveedores', [
    'uses' => 'ProviderController@showProviders',
    'as' => 'providers'
]);

Route::get('clientes', [
    'uses' => 'HomeAdminController@showUser',
    'as' => 'clients'
]);
Route::get('ofertas', [
    'uses' => 'HomeAdminController@showUser',
    'as' => 'offers'
]);
Route::get('facturas', [
    'uses' => 'HomeAdminController@showUser',
    'as' => 'bills'
]);
Route::get('pedidos', [
    'uses' => 'HomeAdminController@showUser',
    'as' => 'orders',
    'middleware' => 'VerifyProvider',
]);
Route::get('reportes', [
    'uses' => 'HomeAdminController@showUser',
    'as' => 'reports'
]);
Route::get('usuarios', [
    'uses' => 'UserController@index',
    'as' => 'users'
]);

Route::get('usuario/{id}', [
    'uses' => 'UserController@showUser',
    'as' => 'showUser'
]);

Route::get('usuario/{id}/update', [
    'uses' => 'UserController@validateProvider',
    'as' => 'validateProvider'
]);

Route::get('categorias', [
    'uses' => 'CategoryController@index',
    'as' => 'category'
]);
Route::post('categorias', [
    'uses' => 'CategoryController@newCategory',
    'as' => 'category'
]);
Route::post('categorias/{id}', [
    'uses' => 'CategoryController@destroyCategory',
    'as' => 'categoryDelete'
]);

/* Search */
Route::post('proveedores', [
    'uses' => 'ProviderController@searchProviders',
    'as' => 'searchProvider'
]);
Route::post('usuarios', [
    'uses' => 'UserController@searchUsers',
    'as' => 'searchUser'
]);


Route::post('updateProvider/{id}', [
    'uses' => 'ProviderController@updateProvider',
    'as' => 'updateProvider',
]);

Route::post('categorias', [
    'uses' => 'CategoryController@newSubcategory',
    'as' => 'newSubcategory',
]);




Route::get('cultivos', [
    'uses' => 'FarmController@index',
    'as' => 'farmIndex',

]);
Route::get('/', [
    'uses' => 'HomeAdminController@index',
    'as' => 'admin',
    'middleware' => 'VerifyProvider'
]);

Route::get('proveedor', [
    'uses' => 'HomeAdminController@isValidateProviders',
    'as' => 'isValidateProviders',

]);

/* Provider without register in providers table   */

Route::get('registro-proveedor', [
    'uses' => 'ProviderController@registerProvider',
    'as' => 'registerProvider',
]);

Route::post('registro-proveedor', [
    'uses' => 'ProviderController@insertProvider',
    'as' => 'registerProvider',
]);

Route::post('data-provider', [
    'uses' => 'ProviderController@insertProvider',
    'as' => 'insertProvider',

]);

Route::get('informacion-cliente', [
    'uses' => 'ClientController@index',
    'as' => 'clientInformationIndex',

]);

Route::post('informacion-cliente', [
    'uses' => 'ClientController@store',
    'as' => 'clientInformationStore',
]);


Route::get('preguntas', [
    'uses' => 'QuestionController@index',
    'as' => 'questions',
    'middleware' => 'VerifyProvider',
]);