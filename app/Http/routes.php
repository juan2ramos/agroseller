<?php
include 'Routes/auth.php';
include 'Routes/front.php';

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::group(['middleware' => 'isValidateProviders'], function () {
        Route::get('/', [
            'uses' => 'HomeAdminController@index',
            'as' => 'admin',
        ]);
        include 'Routes/admin.php';
    });

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
});


