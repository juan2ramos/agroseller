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

/*Route::get('mailjk',[function(){
    $user = [];
    $m = Mailgun::send('emails.focusGroup', $user, function($message)
    {
        $message->to('focusgroup@mailgun.agrosellers.com')->subject('Estás invitado a el Focus Group agrosellers');
        $message->tag('testTag');
        $message->from('info@agrosellers.com', 'Agrosellers - una compra inteligente');
        $message->trackOpens(true);
    });
    dd($m);
},'as'=>'sesiones']);*/