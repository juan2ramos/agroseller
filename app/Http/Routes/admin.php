<?php


Route::get('proveedores', [
    'uses' => 'UserController@showProviders',
    'as' => 'providers'
]);


Route::get('productos', [
    'uses' => 'HomeAdminController@showUser',
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
    'uses' => 'UserController@searchProviders',
    'as' => 'searchProvider'
]);
Route::post('usuarios', [
    'uses' => 'UserController@searchUsers',
    'as' => 'searchUser'
]);
