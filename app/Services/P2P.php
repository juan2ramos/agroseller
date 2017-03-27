<?php

namespace Agrosellers\Services;

use GuzzleHttp\Client;
use Agrosellers\Entities\Order;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class P2P
{

    private $p2p;


    public function __construct()
    {

        $this->p2p = new PlacetoPay([
            'login' => env('P2P_LOGIN'),
            'tranKey' => env('P2P_TRANKEY'),
            'url' => env('P2P_URL'),
            'type' => env('P2P_TYPE')
        ]);

    }

    public function createPay($inputs)
    {
        $request = json_decode('{
    "locale": "es_CO",
    "buyer": {
        "name": "' . $inputs['nombre_cliente'] . '",
        "surname": "' . $inputs['apellido_cliente'] . '",
        "email": "' . $inputs['email'] . '"
      
    },
    "payment": {
        "reference": "' . $inputs['id_pago'] . '",
        "description": "Pago en PlacetoPay",
        "amount": {
            "currency": "COP",
            "total": ' . $inputs['total_con_iva'] . '
        }
        
    },
    "returnUrl": "https://desarrollo.agrosellers.co/placetopay/' . $inputs['id_pago'] . '",
    "expiration": "' . date('c', strtotime('+5 days')) . '",
    "ipAddress": "' . $inputs['ip'] . '",
    "userAgent": "' . $inputs['userAgent'] . '"
}', true);



        try {

            $response = $this->p2p->request($request);
            if ($response->isSuccessful()) {

                return $response->processUrl;

                // Redirect the client to the processUrl or display it on the JS extension
                // $response->processUrl();
            } else {
                // There was some error so check the message
                // $response->status()->message();
            }
            var_dump($response);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }


    public static function create()
    {

        return new P2P();
    }
}