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



