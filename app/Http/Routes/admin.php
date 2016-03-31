<?php


Route::get('proveedores', [
    'uses' => 'ProviderController@showProviders',
    'as' => 'providers'
]);


Route::get('productos', [
    'uses' => 'ProductController@index',
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
