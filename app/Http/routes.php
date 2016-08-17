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

Route::get('mailjk',[function(){
    $user = [];
    $m = Mailgun::send('emails.focusGroup', $user, function($message)
    {
        $message->to('grupoagrosellers@mailgun.agrosellers.com')->subject('Invitacion focus group Agrosellers');
        $message->tag('testGroupAgro');
        $message->from('info@agrosellers.com', 'Agrosellers');
        $message->trackOpens(true);
    });
    dd($m);
},'as'=>'sesiones']);

use Agrosellers\User;

Route::get('prueba', [
    'as' => 'elasticIndex' ,
    'uses' => function() {
        return view('prueba');
    }
]);

use Illuminate\Http\Request;
use Agrosellers\Entities\Product;

Route::post('prueba', [
    'as' => 'elasticSearch',
    'uses' => function(Request $request){
        $product = Product::search($request->name);
        return redirect()->route('elasticIndex', compact('product'));
    }
]);