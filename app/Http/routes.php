<?php

use \Agrosellers\User;
Route::group(['middleware' => ['web']], function () {
    require __DIR__ . '/Routes/front.php';
    require __DIR__ . '/Routes/auth.php';
});
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    require __DIR__ . '/Routes/admin.php';
});
Route::get('a',function(){
    foreach(\Agrosellers\Entities\Subcategory::all() as $s){
        $s->slug = str_slug($s->name);
        echo $s->slug . '<br>';
        $s->save();
    }
});
