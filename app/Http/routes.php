<?php
Route::get('/', 'HomeController@index');
Route::get('productos', function () {
    return view('front.products');
});
Route::get('productos/topmix', function () {
    return view('front.topmix');
});

Route::get('login', [
        'uses' => 'Auth\AuthController@getLogin',
        'as' => 'login'
    ]
);
Route::post('login', [
        'uses' => 'Auth\AuthController@postLogin',
        'as' => 'login'
    ]
);


Route::get('logout', 'Auth\AuthController@getLogout');


Route::get('registro', [
        'uses' => 'Auth\AuthController@getRegister',
        'as' => 'register'
    ]
);
Route::post('registro', [
        'uses' => 'Auth\AuthController@postRegister',
        'as' => 'register'
    ]
);


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('proveedor', [
        'uses' => 'HomeAdminController@isValidateProviders',
        'as' => 'isValidateProviders'
    ]);

    Route::get('proveedores', [
        'uses' => 'HomeAdminController@isValidateProviders',
        'as' => 'providers'
    ]);

    Route::get('categorias', [
        'uses' => 'HomeAdminController@isValidateProviders',
        'as' => 'isValidateProviders'
    ]);
    Route::get('productos', [
        'uses' => 'HomeAdminController@isValidateProviders',
        'as' => 'products'
    ]);

    Route::get('clientes', [
        'uses' => 'HomeAdminController@isValidateProviders',
        'as' => 'clients'
    ]);
    Route::get('ofertas', [
        'uses' => 'HomeAdminController@isValidateProviders',
        'as' => 'offers'
    ]);
    Route::get('facturas', [
        'uses' => 'HomeAdminController@isValidateProviders',
        'as' => 'bills'
    ]);
    Route::get('pedidos', [
        'uses' => 'HomeAdminController@isValidateProviders',
        'as' => 'orders'
    ]);
    Route::get('reportes', [
        'uses' => 'HomeAdminController@isValidateProviders',
        'as' => 'reports'
    ]);

    Route::group(['middleware' => 'isValidateProviders'], function () {
        Route::get('/', [
            'uses' => 'HomeAdminController@index',
            'as' => 'admin'
        ]);
        Route::get('usuarios', [
            'uses' => 'UserController@index',
            'as' => 'users'
        ]);

        Route::post('usuario/{id}', [
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
    });

});


