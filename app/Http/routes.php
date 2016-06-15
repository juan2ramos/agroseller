<?php
Route::bind('product',function($id){
    return \Agrosellers\Entities\Product::find($id);
});

Route::group(['middleware' => ['web']], function () {
    require __DIR__ . '/Routes/front.php';
    require __DIR__ . '/Routes/auth.php';

    Route::get('sesiones',[function(){
        dd(Session::get('cart'));
    },'as'=>'sesiones']);

});
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    require __DIR__ . '/Routes/admin.php';
});


Route::get('prueba', [
    'uses' => 'QuestionController@prueba',
    'as' => 'prueba'
]);

Route::get('prueba/create', [
    'uses' => 'QuestionController@pruebaCreate',
    'as' => 'pruebaCreate'
]);

Route::get('a', function(){
    return ['name' => 'Abigail', 'state' => 'CA'];
});
