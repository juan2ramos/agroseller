<?php
Route::bind('product', function ($id) {
    return \Agrosellers\Entities\Product::find($id);
});

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

Route::get('prueba', [
    'as' => 'elasticIndex',
    'uses' => 'PositionAlgorithmController@index'
]);

use Illuminate\Http\Request;
use Agrosellers\Entities\Product;

Route::post('prueba', [
    'as' => 'elasticSearch',
    'uses' => function (Request $request) {
        Product::addAllToIndex();
        $products = Product::search($request->name)->getDictionary();
        echo '<table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                    </tr>       
                </thead>
                <tbody>
             ';

        foreach ($products as $product) {
            echo "<tr>
                    <td>
                        {$product->name}
                    </td>
                    <td>
                        {$product->description}
                    </td>
                    <td>
                        {$product->price}
                    </td>
                  </tr>";
        }
        echo '</tbody></table>';

        Product::reindex();

        $product = Product::search($request->name);
        dd($product);
        return redirect()->route('elasticIndex', compact('product'));
    }
]);

Route::get('t', [
    'as' => 'elasticSearcht',
    'uses' => function (Request $request) {
        if ( function_exists( 'apache_request_headers' ) ) {
            $headers = apache_request_headers();
        } else {
            $headers = $_SERVER;
        }
        //Get the forwarded IP if it exists
        if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
            $the_ip = $headers['X-Forwarded-For'];
        } elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
        ) {
            $the_ip = $headers['HTTP_X_FORWARDED_FOR'];
        } else {

            $the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
        }
        dd(GeoIP::getLocation($the_ip ) );
    }
]);

Route::get('pasarela', function(){
    return view('pasarelaPrueba');
});

use Agrosellers\Services\ZonaPagos;

Route::get('consulta/{id}', function($id){
    $zp = ZonaPagos::create();
    dd($zp->checkPay($id));
});