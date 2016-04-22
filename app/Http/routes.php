<?php

use Jenssegers\Date\Date;

Date::setLocale('nl');
Route::group(['middleware' => ['web']], function () {
    require __DIR__ . '/Routes/auth.php';
});
require __DIR__ . '/Routes/front.php';

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    require __DIR__ . '/Routes/admin.php';

    Route::get('dashboard',function(){
        return "probando ando los middleware con el nuevo componente de laravel authorize";
    });
});
Route::get('test/{category}',function(\Agrosellers\Entities\Category $category = null){
    dd( Date::now()->subDays(5)->diffForHumans() );
    return 'La Categoria es '. $category->name;
});


