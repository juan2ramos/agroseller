<?php

use \Agrosellers\User;
Route::group(['middleware' => ['web']], function () {
    require __DIR__ . '/Routes/front.php';
    require __DIR__ . '/Routes/auth.php';

    Route::get('user',function(){
        $rows = User::with('role')->whereRaw('role_id in (1,2,4,5)')->sorted()->paginate();
        $table = Table::create($rows,['name' => 'Nombre',]);
        $table->addColumn('role_id', 'Rol', function($model) {return $model->role()->first()->name;});
        $table->addColumn('id', 'Acciones', function($model) {$id = $model->id;return '<a href="'.$id.'"> d </a>';});

        return view('test', ['table' => $table]);
    });


});
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    require __DIR__ . '/Routes/admin.php';
});