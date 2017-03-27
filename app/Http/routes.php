<?php
Route::group(['middleware' => ['web']], function () {
    require __DIR__ . '/Routes/front.php';
    require __DIR__ . '/Routes/auth.php';

    Route::get('sesiones', [function () {
        dd(Session::get('cart'));
    }, 'as' => 'sesiones']);

});
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    require __DIR__ . '/Routes/admin.php';
});

Route::get('mailjk', [function () {
    $user = [];
    $m = Mailgun::send('emails.focusGroup', $user, function ($message) {
        $message->to('grupoagrosellers@mailgun.agrosellers.com')->subject('Invitacion focus group Agrosellers');
        $message->tag('testGroupAgro');
        $message->from('info@agrosellers.com', 'Agrosellers');
        $message->trackOpens(true);
    });
    dd($m);
}, 'as' => 'sesiones']);

use Agrosellers\User;


Route::get('pasarela', function () {
    return view('pasarelaPrueba');
});

use Agrosellers\Services\ZonaPagos;

Route::get('consulta/{id}', function ($id) {
    $zp = ZonaPagos::create();
    $a = json_decode($zp->checkPay($id));
    dd($a->res_pagos_v3[0]->str_id_pago);
});




