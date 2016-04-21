<?php

Route::get('proveedores', [
    'uses' => 'ProviderController@showProviders',
    'as' => 'providers'
]);


Route::get('productos', [
    'uses' => 'ProductController@indexBack',
    'as' => 'products'
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
    'as' => 'orders'
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
    'middleware' => 'Roles:1-2'
]);

Route::post('categorias', [
    'uses' => 'CategoryController@newSubcategory',
    'as' => 'newSubcategory',
    'middleware' => 'Roles:1-2'
]);

Route::post('productos', [
    'uses' => 'ProductController@newProduct',
    'as' => 'newProduct',
    'middleware' => 'Roles:1-2-3'
]);
Route::post('subcategoriesQuery', [
    'uses' => 'CategoryController@subcategoriesQuery',
    'as' => 'subcategoriesQuery',
    'middleware' => 'Roles:1-2-3'
]);
Route::post('featuresQuery', [
    'uses' => 'CategoryController@featuresQuery',
    'as' => 'featuresQuery',
    'middleware' => 'Roles:1-2-3'
]);

Route::get('cultivos', [
    'uses' => 'FarmController@index',
    'as' => 'farmIndex',
    'middleware' => 'Roles:1-2'
]);
Route::get('/', [
    'uses' => 'HomeAdminController@index',
    'as' => 'admin',
]);
Route::get('proveedor', [
    'uses' => 'HomeAdminController@isValidateProviders',
    'as' => 'isValidateProviders',
    'middleware' => 'sendHome:validateProvider'
]);

/* Provider without register in providers table   */
Route::get('registro-proveedor', [
    'uses' => 'ProviderController@registerProvider',
    'as' => 'registerProvider',
    'middleware' => 'sendHome:registerProvider'
]);

Route::post('registro-proveedor', [
    'uses' => 'ProviderController@insertProvider',
    'as' => 'registerProvider',
    'middleware' => 'sendHome:registerProvider'
]);

Route::post('data-provider', [
    'uses' => 'ProviderController@insertProvider',
    'as' => 'insertProvider',
    'middleware' => 'sendHome:registerProvider'
]);

Route::get('informacion-cliente', [
    'uses' => 'ClientController@index',
    'as' => 'clientInformationIndex',
    //'middleware' => 'sendHome:registerProvider'//
]);

Route::post('informacion-cliente', [
    'uses' => 'ClientController@store',
    'as' => 'clientInformationStore',
]);
