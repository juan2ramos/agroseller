<?php

namespace Agrosellers\Services;
use GuzzleHttp\Client;

class ZonaPagos {

    private $client;
    private $key;
    private $shop;

    public function __construct(){
        $this->key = env('ZP_KEY');
        $this->shop = env('ZP_SHOP');
        $this->client = new Client();
    }

    public function checkPay($payId){
        $url = 'https://www.zonapagos.com/api_verificar_pagoV3/api/verificar_pago_v3';
        $response = $this->client->post($url, $this->getData($payId));
        return $response->getBody()->getContents();
    }

    public static function create(){
        return new ZonaPagos();
    }

    private function getData($payId){
        return [
            'body' => [
                'str_id_clave' => $this->key,
                'int_id_tienda' => $this->shop,
                'str_id_pago' => $payId,
            ]
        ];
    }
}