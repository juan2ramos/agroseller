<?php

namespace Agrosellers\Services;
use GuzzleHttp\Client;
use Agrosellers\Entities\Order;
use Agrosellers\User;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ZonaPagos {

    private $client;
    private $key;
    private $shop;
    private $serviceCode;
    private $routeCode;

    public function __construct(){
        $this->key = env('ZP_KEY');
        $this->shop = env('ZP_SHOP');
        $this->serviceCode = env('ZP_SERVICE_CODE');
        $this->routeCode = env('ZP_ROUTE_CODE');
        $this->client = new Client();
    }

    /** Retorna los datos y estado del pago **/

    public function checkPay($payId){
        $url = 'https://www.zonapagos.com/api_verificar_pagoV3/api/verificar_pago_v3';
        $data = [
                    'body' => [
                        'str_id_clave' => $this->key,
                        'int_id_tienda' => $this->shop,
                        'str_id_pago' => $payId,
                    ]
                ];
        $response = $this->client->post($url, $data);
        return $response->getBody()->getContents();
    }

    /** Retorna el id del pago **/

    public function invoiceRequest($inputs){
        $url = 'https://www.zonapagos.com/api_inicio_pago/api/inicio_pagoV2';
        $user = auth()->user();
        $user->identification = $inputs['id_cliente'];
        $user->save();

        $data = [
            'body' => [
                "id_tienda" => $this->shop,
                "clave" => $this->key,
                "codigo_servicio_principal" => $this->serviceCode,
                "total_con_iva"  => $inputs["total_con_iva"],
                "valor_iva" => 0,
                "email" => auth()->user()->email,
                "id_pago" => date_format(new \Jenssegers\Date\Date(), 'YmdHis') . rand(100, 999),
                "id_cliente" => $inputs["id_cliente"],
                "tipo_id" => $inputs["tipo_id"],
                "nombre_cliente" => $inputs["nombre_cliente"],
                "apellido_cliente" => $inputs["apellido_cliente"],
                "descripcion_pago" => $inputs["descripcion_pago"],
                "telefono_cliente" => $inputs["telefono_cliente"],
                "info_opcional1" => $inputs["info_opcional1"],
                "info_opcional2" => ".",
                "info_opcional3" => ".",
                "lista_codigos_servicio_multicredito" => "",
                "lista_nit_codigos_servicio_multicredito" => "",
                "lista_valores_con_iva" => "",
                "lista_valores_iva" => "",
                "total_codigos_servicio" => ""
            ]
        ];

        $response = $this->client->post($url, $data);
        return str_replace('"', '',$response->getBody()->getContents());
    }

    public function insertPayResult($inputs){

        $data = [];
        /*foreach (Session::get('cart') as $item) {

            if(!$item->offers)
                $value = $item->price;
            else
                $value = (Carbon::now()->between(new Carbon($item->offers->offer_on), new Carbon($item->offers->offer_off)))
                    ? $item->offers->offer_price
                    : $item->price;

            $data[$item->id] = ['quantity' => $item->quantity, 'state_order_id' => 2, 'value' => $value];
        }*/


        $user = User::where('identification', $inputs['id_cliente'])->first();

        $order = Order::create([
            //'phone' => $inputs['telefono_cliente'],
            //'description' => $inputs['descripcion_pago'],
            //'name_client' => $inputs['nombre_cliente'] . ' ' . $inputs['apellido_cliente'],
            'identification_client' => $inputs['id_cliente'],
            'user_id' => $user->id,
            'address_client' => $inputs['campo1'],
            'zp_buy_id' => $inputs['id_pago'],
            'zp_buy_token' => $inputs['ticketID'],
            'zp_state' => $inputs['estado_pago']
        ]);

        $user->orders()->save($order);
        $order->products()->attach($data);

        /*if($inputs['estado_pago']) {
            Session::forget('cart');
            Session::forget('valueTotal');
        }*/
    }

    /** Retorna la instancia de zona pagos **/

    public static function create(){
        return new ZonaPagos();
    }
}