<?php

require __DIR__ . '/Routes/front.php';

Route::group(['middleware' => ['web']], function () {
    require __DIR__ . '/Routes/auth.php';
});
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    require __DIR__ . '/Routes/admin.php';
});