<?php
use \Agrosellers\Entities\Product;
use \Agrosellers\User;
Route::group(['middleware' => ['web']], function () {
    require __DIR__ . '/Routes/front.php';
    require __DIR__ . '/Routes/auth.php';
});
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    require __DIR__ . '/Routes/admin.php';
});
Route::get('a',function(){
    $Products = Product::with(['productFiles' => function($file){
        $file->addSelect(array('id', 'name'))->whereRaw('extension = "jpg" or extension = "png" or extension = "svg"')->first();
    }])->get(['name', 'slug']);

        return response()->json(['products' => $Products]);

});


