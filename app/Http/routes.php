<?php
Route::get('/', function () {
    return view('front.home');
});
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


Route::group(['prefix' => 'admin', 'middleware' =>  'auth'], function () {
    Route::get('/', [
        'uses' => 'HomeAdminControl@index',
        'as' => 'admin'
    ]);
    Route::get('categorias', [
        'uses' => 'CategoryController@index',
        'as' => 'category'
    ]);
});